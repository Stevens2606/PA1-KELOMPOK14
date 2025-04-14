<!DOCTYPE html>
<html lang="en">

<head>
  <!-- open -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- close -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Makanan</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    body {
        /* background: url("assets/img/logo.jpg") !important; */
        min-height: 100vh; /* Pastikan gambar memenuhi seluruh layar */
    }
</style>


</head>

<body class="index-page"> 

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->

         <img src="assets/img/logo.jpg" alt="">
         <h1 class="sitename">Quality Time</h1>
        <span>.</span>
      </a>

      @include('layouts.navbar')


      <!-- <a class="btn-getstarted" href="/loginform  ">Login</a> -->
      <!-- <a class="btn btn-danger" href="/loginform" role="button">Mari Bergabung</a> -->
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Selamat Datang Di <br>Quality Time</h1>
            <p data-aos="fade-up" data-aos-delay="100">Mari kita ciptakan waktu yang berkualitas dengan keluarga, teman, pasangan di cafe&resto Quality Time</p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="https://www.youtube.com/watch?v=Atr97iC4HFc" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/cofe1.png" class="hero-img.jpg-fluid animated" alt="">
          </div>

        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
           
            <!-- <p><span>Learn More</span> <span class="description-title">About Us</span></p> -->
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4 align-items-center"> <!-- Tambahkan align-items-center untuk vertikal centering -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="assets/img/about.jpg" class="img-fluid rounded shadow-lg" alt="About Our Restaurant"> <!-- Tambahkan rounded, shadow-lg -->
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                    <div class="content ps-0 ps-lg-5">
                        <h3>Welcome to Quality Time Resto!</h3> <!-- Judul yang lebih menarik -->
                        <p class="fst-italic lead"> <!-- Gunakan class "lead" -->
                            Quality Time Resto adalah tempat yang sempurna untuk menikmati hidangan lezat dan menciptakan momen berharga
                            bersama orang-orang tersayang. Kami mengutamakan kualitas bahan baku, pelayanan ramah, dan suasana yang
                            nyaman.
                        </p>
                        <ul class="list-unstyled">  <!-- Gunakan list-unstyled untuk menghilangkan bullets -->
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-primary"></i> Kualitas bahan baku terjamin.</li> <!-- Tambahkan margin bottom & warna ikon -->
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-primary"></i> Menu beragam dengan cita rasa yang menggugah selera.</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-primary"></i> Pelayanan ramah dan profesional.</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-primary"></i> Suasana nyaman dan cocok untuk berbagai acara.</li>
                        </ul>

                        <p>
                            Kami percaya bahwa setiap hidangan adalah sebuah pengalaman. Di Quality Time Resto, kami berusaha memberikan
                            pengalaman yang tak terlupakan bagi setiap pelanggan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><   

   

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>Jl. Patuan Nagari No.49, Ps. Porsea, Kec. Porsea, Toba, Sumatera Utara 22384</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+62 822-7378-2156</span><br>
              <strong>Email:</strong> <span>qualitytimecafe45@gmail.com
              </span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sun:</strong> <span>10 am - 11pm</span><br>
              
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

   
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
    
</body>

</html>