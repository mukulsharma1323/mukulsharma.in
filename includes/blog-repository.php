<?php
declare(strict_types=1);

const BLOG_ROOT = __DIR__ . '/..';
const BLOG_DB_PATH = BLOG_ROOT . '/data/blogs.sqlite';
const BLOG_UPLOAD_DIR = BLOG_ROOT . '/img/blog/uploads';

function blog_db(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    if (!is_dir(dirname(BLOG_DB_PATH))) {
        mkdir(dirname(BLOG_DB_PATH), 0775, true);
    }

    $pdo = new PDO('sqlite:' . BLOG_DB_PATH, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    $pdo->exec('PRAGMA foreign_keys = ON');
    $pdo->exec('PRAGMA journal_mode = WAL');
    blog_install_schema($pdo);

    return $pdo;
}

function blog_install_schema(PDO $pdo): void
{
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS blogs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            excerpt TEXT NOT NULL DEFAULT "",
            content TEXT NOT NULL DEFAULT "",
            category TEXT NOT NULL DEFAULT "General",
            tags TEXT NOT NULL DEFAULT "",
            image_path TEXT NOT NULL DEFAULT "",
            image_alt TEXT NOT NULL DEFAULT "",
            status TEXT NOT NULL DEFAULT "draft" CHECK(status IN ("draft", "published")),
            reading_minutes INTEGER NOT NULL DEFAULT 5,
            published_at TEXT,
            created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
        )'
    );
    $pdo->exec('CREATE INDEX IF NOT EXISTS idx_blogs_status_date ON blogs(status, published_at DESC)');
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS settings (
            setting_key TEXT PRIMARY KEY,
            setting_value TEXT NOT NULL DEFAULT "",
            updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
        )'
    );

    $count = (int) $pdo->query('SELECT COUNT(*) FROM blogs')->fetchColumn();
    if ($count === 0) {
        blog_seed_posts($pdo);
    }
}

function blog_seed_posts(PDO $pdo): void
{
    $posts = [
        [
            'My Favourite Quotes',
            'my-favourite-quotes',
            'A curated collection of memorable ideas from influential people, books and films.',
            '<blockquote><p>A ship in port is safe, but that is not what ships are built for.</p></blockquote><blockquote><p>Success usually comes to those who are too busy to be looking for it.</p></blockquote><blockquote><p>If something could be sweeter than love, it must be success.</p></blockquote><p>More ideas and quotes will be added as I discover them.</p>',
            'Philosophy',
            'Inspiration, Philosophy, Mindset, Personal Growth',
            'img/optimized/post-1.webp',
            'Notebook representing a collection of favourite quotes',
            4,
        ],
        [
            'My Favourite Books',
            'my-favourite-books',
            'Books that shaped how I think about technology, work, creativity and personal growth.',
            '<h2>Books on my reading list</h2><ul><li><strong>The Alchemist</strong> by Paulo Coelho</li><li><strong>Zero to One</strong> by Peter Thiel</li><li><strong>The Power of Now</strong> by Eckhart Tolle</li><li><strong>The Monk Who Sold His Ferrari</strong> by Robin Sharma</li></ul><p>More recommendations will be added as my reading list grows.</p>',
            'Books',
            'Books, Business, Philosophy, Personal Growth',
            'img/optimized/work-3.webp',
            'A desk with books, notebooks and a laptop',
            3,
        ],
        [
            'Tools for Web Development',
            'tools-for-web-development',
            'A practical selection of tools that improve productivity and make web development faster.',
            '<h2>Development toolkit</h2><ul><li>Visual Studio Code</li><li>Chrome DevTools</li><li>Git and GitHub</li><li>Docker</li><li>Terminal and SSH tools</li><li>Database management clients</li><li>Task and documentation tools</li></ul><p>This toolkit evolves as I discover better development workflows.</p>',
            'Development',
            'Development, Productivity, Editors, Dev Tools',
            'img/optimized/post-3.webp',
            'Web development workspace and tools',
            5,
        ],
    ];

    $stmt = $pdo->prepare(
        'INSERT INTO blogs
        (title, slug, excerpt, content, category, tags, image_path, image_alt, status, reading_minutes, published_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, "published", ?, ?)'
    );
    foreach ($posts as $index => $post) {
        $stmt->execute([...$post, sprintf('2022-01-%02d 09:00:00', $index + 1)]);
    }

    blog_set_setting('site_name', 'MukulSharma.in', $pdo);
    blog_set_setting('blog_tagline', 'Notes on technology, books and ideas.', $pdo);
}

