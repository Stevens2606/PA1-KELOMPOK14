<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Daftar Order Saya</title>
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
        /* Gaya tambahan yang diperlukan untuk order, disesuaikan agar serasi */
    .order-list {
        margin-top: 20px;
    }

    .order-item {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 15px;
        /* background-color: #f9f9f9;  Hapus atau komentari baris ini */
        color: #000000; /* Warna teks hitam */
    }

    .order-item h4 {
        margin-top: 0;
        color: #000000; /* Warna teks hitam */
    }

    .order-item p {
        margin-bottom: 5px;
        color: #000000; /* Warna teks hitam */
    }

    /* Atur teks section menjadi hitam*/
    #orders {
        color: #000000;
    }

    #orders .section-header h2,
    #orders .section-header p {
        color: #000000; /* Teks hitam pada judul */
    }

    /* Atur warna footer menjadi hitam */
    #footer {
        color: #000000; /* Teks hitam pada footer */
    }

    #footer h4,
    #footer p,
    #footer a {
        color: #000000; /* Teks hitam pada footer */
    }
        
        /* Gaya tambahan yang diperlukan untuk order, disesuaikan agar serasi */
        .order-list {
            margin-top: 20px;
        }

        .order-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }

        .order-item h4 {
            margin-top: 0;
        }

        .order-item p {
            margin-bottom: 5px;
        }

        .dark-background {
            background-color: #222222;
            color: #ffffff;
        }
    </style>

</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <h1>Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Order Section ======= -->
        <section id="orders" class="menu dark-background">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Daftar Order Saya</h2>
                    <p>Order yang telah <span>Saya Buat</span></p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(count($orders) > 0)
                    <div class="order-list">
                        @foreach($orders as $order)
                            <div class="order-item">
                                <h4>Order #{{ $order->id }}</h4>
                                <p>Menu: {{ $order->menu->nama ?? 'Tidak Ada' }}</p>
                                <p>Quantity: {{ $order->quantity }}</p>
                                <p>Harga per Item: Rp {{ number_format($order->price, 0, ',', '.') }}</p>
                                <p>Total Harga: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                <p>Status: {{ $order->status }}</p>
                                <p>Tanggal Order: {{ $order->created_at->format('d-m-Y H:i') }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">Anda belum melakukan order apapun.</p>
                @endif
            </div>
        </section><!-- End Order Section -->
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
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Contact</h4>
                        <p>
                            <strong>Phone:</strong> <span>+62 822-7378-2156</span><br>
                            <strong>Email:</strong> <span>qualitytimecafe45@gmail.com</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sun:</strong> <span>10 AM - 11 PM</span><br>
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
    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>