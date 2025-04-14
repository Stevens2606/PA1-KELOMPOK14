<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Makanan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        .menu-item .order-button {
            background-color: #4CAF50;
            /* Warna hijau */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .menu-item .order-button:hover {
            background-color: #3e8e41;
            /* Warna hijau lebih gelap saat dihover */
        }

        .quantity-input {
            width: 50px;
            padding: 5px;
            text-align: center;
        }

        /* Style untuk container jumlah pesanan */
        .quantity-container {
            display: flex;
            align-items: center;
            /* Vertikal tengah */
            justify-content: center;
            /* Horisontal tengah */
            margin-bottom: 10px;
            /* Spasi di bawah */
        }

        /* Style untuk label "Jumlah" */
        .quantity-label {
            margin-right: 5px;
            /* Spasi di kanan */
            font-size: 14px;
            font-weight: bold;
        }
    </style>

</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu dark-background">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Our Menu</h2>
                    <p>Check Our <span>Yummy Menu</span></p>
                </div>

                <ul class="nav nav-tabs d-flex justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#menu-starters">
                            <h4>FOOD</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                            <h4>DIMSUM</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                            <h4>SNACK</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                            <h4>DRINKS</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="menu-starters">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>FOOD</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach($menus as $menu)
                            @if($menu->kategori == 'FOOD')
                            <!-- Menu Item -->
                            <div class="col-lg-4 menu-item">
                            <a href="{{ asset('images/' . $menu->gambar) }}" class="glightbox">
                                <img src="{{ asset('images/' . $menu->gambar) }}" class="menu-img img-fluid" alt="{{ $menu->nama }}">
                                </a>
                                <h4>{{ $menu->nama }}</h4>
                                <p class="ingredients">{{ $menu->deskripsi }} </p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="quantity-container">
                                    <label for="food_{{ $menu->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" class="quantity-input" value="1" min="1"
                                        id="food_{{ $menu->id }}">
                                </div>
                                <button class="order-button"
                                    onclick="order('{{ $menu->nama }}', 'food_{{ $menu->id }}')">Pesan</button>
                            </div><!-- End Menu Item -->
                            @endif
                            @endforeach
                        </div>
                    </div><!-- End Starter Menu Content -->

                    <div class="tab-pane fade" id="menu-breakfast">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>DIMSUM</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach($menus as $menu)
                            @if($menu->kategori == 'DIMSUM')
                            <!-- Menu Item -->
                            <div class="col-lg-4 menu-item">
                            <a href="{{ asset('images/' . $menu->gambar) }}" class="glightbox">
                                <img src="{{ asset('images/' . $menu->gambar) }}" class="menu-img img-fluid" alt="{{ $menu->nama }}">
                                </a>
                                <h4>{{ $menu->nama }}</h4>
                                <p class="ingredients">{{ $menu->deskripsi }}</p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="quantity-container">
                                    <label for="dimsum_{{ $menu->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" class="quantity-input" value="1" min="1"
                                        id="dimsum_{{ $menu->id }}">
                                </div>
                                <button class="order-button"
                                    onclick="order('{{ $menu->nama }}', 'dimsum_{{ $menu->id }}')">Pesan</button>
                            </div><!-- End Menu Item -->
                            @endif
                            @endforeach

                        </div>
                    </div><!-- End Breakfast Menu Content -->

                    <div class="tab-pane fade" id="menu-lunch">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>SNACK</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach($menus as $menu)
                            @if($menu->kategori == 'SNACK')
                            <!-- Menu Item -->
                            <div class="col-lg-4 menu-item">
                                <a href="{{ asset('images/' . $menu->gambar) }}" class="glightbox">
                                <img src="{{ asset('images/' . $menu->gambar) }}" class="menu-img img-fluid" alt="{{ $menu->nama }}">
                                </a>
                                <h4>{{ $menu->nama }}</h4>
                                <p class="ingredients">{{ $menu->deskripsi }}</p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="quantity-container">
                                    <label for="snack_{{ $menu->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" class="quantity-input" value="1" min="1"
                                        id="snack_{{ $menu->id }}">
                                </div>
                                <button class="order-button"
                                    onclick="order('{{ $menu->nama }}', 'snack_{{ $menu->id }}')">Pesan</button>
                            </div><!-- End Menu Item -->
                            @endif
                            @endforeach
                        </div>
                    </div><!-- End Lunch Menu Content -->

                    <div class="tab-pane fade" id="menu-dinner">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>DRINKS</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach($menus as $menu)
                            @if($menu->kategori == 'DRINKS')
                            <!-- Menu Item -->
                            <div class="col-lg-4 menu-item">
                                    <a href="{{ asset('images/' . $menu->gambar) }}" class="glightbox">
                                    <img src="{{ asset('images/' . $menu->gambar) }}" class="menu-img img-fluid"
                                        alt="{{ $menu->nama }}">
                                </a>
                                <h4>{{ $menu->nama }}</h4>
                                <p class="ingredients">{{ $menu->deskripsi }}</p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="quantity-container">
                                    <label for="drinks_{{ $menu->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" class="quantity-input" value="1" min="1"
                                        id="drinks_{{ $menu->id }}">
                                </div>
                                <button class="order-button"
                                    onclick="order('{{ $menu->nama }}', 'drinks_{{ $menu->id }}')">Pesan</button>
                            </div><!-- End Menu Item -->
                            @endif
                            @endforeach
                        </div>
                    </div><!-- End Dinner Menu Content -->
                </div>
            </div>
        </section><!-- End Menu Section -->
    </main>

    <!-- ======= Footer ======= -->
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
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

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

    function order(menuName, quantityId) {
        var quantity = document.getElementById(quantityId).value;
        var phoneNumber = '6285358599959';
        var message = encodeURIComponent(
          "Halo Quality Time,\n\nSaya ingin memesan:\n " + quantity + " " + menuName + "\n\nMohon info selanjutnya. Terima kasih."
        );
        var whatsappURL = "https://wa.me/" + phoneNumber + "?text=" + message;
        window.open(whatsappURL, '_blank');
    }
</script>

</html>