function blog_all(bool $includeDrafts = false, ?int $limit = null): array
{
    $sql = 'SELECT * FROM blogs';
    if (!$includeDrafts) {
        $sql .= ' WHERE status = "published"';
    }
    $sql .= ' ORDER BY COALESCE(published_at, created_at) DESC, id DESC';
    if ($limit !== null) {
        $sql .= ' LIMIT ' . max(1, $limit);
    }
    return blog_db()->query($sql)->fetchAll();
}

function blog_find_by_slug(string $slug, bool $includeDrafts = false): ?array
{
    $sql = 'SELECT * FROM blogs WHERE slug = :slug';
    if (!$includeDrafts) {
        $sql .= ' AND status = "published"';
    }
    $stmt = blog_db()->prepare($sql . ' LIMIT 1');
    $stmt->execute(['slug' => $slug]);
    $post = $stmt->fetch();
    return $post ?: null;
}

function blog_find(int $id): ?array
{
    $stmt = blog_db()->prepare('SELECT * FROM blogs WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $id]);
    $post = $stmt->fetch();
    return $post ?: null;
}

function blog_slugify(string $value): string
{
    $value = trim(mb_strtolower($value));
    $value = preg_replace('/[^a-z0-9]+/u', '-', $value) ?? '';
    return trim($value, '-') ?: 'post-' . date('YmdHis');
}

function blog_unique_slug(string $desired, int $ignoreId = 0): string
{
    $base = blog_slugify($desired);
    $slug = $base;
    $suffix = 2;
    $stmt = blog_db()->prepare('SELECT id FROM blogs WHERE slug = :slug AND id != :id LIMIT 1');
    while (true) {
        $stmt->execute(['slug' => $slug, 'id' => $ignoreId]);
        if (!$stmt->fetchColumn()) {
            return $slug;
        }
        $slug = $base . '-' . $suffix++;
    }
}

function blog_save(array $data, int $id = 0): int
{
    $pdo = blog_db();
    $slug = blog_unique_slug((string) ($data['slug'] ?: $data['title']), $id);
    $publishedAt = trim((string) ($data['published_at'] ?? ''));
    if ($publishedAt === '' && ($data['status'] ?? 'draft') === 'published') {
        $publishedAt = date('Y-m-d H:i:s');
    }

    $values = [
        'title' => trim((string) $data['title']),
        'slug' => $slug,
        'excerpt' => trim((string) $data['excerpt']),
        'content' => blog_sanitize_html((string) $data['content']),
        'category' => trim((string) ($data['category'] ?: 'General')),
        'tags' => trim((string) ($data['tags'] ?? '')),
        'image_path' => trim((string) ($data['image_path'] ?? '')),
        'image_alt' => trim((string) ($data['image_alt'] ?? '')),
        'status' => ($data['status'] ?? '') === 'published' ? 'published' : 'draft',
        'reading_minutes' => max(1, min(60, (int) ($data['reading_minutes'] ?? 5))),
        'published_at' => $publishedAt ?: null,
    ];

    if ($id > 0) {
        $values['id'] = $id;
        $stmt = $pdo->prepare(
            'UPDATE blogs SET title=:title, slug=:slug, excerpt=:excerpt, content=:content,
             category=:category, tags=:tags, image_path=:image_path, image_alt=:image_alt,
             status=:status, reading_minutes=:reading_minutes, published_at=:published_at,
             updated_at=CURRENT_TIMESTAMP WHERE id=:id'
        );
        $stmt->execute($values);
        return $id;
    }

    $stmt = $pdo->prepare(
        'INSERT INTO blogs (title, slug, excerpt, content, category, tags, image_path, image_alt,
         status, reading_minutes, published_at) VALUES (:title, :slug, :excerpt, :content, :category,
         :tags, :image_path, :image_alt, :status, :reading_minutes, :published_at)'
    );
    $stmt->execute($values);
    return (int) $pdo->lastInsertId();
}

function blog_delete(int $id): void
{
    $stmt = blog_db()->prepare('DELETE FROM blogs WHERE id = :id');
    $stmt->execute(['id' => $id]);
}

function blog_tags(array $post): array
{
    return array_values(array_filter(array_map('trim', explode(',', (string) ($post['tags'] ?? '')))));
}

