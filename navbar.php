<?php
$siteBase = $siteBase ?? '';
$requestPath = (string) ($_SERVER['REQUEST_URI'] ?? '');
$isBlogPage = str_contains($requestPath, '/blogs/') || str_contains($requestPath, '/blog-');
$isHomePage = !$isBlogPage;
$navUrl = static fn (string $url): string => htmlspecialchars($url, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
 <nav class="navbar navbar-b navbar-trans navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="<?= $navUrl($siteBase . 'index.php') ?>" aria-label="MukulSharma.in home">MukulSharma.in</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll<?= $isHomePage ? ' active' : '' ?>" href="<?= $navUrl($siteBase . 'index.php') ?>"<?= $isHomePage ? ' aria-current="page"' : '' ?>>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?= $navUrl($siteBase . 'index.php#about') ?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?= $navUrl($siteBase . 'index.php#service') ?>">Expertise</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?= $navUrl($siteBase . 'index.php#work') ?>">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?= $isBlogPage ? ' active' : '' ?>" href="<?= $navUrl($siteBase . 'blogs/') ?>"<?= $isBlogPage ? ' aria-current="page"' : '' ?>>Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?= $navUrl($siteBase . 'index.php#experience') ?>">Experience</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
