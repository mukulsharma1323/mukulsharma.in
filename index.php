<?php
require_once __DIR__ . '/includes/blog-repository.php';
$homePosts = blog_all(false, 3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Mukul Sharma | Full Stack Developer</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="theme-color" content="#0078ff">
  <meta name="description" content="Portfolio of Mukul Sharma, a full stack developer specializing in PHP, Node.js, Angular, responsive web applications, APIs and cloud technologies.">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://mukulsharma.in/">
  <meta property="og:title" content="Mukul Sharma | Full Stack Developer">
  <meta property="og:description" content="Explore Mukul Sharma's full stack development skills, selected projects and articles.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://mukulsharma.in/">
  <meta property="og:image" content="https://mukulsharma.in/img/intro-bg.jpg">
  <link href="img/m.svg" rel="icon">
  <link href="img/m.svg" rel="apple-touch-icon">
  <link rel="preload" href="img/optimized/intro-bg.webp" as="image" type="image/webp" fetchpriority="high">
  <link rel="preload" href="lib/ionicons/css/ionicons.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet"></noscript>
  <link rel="preload" href="lib/font-awesome/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"></noscript>
  <style><?php readfile(__DIR__ . '/lib/bootstrap/css/bootstrap.min.css'); readfile(__DIR__ . '/css/style.css'); ?>
  @font-face{font-family:"Ionicons";src:url("lib/ionicons/fonts/ionicons.woff?v=2.0.0") format("woff");font-weight:normal;font-style:normal;font-display:swap}
  @font-face{font-family:"FontAwesome";src:url("lib/font-awesome/fonts/fontawesome-webfont.woff2?v=4.7.0") format("woff2");font-weight:normal;font-style:normal;font-display:swap}
  </style>


<style>
#chartdiv {
  width: 100%;
  height: 600px;
}

.demo-theme-dark .demo-background {
  background: #000;
}

</style>

</head>

