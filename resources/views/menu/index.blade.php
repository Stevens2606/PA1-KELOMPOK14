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
    <link href="{{ asset('assets/vendor/aos/aos.js') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        /* Variabel Warna (Konsisten dengan Halaman Order) */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(232, 223, 223, 0.15);
            --white-color: #fff;
            --table-row-color: #f2f2f2;
            /* Very Light Gray */
        }

        #menu {
            padding: 50px 0;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: var(--white-color);
        }

        .menu-item {
            transition: transform 0.2s ease-in-out;
        }

        .menu-item:hover {
            transform: scale(1.03);
        }

        .menu-img-container {
            width: 100%;
            /* Lebar 100% dari container */
            height: 200px;
            /* Tinggi tetap */
            overflow: hidden;
            /* Memastikan gambar tidak keluar dari container */
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .menu-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Memastikan gambar memenuhi area dan dipotong jika perlu */
            transition: transform 0.3s ease;
        }

        .menu-item:hover .menu-img {
            transform: scale(1.1);
        }

        /* Tombol Order */
        .order-button {
            background-color: var(--primary-color);
            border: none;
            color: var(--white-color);
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .order-button:hover {
            background-color: var(--secondary-color);
            color: var(--white-color);
        }

        .quantity-input {
            width: 50px;
            padding: 5px;
            text-align: center;
            margin-left: 5px;
        }

        .button-group {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .section-header h2,
        .section-header p {
            color: var(--white-color);
            text-align: center;
        }

        .nav-tabs .nav-link {
            color: var(--white-color);
            border: none;
            border-bottom: 2px solid transparent;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
        }

        .nav-tabs .nav-link:hover {
            color: var(--light-gray);
        }

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-button {
            background-color: var(--light-gray);
            /* Atau warna lain yang sesuai */
            border: none;
            color: var(--text-color);
            /* Atau warna lain yang sesuai */
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            margin: 0 5px;
        }

        .quantity-button:hover {
            background-color: #ddd;
            /* Efek hover */
        }

        .quantity-input {
            width: 40px;
            /* Lebar input */
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        <section id="menu">
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
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#menu-food">
                            <h4>FOOD</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dimsum">
                            <h4>DIMSUM</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-snack">
                            <h4>SNACK</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-drinks">
                            <h4>DRINKS</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="menu-food">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>FOOD</h3>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach($menus as $menu)
                            @if($menu->kategori == 'FOOD')
                            <div class="col">
                                <div class="card h-100 menu-item">
                                    <a href="{{ asset('storage/menus/' . $menu->gambar) }}">
                                        <div class="menu-img-container">
                                            <img src="{{ asset('storage/menus/' . $menu->gambar) }}"
                                                class="card-img-top menu-img" alt="{{ $menu->nama }}">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $menu->nama }}</h5>
                                        <p class="card-text">{{ $menu->deskripsi }}</p>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="quantity-control">
                                                <button type="button" class="quantity-button" data-action="decrease"
                                                    data-menu-id="{{ $menu->id }}"
                                                    data-category="{{ $menu->kategori }}" onclick="decrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))">-</button>
                                                <input type="number" class="quantity-input form-control" value="1"
                                                    min="1" id="{{ strtolower($menu->kategori) }}_{{ $menu->id }}"
                                                    name="quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1'); updateHiddenQuantity(this)"
                                                     data-menu-id="{{ $menu->id }}" data-category="{{ $menu->kategori }}">
                                                <button type="button" class="quantity-button" data-action="increase"
                                                    data-menu-id="{{ $menu->id }}"
                                                    data-category="{{ $menu->kategori }}" onclick="incrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))">+</button>
                                            </div>
                                            <div class="button-group">
                                                <form action="{{ route('cart.add') }}" method="POST" style="margin-right: 5px;">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <button type="submit" class="order-button">Tambah ke
                                                        Keranjang</button>
                                                </form>
                                                <form action="{{ route('orders.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <input type="hidden" name="price" value="{{ $menu->harga }}">
                                                    <input type="hidden" name="quantity"
                                                        id="quantity_{{ $menu->id }}" value="1">
                                                    <button type="submit" class="order-button">Pesan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="menu-dimsum">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>DIMSUM</h3>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach($menus as $menu)
                            @if($menu->kategori == 'DIMSUM')
                            <div class="col">
                                <div class="card h-100 menu-item">
                                    <a href="{{ asset('storage/menus/' . $menu->gambar) }}">
                                        <div class="menu-img-container">
                                            <img src="{{ asset('storage/menus/' . $menu->gambar) }}"
                                                class="card-img-top menu-img" alt="{{ $menu->nama }}">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $menu->nama }}</h5>
                                        <p class="card-text">{{ $menu->deskripsi }}</p>
                                       
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="quantity-control">
                                                <button type="button" class="quantity-button" data-action="decrease"
                                                    data-menu-id="{{ $menu->id }}"
                                                    data-category="{{ $menu->kategori }}" onclick="decrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))">-</button>
                                                <input type="number" class="quantity-input form-control" value="1"
                                                    min="1" id="{{ strtolower($menu->kategori) }}_{{ $menu->id }}"
                                                    name="quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1'); updateHiddenQuantity(this)"
                                                     data-menu-id="{{ $menu->id }}" data-category="{{ $menu->kategori }}">
                                                <button type="button" class="quantity-button" data-action="increase"
                                                    data-menu-id="{{ $menu->id }}"
                                                    data-category="{{ $menu->kategori }}" onclick="incrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))">+</button>
                                            </div>
                                            <div class="button-group">
                                                <form action="{{ route('cart.add') }}" method="POST" style="margin-right: 5px;">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <button type="submit" class="order-button">Tambah ke
                                                        Keranjang</button>
                                                </form>
                                                <form action="{{ route('orders.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <input type="hidden" name="price" value="{{ $menu->harga }}">
                                                    <input type="hidden" name="quantity"
                                                        id="quantity_{{ $menu->id }}" value="1">
                                                    <button type="submit" class="order-button">Pesan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="menu-snack">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>SNACK</h3>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach($menus as $menu)
                            @if($menu->kategori == 'SNACK')
                            <div class="col">
                                <div class="card h-100 menu-item">
                                    <a href="{{ asset('storage/menus/' . $menu->gambar) }}">
                                        <div class="menu-img-container">
                                            <img src="{{ asset('storage/menus/' . $menu->gambar) }}"
                                                class="card-img-top menu-img" alt="{{ $menu->nama }}">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $menu->nama }}</h5>
                                        <p class="card-text">{{ $menu->deskripsi }}</p>
                                      
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="quantity-control">
                                                <button type="button" class="quantity-button" data-action="decrease"
                                                    data-menu-id="{{ $menu->id }}"
                                                    data-category="{{ $menu->kategori }}" onclick="decrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))">-</button>
                                                <input type="number" class="quantity-input form-control" value="1"
                                                    min="1" id="{{ strtolower($menu->kategori) }}_{{ $menu->id }}"
                                                    name="quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1'); updateHiddenQuantity(this)">
                                                <button type="button" class="quantity-button" data-action="increase"
                                                    data-menu-id="{{ $menu->id }}"
                                                    data-category="{{ $menu->kategori }}" onclick="incrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))">+</button>
                                            </div>
                                            <div class="button-group">
                                                <form action="{{ route('cart.add') }}" method="POST" style="margin-right: 5px;">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <button type="submit" class="order-button">Tambah ke
                                                        Keranjang</button>
                                                </form>
                                                <form action="{{ route('orders.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <input type="hidden" name="price" value="{{ $menu->harga }}">
                                                    <input type="hidden" name="quantity"
                                                        id="quantity_{{ $menu->id }}" value="1">
                                                    <button type="submit" class="order-button">Pesan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="menu-drinks">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>DRINKS</h3>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach($menus as $menu)
                            @if($menu->kategori == 'DRINKS')
                            <div class="col">
                                <div class="card h-100 menu-item">
                                    <a href="{{ asset('storage/menus/' . $menu->gambar) }}">
                                        <div class="menu-img-container">
                                            <img src="{{ asset('storage/menus/' . $menu->gambar) }}"
                                                class="card-img-top menu-img" alt="{{ $menu->nama }}">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $menu->nama }}</h5>
                                        <p class="card-text">{{ $menu->deskripsi }}</p>
                                       
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="quantity-control">
                                                <button type="button" class="quantity-button" data-action="decrease"
                                                    data-menu-id="{{ $menu->id }}"
                                                    data-category="{{ $menu->kategori }}" onclick="decrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))">-</button>
                                                <input type="number" class="quantity-input form-control" value="1"
                                                    min="1" id="{{ strtolower($menu->kategori) }}_{{ $menu->id }}"
                                                    name="quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1'); updateHiddenQuantity(this)">
                                                <button type="button" class="quantity-button" data-action="increase"
                                                    data-menu-id="{{ $menu->id }}"
                                                    data-category="{{ $menu->kategori }}" onclick="incrementQuantity(this.parentNode.querySelector('input[name=\'quantity\']'))">+</button>
                                            </div>
                                            <div class="button-group">
                                                <form action="{{ route('cart.add') }}" method="POST" style="margin-right: 5px;">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <button type="submit" class="order-button">Tambah ke
                                                        Keranjang</button>
                                                </form>
                                                <form action="{{ route('orders.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                    <input type="hidden" name="price" value="{{ $menu->harga }}">
                                                    <input type="hidden" name="quantity"
                                                        id="quantity_{{ $menu->id }}" value="1">
                                                    <button type="submit" class="order-button">Pesan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Menu Section -->
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="background-color: var(--white-color); color: var(--text-color);">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon" style="color: var(--primary-color);"></i>
                    <div class="address">
                        <h4>Address</h4>
                        <p>Jl. Patuan Nagari No.49, Ps. Porsea, Kec. Porsea, Toba, Sumatera Utara 22384</p>
                        <p></p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon" style="color: var(--primary-color);"></i>
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
                    <i class="bi bi-clock icon" style="color: var(--primary-color);"></i>
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
                        <a href="#" class="twitter" style="color: var(--primary-color);"><i
                                class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook" style="color: var(--primary-color);"><i
                                class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram" style="color: var(--primary-color);"><i
                                class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin" style="color: var(--primary-color);"><i
                                class="bi bi-linkedin"></i></a>
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
                <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
                <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

                <!-- Main JS File -->
                <script src="{{ asset('assets/js/main.js') }}"></script>

                <script>
                     document.addEventListener('DOMContentLoaded', function () {
                         const quantityButtons = document.querySelectorAll('.quantity-button');

                         quantityButtons.forEach(button => {
                            button.addEventListener('click', function () {
                                const action = this.dataset.action;
                                const menuId = this.dataset.menuId;
                                const category = this.dataset.category;
                                const quantityInputId = `${category.toLowerCase()}_${menuId}`;
                                const quantityInput = document.getElementById(quantityInputId);
                                let quantity = parseInt(quantityInput.value, 10); // Memastikan quantity adalah integer

                                if (action === 'increase') {
                                    quantity++;
                                } else if (action === 'decrease' && quantity > 1) {
                                    quantity--;
                                }

                                quantityInput.value = quantity;
                                updateHiddenQuantity(quantityInput); // Update hidden quantity input
                            });
                         });

                         // Mencegah non-angka dimasukkan dan update hidden quantity input
                         document.querySelectorAll('.quantity-input').forEach(input => {
                            input.addEventListener('input', function () {
                                this.value = this.value.replace(/[^0-9]/g, ''); // Hanya angka yang diperbolehkan
                                updateHiddenQuantity(this); // Update hidden quantity input
                            });
                         });

                         // Update hidden quantity input saat halaman pertama kali dimuat
                         document.querySelectorAll('.quantity-input').forEach(input => {
                             updateHiddenQuantity(input);
                         });
                    });

                    function incrementQuantity(input) {
                         let value = parseInt(input.value, 10);
                         value = isNaN(value) ? 1 : value + 1;
                         input.value = value;
                         updateHiddenQuantity(input); // Panggil fungsi update
                    }

                    function decrementQuantity(input) {
                         let value = parseInt(input.value, 10);
                         if (value > 1) {
                            value = value - 1;
                            input.value = value;
                            updateHiddenQuantity(input); // Panggil fungsi update
                         }
                    }

                    //Fungsi bantuan untuk update hidden input
                    function updateHiddenQuantity(input) {
                         const menuId = input.id.split('_')[1]; //Ambil menu id dari input id
                         const quantityHiddenInput = document.getElementById(`quantity_${menuId}`);
                         if (quantityHiddenInput) {
                             quantityHiddenInput.value = input.value; //Update dengan nilai baru
                         }
                    }
                </script>
</body>

</html>