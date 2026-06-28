<?php
declare(strict_types=1);
require_once __DIR__ . '/_bootstrap.php';
cms_require_auth();

$id = max(0, (int) ($_GET['id'] ?? 0));
$post = $id ? blog_find($id) : null;
if ($id && !$post) {
    cms_flash('error', 'Blog post not found.');
    cms_redirect('index.php');
}
$post ??= [
    'id' => 0, 'title' => '', 'slug' => '', 'excerpt' => '', 'content' => '',
    'category' => 'Development', 'tags' => '', 'image_path' => '', 'image_alt' => '',
    'status' => 'draft', 'reading_minutes' => 5, 'published_at' => '',
];
cms_layout_start($id ? 'Edit blog' : 'Add blog', 'editor');
?>
<main class="cms-content">
  <div class="cms-page-head">
    <div><p class="cms-eyebrow">Content editor</p><h1><?= $id ? 'Edit blog' : 'Add new blog' ?></h1><p>Create a clear title, useful summary and readable article content.</p></div>
    <a class="cms-secondary-link" href="index.php">← Dashboard</a>
  </div>
  <form class="cms-editor-grid" method="post" action="save.php" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?= blog_e(cms_csrf_token()) ?>">
    <input type="hidden" name="id" value="<?= (int) $post['id'] ?>">
    <input type="hidden" name="existing_image" value="<?= blog_e($post['image_path']) ?>">
    <section class="cms-panel cms-editor-main">
      <div class="cms-field"><label for="title">Title</label><input id="title" name="title" value="<?= blog_e($post['title']) ?>" maxlength="160" required></div>
      <div class="cms-field"><label for="slug">URL slug <small>Leave blank to generate from title</small></label><input id="slug" name="slug" value="<?= blog_e($post['slug']) ?>" maxlength="180" pattern="[a-z0-9-]*" placeholder="my-article-title"></div>
      <div class="cms-field"><label for="excerpt">Short summary</label><textarea id="excerpt" name="excerpt" rows="3" maxlength="320" required><?= blog_e($post['excerpt']) ?></textarea><small>Used on the blog listing and by search engines.</small></div>
      <div class="cms-field"><label for="content">Article content <small>Basic HTML is supported</small></label><textarea id="content" name="content" rows="18" required><?= blog_e($post['content']) ?></textarea><small>Allowed: paragraphs, headings, lists, blockquotes, bold, emphasis, links and code.</small></div>
    </section>
    <aside class="cms-editor-side">
      <section class="cms-panel">
        <h2>Publish</h2>
        <div class="cms-field"><label for="status">Status</label><select id="status" name="status"><option value="draft"<?= $post['status'] === 'draft' ? ' selected' : '' ?>>Draft</option><option value="published"<?= $post['status'] === 'published' ? ' selected' : '' ?>>Published</option></select></div>
        <div class="cms-field"><label for="published_at">Publish date</label><input id="published_at" type="datetime-local" name="published_at" value="<?= $post['published_at'] ? blog_e(date('Y-m-d\TH:i', strtotime($post['published_at']))) : '' ?>"></div>
        <button class="cms-save-button" type="submit"><?= $id ? 'Save changes' : 'Create blog' ?></button>
      </section>
      <section class="cms-panel">
        <h2>Details</h2>
        <div class="cms-field"><label for="category">Category</label><input id="category" name="category" value="<?= blog_e($post['category']) ?>" maxlength="80" required></div>
        <div class="cms-field"><label for="tags">Tags <small>Comma separated</small></label><input id="tags" name="tags" value="<?= blog_e($post['tags']) ?>" maxlength="300" placeholder="React, Performance, JavaScript"></div>
        <div class="cms-field"><label for="reading_minutes">Reading time</label><input id="reading_minutes" type="number" name="reading_minutes" min="1" max="60" value="<?= (int) $post['reading_minutes'] ?>" required></div>
      </section>
      <section class="cms-panel">
        <h2>Cover image</h2>
        <?php if ($post['image_path']): ?><img class="cms-cover-preview" src="../<?= blog_e($post['image_path']) ?>" alt="Current cover image"><?php endif; ?>
        <div class="cms-field"><label for="image">Upload image</label><input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp"><small>JPG, PNG or WebP, max 5 MB. Optimized to WebP when supported by the server.</small></div>
        <div class="cms-field"><label for="image_alt">Image description</label><input id="image_alt" name="image_alt" value="<?= blog_e($post['image_alt']) ?>" maxlength="220" required></div>
      </section>
    </aside>
  </form>
</main>
<?php cms_layout_end(); ?>
