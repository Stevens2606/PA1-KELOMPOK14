<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Quality Time Cafe & Resto</title>
    <meta name="description"
        content="Temukan momen istimewa di Quality Time Cafe & Resto. Hidangan lezat, kopi nikmat, dan suasana yang tak terlupakan.">
    <meta name="keywords" content="cafe, resto, kopi, makanan, minuman, suasana, quality time">

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
        /* Variabel Warna (Konsisten dengan Halaman Gallery) */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --white-color: #fff;
        }

        /* Gaya Umum */
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

        /* Header */
        #header {
            background-color: var(--white-color);
            /* White */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            transition: all 0.5s ease;
        }

        #header.header-scrolled {
            background-color: var(--white-color);
            /* White */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .logo img {
            max-height: 40px;
            /* Sesuaikan ukuran logo */
        }

        .sitename {
            font-size: 1.8em;
            font-weight: 700;
            color: var(--text-color);
            /* Dark Gray */
            margin-left: 10px;
        }

        /* Navbar */
        .navbar a {
            font-size: 1.1em;
            color: var(--text-color);
            /* Dark Gray */
            padding: 10px 15px;
            transition: color 0.3s ease;
        }

        .navbar a:hover,
        .navbar .active {
            color: var(--primary-color);
        }

       /* Hero Section */
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
            background-color: rgba(0, 0, 0, 0.5); /* Warna hitam semi-transparan */
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


        /* Section Separator (About Section) */
        #about {
            padding: 80px 0;
            text-align: center;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            /* Gradien */
            color: var(--white-color);
            /* White */
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
            /* White */
            margin-bottom: 25px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        #about p {
            font-size: 1.1em;
            color: var(--text-color);
            /* Navy Blue */
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Menu Section */
        #menu {
            background-color: var(--light-gray);
            /* Light Gray */
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
            position: relative;
            background-color: var(--white-color);
            /* White background */
        }

        .menu-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.3);
        }

        .menu-item img {
            width: 100%;
            height: 250px;
            /* Sesuaikan tinggi gambar */
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
            /* Ukuran lebih kecil untuk responsivitas */
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .menu-item-details p {
            font-size: 1em;
            /* Ukuran lebih kecil untuk responsivitas */
            color: var(--text-color);
            line-height: 1.5;
        }

        /* Testimonial Section */
        #testimonials {
            background-color: var(--light-gray);
            /* Cream */
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

        .testimonial-card {
            border: none;
            padding: 40px;
            margin-bottom: 40px;
            border-radius: 25px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.2);
            background-color: var(--white-color);
            /* White */
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
            margin-bottom: 30px;
            font-size: 1.1em;
            line-height: 1.6;
        }

        .testimonial-card .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
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
        }

        /* Contact Section */
        #contact {
            background-color: var(--light-gray);
            /* Cream */
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

        /* Footer */
        #footer {
            background-color: var(--secondary-color);
            /* Dark Blue */
            color: var(--white-color);
            /* White */
            padding: 40px 0;
            text-align: center;
        }

        #footer h4 {
            font-size: 1.2em;
            margin-bottom: 15px;
            font-weight: 600;
            color: var(--white-color);
            /* White */
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

        /* Media Queries untuk Responsivitas */
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

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Quality Time Cafe Logo">
                <h1 class="sitename">Quality Time</h1>
                <span>.</span>
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
                        <h1 class="text-white">Selamat Datang di Quality Time</h1>
                        <p>Nikmati hidangan lezat dan kopi berkualitas tinggi dalam suasana yang nyaman dan penuh kehangatan. Jadikan setiap momen berharga di Quality Time.</p>
                        <a href="#menu" class="btn btn-primary">Jelajahi Menu Kami</a>
                    </div>
                </div>
            </div>
        </section><!-- End Hero Section -->

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="section">
            <div class="container">
                <h2>Menu Unggulan Kami</h2>
                <p>Sempurnakan momen bersantap Anda dengan pilihan menu unggulan yang kami racik dengan penuh dedikasi dan bahan-bahan terbaik.</p>

                <div class="row">
                    <!-- Contoh Menu Item -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="menu-item">
                            <img src="{{ asset('assets/img/menu/Cappucino .jpg') }}" alt="Cappucino">
                            <div class="menu-item-details">
                                <h3>Cappucino</h3>
                                <p>Kopi klasik Italia yang kaya dengan espresso, susu hangat, dan lapisan busa yang lembut. Nikmati kehangatan dan kelezatan dalam setiap tegukan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="menu-item">
                            <img src="{{ asset('assets/img/menu/nasi ayambakar.jpg') }}" alt="Nasi Ayam Bakar">
                            <div class="menu-item-details">
                                <h3>Nasi Ayam Bakar</h3>
                                <p>Nasi Ayam Bakar dengan cita rasa yang khas, diperkaya dengan bumbu rahasia Quality Time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="menu-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/menu/CaramelCoffeeJellyFrappucino.jpg') }}" alt="Caramel Coffee">
                                <div class="menu-item-details">
                                    <h3>Caramel Coffee</h3>
                                    <p>Nikmati Caramel Coffee Jelly Frappucino yang segar dan lezat. Kombinasi sempurna antara kopi, karamel, dan jelly yang menyegarkan.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Menu Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="section">
            <div class="container">
                <h2>Kata Mereka Tentang Kami</h2>
                <p>Simak pengalaman berkesan dari para pelanggan yang telah menikmati momen berharga di Quality Time Cafe & Resto.</p>

                <div class="row">
                    <!-- Contoh Testimonial Card -->
                    <div class="col-lg-4" data-aos="fade-up">
                        <div class="testimonial-card">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p>"Tempatnya nyaman, makanannya enak, dan pelayanannya ramah. Sangat recommended untuk quality time bersama keluarga!"</p>
                            <div class="profile">
                                <img src="https://via.placeholder.com/100" alt="Foto Profil Sarah">
                                <div>
                                    <h3>Sarah J</h3>
                                    <h4>Ibu Rumah Tangga</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-card">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <p>"Kopi di Quality Time Cafe selalu jadi andalan saya. Tempatnya juga asik banget buat kerja atau sekadar nongkrong santai."</p>
                            <div class="profile">
                                <img src="https://via.placeholder.com/100" alt="Foto Profil Michael">
                                <div>
                                    <h3>Michael L</h3>
                                    <h4>Freelancer</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-card">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <p>"Saya dan teman-teman sering banget ke sini. Makanannya enak, harganya terjangkau, dan suasananya bikin betah!"</p>
                            <div class="profile">
                                <img src="https://via.placeholder.com/100" alt="Foto Profil Emily">
                                <div>
                                    <h3>Emily K</h3>
                                    <h4>Mahasiswa</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan testimonial card lainnya di sini -->
                </div>
            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section">
            <div class="container">
                <h2>Hubungi Kami</h2>
                <p>Kami selalu senang mendengar dari Anda. Jangan ragu untuk menghubungi kami melalui formulir di bawah ini atau melalui informasi kontak yang tertera.</p>
                <!-- Form kontak dan informasi kontak lainnya -->
            </div>
        </section><!-- End Contact Section -->
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

    <!-- Script tambahan  -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
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
    </script>
</body>

</html>