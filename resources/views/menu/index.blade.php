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

        /* Style untuk button group */
        .button-group {
            display: flex;
            /* Menggunakan Flexbox */
            justify-content: center;
            /* Mengatur tombol agar berada di tengah horizontal */
            margin-top: 10px;
            /* Memberi jarak dari elemen di atasnya */
        }

        .button-group .order-button {
            margin: 0 5px;
            /* Memberi jarak antar tombol */
        }
    </style>

</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="assets/img/logo.png" alt="">
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

                {{-- Alert jika sukses --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="section-header text-center">
                    <h2>Our Menu</h2>
                    <p>Check Our <span> Menu</span></p>
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
                                <a href="{{ asset('storage/menus/' . $menu->gambar) }}" class="glightbox">
                                    <img src="{{ asset('storage/menus/' . $menu->gambar) }}"
                                        class="menu-img img-fluid" alt="{{ $menu->nama }}">
                                </a>
                                <h4>{{ $menu->nama }}</h4>
                                <p class="ingredients">{{ $menu->deskripsi }} </p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="quantity-container">
                                    <label for="food_{{ $menu->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" class="quantity-input" value="1" min="1"
                                        id="food_{{ $menu->id }}" name="quantity">
                                </div>
                                <div class="button-group">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <button type="submit" class="order-button">Tambah ke Keranjang</button>
                                    </form>
                                    <form action="{{ route('orders.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="price" value="{{ $menu->harga }}">
                                       
                                        <button type="submit" class="order-button">Pesan</button>
                                    </form>
                                </div>
                            </div>
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
                                <a href="{{ asset('storage/menus/' . $menu->gambar) }}" class="glightbox">
                                    <img src="{{ asset('storage/menus/' . $menu->gambar) }}"
                                        class="menu-img img-fluid" alt="{{ $menu->nama }}">
                                </a>
                                <h4>{{ $menu->nama }}</h4>
                                <p class="ingredients">{{ $menu->deskripsi }}</p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="quantity-container">
                                    <label for="dimsum_{{ $menu->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" class="quantity-input" value="1" min="1"
                                        id="dimsum_{{ $menu->id }}" name="quantity">
                                </div>
                                <div class="button-group">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <button type="submit" class="order-button">Tambah ke Keranjang</button>
                                    </form>
                                    <form action="{{ route('orders.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="price" value="{{ $menu->harga }}">

                                        <button type="submit" class="order-button">Pesan</button>
                                    </form>
                                </div>
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
                                <a href="{{ asset('storage/menus/' . $menu->gambar) }}" class="glightbox">
                                    <img src="{{ asset('storage/menus/' . $menu->gambar) }}"
                                        class="menu-img img-fluid" alt="{{ $menu->nama }}">
                                </a>
                                <h4>{{ $menu->nama }}</h4>
                                <p class="ingredients">{{ $menu->deskripsi }}</p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="quantity-container">
                                    <label for="snack_{{ $menu->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" class="quantity-input" value="1" min="1"
                                        id="snack_{{ $menu->id }}" name="quantity">
                                </div>
                                <div class="button-group">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <button type="submit" class="order-button">Tambah ke Keranjang</button>
                                    </form>
                                    <form action="{{ route('orders.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="price" value="{{ $menu->harga }}">

                                        <button type="submit" class="order-button">Pesan</button>
                                    </form>
                                </div>
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
                                <a href="{{ asset('storage/menus/' . $menu->gambar) }}" class="glightbox">
                                    <img src="{{ asset('storage/menus/' . $menu->gambar) }}"
                                        class="menu-img img-fluid" alt="{{ $menu->nama }}">
                                </a>
                                <h4>{{ $menu->nama }}</h4>
                                <p class="ingredients">{{ $menu->deskripsi }}</p>
                                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="quantity-container">
                                    <label for="drinks_{{ $menu->id }}" class="quantity-label">Jumlah:</label>
                                    <input type="number" class="quantity-input" value="1" min="1"
                                        id="drinks_{{ $menu->id }}" name="quantity">
                                </div>
                                <div class="button-group">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <button type="submit" class="order-button">Tambah ke Keranjang</button>
                                    </form>
                                    <form action="{{ route('orders.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                        <input type="hidden" name="price" value="{{ $menu->harga }}">

                                        <button type="submit" class="order-button">Pesan</button>
                                    </form>
                                </div>
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

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const forms = document.querySelectorAll('form[action="{{ route('orders.store') }}"]');

                        forms.forEach(form => {
                            form.addEventListener('submit', function(event) {
                                event.preventDefault(); // Prevent the default form submission

                                // Find the quantity input within this form
                                const menuId = this.querySelector('input[name="menu_id"]').value;
                                let quantityInput;
                                if (this.closest('.tab-pane').id === 'menu-starters') {
                                    quantityInput = document.querySelector(`#food_${menuId}`);
                                } else if (this.closest('.tab-pane').id === 'menu-breakfast') {
                                    quantityInput = document.querySelector(`#dimsum_${menuId}`);
                                } else if (this.closest('.tab-pane').id === 'menu-lunch') {
                                    quantityInput = document.querySelector(`#snack_${menuId}`);
                                } else if (this.closest('.tab-pane').id === 'menu-dinner') {
                                    quantityInput = document.querySelector(`#drinks_${menuId}`);
                                }

                                const quantity = quantityInput ? quantityInput.value : 1; // Default to 1 if not found

                                // Create a hidden input field to store the quantity
                                const quantityInputHidden = document.createElement('input');
                                quantityInputHidden.type = 'hidden';
                                quantityInputHidden.name = 'quantity';
                                quantityInputHidden.value = quantity;

                                // Append the hidden input to the form
                                this.appendChild(quantityInputHidden);
                                this.submit();
                            });
                        });
                    });
                </script>
</body>

</html>