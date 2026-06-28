<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/blog-repository.php';

$posts = blog_all();
$siteBase = '../';
$tagline = blog_get_setting('blog_tagline', 'Notes on technology, books and ideas.');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog | Mukul Sharma</title>
  <meta name="description" content="Articles by Mukul Sharma on software engineering, productivity, books and ideas.">
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
<body class="blog-page blog-index-page" id="page-top">
  <a class="skip-link" href="#blog-list">Skip to articles</a>
  <?php include __DIR__ . '/../navbar.php'; ?>

  <header class="blog-library-hero">
    <div class="container">
      <p class="blog-hero-kicker">Writing &amp; ideas</p>
      <h1>Explore the blog</h1>
      <p><?= blog_e($tagline) ?></p>
    </div>
  </header>

  <main id="blog-list" class="blog-library">
    <div class="container">
      <div class="blog-library-heading">
        <div>
          <p class="blog-library-eyebrow">Latest writing</p>
          <h2>Articles and notes</h2>
        </div>
        <span><?= count($posts) ?> <?= count($posts) === 1 ? 'article' : 'articles' ?></span>
      </div>

      <?php if (!$posts): ?>
        <div class="blog-empty-state">
          <h2>No articles published yet</h2>
          <p>New writing will appear here soon.</p>
        </div>
      <?php else: ?>
        <div class="blog-library-grid">
          <?php foreach ($posts as $post): ?>
            <article class="blog-list-card">
              <a class="blog-list-image" href="<?= blog_e($post['slug']) ?>">
                <?php if ($post['image_path']): ?>
                  <img src="../<?= blog_e($post['image_path']) ?>" alt="<?= blog_e($post['image_alt']) ?>" width="720" height="450" loading="lazy" decoding="async">
                <?php else: ?>
                  <span aria-hidden="true">MS</span>
                <?php endif; ?>
              </a>
              <div class="blog-list-content">
                <div class="blog-list-meta">
                  <span><?= blog_e($post['category']) ?></span>
                  <span><?= (int) $post['reading_minutes'] ?> min read</span>
                </div>
                <h2><a href="<?= blog_e($post['slug']) ?>"><?= blog_e($post['title']) ?></a></h2>
                <p><?= blog_e($post['excerpt']) ?></p>
                <a class="blog-list-read" href="<?= blog_e($post['slug']) ?>" aria-label="Read article: <?= blog_e($post['title']) ?>">Read article <span aria-hidden="true">→</span></a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
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
