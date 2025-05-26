<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Gallery - Quality Time</title>
    <meta name="description" content="Galeri foto Quality Time Cafe & Resto.">
    <meta name="keywords" content="galeri, foto, Quality Time, cafe, resto">

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
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
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
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --white-color: #fff;
        }

        /* General Body Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
            line-height: 1.7;
            margin: 0;
            padding: 0;
        }

        /* Header Styles (Putih) */
        #header {
            background-color: var(--white-color);
            color: var(--text-color);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        #header .logo h1 {
            color: var(--text-color);
            font-family: 'Playfair Display', serif;
            font-size: 2.5em;
            margin: 0;
        }

        #header .logo img {
            margin-right: 10px;
        }

        #header .navbar a,
        #header .navbar a:focus {
            color: var(--text-color);
            transition: color 0.3s ease;
        }

        #header .navbar a:hover,
        #header .navbar .active,
        #header .navbar .active:focus,
        #header .navbar li:hover>a {
            color: var(--primary-color);
        }

        /* Hero Section Styles (Disesuaikan) */
        #hero {
            position: relative;
            width: 100%;
            height: 600px;
            background: url('{{ asset('assets/img/hero-bg.jpg') }}') center/cover no-repeat; /* Pastikan path benar */
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white-color); /* Teks Putih */
            padding: 20px;
        }

        #hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay Hitam */
            z-index: 1;
        }

        #hero .hero-content {
            position: relative;
            z-index: 2;
        }

        #hero h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5em;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        #hero p {
            font-size: 1.4em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
            margin-bottom: 30px;
        }

        #hero .btn-primary {
            font-size: 1.3em;
            padding: 15px 35px;
            background-color: var(--primary-color);
            border: none;
            border-radius: 5px;
            color: var(--white-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #hero .btn-primary:hover {
            background-color: var(--white-color);
            color: var(--secondary-color);
        }

        /* Gallery Section Styles (Disesuaikan agar Serasi) */
        #gallery {
            padding: 50px 0;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: var(--white-color);
        }

        #gallery .section-title h2,
        #gallery .section-title p {
            color: var(--white-color);
            text-align: center;
        }

        /* Gallery Grid Styles (Menggunakan Gaya "reservation-item") */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            padding: 0 20px;
            margin-top: 30px;
        }

        .gallery-item {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            color: var(--text-color);
        }

        .gallery-item:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
            filter: grayscale(50%) sepia(30%);
        }

        .gallery-item-details {
            padding: 25px;
            text-align: left;
        }

        .gallery-item-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.7em;
            color: var(--primary-color);
            margin-bottom: 10px;
            text-align: left;
        }

        .gallery-item-description {
            font-size: 1em;
            color: var(--text-color);
            margin-top: 10px;
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

        /* Modal Styles (Lightbox) */
        .modal-dialog {
            max-width: 800px;
            margin: 30px auto;
        }

        .modal-content {
            border-radius: 15px;
            overflow: hidden;
        }

        .modal-body {
            padding: 0;
        }

        .modal-body img {
            width: 100%;
            display: block;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #hero h2 {
                font-size: 2.5em;
            }

            #hero p {
                font-size: 1.1em;
            }

            #gallery .section-title h2 {
                font-size: 2.5em;
            }

            #gallery .section-title p {
                font-size: 1em;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .gallery-item {
                width: 100%;
                margin: 15px 0;
            }

            .gallery-item img {
                height: 200px;
            }
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Quality Time Cafe Logo">
                <h1 class="sitename">Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero">
            <div class="hero-content">
                <h2>Abadikan Setiap Momen Berharga</h2>
                <p>Jelajahi galeri kami dan temukan inspirasi untuk momen quality time Anda berikutnya.</p>
                <a href="#gallery" class="btn btn-primary">Lihat Galeri</a>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Our Gallery</h2>
                    <p><span>Explore</span> Momen Terbaik Kami</p>
                </div>

                <div class="gallery-grid">
                    @foreach($galeris as $galeri)
                    <div class="gallery-item" data-aos="fade-up" data-bs-toggle="modal"
                        data-bs-target="#galleryModal{{ $galeri->id }}">
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" class="img-fluid"
                            alt="{{ $galeri->judul }}">
                        <div class="gallery-item-details">
                            <h3 class="gallery-item-title">{{ $galeri->judul }}</h3>
                            <p class="gallery-item-description">{{ $galeri->deskripsi }}</p>
                        </div>
                    </div>

                    <!-- Modal for each gallery item -->
                    <div class="modal fade" id="galleryModal{{ $galeri->id }}" tabindex="-1"
                        aria-labelledby="galleryModalLabel{{ $galeri->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('storage/' . $galeri->gambar) }}" class="img-fluid"
                                        alt="{{ $galeri->judul }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
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
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Fungsi untuk menangani scrolling header
            const header = document.getElementById('header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    header.classList.add('header-scrolled');
                } else {
                    header.classList.remove('header-scrolled');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const heroBtn = document.querySelector('#hero .btn-primary');

            heroBtn.addEventListener('click', function (e) {
                e.preventDefault();
                const gallerySection = document.getElementById('gallery');

                gallerySection.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

</body>

</html>