<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MukulSharma.in || Full Stack Developer Resume</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167410650-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-167410650-1');
</script>

  <!-- Favicons -->
  <link href="img/m.svg" rel="icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <!--/ Nav Star /-->
  <?php 
  include'navbar.php';
  ?>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">My Favourite Quotes</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">Blog</li>
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
              <img src="img/post-1.jpg" class="img-fluid" alt="">
            </div>
            <div class="post-meta">
              <h1 class="article-title">My Favourite Quotes</h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="#">Mukul Sharma</a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#">Philosopy</a>
                </li>
                
              </ul>
            </div>
            <div class="article-content">
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">A Ship in port is safe but that is not what ships are built for </p>
              </blockquote>
              <img class="img-fluid" alt="" src="img/blog/quote/ship.jpg">
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">Success usually comes to those who are too busy to be looking for it.</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">If something could be sweeter than love, it must be the success.</p>
              </blockquote>
              <hr>
              <blockquote class="blockquote">
                <p class="mb-0">I will Update More...........</p>
              </blockquote>
              
            </div>
          </div>
          
          
        </div>
        <div class="col-md-4">
          
          <?php
          include 'recent-blog.php';
          ?>
          
          <div class="widget-sidebar widget-tags">
            <h5 class="sidebar-title">Tags</h5>
            <div class="sidebar-content">
              <ul>
                <li>
                  <a href="#">Web.</a>
                </li>
                <li>
                  <a href="#">Design.</a>
                </li>
                <li>
                  <a href="#">Travel.</a>
                </li>
                <li>
                  <a href="#">Photoshop</a>
                </li>
                <li>
                  <a href="#">Corel Draw</a>
                </li>
                <li>
                  <a href="#">JavaScript</a>
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
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <?php
    include'footer.php';
    ?>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
