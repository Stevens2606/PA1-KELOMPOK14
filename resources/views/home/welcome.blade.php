<!DOCTYPE html>
<html lang="en">

<head>
    <!-- open -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- close -->

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Quality Time Cafe</title>
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
        body {
            min-height: 100vh;
        }

        /* Style untuk pemisah section */
        .section-separator {
            padding: 30px 0;
            text-align: center;
            /* Pusatkan konten */
            position: relative;
            /* Untuk positioning elemen pseudo */
            overflow: hidden;
            /* Hide overflow untuk efek border */
        }

        .section-separator h2 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 0.5em;
            /* Space di bawah judul */
        }

        .section-separator p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 1em;
            /* Space di bawah deskripsi */
        }

        /* Tambahkan efek garis dengan pseudo-element */
        .section-separator::before,
        .section-separator::after {
            content: '';
            position: absolute;
            top: 50%;
            /* Tengah vertikal */
            width: 30%;
            border-bottom: 2px dashed #ccc;
            /* Ubah warna dan style border sesuai kebutuhan */
        }

        /* Posisikan pseudo-element di kiri dan kanan */
        .section-separator::before {
            left: 0;
        }

        .section-separator::after {
            right: 0;
        }

        /* Style untuk menghilangkan garis di tengah (opsional) */
        .section-separator span {
            background-color: #fff;
            /* Warna latar belakang yang sama dengan body */
            padding: 0 20px;
            /* Spasi di sekitar teks */
            position: relative;
            z-index: 1;
            /* Pastikan teks berada di atas garis */
        }

        /* Style untuk mempercantik peta */
        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            /* Proporsi aspek 16:9, sesuaikan jika perlu */
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
            border: 0;
        }

        /* Style untuk pesan error */
        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
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

        /* Tambahan CSS untuk Testimoni */
        .testimonial-card {
            border: 1px solid #eee;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            background-color: #fff;
        }

        .testimonial-card .stars {
            color: #ffc107;
            margin-bottom: 10px;
        }

        .testimonial-card p {
            font-style: italic;
            color: #555;
        }

        .testimonial-card .profile {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .testimonial-card .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .testimonial-card .profile h3 {
            font-size: 16px;
            margin-bottom: 0;
        }

        .testimonial-card .profile h4 {
            font-size: 14px;
            color: #777;
            margin-bottom: 0;
        }
    </style>


</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <h1 class="sitename">Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero section dark-background">

            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Selamat Datang Di <br>Quality Time</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Mari kita ciptakan waktu yang berkualitas dengan
                            keluarga, teman, pasangan di cafe&resto Quality Time</p>
                        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                            <a href="https://www.youtube.com/watch?v=Atr97iC4HFc"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{ asset('assets/img/cofe1.png') }}" class="hero-img.jpg-fluid animated" alt="">
                    </div>

                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Section Separator -->
        <div class="section-separator">
            <span>
                <h2>About Us</h2>
                <p>Discover the story behind Quality Time and our commitment to quality.</p>
            </span>
        </div>

        <!-- ======= About Section ======= -->
        <section id="about" class="about section">

            <div class="container">
                <div class="row gy-4 align-items-center">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid rounded shadow-lg"
                            alt="About Our Restaurant">
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">
                            <h3>Welcome to Quality Time Resto!</h3>
                            <p class="fst-italic lead">
                                Quality Time Resto is the perfect place to enjoy delicious dishes and create
                                precious moments
                                with your loved ones. We prioritize quality ingredients, friendly service, and a
                                comfortable
                                atmosphere.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-primary"></i> Guaranteed
                                    quality of ingredients.</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-primary"></i> Diverse
                                    menu with mouthwatering flavors.</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-primary"></i> Friendly
                                    and professional service.</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2 text-primary"></i> Comfortable
                                    atmosphere suitable for various events.</li>
                            </ul>

                            <p>
                                We believe that every dish is an experience. At Quality Time Resto, we strive to
                                provide an unforgettable experience for every customer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                <!-- Section Separator -->
        <div class="section-separator">
            <span>
                <h2>Our Menu</h2>
                <p>Explore the wide range of delicious options we offer.</p>
            </span>
        </div>

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
        
        <!-- Section Separator -->
        <div class="section-separator">
            <span>
                <h2>Testimonials</h2>
                <p>See what our satisfied customers have to say about Quality Time.</p>
            </span>
        </div>

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section dark-background">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Testimoni Pelanggan</h2>
                    <p>Apa Kata Mereka Tentang <span>Quality Time</span></p>
                </div>

                <div class="row">
                    @foreach($feedbacks as $testimoni)
                    <div class="col-lg-6">
                        <div class="testimonial-card">
                            <div class="stars">
                                @for($i = 0; $i < $testimoni->rating; $i++) <i class="bi bi-star-fill"></i>
                                    @endfor
                                    @for($i = $testimoni->rating; $i < 5; $i++) <i class="bi bi-star"></i>
                                        @endfor
                            </div>
                            <p>{{ $testimoni->isi }}</p>
                            <div class="profile">
                                @if($testimoni->jenis_kelamin == 'pria')
                                <img src="{{ asset('assets/img/pria.png') }}" alt="Foto {{ $testimoni->nama }}">
                                @elseif($testimoni->jenis_kelamin == 'wanita')
                                <img src="{{ asset('assets/img/wanita.png') }}" alt="Foto {{ $testimoni->nama }}">
                                @else
                                <img src="{{ asset('assets/img/testimonials/default_avatar.png') }}"
                                    alt="Foto {{ $testimoni->nama }}">
                                @endif
                                <h3 style="color: black;">{{ $testimoni->nama }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Formulir Tambah Testimoni (Statis) -->
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8">
                        
                    </div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- Section Separator -->
        <div class="section-separator">
            <span>
                <h2>Contact Us</h2>
                <p>Get in touch with us for inquiries and reservations.</p>
            </span>
        </div>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section dark-background">
            <div class="container">
                <div class="section-header">
                    <h2>Contact Us</h2>
                    <p>Need help? <span>Contact Us!</span></p>
                </div>

                <div class="row gy-4">
                    <!-- Google Maps -->
                    <div class="col-lg-6">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.1855594823637!2d99.15456507478052!3d2.445188997533752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031ff2d0e29dcfb%3A0xa06b380d9db2cf6c!2sQuality%20Time%20Cafe!5e0!3m2!1sid!2sid!4v1742575756925!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div><!-- End Google Maps -->

                    <div class="col-lg-6">
                        @if(count($contacts) > 0)
                        @foreach($contacts as $contact)
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-item d-flex align-items-center">
                                    <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                                    <div>
                                        <h3>Address</h3>
                                        <p>{{ $contact->address }}</p>
                                    </div>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex align-items-center">
                                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                                    <div>
                                        <h3>Call Us</h3>
                                        <p>{{ $contact->phone_number }}</p>
                                    </div>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex align-items-center">
                                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h3>Email Us</h3>
                                        <p>{{ $contact->email }}</p>
                                    </div>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex align-items-center">
                                    <i class="icon bi bi-clock flex-shrink-0"></i>
                                    <div>
                                        <h3>Opening Hours</h3>
                                        <p><strong>Mon-Sun:</strong> {{ $contact->opening_hours }}</p>
                                    </div>
                                </div>
                            </div><!-- End Info Item -->
                        </div>
                        @endforeach

                        <form id="contactForm" action="{{ route('contact.storePublic') }}" method="post"
                            class="php-email-form">
                            @csrf
                            <div class="row gy-3">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        value="{{ old('subject') }}" required>
                                    @error('subject')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                        required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form><!-- End Contact Form -->
                        @else
                        <div class="col-lg-6">
                            <p>No contact information available.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

        <!-- Section Separator -->
        <div class="section-separator">
            <span>
                <h2>Our Gallery</h2>
                <p>Check out some of the memorable moments at Quality Time.</p>
            </span>
        </div>

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section dark-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "centeredSlides": true,
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 0
                            },
                            "768": {
                                "slidesPerView": 3,
                                "spaceBetween": 20
                            },
                            "1200": {
                                "slidesPerView": 5,
                                "spaceBetween": 20
                            }
                        }
                    }
                    </script>
                    <div class="swiper-wrapper align-items-center">
                        @foreach($galeris as $galeri)
                        <div class="swiper-slide">
                            <a class="glightbox gallery-link" data-gallery="images-gallery"
                                href="{{ asset('storage/' . $galeri->gambar) }}"
                                data-description="{{ $galeri->judul }}">
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" class="img-fluid"
                                    alt="{{ $galeri->judul }}">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Gallery Section -->

        <!-- Modal untuk Foto Ulang Tahun -->
        <div class="modal fade" id="birthdayModal" tabindex="-1" aria-labelledby="birthdayModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="birthdayModalLabel">Foto Ulang Tahun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('assets/img/gallery/birthday.jpg') }}" class="img-fluid"
                            alt="Foto Ulang Tahun"> <!-- Ganti dengan path gambar ulang tahun Anda -->
                    </div>
                </div>
            </div>
        </div>

    </main>

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
    </footer>

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
            const testimoniForm = document.getElementById('testimoniForm');

            testimoniForm.addEventListener('submit', function(event) {
                @guest
                // Jika user belum login, alihkan ke halaman login
                event.preventDefault(); // Mencegah form dikirim
                window.location.href = "{{ route('login') }}";
                @else
                // Jika user sudah login, biarkan form dikirim seperti biasa
                @endguest
            });

            const galleryLinks = document.querySelectorAll('.gallery-link');
            const birthdayModal = new bootstrap.Modal(document.getElementById('birthdayModal'));

            galleryLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const description = this.dataset.description;

                    if (description && description.includes("Gambar 3")) {
                        birthdayModal.show();
                    } else {
                        // Buka dengan GLightbox
                        // Pastikan GLightbox telah diinisialisasi di sini, jika belum
                        if (typeof GLightbox !== 'undefined') { // Cek apakah GLightbox sudah ada
                            const lightbox = GLightbox({
                                href: this.href,
                                type: 'image',
                                gallery: 'images-gallery',
                            });
                            lightbox.open();
                        } else {
                            console.error("GLightbox belum diinisialisasi.");
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>