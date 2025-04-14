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
    <title>Quality Time</title>
    <meta name="description" content="Temukan momen berharga dan inspirasi untuk quality time bersama orang tersayang.">
    <meta name="keywords" content="quality time, keluarga, teman, momen berharga, aktivitas bersama">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
      rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
     .btn-watch-video {
    display: inline-block;
    position: relative; /* Penting untuk memposisikan ikon play */
    padding: 0;
    background-color: transparent;
    border: none;
    border-radius: 10px; /* Memberikan sudut membulat pada gambar */
    box-shadow: none;
    overflow: hidden; /* Untuk memastikan efek hover tidak keluar dari batas */
    /* Menambahkan properti berikut agar button tetap di tengah */
    width: 250px; /* Ukuran Tombol Lebih Besar */
    height: 250px;    /* Tombol mengisi tinggi gambar */
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-watch-video:hover {
    background-color: rgba(0, 0, 0, 0.1); /* Efek hover */
}

.play-image {
    width: 100%; /* Ukuran gambar mengisi tombol */
    height: 100%;
    display: block; /* Menghilangkan ruang ekstra di bawah gambar */
    transition: transform 0.3s ease;
    object-fit: cover; /* Gambar menutupi seluruh area tombol */
}

.btn-watch-video:hover .play-image {
    transform: scale(1.1); /* Efek zoom */
}

.play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Memusatkan ikon */
    font-size: 60px; /* Ukuran ikon play lebih besar */
    color: white;
    opacity: 0.8; /* Tingkat transparansi ikon */
    transition: opacity 0.3s ease;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Efek bayangan */
}

.btn-watch-video:hover .play-icon {
    opacity: 1; /* Ikon lebih jelas saat dihover */
}
    </style>

  </head>

  <body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
      <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">Quality Time</h1>
          <span>.</span>
        </a>

        @include('layouts.navbar')


      </div>
    </header>

    <main class="main">



      <!-- About Section -->
      <section id="about" class="about section dark-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>About Us<br></h2>
          <p><span>Learn More</span> <span class="description-title">About Quality Time</span></p>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="row gy-4">
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/cafe.jpg" class="img-fluid mb-4" alt="Suasana quality time di kafe">
              <div class="book-a-table">
                <h3>Create Your Moment</h3>
                <p>Temukan inspirasi untuk momen berharga Anda.</p>
              </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
              <div class="content ps-0 ps-lg-5">
                <p class="fst-italic">
                  Kami percaya bahwa quality time adalah investasi terbaik untuk hubungan yang bermakna. Luangkan waktu untuk
                  orang-orang yang Anda cintai dan ciptakan kenangan indah bersama.
                </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Temukan ide aktivitas seru untuk quality time keluarga.</span>
                  </li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Inspirasi kencan romantis dan momen istimewa bersama
                      pasangan.</span></li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Tips untuk menikmati waktu berkualitas bersama teman-teman
                      terbaik.</span></li>
                </ul>
                <p>
                  Di Quality Time, kami hadir untuk membantu Anda merencanakan dan memaksimalkan setiap momen berharga.
                  Jelajahi berbagai ide dan tips untuk menciptakan pengalaman yang tak terlupakan.
                </p>

                <div class="d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://www.youtube.com/watch?v=0jIeCAOkgcQ" class="glightbox btn-watch-video">
                        <img src="assets/img/OIP.jpg" alt="Watch Video" class="play-image">
                        <div class="play-icon">
                            <i class="bi bi-play-circle-fill"></i>
                        </div>
                    </a>
                </div>
              </div>
              </div>
            </div>
          </div>

        </div>

      </section><!-- /About Section -->

      <!-- /Contact Section -->

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

      


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

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
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var popoverBtn = document.getElementById("popoverBtn");

      var popover = new bootstrap.Popover(popoverBtn, {
        title: "Gabung",
        content: `<div style="text-align: center;">
                          <button onclick="window.location.href='/loginform'" class="btn btn-primary btn-sm mb-2">Login</button>
                          <br>
                          <button onclick="window.location.href='/registerform'" class="btn btn-success btn-sm">Register</button>
                        </div>`,
        html: true,
        placement: "bottom",
      });

      // Agar popover bisa ditutup saat klik di luar area popover
      document.addEventListener("click", function (event) {
        if (!popoverBtn.contains(event.target)) {
          popover.hide();
        }
      });
    });
  </script>

  </html>