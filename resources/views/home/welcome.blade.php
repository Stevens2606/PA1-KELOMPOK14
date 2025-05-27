<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality Time Cafe & Resto</title>
    <meta name="description" content="Temukan momen istimewa di Quality Time Cafe & Resto. Hidangan lezat, kopi nikmat, dan suasana yang tak terlupakan.">
    <meta name="keywords" content="cafe, resto, kopi, makanan, minuman, suasana, quality time">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS (Consider removing if already included in main.css) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Color Variables */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --white-color: #fff;
        }

        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background-color: var(--light-gray);
            color: var(--text-color);
            overflow-x: hidden;
            line-height: 1.6;
        }

        a {
            color: var(--secondary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--primary-color);
        }

        /* Header Styles */
        #header {
            background-color: var(--white-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            transition: all 0.5s ease;
        }

        #header.header-scrolled {
            background-color: var(--white-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .logo img {
            max-height: 40px;
        }

        .sitename {
            font-size: 1.8em;
            font-weight: 700;
            color: var(--text-color);
            margin-left: 10px;
        }

        /* Navbar Styles */
        .navbar a {
            font-size: 1.1em;
            color: var(--text-color);
            padding: 10px 15px;
            transition: color 0.3s ease;
        }

        .navbar a:hover,
        .navbar .active {
            color: var(--primary-color);
        }

        /* Hero Section Styles */
        #hero {
            background: url("{{ asset('assets/img/cafe.jpg') }}") center/cover no-repeat;
            color: var(--white-color);
            padding: 150px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        #hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        #hero .container {
            position: relative;
            z-index: 2;
        }

        #hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4.5em;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            letter-spacing: 1px;
        }

        #hero p {
            font-size: 1.2em;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            line-height: 1.6;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white-color);
            border: none;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 1em;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            color: var(--white-color);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        /* Section Separator Styles */
        .section-separator {
            padding: 30px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .section-separator h2 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 0.5em;
        }

        .section-separator p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 1em;
        }

        .section-separator::before,
        .section-separator::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            border-bottom: 2px dashed #ccc;
        }

        .section-separator::before {
            left: 0;
        }

        .section-separator::after {
            right: 0;
        }

        .section-separator span {
            background-color: #fff;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        /* About Section Styles */
        #about {
            padding: 80px 0;
            text-align: center;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: var(--white-color);
        }

        #about .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            color: var(--text-color);
        }

        #about h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3em;
            color: var(--white-color);
            margin-bottom: 25px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        #about p {
            font-size: 1.1em;
            color: var(--text-color);
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Menu Section Styles */
        #menu {
            background-color: var(--light-gray);
            padding: 80px 0;
        }

        #menu h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3em;
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 700;
            letter-spacing: 1px;
            text-align: center;
        }

        #menu p {
            font-size: 1.1em;
            color: var(--text-color);
            max-width: 900px;
            margin: 0 auto 35px;
            line-height: 1.6;
            text-align: center;
        }

        .menu-item {
            margin-bottom: 40px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: var(--white-color);
        }

        .menu-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.3);
        }

        .menu-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .menu-item:hover img {
            transform: scale(1.1);
        }

        .menu-item-details {
            padding: 30px;
            text-align: center;
        }

        .menu-item-details h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8em;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .menu-item-details p {
            font-size: 1em;
            color: var(--text-color);
            line-height: 1.5;
        }

        .menu-item .order-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .menu-item .order-button:hover {
            background-color: #3e8e41;
        }

        /* Testimonial Section Styles */
        #testimonials {
            background-color: var(--light-gray);
            padding: 80px 0;
            text-align: center;
        }

        #testimonials h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3em;
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        #testimonials p {
            font-size: 1.1em;
            color: var(--text-color);
            max-width: 900px;
            margin: 0 auto 35px;
            line-height: 1.6;
        }

        /* Testimonial Card Styles */
        .testimonial-card {
            border: none;
            padding: 40px;
            margin-bottom: 40px;
            border-radius: 25px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.2);
            background-color: var(--white-color);
            text-align: center;
            transition: all 0.4s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
        }

        .testimonial-card .stars {
            color: #f39c12;
            margin-bottom: 20px;
            font-size: 1.1em;
        }

        .testimonial-card p {
            font-style: italic;
            color: #555;
        }

        .testimonial-card .profile {
            display: flex;
            align-items: center;
            margin-top: 30px;
            font-size: 1.1em;
            line-height: 1.6;
        }

        .testimonial-card .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px;
            object-fit: cover;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .testimonial-card .profile h3 {
            font-size: 1.3em;
            margin-bottom: 6px;
            font-weight: 600;
            color: var(--text-color);
        }

        .testimonial-card .profile h4 {
            font-size: 0.9em;
            color: #777;
            margin-bottom: 0;
        }

        /* Contact Section Styles */
        #contact {
            background-color: var(--light-gray);
            padding: 80px 0;
            text-align: center;
        }

        #contact h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3em;
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        #contact p {
            font-size: 1.1em;
            color: var(--text-color);
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Map Styles */
        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
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

        /* Error Message Styles */
        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }

        /* Footer Styles */
        #footer {
            background-color: var(--secondary-color);
            color: var(--white-color);
            padding: 40px 0;
            text-align: center;
        }

        #footer h4 {
            font-size: 1.2em;
            margin-bottom: 15px;
            font-weight: 600;
            color: var(--white-color);
        }

        #footer p {
            font-size: 1em;
            line-height: 1.5;
        }

        #footer .social-links a {
            font-size: 1.2em;
            color: var(--white-color);
            margin: 0 8px;
            transition: color 0.3s ease;
        }

        #footer .social-links a:hover {
            color: var(--primary-color);
        }

        /* Quantity Styles */
        .quantity-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .quantity-label {
            margin-right: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .button-group .order-button {
            margin: 0 5px;
        }

        .quantity-input {
            width: 50px;
            padding: 5px;
            text-align: center;
        }

        /* Gallery Section Styles */
        #gallery {
            background-color: var(--light-gray);
            padding: 80px 0;
            text-align: center;
        }

        #gallery h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3em;
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        #gallery p {
            font-size: 1.1em;
            color: var(--text-color);
            max-width: 900px;
            margin: 0 auto 35px;
            line-height: 1.6;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            #hero h1 {
                font-size: 3.5em;
            }

            #hero p {
                font-size: 1.1em;
            }

            #about h2 {
                font-size: 2.5em;
            }

            .section-separator h2 {
                font-size: 2.5em;
            }

            .menu-item img {
                height: 200px;
            }

            .testimonial-card {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            #hero h1 {
                font-size: 3em;
            }

            #hero p {
                font-size: 1em;
            }

            .menu-item img {
                height: 180px;
            }
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Quality Time Cafe Logo">
                <h1 class="sitename">Quality Time</h1>
            </a>

            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1>Selamat Datang di Quality Time</h1>
                        <p>Nikmati hidangan lezat dan kopi berkualitas tinggi dalam suasana yang nyaman dan penuh kehangatan. Jadikan setiap momen berharga di Quality Time.</p>
                        <a href="#menu" class="btn btn-primary">Jelajahi Menu Kami</a>
                    </div>
                </div>
            </div>
        </section><!-- End Hero Section -->

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu py-5">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold" style="color: var(--primary-color);">Menu Unggulan Kami</h2>
                <p class="text-center lead mb-5 text-muted">Sempurnakan momen bersantap Anda dengan pilihan menu unggulan yang kami racik dengan penuh dedikasi dan bahan-bahan terbaik.</p>

                <div class="row">
                    @php
                    $count = 0;
                    @endphp
                    @foreach($menus as $menu)
                        @if($count < 3)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card menu-item h-100 border-0 shadow" style="transition: all 0.3s ease;">
                                    <div class="overflow-hidden" style="border-radius: 15px;">
                                        <img src="{{ asset('storage/menus/' . $menu->gambar) }}" class="card-img-top" alt="{{ $menu->nama }}" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">{{ $menu->nama }}</h5>
                                        <p class="card-text text-muted flex-grow-1">{{ $menu->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                            @php
                            $count++;
                            @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </section><!-- End Menu Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="py-5" style="background-color: #f8f9fa;">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold" style="color: var(--primary-color);">Kata Mereka Tentang Kami</h2>
                <p class="text-center lead mb-5 text-muted">Simak pengalaman berkesan dari para pelanggan yang telah menikmati momen berharga di Quality Time Cafe & Resto.</p>

                <div class="row">
                    @foreach($feedbacks->take(3) as $testimoni)
                        <div class="col-lg-4 mb-4">
                            <div class="card testimonial-card h-100 border-0 shadow" style="border-radius: 15px; transition: all 0.3s ease;">
                                <div class="card-body d-flex flex-column">
                                    <div class="stars text-center mb-3" style="color: #f39c12;">
                                        @for($i = 0; $i < $testimoni->rating; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        @for($i = $testimoni->rating; $i < 5; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                    </div>
                                    <p class="card-text text-muted flex-grow-1" style="font-style: italic;">"{{ $testimoni->isi }}"</p>
                                    <hr>
                                    <div class="profile mt-3 d-flex align-items-center">
                                        @if($testimoni->jenis_kelamin == 'pria')
                                            <img src="{{ asset('assets/img/pria.png') }}" alt="Foto {{ $testimoni->nama }}" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        @elseif($testimoni->jenis_kelamin == 'wanita')
                                            <img src="{{ asset('assets/img/wanita.png') }}" alt="Foto {{ $testimoni->nama }}" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('assets/img/testimonials/default_avatar.png') }}" alt="Foto {{ $testimoni->nama }}" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h5 class="mb-1 fw-bold">{{ $testimoni->nama }}</h5>
                                            <small class="text-muted">Pelanggan Setia</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Testimonials Section -->

    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="background-color: var(--white-color); color: #000;">
        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon" style="color: #000;"></i>
                    <div class="address">
                        <h4>Address</h4>
                        <p style="color: #000;">Jl. Patuan Nagari No.49, Ps. Porsea, Kec. Porsea, Toba, Sumatera Utara 22384</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon" style="color: #000;"></i>
                    <div>
                        <h4>Contact</h4>
                        <p style="color: #000;">
                            <strong>Phone:</strong> <span>+62 822-7378-2156</span><br>
                            <strong>Email:</strong> <span>qualitytimecafe45@gmail.com</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon" style="color: #000;"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p style="color: #000;">
                            <strong>Mon-Sun:</strong> <span>10 am - 11pm</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter" style="color: #000;"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook" style="color: #000;"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram" style="color: #000;"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin" style="color: #000;"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Bootstrap JS (Consider removing if already included in main.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>