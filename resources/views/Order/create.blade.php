<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Buat Order Baru</title>
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
        /* Gaya tambahan yang diperlukan untuk form order, disesuaikan agar serasi */
        .order-form {
            margin-top: 20px;
        }

        .order-form .form-group {
            margin-bottom: 15px;
        }

        .order-form .form-label {
            font-weight: bold;
            color: #fff;
        }

        .order-form .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #333;
            color: #fff;
        }

        .order-form .btn-primary,
        .order-form .btn-secondary {
            margin-top: 10px;
        }

        /* Gaya tambahan agar tombol terlihat serasi */
        .btn-primary {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #3e8e41;
        }

        .btn-secondary {
            background-color: #555;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #333;
        }

        .dark-background {
            background-color: #222222;
            color: #ffffff;
        }

        /* Style untuk pesan error */
        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
    </style>

</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
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
                    <h2>Buat Order Baru</h2>
                    <p>Isi Form <span>Order</span></p>
                </div>

                <form action="{{ route('orders.store') }}" method="POST" class="order-form">
                    @csrf

                    <div class="form-group">
                        <label for="menu_id" class="form-label">Menu:</label>
                        <select class="form-control" id="menu_id" name="menu_id" required>
                            <option value="">Pilih Menu</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }} (Rp. {{ number_format($menu->price, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                        @error('menu_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="quantity" class="form-label">Jumlah:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            value="{{ old('quantity', 1) }}" required min="1">
                        @error('quantity')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="price" class="form-label">Harga per Item:</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price"
                            value="{{ old('price') }}" required>
                    </div> --}}

                    <div class="form-group">
                        <label for="total_price" class="form-label">Total Harga:</label>
                        <input type="number" step="0.01" class="form-control" id="total_price" name="total_price"
                            value="{{ old('total_price') }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Batal</a>
                </form>
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
                            <strong>Mon-Sun:</strong> <span>10 am - 11 pm</span><br>
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
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const menuSelect = document.getElementById('menu_id');
                const quantityInput = document.getElementById('quantity');
                const totalPriceInput = document.getElementById('total_price');

                function calculateTotalPrice() {
                    const selectedOption = menuSelect.options[menuSelect.selectedIndex];
                    const menuPrice = selectedOption.dataset.price;
                    const quantity = parseInt(quantityInput.value);

                    if (menuPrice && quantity) {
                        const totalPrice = menuPrice * quantity;
                        totalPriceInput.value = totalPrice.toFixed(2); // Format ke 2 desimal
                    } else {
                        totalPriceInput.value = '';
                    }
                }

                // Inisialisasi total harga saat halaman dimuat
                calculateTotalPrice();

                // Event listener untuk perubahan pada menu dan quantity
                menuSelect.addEventListener('change', calculateTotalPrice);
                quantityInput.addEventListener('input', calculateTotalPrice);
            });
        </script>

</body>

</html>