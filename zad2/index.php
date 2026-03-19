<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - eStartup Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eStartup
  * Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename"><span>e</span>Startup</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2>Calculator</h2>
            <p>Wylicz miesięczną ratę kredytu</p>
            <div class="d-flex">
              <a href="#contact" class="btn-get-started">Get Started</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/hero-img.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
      </div>

    </section><!-- /Hero Section -->

  <section id="contact" class="contact section">

  <div class="container section-title">
    <h2>Kalkulator kredytu</h2>
  </div>

  <div class="container">
    <div class="row gy-4">

      <div class="col-lg-4">

        <div class="info-item d-flex flex-column justify-content-center text-center">
          <h3>Wynik</h3>

          <?php if (isset($payment)) { ?>
            <p style="font-size: 24px; font-weight: bold;">
              <?php echo round($payment, 2); ?> zł / miesiąc
            </p>
          <?php } else { ?>
            <p>Wprowadź dane, aby zobaczyć wynik</p>
          <?php } ?>

        </div>

      </div>

      <div class="col-lg-8">

          <form method="GET" action="calc.php">

          <div class="row gy-4">

            <div class="col-md-12">
              <input type="text" name="loan" class="form-control"
                placeholder="Kwota kredytu"
                value="<?php echo $loan ?? '' ?>">
              <div style="color:red"><?php echo $errorLoan ?? '' ?></div>
            </div>

            <div class="col-md-12">
              <input type="text" name="interest" class="form-control"
                placeholder="Oprocentowanie"
                value="<?php echo $interest ?? '' ?>">
              <div style="color:red"><?php echo $errorInterest ?? '' ?></div>
            </div>

            <div class="col-md-12">
              <input type="text" name="years" class="form-control"
                placeholder="Liczba lat"
                value="<?php echo $years ?? '' ?>">
              <div style="color:red"><?php echo $errorYears ?? '' ?></div>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit">Oblicz</button>
            </div>

          </div>

        </form>

      </div>

    </div>
  </div>

</section>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>