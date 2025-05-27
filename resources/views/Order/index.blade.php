<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Daftar Order Saya</title>

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

        #orders {
            padding: 50px 0;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: #fff;
            /* Teks putih */
        }

        #orders .section-header h2,
        #orders .section-header p {
            color: #fff;
        }

        .order-list {
            margin-top: 30px;
        }

        .reservation-item {
            background-color: rgba(255, 255, 255, 0.9);
            /* Latar belakang putih transparan */
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: var(--box-shadow);
            transition: transform 0.2s ease-in-out;
            color: var(--text-color);
        }

        .reservation-item:hover {
            transform: scale(1.03);
        }

        .order-header {
            margin-top: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .order-body {
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-start;
            /* Align buttons to the start */
            gap: 10px;
            /* Add a gap between the buttons */
        }

        .action-buttons .btn {
            border-radius: 8px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .action-buttons .btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--box-shadow);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .text-center {
            color: var(--text-color);
        }
    </style>
</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Quality Time Logo">
                <h1>Quality Times</h1>
                <span>.</span>
            </a>
            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Order Section ======= -->
        <section id="orders">
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

                <div class="order-list">
                    @if(count($orders) > 0)
                    <div class="row">
                        @foreach($orders as $order)
                        <div class="col-md-6">
                            <div class="reservation-item">
                                <h4 class="order-header">Order #{{ $order->id }}</h4>

                                <div class="order-body">
                                    @foreach($order->orderItems as $orderItem)
                                    <p><i class="bi bi-menu-app"></i> Menu: {{ $orderItem->menu->nama ?? 'Tidak Ada' }}
                                    </p>
                                    <p><i class="bi bi-hash"></i> Quantity: {{ $orderItem->quantity }}</p>
                                    <p><i class="bi bi-cash-coin"></i> Harga per Item: Rp
                                        {{ number_format($orderItem->price, 0, ',', '.') }}</p>
                                    @endforeach
                                    <p class="order-total"><i class="bi bi-cart-check-fill"></i> Total Harga: Rp
                                        {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                    <p><i class="bi bi-clock-history"></i> Tanggal Order:
                                        {{ $order->created_at->format('d-m-Y H:i') }}</p>
                                    <p><i class="bi bi-check-circle-fill"></i> Status:
                                        {{ $order->status }}</p>

                                    <div class="action-buttons">
                                      
                                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan order ini?')">Batalkan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-center">Anda belum melakukan order apapun.</p>
                    @endif
                </div>
            </div>
        </section><!-- End Order Section -->

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