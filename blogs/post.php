<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/blog-repository.php';

$slug = blog_slugify((string) ($_GET['slug'] ?? ''));
$post = blog_find_by_slug($slug);
if (!$post) {
    http_response_code(404);
    $post = [
        'title' => 'Article not found',
        'excerpt' => 'The article you requested could not be found.',
        'content' => '<p>Please return to the blog and choose another article.</p>',
        'category' => 'Blog',
        'tags' => '',
        'image_path' => '',
        'image_alt' => '',
        'reading_minutes' => 1,
        'published_at' => null,
    ];
}
$siteBase = '../';
$recentPosts = array_values(array_filter(blog_all(false, 4), static fn (array $item): bool => ($item['slug'] ?? '') !== $slug));
$recentPosts = array_slice($recentPosts, 0, 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= blog_e($post['title']) ?> | Mukul Sharma</title>
  <meta name="description" content="<?= blog_e($post['excerpt']) ?>">
  <meta name="theme-color" content="#0062cc">
  <link href="../img/m.svg" rel="icon">
  <link rel="preload" href="../lib/ionicons/css/ionicons.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet"></noscript>
  <link rel="preload" href="../lib/font-awesome/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"></noscript>
  <style><?php readfile(__DIR__ . '/../lib/bootstrap/css/bootstrap.min.css'); readfile(__DIR__ . '/../css/style.css'); ?>
  @font-face{font-family:"Ionicons";src:url("../lib/ionicons/fonts/ionicons.woff?v=2.0.0") format("woff");font-display:swap}
  @font-face{font-family:"FontAwesome";src:url("../lib/font-awesome/fonts/fontawesome-webfont.woff2?v=4.7.0") format("woff2");font-display:swap}
  </style>
</head>
<body class="blog-page" id="page-top">
  <a class="skip-link" href="#article">Skip to article</a>
  <?php include __DIR__ . '/../navbar.php'; ?>

  <header class="intro intro-single route blog-header-solid">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <p class="blog-hero-kicker"><?= blog_e($post['category']) ?></p>
          <h1 class="intro-title mb-4"><?= blog_e($post['title']) ?></h1>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Article</li>
          </ol>
        </div>
      </div>
    </div>
  </header>

  <main class="blog-wrapper sect-pt4" id="article">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <article class="post-box">
            <?php if ($post['image_path']): ?>
              <div class="post-thumb">
                <img src="../<?= blog_e($post['image_path']) ?>" alt="<?= blog_e($post['image_alt']) ?>" width="720" height="450" decoding="async">
              </div>
            <?php endif; ?>
            <div class="post-meta">
              <h2 class="article-title"><?= blog_e($post['title']) ?></h2>
              <ul>
                <li><span class="ion-ios-person" aria-hidden="true"></span><a href="../index.php#about">Mukul Sharma</a></li>
                <li><span class="ion-pricetag" aria-hidden="true"></span><span><?= blog_e($post['category']) ?></span></li>
                <li><span class="ion-ios-clock-outline" aria-hidden="true"></span><span><?= (int) $post['reading_minutes'] ?> min read</span></li>
              </ul>
            </div>
            <div class="article-content cms-article-content">
              <?= $post['content'] ?>
            </div>
          </article>
        </div>
        <aside class="col-md-4" aria-label="Related blog content">
          <div class="widget-sidebar">
            <h2 class="sidebar-title">More articles</h2>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                <?php foreach ($recentPosts as $recent): ?>
                  <li><a href="<?= blog_e($recent['slug']) ?>"><?= blog_e($recent['title']) ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <?php $tags = blog_tags($post); if ($tags): ?>
            <div class="widget-sidebar widget-tags">
              <h2 class="sidebar-title">Topics</h2>
              <div class="sidebar-content"><ul>
                <?php foreach ($tags as $tag): ?><li><span><?= blog_e($tag) ?></span></li><?php endforeach; ?>
              </ul></div>
            </div>
          <?php endif; ?>
        </aside>
      </div>
    </div>
  </main>

  <section class="paralax-mf footer-paralax bg-image sect-mt4 route blog-module-footer">
    <div class="overlay-mf"></div>
    <?php include __DIR__ . '/../footer.php'; ?>
  </section>
  <a href="#page-top" class="back-to-top" aria-label="Back to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
  <script defer src="../js/main.js?v=20260628c"></script>
</body>
</html>
