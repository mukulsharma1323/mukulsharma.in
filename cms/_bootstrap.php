<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/blog-repository.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'path' => '/',
    ]);
    session_start();
}

function cms_is_configured(): bool
{
    return blog_get_setting('cms_password_hash') !== '';
}

function cms_is_authenticated(): bool
{
    return !empty($_SESSION['cms_authenticated']);
}

function cms_require_auth(): void
{
    if (!cms_is_authenticated()) {
        cms_redirect('index.php');
    }
}

function cms_csrf_token(): string
{
    if (empty($_SESSION['cms_csrf'])) {
        $_SESSION['cms_csrf'] = bin2hex(random_bytes(24));
    }
    return (string) $_SESSION['cms_csrf'];
}

function cms_verify_csrf(): void
{
    $token = (string) ($_POST['csrf_token'] ?? '');
    if (!hash_equals(cms_csrf_token(), $token)) {
        http_response_code(419);
        exit('Your session expired. Please go back and try again.');
    }
}

function cms_redirect(string $path): never
{
    header('Location: ' . $path);
    exit;
}

function cms_flash(string $type, string $message): void
{
    $_SESSION['cms_flash'] = ['type' => $type, 'message' => $message];
}

function cms_take_flash(): ?array
{
    $flash = $_SESSION['cms_flash'] ?? null;
    unset($_SESSION['cms_flash']);
    return is_array($flash) ? $flash : null;
}

function cms_layout_start(string $title, string $active = ''): void
{
    $flash = cms_take_flash();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title><?= blog_e($title) ?> | MukulSharma CMS</title>
  <link rel="icon" href="../img/m.svg">
  <link rel="stylesheet" href="../css/cms.css?v=20260628">
</head>
<body class="cms-body">
  <div class="cms-shell">
    <aside class="cms-sidebar">
      <a class="cms-brand" href="index.php"><span>MS</span><strong>MukulSharma CMS</strong></a>
      <nav aria-label="CMS navigation">
        <a class="<?= $active === 'dashboard' ? 'active' : '' ?>" href="index.php">Dashboard</a>
        <a class="<?= $active === 'editor' ? 'active' : '' ?>" href="edit.php">Add blog</a>
        <a class="<?= $active === 'settings' ? 'active' : '' ?>" href="settings.php">Settings</a>
        <a href="../blogs/" target="_blank" rel="noopener">View blog ↗</a>
      </nav>
      <a class="cms-logout" href="logout.php">Sign out</a>
    </aside>
    <div class="cms-main">
      <header class="cms-mobile-header"><a href="index.php">MukulSharma CMS</a><a href="edit.php">+ Add</a></header>
      <?php if ($flash): ?><div class="cms-alert <?= blog_e($flash['type']) ?>" role="status"><?= blog_e($flash['message']) ?></div><?php endif; ?>
<?php
}

function cms_layout_end(): void
{
    ?>
    </div>
  </div>
</body>
</html>
<?php
}
