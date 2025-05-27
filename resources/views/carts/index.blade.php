<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Keranjang Belanja Saya</title>

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
    <link href="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <style>
        /* === Variabel CSS (Lebih Terstruktur) === */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --border-radius: 0.5rem;
            --transition-duration: 0.2s;
        }

        /* === Gaya Umum === */
        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
            min-height: 100vh;
        }

        /* === Section Cart === */
        #cart {
            padding: 50px 0;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: #fff;
        }

        #cart .section-header h2,
        #cart .section-header p {
            color: #fff;
        }

        /* === Cart List & Table === */
        .cart-list {
            margin-top: 30px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            font-weight: bold;
        }

        /* === Cart Item === */
        .cart-item:hover {
            transform: scale(1.03);
        }

        .cart-header {
            margin-top: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .cart-body {
            font-size: 1rem;
            flex-grow: 1;
        }

        .cart-body p {
            margin-bottom: 0.5rem;
        }

        /* === Action Buttons (Update/Delete) === */
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .action-buttons .btn {
            border-radius: var(--border-radius);
            transition: transform var(--transition-duration) ease-in-out, box-shadow var(--transition-duration)
                ease-in-out;
            padding: 0.3rem 0.7rem;
            font-size: 0.8rem;
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

        /* === Cart Totals & Checkout === */
        .text-center {
            color: var(--text-color);
        }

        .cart-totals {
            margin-top: 2rem;
            text-align: center;
        }

        .cart-totals-text {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .cart-totals-subtotal {
            font-size: 1.1rem;
        }

        .checkout-button {
            margin-top: 1rem;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            border-radius: var(--border-radius);
            background-color: var(--secondary-color);
            color: #fff;
            border: none;
            transition: background-color var(--transition-duration) ease-in-out;
        }

        .checkout-button:hover {
            background-color: darken(var(--secondary-color), 10%);
        }

        /* === Back to Menu Link === */
        .back-to-menu {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            text-decoration: none;
            transition: background-color var(--transition-duration) ease-in-out, color var(--transition-duration)
                ease-in-out;
        }

        .back-to-menu:hover {
            background-color: var(--primary-color);
            color: #fff;
        }

        /* === Quantity Control (Increment/Decrement) === */
        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-input {
            width: 40px;
            padding: 3px;
            text-align: center;
            border-radius: var(--border-radius);
            border: 1px solid #ccc;
            font-size: 0.8rem;
        }

        .quantity-button {
            background-color: #eee;
            border: none;
            padding: 2px 5px;
            margin: 0 2px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.7rem;
            line-height: 1;
        }

        .quantity-button:hover {
            background-color: #ddd;
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

        <!-- ======= Cart Section ======= -->
        <section id="cart">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Keranjang Belanja Saya</h2>
                    <p>Item yang ada di <span>Keranjang Saya</span></p>
                </div>

                <!-- Pesan Notifikasi (Success/Error) -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="cart-list">
                    @if(count($cart->cartItems ?? []) > 0)
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Harga per Item</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart->cartItems ?? [] as $item)
                            <tr>
                                <td>{{ $item->menu->nama ?? 'Nama Tidak Tersedia' }}</td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="action-buttons quantity-control">
                                            <button type="button"
                                                onclick="decrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))"
                                                class="quantity-button">-</button>
                                            <input type="number" name="quantity"
                                                class="form-control quantity-input" value="{{ $item->quantity }}"
                                                min="1">
                                            <button type="button"
                                                onclick="incrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))"
                                                class="quantity-button">+</button>
                                            <button type="submit" class="btn btn-primary"
                                                style="margin-left: 5px">Update</button>
                                        </div>
                                    </form>
                                </td>
                                <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="cart-totals text-center">
                        <div class="cart-totals-text">Total Belanja</div>
                        <div class="cart-totals-subtotal">Subtotal: Rp
                            {{ number_format(collect($cart->cartItems ?? [])->sum(function ($item) {
                                    return $item->price * $item->quantity;
                                }), 0, ',', '.') }}
                        </div>
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="checkout-button">Checkout</button>
                        </form>
                    </div>
                    @else
                    <p class="text-center">Keranjang belanja Anda kosong.</p>
                    @endif
                    <div class="text-center">
                        <a href="{{ route('menu.public') }}" class="back-to-menu">Kembali ke Menu</a>
                    </div>
                </div>
            </div>
        </section><!-- End Cart Section -->

    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon" style="color: var(--primary-color);"></i>
                    <div class="address">
                        <h4 style="color: var(--text-color);">Address</h4>
                        <!-- Menggunakan variabel warna -->
                        <p>Jl. Patuan Nagari No.49, Ps. Porsea, Kec. Porsea, Toba, Sumatera Utara 22384</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon" style="color: var(--primary-color);"></i>
                    <div>
                        <h4 style="color: var(--text-color);">Contact</h4>
                        <!-- Menggunakan variabel warna -->
                        <p>
                            <strong>Phone:</strong> <span>+62 822-7378-2156</span><br>
                            <strong>Email:</strong> <span>qualitytimecafe45@gmail.com</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon" style="color: var(--primary-color);"></i>
                    <div>
                        <h4 style="color: var(--text-color);">Opening Hours</h4>
                        <!-- Menggunakan variabel warna -->
                        <p>
                            <strong>Mon-Sun:</strong> <span>10 AM - 11 PM</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 style="color: var(--text-color);">Follow Us</h4>
                    <!-- Menggunakan variabel warna -->
                    <div class="social-links d-flex">
                        <a href="#" class="twitter" style="color: var(--primary-color);"><i
                                class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook" style="color: var(--primary-color);"><i
                                class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram" style="color: var(--primary-color);"><i
                                class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin" style="color: var(--primary-color);"><i
                                class="bi bi-linkedin"></i></a>
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

    <script>
        function incrementQuantity(input) {
            let value = parseInt(input.value, 10);
            value = isNaN(value) ? 1 : value + 1;
            input.value = value;
        }

        function decrementQuantity(input) {
            let value = parseInt(input.value, 10);
            if (value > 1) {
                value = value - 1;
                input.value = value;
            }
        }

    </script>

</body>

</html>