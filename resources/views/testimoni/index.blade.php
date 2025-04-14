<!DOCTYPE html>
<html lang="en">

<head>
  <!-- open -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- close -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Testimoni Pelanggan - Quality Time</title>
  <meta name="description" content="Testimoni dari pelanggan setia Quality Time">
  <meta name="keywords" content="testimoni, pelanggan, ulasan, Quality Time">

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

  <!-- Tambahan CSS untuk Testimoni -->
  <style>
    .testimonial-card {
      border: 1px solid #eee; /* Garis tipis untuk memisahkan card */
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Efek bayangan halus */
      background-color: #fff; /* Latar belakang putih */
    }

    .testimonial-card .stars {
      color: #ffc107; /* Warna bintang emas */
      margin-bottom: 10px;
    }

    .testimonial-card p {
      font-style: italic;
      color: #555;
    }

    .testimonial-card .profile {
      display: flex;
      align-items: center;
      margin-top: 20px;
    }

    .testimonial-card .profile img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
      object-fit: cover; /* Memastikan gambar tidak terdistorsi */
    }

    .testimonial-card .profile h3 {
      font-size: 16px;
      margin-bottom: 0;
    }

    .testimonial-card .profile h4 {
      font-size: 14px;
      color: #777;
      margin-bottom: 0;
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

     
      <!-- <a class="btn-getstarted" href="/loginform  ">Login</a> -->
    </div>
  </header>

  <main class="main">

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section dark-background">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimoni Pelanggan</h2>
          <p>Apa Kata Mereka Tentang <span>Quality Time</span></p>
        </div>

        <div class="row">
          <!-- Testimonial 1 -->
          <div class="col-lg-6">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>Tempatnya cozy banget buat nongkrong. Kopi dan makanannya juga enak!</p>
              <div class="profile">
                <img src="assets/img/testimonials/testimonials-1.jpg" alt="">
                <h3>Aisyah Putri</h3>
                <h4>Mahasiswi</h4>
              </div>
            </div>
          </div>

          <!-- Testimonial 2 -->
          <div class="col-lg-6">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
              </div>
              <p>Pelayanan ramah, harga terjangkau, cocok buat makan siang sama teman kantor.</p>
              <div class="profile">
                <img src="assets/img/testimonials/testimonials-2.jpg" alt="">
                <h3>Budi Santoso</h3>
                <h4>Karyawan Swasta</h4>
              </div>
            </div>
          </div>

          <!-- Testimonial 3 -->
          <div class="col-lg-6">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>Suasana nyaman, makanan enak, tempat yang pas buat quality time sama keluarga.</p>
              <div class="profile">
                <img src="assets/img/testimonials/testimonials-3.jpg" alt="">
                <h3>Citra Dewi</h3>
                <h4>Ibu Rumah Tangga</h4>
              </div>
            </div>
          </div>

          <!-- Testimonial 4 -->
          <div class="col-lg-6">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
              </div>
              <p>Kopi nya mantap, bikin semangat kerja lagi setelah istirahat di Quality Time.</p>
              <div class="profile">
                <img src="assets/img/testimonials/testimonials-4.jpg" alt="">
                <h3>Dedi Kurniawan</h3>
                <h4>Freelancer</h4>
              </div>
            </div>
          </div>

          <!-- Testimonial 5 -->
          <div class="col-lg-6">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>Tempatnya bersih, pelayanannya cepat, makanannya enak. Top banget!</p>
              <div class="profile">
                <img src="assets/img/testimonials/testimonials-5.jpg" alt="">
                <h3>Eka Prasetya</h3>
                <h4>Pengusaha</h4>
              </div>
            </div>
          </div>

          <!-- Testimonial 6 -->
          <div class="col-lg-6">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
              </div>
              <p>Sering banget kesini buat meeting sama klien, tempatnya tenang dan nyaman.</p>
              <div class="profile">
                <img src="assets/img/testimonials/testimonials-6.jpg" alt="">
                <h3>Faisal Rahman</h3>
                <h4>Marketing Manager</h4>
              </div>
            </div>
          </div>

          <!-- Testimonial 7 -->
          <div class="col-lg-6">
            <div class="testimonial-card">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>Recommended! Menu bervariasi, harga bersahabat, dan pelayanannya memuaskan.</p>
              <div class="profile">
                <img src="assets/img/testimonials/testimonials-7.jpg" alt="">
                <h3>Gina Lestari</h3>
                <h4>Ibu Rumah Tangga</h4>
              </div>
            </div>
          </div>
        </div>
        <!-- Formulir Tambah Testimoni (Statis) -->
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">
            <div class="card p-4">
              <h3>Tambahkan Testimoni Anda</h3>
              <p>Terima kasih atas kesediaan Anda memberikan testimoni.  Testimoni Anda akan kami tinjau dan tampilkan (jika sesuai).</p>
              <form>
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Anda <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan nama Anda">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email (Opsional)</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda (opsional)">
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Testimoni Anda <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Tuliskan testimoni Anda di sini"></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Rating <span class="text-danger">*</span></label>
                  <div class="d-flex">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating1" value="1">
                      <label class="form-check-label" for="rating1">1 Bintang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating2" value="2">
                      <label class="form-check-label" for="rating2">2 Bintang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating3" value="3">
                      <label class="form-check-label" for="rating3">3 Bintang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating4" value="4">
                      <label class="form-check-label" for="rating4">4 Bintang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating5" value="5" checked>
                      <label class="form-check-label" for="rating5">5 Bintang</label>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Testimoni </button>
                <p class="mt-2 text-muted"><em>Fitur pengiriman testimoni belum diaktifkan.</em></p>
              </form>
            </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main>

  <footer id="footer" class="footer">

  </footer>

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

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const nameInput = document.getElementById("name");
    const messageInput = document.getElementById("message");
    const submitButton = form.querySelector("button[type='submit']");

    function checkForm() {
      if (nameInput.value.trim() !== "" && messageInput.value.trim() !== "") {
        submitButton.removeAttribute("disabled");
      } else {
        submitButton.setAttribute("disabled", "true");
      }
    }

    nameInput.addEventListener("input", checkForm);
    messageInput.addEventListener("input", checkForm);
  });
</script>


</html>