<?php
declare(strict_types=1);
require_once __DIR__ . '/_bootstrap.php';
cms_require_auth();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    cms_redirect('index.php');
}
cms_verify_csrf();

$id = max(0, (int) ($_POST['id'] ?? 0));
$title = trim((string) ($_POST['title'] ?? ''));
$excerpt = trim((string) ($_POST['excerpt'] ?? ''));
$content = trim((string) ($_POST['content'] ?? ''));
if ($title === '' || $excerpt === '' || $content === '') {
    cms_flash('error', 'Title, summary and article content are required.');
    cms_redirect('edit.php' . ($id ? '?id=' . $id : ''));
}

try {
    $imagePath = trim((string) ($_POST['existing_image'] ?? ''));
    if (!empty($_FILES['image'])) {
        $uploaded = blog_upload_image($_FILES['image']);
        if ($uploaded !== '') {
            $imagePath = $uploaded;
        }
    }
    $savedId = blog_save([
        'title' => $title,
        'slug' => (string) ($_POST['slug'] ?? ''),
        'excerpt' => $excerpt,
        'content' => $content,
        'category' => (string) ($_POST['category'] ?? 'General'),
        'tags' => (string) ($_POST['tags'] ?? ''),
        'image_path' => $imagePath,
        'image_alt' => (string) ($_POST['image_alt'] ?? ''),
        'status' => (string) ($_POST['status'] ?? 'draft'),
        'reading_minutes' => (int) ($_POST['reading_minutes'] ?? 5),
        'published_at' => str_replace('T', ' ', (string) ($_POST['published_at'] ?? '')),
    ], $id);
    cms_flash('success', $id ? 'Blog post updated.' : 'Blog post created.');
    cms_redirect('edit.php?id=' . $savedId);
} catch (Throwable $error) {
    cms_flash('error', $error->getMessage());
    cms_redirect('edit.php' . ($id ? '?id=' . $id : ''));
}
