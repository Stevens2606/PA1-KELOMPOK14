<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Order #{{ $order->id }}</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <style>
        /* Gaya tambahan yang diperlukan untuk order, disesuaikan agar serasi */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
            min-height: 100vh;
        }

        #order-detail {
            padding: 50px 0;
            background-color: var(--light-gray);
            /* atau sesuaikan */
        }

        .order-details-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--box-shadow);
            margin-bottom: 20px;
        }

        .order-header {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .order-info p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .order-items-list {
            list-style: none;
            padding: 0;
        }

        .order-items-list li {
            font-size: 1.1rem;
            margin-bottom: 8px;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .order-items-list li:last-child {
            border-bottom: none;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-top: 20px;
        }
    </style>
</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Quality Time Logo">
                <h1>Quality Time</h1>
                <span>.</span>
            </a>
            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Order Detail Section ======= -->
        <section id="order-detail">
            <div class="container">
                <div class="order-details-container">
                    <h2 class="order-header">Detail Order #{{ $order->id }}</h2>

                    <div class="order-info">
                        <p><strong>Status:</strong> {{ $order->status }}</p>
                        <p><strong>Tanggal Order:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
                    </div>

                    <h3>Item Order:</h3>
                    <ul class="order-items-list">
                        @foreach($order->orderItems as $orderItem)
                        <li>
                            {{ $orderItem->menu->nama ?? 'Tidak Ada' }} - Quantity: {{ $orderItem->quantity }} - Harga per Item: Rp
                            {{ number_format($orderItem->price, 0, ',', '.') }}
                        </li>
                        @endforeach
                    </ul>

                    <p class="total-price">Total Harga: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>

                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Kembali ke Daftar Order</a>
                </div>
            </div>
        </section><!-- End Order Detail Section -->

    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
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

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>