function blog_sanitize_html(string $html): string
{
    $allowed = '<p><h2><h3><h4><ul><ol><li><blockquote><strong><em><a><code><pre><br>';
    $html = strip_tags($html, $allowed);
    if (!class_exists('DOMDocument')) {
        return $html;
    }

    $document = new DOMDocument('1.0', 'UTF-8');
    libxml_use_internal_errors(true);
    $document->loadHTML('<?xml encoding="utf-8" ?><div id="cms-root">' . $html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    $xpath = new DOMXPath($document);
    foreach ($xpath->query('//*[@*]') ?: [] as $node) {
        if ($node->nodeName === 'div' && $node->getAttribute('id') === 'cms-root') {
            continue;
        }
        $attributes = [];
        foreach ($node->attributes as $attribute) {
            $attributes[] = $attribute->name;
        }
        foreach ($attributes as $attribute) {
            if ($node->nodeName === 'a' && $attribute === 'href') {
                $href = trim($node->getAttribute('href'));
                if (!preg_match('#^(https?://|mailto:|/)#i', $href)) {
                    $node->removeAttribute('href');
                }
                continue;
            }
            $node->removeAttribute($attribute);
        }
        if ($node->nodeName === 'a' && $node->hasAttribute('href')) {
            $node->setAttribute('rel', 'noopener noreferrer');
        }
    }
    $root = $document->getElementById('cms-root');
    if (!$root) {
        return $html;
    }
    $clean = '';
    foreach ($root->childNodes as $child) {
        $clean .= $document->saveHTML($child);
    }
    return trim($clean);
}

function blog_upload_image(array $file): string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return '';
    }
    if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Image upload failed. Please try again.');
    }
    if ((int) ($file['size'] ?? 0) > 5 * 1024 * 1024) {
        throw new RuntimeException('Image must be smaller than 5 MB.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file((string) $file['tmp_name']);
    if (!in_array($mime, ['image/jpeg', 'image/png', 'image/webp'], true)) {
        throw new RuntimeException('Only JPG, PNG and WebP images are allowed.');
    }
    $tmpName = (string) $file['tmp_name'];
    if (@getimagesize($tmpName) === false) {
        throw new RuntimeException('The uploaded image could not be processed.');
    }

    if (!is_dir(BLOG_UPLOAD_DIR) && !mkdir(BLOG_UPLOAD_DIR, 0775, true) && !is_dir(BLOG_UPLOAD_DIR)) {
        throw new RuntimeException('Upload directory is not writable.');
    }

    $basename = date('Ymd-His') . '-' . bin2hex(random_bytes(5));
    $canCreateImage = function_exists('imagecreatefromstring');
    $canSaveWebp = function_exists('imagewebp');
    $contents = $canCreateImage ? file_get_contents($tmpName) : false;
    $source = $contents !== false ? @imagecreatefromstring($contents) : false;

    // Some GD installations (including common XAMPP builds) do not include
    // WebP support. In that case, retain the validated original image instead
    // of failing the whole blog-post save.
    if (!$source || !$canSaveWebp) {
        if ($source) {
            imagedestroy($source);
        }
        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ];
        $filename = $basename . '.' . $extensions[$mime];
        $destination = BLOG_UPLOAD_DIR . '/' . $filename;
        if (!move_uploaded_file($tmpName, $destination)) {
            throw new RuntimeException('Unable to save the uploaded image.');
        }
        return 'img/blog/uploads/' . $filename;
    }

    $width = imagesx($source);
    $height = imagesy($source);
    $maxWidth = 1600;
    if ($width > $maxWidth) {
        $newWidth = $maxWidth;
        $newHeight = (int) round($height * ($newWidth / $width));
        $resized = imagecreatetruecolor($newWidth, $newHeight);
        imagealphablending($resized, false);
        imagesavealpha($resized, true);
        imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagedestroy($source);
        $source = $resized;
    }

    $filename = $basename . '.webp';
    $destination = BLOG_UPLOAD_DIR . '/' . $filename;
    if (!imagewebp($source, $destination, 80)) {
        imagedestroy($source);
        throw new RuntimeException('Unable to save the optimized image.');
    }
    imagedestroy($source);
    return 'img/blog/uploads/' . $filename;
}

function blog_get_setting(string $key, string $default = ''): string
{
    $stmt = blog_db()->prepare('SELECT setting_value FROM settings WHERE setting_key = :key');
    $stmt->execute(['key' => $key]);
    $value = $stmt->fetchColumn();
    return $value === false ? $default : (string) $value;
}

function blog_set_setting(string $key, string $value, ?PDO $pdo = null): void
{
    $pdo ??= blog_db();
    $stmt = $pdo->prepare(
        'INSERT INTO settings(setting_key, setting_value, updated_at) VALUES(:key, :value, CURRENT_TIMESTAMP)
         ON CONFLICT(setting_key) DO UPDATE SET setting_value=excluded.setting_value, updated_at=CURRENT_TIMESTAMP'
    );
    $stmt->execute(['key' => $key, 'value' => $value]);
}

function blog_e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
