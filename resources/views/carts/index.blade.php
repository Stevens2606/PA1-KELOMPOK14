<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Keranjang Belanja - Quality Time</title>
    <meta name="description" content="Keranjang belanja Quality Time Cafe">
    <meta name="keywords" content="keranjang, belanja, quality time, cafe">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.js') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            --white-color: #fff;
            --border-color: #ddd;
            --update-button-color: #f39c12;
            --delete-button-color: #e74c3c;
            --cart-item-bg: #fff;
            --quantity-button-bg: #f0f0f0; /* Abu-abu terang untuk quantity button */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
            line-height: 1.7;
            margin: 0;
            padding: 0;
        }

        #header {
            background-color: var(--white-color);
            color: var(--text-color);
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        #header .logo h1 {
            color: var(--primary-color);
            font-size: 2.2em;
            margin: 0;
        }

        #hero {
            position: relative;
            width: 100%;
            height: 200px;
            background: url('{{ asset('assets/img/hero-bg.jpg') }}') center/cover no-repeat;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white-color);
            padding: 20px;
            border-radius: 0 0 12px 12px;
        }

        #hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        /* Cart Section Styles */
        #cart {
            padding: 50px 0;
        }

        .cart-container {
            margin: 20px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            color: var(--text-color);
        }

        .section-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-header h2 {
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 1fr 0.5fr 0.8fr 0.8fr 0.5fr;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            background-color: var(--cart-item-bg);
            border-radius: 8px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .product {
            display: flex;
            align-items: center;
        }

        .product-image {
            max-width: 60px;
            max-height: 60px;
            border-radius: 5px;
            margin-right: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .product-name {
            font-weight: 500;
            font-size: 1.1em;
        }

        .price,
        .quantity,
        .subtotal,
        .actions {
            text-align: center;
            padding: 0;
            font-size: 0.9em;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-button {
            background-color: var(--white-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-radius: 5px;
            width: 30px;
            height: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            font-size: 1.2em;
            padding: 0;
            margin: 0 5px;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .quantity-button:hover {
            background-color: var(--light-gray);
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            margin: 0 5px;
            font-size: 0.9em;
            padding: 4px;
        }

        .update-button,
        .delete-button {
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
            font-size: 0.7em;
        }

        .update-button {
            background-color: var(--update-button-color);
            color: var(--white-color);
        }

        .update-button:hover {
            background-color: darken(var(--update-button-color), 10%);
        }

        .delete-button {
            background-color: var(--delete-button-color);
            color: var(--white-color);
        }

        .delete-button:hover {
            background-color: darken(var(--delete-button-color), 10%);
        }

        .cart-totals {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: right;
        }

        .cart-totals-text {
            font-size: 1.3em;
            margin-bottom: 5px;
            font-weight: 600;
            color: var(--text-color);
        }

        .cart-totals-subtotal {
            font-size: 1.1em;
            color: var(--text-color);
        }

        /* Checkout button */
        .buy-all-button {
            background-color: var(--primary-color);
            color: var(--white-color);
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-size: 1em;
        }

        .buy-all-button:hover {
            background-color: var(--secondary-color);
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

         /* Empty Cart Message */
        .empty-cart {
            text-align: center;
            padding: 30px;
            font-style: italic;
            color: #999;
        }

        /* Styling untuk tombol "Kembali ke Menu" */
        .back-to-menu {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9em;
        }

        .back-to-menu:hover {
            background-color: var(--primary-color);
            color: var(--white-color);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Footer Styles */
        #footer {
            background-color: var(--secondary-color);
            color: var(--white-color);
            padding: 60px 0;
        }

        #footer h4 {
            color: var(--white-color);
            font-size: 1.4em;
            margin-bottom: 15px;
        }

        #footer .social-links a {
            color: var(--white-color);
            font-size: 1.3em;
            margin-right: 15px;
            transition: color 0.3s ease;
        }

        #footer .social-links a:hover {
            color: var(--primary-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .cart-container {
                padding: 25px;
                margin: 15px;
            }

            .section-header h2 {
                font-size: 2.2em;
            }

            .cart-item {
                grid-template-columns: 1fr; /* Susun vertikal di layar kecil */
                text-align: center; /* Pusatkan konten */
            }

            .product {
                flex-direction: column; /* Susun gambar dan nama vertikal */
            }

            .product-image {
                margin-right: 0;
                margin-bottom: 10px; /* Beri jarak antara gambar dan nama */
            }

            .quantity-control {
                margin-top: 10px; /* Beri jarak dengan elemen di atasnya */
            }

            .cart-table th,
            .cart-table td {
                padding: 12px;
                font-size: 0.9em;
            }

            .quantity-input {
                width: 50px;
                padding: 6px;
            }

            .update-button,
            .delete-button {
                padding: 8px 12px;
                font-size: 0.8em;
            }

            .buy-all-button {
                padding: 12px 20px;
                font-size: 1em;
            }

            .back-to-menu,
            .back-to-home {
                display: block;
                /* Tampilkan sebagai blok penuh */
                width: 100%;
                /* Lebar penuh */
                margin: 10px 0;
                /* Margin yang disesuaikan */
            }

             .price,
             .quantity,
             .subtotal,
             .actions {
                text-align: center;
                padding: 5px;
            }
        }
    </style>
</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Quality Time Logo">
                <h1 class="sitename">Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">

       

        <!-- ======= Cart Section ======= -->
        <section id="cart" class="cart">
            <div class="container cart-container">

                <div class="section-header">
                    <h2>Ringkasan Belanja</h2>
                </div>

                {{-- Flash Messages --}}
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                @if(count($cart->cartItems ?? []) > 0)
                    @foreach($cart->cartItems ?? [] as $item)
                <div class="cart-item">
                    <div class="product">
                         <img src="{{ asset('storage/menus/' . $item->menu->gambar) }}" alt="{{ $item->menu->nama }}" class="product-image">
                            <span class="product-name">{{ $item->menu->nama ?? 'Nama Tidak Tersedia' }}</span>
                </div>

                <div class="price">Rp {{ number_format($item->price, 0, ',', '.') }}</div>

                <div class="quantity">
                 <form action="{{ route('cart.update', $item->id) }}" method="post" class="quantity-control">
                 @csrf
                 @method('PUT')
                   
                <button type="button" class="quantity-button" onclick="decrementQuantity(this)">-</button>
                <input type="number" class="quantity-input" name="quantity" value="{{ $item->quantity }}" min="1" readonly>
                 <button type="button" class="quantity-button" onclick="incrementQuantity(this)">+</button>
                   
                    <button type="submit" class="update-button"><i class="bi bi-arrow-clockwise"></i></button>
                </form>
             </div>
                 <div class="subtotal">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</div>

                <div class="actions">
                 <form action="{{ route('cart.remove', $item->id) }}" method="post">
                 @csrf
                 @method('DELETE')
                    <button type="submit" class="delete-button"><i class="bi bi-trash"></i></button>
                 </form>
                </div>
            </div>
             @endforeach

                <div class="cart-totals">
                    <div class="cart-totals-text">Total Belanja</div>
                    <div class="cart-totals-subtotal">Subtotal: Rp
                        {{ number_format(collect($cart->cartItems ?? [])->sum(function ($item) {
                                        return $item->price * $item->quantity;
                                    }), 0, ',', '.') }}
                    </div>
                </div>

                <!-- Formulir "Beli Semua" -->
                <div class="button-container">
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="buy-all-button">Beli Semua</button>
                    </form>
                </div>

                @else
                <p class="empty-cart">Keranjang belanja Anda kosong.</p>
                @endif

                <div class="button-container">
                    <a href="{{ route('menu.public') }}" class="back-to-menu">Kembali ke Menu</a>
                </div>
            </div>
        </section><!-- End Cart Section -->

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
                            <strong>Mon-Sun:</strong> <span>10 am - 11pm</span><br>
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

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
       function incrementQuantity(button) {
        var input = button.parentNode.querySelector('.quantity-input');
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 1 : value + 1;
        input.value = value;
    }

    function decrementQuantity(button) {
        var input = button.parentNode.querySelector('.quantity-input');
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = value - 1;
            input.value = value;
        }
    }
    </script>
</body>

</html>