<body id="page-top">
  <a class="skip-link" href="#main-content">Skip to main content</a>

  <!--/ Nav Star /-->
  <?php 
  include'navbar.php';
  ?>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <main id="main-content">
  <div id="home" class="intro route bg-image hero-image">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h1 class="intro-title mb-4">I am Mukul Sharma</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Web Developer,Frontend Developer,Full Stack Developer</span><strong class="text-slider"></strong></p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-6 col-md-5">
                    <div class="about-img">
                      <img src="img/optimized/profile.webp" width="480" height="419" class="img-fluid rounded b-shadow-a" alt="Portrait of Mukul Sharma" loading="lazy" decoding="async">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-7">
                    <div class="about-info">
                      <p><span class="title-s">Name: </span> <span>Mukul Sharma</span></p>
                      <p><span class="title-s">Profile: </span> <span>full stack developer</span></p>
                      <p><span class="title-s">Email: </span> <span>mukulsharma1323@gmail.com</span></p>
                      <div class="socials" style="padding: 0px !important">
                          <ul>
                            <li><a href="https://www.linkedin.com/in/mukulsharma1323" aria-label="Mukul Sharma on LinkedIn"><span class="ico-circle" aria-hidden="true"><i class="ion-social-linkedin"></i></span></a></li>
                            <li><a href="https://www.facebook.com/mukulsharma1323" aria-label="Mukul Sharma on Facebook"><span class="ico-circle" aria-hidden="true"><i class="ion-social-facebook"></i></span></a></li>
                            <li><a href="https://www.instagram.com/mukulsharma1323/" aria-label="Mukul Sharma on Instagram"><span class="ico-circle" aria-hidden="true"><i class="ion-social-instagram"></i></span></a></li>
                          </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="skill-mf">
                  <div class="title-box-2">
                    <h2 class="title-left">
                      Skills
                    </h2>
                  </div> 
                  <div class="tags" aria-label="Technical skills and official documentation links">
                    <a class="skill-chip" href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" rel="noopener noreferrer" aria-label="JavaScript official documentation (opens in a new tab)">JavaScript</a>
                    <a class="skill-chip" href="https://react.dev/" target="_blank" rel="noopener noreferrer" aria-label="React.js official documentation (opens in a new tab)">React.js</a>
                    <a class="skill-chip" href="https://nextjs.org/docs" target="_blank" rel="noopener noreferrer" aria-label="Next.js official documentation (opens in a new tab)">Next.js</a>
                    <a class="skill-chip" href="https://redux.js.org/" target="_blank" rel="noopener noreferrer" aria-label="Redux official documentation (opens in a new tab)">Redux</a>
                    <a class="skill-chip" href="https://nodejs.org/docs/latest/api/" target="_blank" rel="noopener noreferrer" aria-label="Node.js official documentation (opens in a new tab)">Node.js</a>
                    <a class="skill-chip" href="https://expressjs.com/" target="_blank" rel="noopener noreferrer" aria-label="Express.js official website (opens in a new tab)">Express.js</a>
                    <a class="skill-chip" href="https://www.php.net/docs.php" target="_blank" rel="noopener noreferrer" aria-label="PHP official documentation (opens in a new tab)">PHP</a>
                    <a class="skill-chip" href="https://html.spec.whatwg.org/" target="_blank" rel="noopener noreferrer" aria-label="HTML5 official standard (opens in a new tab)">HTML5</a>
                    <a class="skill-chip" href="https://www.w3.org/Style/CSS/" target="_blank" rel="noopener noreferrer" aria-label="CSS3 official W3C website (opens in a new tab)">CSS3</a>
                    <a class="skill-chip" href="https://www.postgresql.org/docs/" target="_blank" rel="noopener noreferrer" aria-label="PostgreSQL official documentation (opens in a new tab)">PostgreSQL</a>
                    <a class="skill-chip" href="https://dev.mysql.com/doc/" target="_blank" rel="noopener noreferrer" aria-label="MySQL official documentation (opens in a new tab)">MySQL</a>
                    <a class="skill-chip" href="https://www.mongodb.com/docs/" target="_blank" rel="noopener noreferrer" aria-label="MongoDB official documentation (opens in a new tab)">MongoDB</a>
                    <a class="skill-chip" href="https://docs.aws.amazon.com/" target="_blank" rel="noopener noreferrer" aria-label="AWS official documentation (opens in a new tab)">AWS</a>
                    <a class="skill-chip" href="https://cloud.google.com/docs" target="_blank" rel="noopener noreferrer" aria-label="Google Cloud official documentation (opens in a new tab)">Google Cloud</a>
                    <a class="skill-chip" href="https://docs.docker.com/" target="_blank" rel="noopener noreferrer" aria-label="Docker official documentation (opens in a new tab)">Docker</a>
                    <a class="skill-chip" href="https://git-scm.com/doc" target="_blank" rel="noopener noreferrer" aria-label="Git official documentation (opens in a new tab)">Git</a>
                    <a class="skill-chip" href="https://docs.github.com/en/actions" target="_blank" rel="noopener noreferrer" aria-label="GitHub Actions CI/CD documentation (opens in a new tab)">CI/CD</a>
                    <a class="skill-chip" href="https://docs.github.com/en/copilot" target="_blank" rel="noopener noreferrer" aria-label="GitHub Copilot official documentation (opens in a new tab)">GitHub Copilot</a>
                  </div>
              </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h2 class="title-left">
                      About me
                    </h2>
                  </div>
                  <p class="lead">Senior Software Developer with 9+ years of experience building scalable web applications across
                    media, SaaS, cybersecurity, agriculture and e-commerce domain. Specialized in JavaScript,
                    React.js, Next.js, Node.js, Express.js, MySQL, PostgreSQL, MongoDB and AWS. Experienced in
                    production-grade REST APIs, high traffic systems, performance optimization, AI-assisted
                    development and cross functional collaboration. 
                  </p>
                  <p class="lead">
                  </p>
                  <p class="lead">
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--/ Section Core Expertise Start /-->
  <section id="service" class="services-mf route" aria-labelledby="expertise-title">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h2 id="expertise-title" class="title-a">Core Expertise</h2>
            <p class="subtitle-a">
              Production experience built across high-traffic media, SaaS, cybersecurity, agriculture and e-commerce products.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle" aria-hidden="true"><i class="ion-speedometer"></i></span>
            </div>
            <div class="service-content">
              <h3 class="s-title">High-Traffic Web Platforms</h3>
              <p class="s-description text-center">
                Building and maintaining production applications that serve millions of monthly users with reliable, scalable delivery.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle" aria-hidden="true"><i class="ion-code-working"></i></span>
            </div>
            <div class="service-content">
              <h3 class="s-title">React &amp; Next.js Engineering</h3>
              <p class="s-description text-center">
                Developing reusable interfaces, production microsites and data-driven features with React.js, Next.js and Redux.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle" aria-hidden="true"><i class="ion-network"></i></span>
            </div>
            <div class="service-content">
              <h3 class="s-title">Backend &amp; API Architecture</h3>
              <p class="s-description text-center">
                Designing secure REST APIs and scalable services with Node.js, Express.js, PHP and production-grade databases.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle" aria-hidden="true"><i class="ion-ios-pulse-strong"></i></span>
            </div>
            <div class="service-content">
              <h3 class="s-title">Performance &amp; Core Web Vitals</h3>
              <p class="s-description text-center">
                Improving LCP, CLS and INP through profiling, lazy loading, code splitting, debugging and performance-focused reviews.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle" aria-hidden="true"><i class="ion-android-cloud"></i></span>
            </div>
            <div class="service-content">
              <h3 class="s-title">Cloud &amp; Production Delivery</h3>
              <p class="s-description text-center">
                Deploying and operating applications with AWS EC2, S3, Lambda, RDS, Route 53, Docker and CI/CD workflows.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle" aria-hidden="true"><i class="ion-ios-lightbulb"></i></span>
            </div>
            <div class="service-content">
              <h3 class="s-title">Data &amp; AI-Assisted Development</h3>
              <p class="s-description text-center">
                Working with PostgreSQL, MySQL and MongoDB while using GitHub Copilot, ChatGPT and Gemini to accelerate high-quality delivery.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Core Expertise End /-->

  <!--/ Section Portfolio Star /-->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Portfolio
            </h3>
            <p class="subtitle-a">
              Projects Developed by me.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/react-datatable.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/react-datatable.jpg" width="720" height="336" alt="React data table project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <br><br>
                    <h2 class="w-title">React Data Table</h2>
                    <div class="w-more">
                      <a href="https://admin-table-ui.netlify.app/" target="_blank" rel="noopener noreferrer"><span class="w-ctegory">Demo</span></a> / <span class="w-date">React</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/isee.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/isee.jpg" width="720" height="405" alt="ISEE Analytics project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">ISEE Analytics</h2>
                    <div class="w-more">
                      <a href="https://i2l.solutions/" target="_blank" rel="noopener noreferrer"><span class="w-ctegory">Demo</span></a> / <span class="w-date">Angular Nodejs</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/login-demo.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/login-demo.jpg" width="720" height="338" alt="Authentication project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <br><br>
                    <h2 class="w-title">Authentication</h2>
                    <div class="w-more">
                      <a href="https://mukulsharma.in/login-demo/" target="_blank" rel="noopener noreferrer"><span class="w-ctegory">Demo</span></a> / <span class="w-date">PHP Authentication</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/1.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/1.jpg" width="720" height="405" alt="DNH News project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">DNH News</h2>
                    <div class="w-more">
                      <span class="w-ctegory">Web Design</span> / <span class="w-date">Wordpress</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/7.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/7.jpg" width="720" height="405" alt="Android application API project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">API For Android App</h2>
                    <div class="w-more">
                    <span class="w-ctegory">API</span> / <span class="w-date">PHP</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/3.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/3.jpg" width="720" height="405" alt="Hospital management system project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Hospital Management System</h2>
                    <div class="w-more">
                      <span class="w-ctegory">CMS</span> / <span class="w-date">PHP</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/4.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/4.jpg" width="720" height="405" alt="Industry Mall project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Industurymall.in</h2>
                    <div class="w-more">
                    <span class="w-ctegory">E-Commerce</span> / <span class="w-date">Wordpress</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/5.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/5.jpg" width="720" height="405" alt="Machine Cloud project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Machine Cloud</h2>
                    <div class="w-more">
                    <span class="w-ctegory">CMS</span> / <span class="w-date">PHP</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/portfolio/6.png" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/optimized/portfolio/6.jpg" width="720" height="405" alt="Electric Studio project preview" class="img-fluid" loading="lazy" decoding="async">
              </div>
            </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Electric Studio</h2>
                    <div class="w-more">
                    <span class="w-ctegory">CMS</span> / <span class="w-date">Nodejs</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--/ Section Portfolio End /-->

  <!--/ Section Blog Star /-->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              Record of my thoughts, opinions, or experiences that I put on the internet. 
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($homePosts as $post): $postUrl = 'blogs/' . $post['slug']; ?>
          <div class="col-md-4">
            <article class="card card-blog">
              <div class="card-img">
                <a href="<?= blog_e($postUrl) ?>"><img src="<?= blog_e($post['image_path']) ?>" width="720" height="450" alt="<?= blog_e($post['image_alt']) ?>" class="img-fluid" loading="lazy" decoding="async"></a>
              </div>
              <div class="card-body">
                <div class="card-category-box"><div class="card-category"><p class="category"><?= blog_e($post['category']) ?></p></div></div>
                <h3 class="card-title"><a href="<?= blog_e($postUrl) ?>"><?= blog_e($post['title']) ?></a></h3>
                <p class="card-description"><?= blog_e($post['excerpt']) ?></p>
                <a class="card-read-more" href="<?= blog_e($postUrl) ?>" aria-label="Read article: <?= blog_e($post['title']) ?>">Read article <span aria-hidden="true">→</span></a>
              </div>
              <div class="card-footer">
                <div class="post-author"><a href="<?= blog_e($postUrl) ?>"><img src="img/optimized/profile-avatar.webp" width="32" height="28" alt="" class="avatar rounded-circle" loading="lazy" decoding="async"><span class="author">Mukul Sharma</span></a></div>
                <div class="post-date"><span class="ion-ios-clock-outline" aria-hidden="true"></span> <?= (int) $post['reading_minutes'] ?> min</div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="blog-more-wrap"><a class="blog-more-link" href="blogs/">More reads <span aria-hidden="true">→</span></a></div>
    </div>
  </section>
  <!--/ Section Blog End /-->

  <!--/ Section Experience Start /-->
  <section id="experience" class="experience-mf sect-pt4 route" aria-labelledby="experience-title">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h2 id="experience-title" class="title-a">Experience</h2>
            <p class="subtitle-a">A timeline of the teams, products and platforms I have helped build.</p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>

      <div class="experience-timeline">
        <article class="experience-item">
          <div class="experience-marker" aria-hidden="true"></div>
          <div class="experience-card">
            <div class="experience-card-head">
              <div>
                <h3 class="experience-role">Senior Software Development Engineer</h3>
                <p class="experience-company">Network18 Media &amp; Investments Limited</p>
              </div>
              <span class="experience-duration">3 yrs 7 mos</span>
            </div>
            <p class="experience-meta">
              <span><time datetime="2022-12">Dec 2022</time> – Present</span>
              <span>Noida, Uttar Pradesh</span>
              <span>On-site</span>
            </p>
            <ul class="experience-points">
              <li>Improved the performance and scalability of News18.com, serving millions of monthly users and thousands of concurrent sessions.</li>
              <li>Developed product features and performance optimisations focused on high availability and fast content delivery.</li>
              <li>Worked across large-scale frontend and web-platform systems using React.js, JavaScript and modern web technologies.</li>
            </ul>
            <div class="experience-stack" aria-label="Technologies used">
              <span>React.js</span><span>JavaScript</span><span>HTML</span><span>Performance</span><span>Scalability</span>
            </div>
          </div>
        </article>

        <article class="experience-item">
          <div class="experience-marker" aria-hidden="true"></div>
          <div class="experience-card">
            <div class="experience-card-head">
              <div>
                <h3 class="experience-role">Full Stack Developer</h3>
                <p class="experience-company">Agrowave</p>
              </div>
              <span class="experience-duration">11 mos</span>
            </div>
            <p class="experience-meta">
              <span><time datetime="2022-01">Jan 2022</time> – <time datetime="2022-11">Nov 2022</time></span>
              <span>Gurugram, Haryana</span>
              <span>On-site</span>
            </p>
            <ul class="experience-points">
              <li>Built a scalable hybrid supply-chain solution connecting farmers with agricultural markets.</li>
              <li>Planned and delivered features from conception to production while improving web and mobile backend performance.</li>
              <li>Managed application deployments and cloud infrastructure on AWS EC2, S3, Route 53, DynamoDB and RDS.</li>
            </ul>
            <div class="experience-stack" aria-label="Technologies used">
              <span>React.js</span><span>Node.js</span><span>Express.js</span><span>PostgreSQL</span><span>MongoDB</span><span>AWS</span>
            </div>
          </div>
        </article>

        <article class="experience-item">
          <div class="experience-marker" aria-hidden="true"></div>
          <div class="experience-card">
            <div class="experience-card-head">
              <div>
                <h3 class="experience-role">Senior Software Engineer</h3>
                <p class="experience-company">BreachLock Inc</p>
              </div>
              <span class="experience-duration">1 yr 1 mo</span>
            </div>
            <p class="experience-meta">
              <span><time datetime="2020-12">Dec 2020</time> – <time datetime="2021-12">Dec 2021</time></span>
              <span>Noida, Uttar Pradesh</span>
              <span>Remote</span>
            </p>
            <ul class="experience-points">
              <li>Developed an AI-powered SaaS platform for cybersecurity operations.</li>
              <li>Built REST APIs along with client and administration dashboards using the MERN stack.</li>
              <li>Contributed across backend services, frontend workflows and secure product delivery.</li>
            </ul>
            <div class="experience-stack" aria-label="Technologies used">
              <span>MongoDB</span><span>Express.js</span><span>React.js</span><span>Node.js</span><span>REST APIs</span><span>SaaS</span>
            </div>
          </div>
        </article>

        <article class="experience-item">
          <div class="experience-marker" aria-hidden="true"></div>
          <div class="experience-card">
            <div class="experience-card-head">
              <div>
                <h3 class="experience-role">Full Stack Developer</h3>
                <p class="experience-company">Integrative Design Solutions Private Limited</p>
              </div>
              <span class="experience-duration">1 yr 7 mos</span>
            </div>
            <p class="experience-meta">
              <span><time datetime="2019-05">May 2019</time> – <time datetime="2020-11">Nov 2020</time></span>
              <span>Delhi, India</span>
              <span>On-site</span>
            </p>
            <ul class="experience-points">
              <li>Developed the Integrated Station for Energy and Environment (ISEE) platform.</li>
              <li>Built predictive analytics workflows to reduce energy consumption and operating costs for air-distribution systems and home appliances.</li>
              <li>Delivered the product using a full MEAN-stack architecture.</li>
            </ul>
            <div class="experience-stack" aria-label="Technologies used">
              <span>MongoDB</span><span>Express.js</span><span>Angular</span><span>Node.js</span><span>Analytics</span>
            </div>
          </div>
        </article>

        <article class="experience-item">
          <div class="experience-marker" aria-hidden="true"></div>
          <div class="experience-card">
            <div class="experience-card-head">
              <div>
                <h3 class="experience-role">Full Stack Developer</h3>
                <p class="experience-company">Sigma Mentors</p>
              </div>
              <span class="experience-duration">2 yrs</span>
            </div>
            <p class="experience-meta">
              <span><time datetime="2017-05">May 2017</time> – <time datetime="2019-04">Apr 2019</time></span>
              <span>Noida, Uttar Pradesh</span>
              <span>On-site</span>
            </p>
            <ul class="experience-points">
              <li>Developed a WordPress and REST API backend for DNH News.</li>
              <li>Built a hotel CMS with Node.js, Angular, MongoDB and Express.js.</li>
              <li>Created a MEAN-stack machine configuration tool for Siemens.</li>
              <li>Developed the IndustryMall e-commerce website using PHP and WordPress.</li>
            </ul>
            <div class="experience-stack" aria-label="Technologies used">
              <span>Node.js</span><span>Angular</span><span>MongoDB</span><span>Express.js</span><span>PHP</span><span>WordPress</span>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>
  <!--/ Section Experience End /-->

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" >
    <div class="overlay-mf"></div>
    
    <?php
    include'footer.php';
    ?>
  </section>
  <!--/ Section Contact-footer End /-->
  </main>

  <a href="#page-top" class="back-to-top" aria-label="Back to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

  <!-- Template Main Javascript File -->
  <script defer src="js/main.js?v=20260628c"></script>
  <script>
    window.addEventListener('load', function () {
      if (location.hostname === 'localhost' || location.hostname === '127.0.0.1') return;
      var loadAnalytics = function () {
        window.dataLayer = window.dataLayer || [];
        window.gtag = function () { dataLayer.push(arguments); };
        gtag('js', new Date());
        gtag('config', 'UA-167410650-1');
        var script = document.createElement('script');
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=UA-167410650-1';
        document.head.appendChild(script);
      };
      if ('requestIdleCallback' in window) requestIdleCallback(loadAnalytics, { timeout: 3000 });
      else setTimeout(loadAnalytics, 2000);
    }, { once: true });
  </script>

</body>
</html>
