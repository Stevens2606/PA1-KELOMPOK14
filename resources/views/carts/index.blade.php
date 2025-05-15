            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">

                <title>Keranjang Belanja</title>
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
                    /* Gaya yang ada sebelumnya */
                    .cart-container {
                        margin: 20px;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                    }

                    .cart-table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }

                    .cart-table th,
                    .cart-table td {
                        padding: 8px;
                        border: 1px solid #ddd;
                        text-align: left;
                    }

                    .cart-table th {
                        background-color: #f2f2f2;
                    }

                    .quantity-input {
                        width: 60px;
                        padding: 5px;
                        text-align: center;
                    }

                    .update-button,
                    .delete-button {
                        background-color: #4CAF50;
                        color: white;
                        padding: 5px 10px;
                        border: none;
                        border-radius: 3px;
                        cursor: pointer;
                    }

                    .delete-button {
                        background-color: #f44336;
                    }

                    .empty-cart {
                        text-align: center;
                        padding: 20px;
                        font-style: italic;
                    }

                    .back-to-menu {
                        display: block;
                        text-align: center;
                        margin-top: 20px;
                        color: #007bff;
                    }

                    /* Gaya untuk tombol "Beli Semua" */
                    .buy-all-button {
                        background-color: #007bff;
                        color: white;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        display: block;
                        text-align: center;
                        margin: 20px auto;
                        max-width: 200px;
                    }

                    /* Gaya untuk membuat latar belakang penuh */
                    html,
                    body {
                        height: 100%;
                        margin: 0;
                        /* Pastikan tidak ada margin default */
                    }

                    body.index-page {
                        background-color: #343a40;
                        /* Warna latar belakang yang Anda inginkan */
                    }

                    #main {
                        min-height: calc(100% - 80px - 200px);
                        /* Sesuaikan dengan tinggi header dan footer Anda */
                        display: flex;
                        flex-direction: column;
                    }

                    #cart {
                        flex: 1;
                        /* Membuat section cart memenuhi sisa ruang */
                    }
                </style>

            </head>

            <body class="index-page">

                <!-- ======= Header ======= -->
                <header id="header" class="header d-flex align-items-center sticky-top">
                    <div class="container position-relative d-flex align-items-center justify-content-between">
                        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            <h1 class="sitename">Quality Time</h1>
                            <span>.</span>
                        </a>

                        @include('layouts.navbar')
                    </div>
                </header><!-- End Header -->

                <main id="main">

                    <section id="cart" class="cart dark-background">
                        <div class="container cart-container">

                            <div class="container cart-container">

                                {{-- Flash Messages --}}
                                @if (session('success'))
                                    <div
                                        style="background-color: #d4edda; padding: 10px; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 1rem;">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div
                                        style="background-color: #f8d7da; padding: 10px; color: #721c24; border: 1px solid #f5c6cb; margin-bottom: 1rem;">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="section-header text-center">
                                    <h2>Keranjang Belanja</h2>
                                </div>


                                @if(count($cart->cartItems ?? []) > 0)
                                    <table class="cart-table">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cart->cartItems ?? [] as $item)
                                                <tr>
                                                    <td>
                                                        @if($item->menu->nama)
                                                            {{ $item->menu->nama }}
                                                        @else
                                                            Nama Tidak Tersedia
                                                        @endif
                                                    </td>
                                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                                    <td>
                                                        <form action="{{ route('cart.update', $item->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="number" class="quantity-input" name="quantity"
                                                                value="{{ $item->quantity }}" min="1">
                                                            <button type="submit" class="update-button">Update</button>
                                                        </form>
                                                    </td>
                                                    <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                                    <td>
                                                        <form action="{{ route('cart.remove', $item->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="delete-button">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3"><b>Total:</b></td>
                                                <td><b>Rp {{ number_format(collect($cart->cartItems ?? [])->sum(function ($item) {
                                                                return $item->price * $item->quantity;
                                                            }), 0, ',', '.') }}</b></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <!-- Formulir "Beli Semua" -->

                                    <form action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="buy-all-button">Beli Semua</button>
                                    </form>
                                @else
                                    <p class="empty-cart">Keranjang belanja Anda kosong.</p>
                                @endif

                                <a href="{{ route('menu.public') }}" class="back-to-menu">Kembali ke Menu</a>
                            </div>
                    </section>

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

                            <!-- Scroll Top -->
                            <a href="#" id="scroll-top"
                            class="scroll-top d-flex align-items-center justify-content-center"><i
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

            </html> 