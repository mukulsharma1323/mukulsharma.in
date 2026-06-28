<?php
declare(strict_types=1);
require_once __DIR__ . '/_bootstrap.php';
cms_require_auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    cms_verify_csrf();
    blog_set_setting('site_name', trim((string) ($_POST['site_name'] ?? 'MukulSharma.in')));
    blog_set_setting('blog_tagline', trim((string) ($_POST['blog_tagline'] ?? '')));
    $newPassword = (string) ($_POST['new_password'] ?? '');
    if ($newPassword !== '') {
        if (strlen($newPassword) < 10) {
            cms_flash('error', 'New password must contain at least 10 characters.');
            cms_redirect('settings.php');
        }
        blog_set_setting('cms_password_hash', password_hash($newPassword, PASSWORD_DEFAULT));
    }
    cms_flash('success', 'Settings saved.');
    cms_redirect('settings.php');
}

cms_layout_start('Settings', 'settings');
?>
<main class="cms-content">
  <div class="cms-page-head"><div><p class="cms-eyebrow">Configuration</p><h1>Site settings</h1><p>Manage blog identity and dashboard security.</p></div></div>
  <form method="post" class="cms-settings-grid">
    <input type="hidden" name="csrf_token" value="<?= blog_e(cms_csrf_token()) ?>">
    <section class="cms-panel">
      <h2>Blog identity</h2>
      <div class="cms-field"><label for="site_name">Site name</label><input id="site_name" name="site_name" value="<?= blog_e(blog_get_setting('site_name', 'MukulSharma.in')) ?>" required></div>
      <div class="cms-field"><label for="blog_tagline">Blog tagline</label><textarea id="blog_tagline" name="blog_tagline" rows="3" required><?= blog_e(blog_get_setting('blog_tagline')) ?></textarea></div>
    </section>
    <section class="cms-panel">
      <h2>Security</h2>
      <div class="cms-field"><label for="new_password">New CMS password <small>Leave blank to keep current password</small></label><input id="new_password" name="new_password" type="password" minlength="10" autocomplete="new-password"></div>
      <button class="cms-save-button" type="submit">Save settings</button>
    </section>
  </form>
</main>
<?php cms_layout_end(); ?>
