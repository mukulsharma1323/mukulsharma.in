<?php
declare(strict_types=1);
require_once __DIR__ . '/_bootstrap.php';
cms_require_auth();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    cms_redirect('index.php');
}
cms_verify_csrf();
$id = max(0, (int) ($_POST['id'] ?? 0));
if ($id) {
    blog_delete($id);
    cms_flash('success', 'Blog post deleted.');
}
cms_redirect('index.php');
