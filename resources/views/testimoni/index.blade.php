<!DOCTYPE html>
<html lang="en">

<head>
  <!-- open -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>Testimoni Pelanggan - Quality Time</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- close -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="Testimoni dari pelanggan setia Quality Time">
  <meta name="keywords" content="testimoni, pelanggan, ulasan, Quality Time">

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

  <!-- Tambahan CSS untuk Testimoni -->
  <style>
    .testimonial-card {
      border: 1px solid #eee;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
      background-color: #fff;
    }

    .testimonial-card .stars {
      color: #ffc107;
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
      object-fit: cover;
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
        <img src="assets/img/logo.png" alt="">
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
          @foreach($testimonis as $testimoni)
          <div class="col-lg-6">
            <div class="testimonial-card">
              <div class="stars">
                @for($i = 0; $i < $testimoni->rating; $i++)
                <i class="bi bi-star-fill"></i>
                @endfor
                @for($i = $testimoni->rating; $i < 5; $i++)
                <i class="bi bi-star"></i>
                @endfor
              </div>
              <p>{{ $testimoni->isi }}</p>
              <div class="profile">
                @if($testimoni->jenis_kelamin == 'pria')
                <img src="{{ asset('assets/img/pria.png') }}" alt="Foto {{ $testimoni->nama }}">
                @elseif($testimoni->jenis_kelamin == 'wanita')
                <img src="{{ asset('assets/img/wanita.png') }}" alt="Foto {{ $testimoni->nama }}">
                @else
                <img src="{{ asset('assets/img/testimonials/default_avatar.png') }}" alt="Foto {{ $testimoni->nama }}">
                @endif
                <h3 style="color: black;">{{ $testimoni->nama }}</h3>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- Formulir Tambah Testimoni (Statis) -->
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">
            <div class="card p-4">
              <h3>Tambahkan Testimoni Anda</h3>
              <p>Terima kasih atas kesediaan Anda memberikan testimoni. Testimoni Anda akan kami tinjau dan
                tampilkan (jika sesuai).</p>
              <form action="{{ route('testimoni.submit') }}" method="POST" id="testimoniForm">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Anda <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nama" name="nama" required
                    placeholder="Masukkan nama Anda">
                </div>
                <div class="mb-3">
                  <label for="isi" class="form-label">Testimoni Anda <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="isi" name="isi" rows="4" required
                    placeholder="Tuliskan testimoni Anda di sini"></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Rating <span class="text-danger">*</span></label>
                  <div class="d-flex">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating1" value="1" required>
                      <label class="form-check-label" for="rating1">1 Bintang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating2" value="2" required>
                      <label class="form-check-label" for="rating2">2 Bintang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating3" value="3" required>
                      <label class="form-check-label" for="rating3">3 Bintang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating4" value="4" required>
                      <label class="form-check-label" for="rating4">4 Bintang</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="rating" id="rating5" value="5" checked
                        required>
                      <label class="form-check-label" for="rating5">5 Bintang</label>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Jenis Kelamin</label>
                  <div class="d-flex">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="pria">
                      <label class="form-check-label" for="laki-laki">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="wanita">
                      <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="lainnya" value="lainnya">
                      <label class="form-check-label" for="lainnya">Lainnya</label>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main>

  <footer id="footer" class="footer">

  </footer>

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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const testimoniForm = document.getElementById('testimoniForm');

      testimoniForm.addEventListener('submit', function(event) {
        @guest
        // Jika user belum login, alihkan ke halaman login
        event.preventDefault(); // Mencegah form dikirim
        window.location.href = "{{ route('login') }}";
        @else
        // Jika user sudah login, biarkan form dikirim seperti biasa
        @endguest
      });
    });
  </script>

</body>

</html>