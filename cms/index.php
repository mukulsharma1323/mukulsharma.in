<?php
declare(strict_types=1);
require_once __DIR__ . '/_bootstrap.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    cms_verify_csrf();
    $action = (string) ($_POST['action'] ?? '');
    $password = (string) ($_POST['password'] ?? '');

    if ($action === 'setup' && !cms_is_configured()) {
        $confirm = (string) ($_POST['password_confirm'] ?? '');
        if (strlen($password) < 10) {
            $error = 'Use at least 10 characters for the CMS password.';
        } elseif (!hash_equals($password, $confirm)) {
            $error = 'The passwords do not match.';
        } else {
            blog_set_setting('cms_password_hash', password_hash($password, PASSWORD_DEFAULT));
            session_regenerate_id(true);
            $_SESSION['cms_authenticated'] = true;
            cms_flash('success', 'CMS setup complete. Your blog is ready to manage.');
            cms_redirect('index.php');
        }
    } elseif ($action === 'login' && cms_is_configured()) {
        $lockedUntil = (int) ($_SESSION['cms_locked_until'] ?? 0);
        if ($lockedUntil > time()) {
            $error = 'Too many attempts. Please wait a minute and try again.';
        } elseif (password_verify($password, blog_get_setting('cms_password_hash'))) {
            session_regenerate_id(true);
            $_SESSION['cms_authenticated'] = true;
            $_SESSION['cms_login_attempts'] = 0;
            cms_redirect('index.php');
        } else {
            $attempts = (int) ($_SESSION['cms_login_attempts'] ?? 0) + 1;
            $_SESSION['cms_login_attempts'] = $attempts;
            if ($attempts >= 5) {
                $_SESSION['cms_locked_until'] = time() + 60;
                $_SESSION['cms_login_attempts'] = 0;
            }
            $error = 'Incorrect password.';
        }
    }
}

if (!cms_is_authenticated()):
    $setup = !cms_is_configured();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title><?= $setup ? 'Set up' : 'Sign in' ?> | MukulSharma CMS</title>
  <link rel="stylesheet" href="../css/cms.css?v=20260628">
</head>
<body class="cms-auth-body">
  <main class="cms-auth-card">
    <div class="cms-auth-mark">MS</div>
    <p class="cms-eyebrow"><?= $setup ? 'First-time setup' : 'Content management' ?></p>
    <h1><?= $setup ? 'Create your CMS password' : 'Welcome back' ?></h1>
    <p><?= $setup ? 'Secure the dashboard before publishing or editing articles.' : 'Sign in to manage blog posts and site settings.' ?></p>
    <?php if ($error): ?><div class="cms-alert error" role="alert"><?= blog_e($error) ?></div><?php endif; ?>
    <form method="post" class="cms-form">
      <input type="hidden" name="csrf_token" value="<?= blog_e(cms_csrf_token()) ?>">
      <input type="hidden" name="action" value="<?= $setup ? 'setup' : 'login' ?>">
      <label for="password">Password</label>
      <input id="password" name="password" type="password" minlength="10" required autocomplete="<?= $setup ? 'new-password' : 'current-password' ?>">
      <?php if ($setup): ?>
        <label for="password_confirm">Confirm password</label>
        <input id="password_confirm" name="password_confirm" type="password" minlength="10" required autocomplete="new-password">
      <?php endif; ?>
      <button type="submit"><?= $setup ? 'Create CMS' : 'Sign in' ?></button>
    </form>
    <a class="cms-back-link" href="../index.php">← Back to website</a>
  </main>
</body>
</html>
<?php
exit;
endif;

$posts = blog_all(true);
$published = count(array_filter($posts, static fn (array $post): bool => $post['status'] === 'published'));
$drafts = count($posts) - $published;
cms_layout_start('Dashboard', 'dashboard');
?>
<main class="cms-content">
  <div class="cms-page-head">
    <div><p class="cms-eyebrow">Overview</p><h1>Blog dashboard</h1><p>Manage writing, publishing and site content from one place.</p></div>
    <a class="cms-primary-link" href="edit.php">+ Add new blog</a>
  </div>
  <div class="cms-stats">
    <div><span>Total articles</span><strong><?= count($posts) ?></strong></div>
    <div><span>Published</span><strong><?= $published ?></strong></div>
    <div><span>Drafts</span><strong><?= $drafts ?></strong></div>
  </div>
  <section class="cms-panel">
    <div class="cms-panel-head"><div><h2>Articles</h2><p>Published and draft content</p></div></div>
    <?php if (!$posts): ?>
      <div class="cms-empty"><h3>No articles yet</h3><p>Create your first post to get started.</p><a href="edit.php">Add blog</a></div>
    <?php else: ?>
      <div class="cms-table-wrap"><table class="cms-table">
        <thead><tr><th>Article</th><th>Status</th><th>Updated</th><th><span class="sr-only">Actions</span></th></tr></thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
          <tr>
            <td><strong><?= blog_e($post['title']) ?></strong><small>/<?= blog_e($post['slug']) ?></small></td>
            <td><span class="cms-status <?= blog_e($post['status']) ?>"><?= blog_e(ucfirst($post['status'])) ?></span></td>
            <td><?= blog_e(date('d M Y', strtotime($post['updated_at']))) ?></td>
            <td class="cms-actions">
              <?php if ($post['status'] === 'published'): ?><a href="../blogs/<?= blog_e($post['slug']) ?>" target="_blank" rel="noopener">View</a><?php endif; ?>
              <a href="edit.php?id=<?= (int) $post['id'] ?>">Edit</a>
              <form method="post" action="delete.php" onsubmit="return confirm('Delete this blog post? This cannot be undone.');">
                <input type="hidden" name="csrf_token" value="<?= blog_e(cms_csrf_token()) ?>">
                <input type="hidden" name="id" value="<?= (int) $post['id'] ?>">
                <button type="submit">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table></div>
    <?php endif; ?>
  </section>
</main>
<?php cms_layout_end(); ?>
