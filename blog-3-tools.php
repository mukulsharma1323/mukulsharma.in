<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tools for Web Development | Mukul Sharma</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="A practical collection of web development tools used by full stack developer Mukul Sharma.">

  <!-- Favicons -->
  <link href="img/m.svg" rel="icon">

  <link rel="preload" href="lib/ionicons/css/ionicons.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet"></noscript>
  <link rel="preload" href="lib/font-awesome/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"></noscript>
  <style><?php readfile(__DIR__ . '/lib/bootstrap/css/bootstrap.min.css'); readfile(__DIR__ . '/css/style.css'); ?>
  @font-face{font-family:"Ionicons";src:url("lib/ionicons/fonts/ionicons.woff?v=2.0.0") format("woff");font-weight:normal;font-style:normal;font-display:swap}
  @font-face{font-family:"FontAwesome";src:url("lib/font-awesome/fonts/fontawesome-webfont.woff2?v=4.7.0") format("woff2");font-weight:normal;font-style:normal;font-display:swap}
  </style>

</head>

<body class="blog-page">
  <!--/ Nav Star /-->
  <?php 
  include'navbar.php';
  ?>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route blog-header-solid">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <p class="blog-hero-kicker">A practical developer toolkit</p>
          <h1 class="intro-title mb-4">Tools for Web Development</h1>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-box">
            <div class="post-thumb">
              <img src="img/optimized/post-3.webp" width="720" height="479" class="img-fluid" alt="Web development workspace and tools" decoding="async">
            </div>
            <div class="post-meta">
              <h2 class="article-title">Tools for Web Development</h2>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="index.php#about">Mukul Sharma</a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <span>Development</span>
                </li>
                
              </ul>
            </div>
            <div class="article-content">
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Sublime Text 3</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Visual Studio Code</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Bitvise SSH Client</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Cmder Console Emulator</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">WAMP Server</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">NoSQLBooster (GUI Tool for MongoDB)</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Microsoft To-Do</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Photoscape</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Photoshop</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Chrome Dev Tools</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">This toolkit evolves as I discover better development workflows.</p>
              </blockquote>
            </div>
          </div>
          
          
        </div>
        <div class="col-md-4">
          
          <?php
          include 'recent-blog.php';
          ?>
          
          <div class="widget-sidebar widget-tags">
            <h2 class="sidebar-title">Topics</h2>
            <div class="sidebar-content">
              <ul>
                <li>
                  <span>Development</span>
                </li>
                <li>
                  <span>Productivity</span>
                </li>
                <li>
                  <span>Editors</span>
                </li>
                <li>
                  <span>Dev Tools</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route">
    <div class="overlay-mf"></div>
    <?php
    include'footer.php';
    ?>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top" aria-label="Back to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
  <!-- Template Main Javascript File -->
  <script defer src="js/main.js?v=20260628c"></script>

</body>
</html>
