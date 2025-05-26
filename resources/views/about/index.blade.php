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
    <title>Quality Time</title>
    <meta name="description"
        content="Temukan momen berharga dan inspirasi untuk quality time bersama orang tersayang.">
    <meta name="keywords" content="quality time, keluarga, teman, momen berharga, aktivitas bersama">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        /* Variabel Warna (Konsisten dengan Halaman Order) */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --white-color: #fff;
            --table-row-color: #f2f2f2;
            /* Very Light Gray */
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

        /* Hero Section Styles */
        #hero {
            width: 100%;
            height: 80vh; /* Sesuaikan tinggi hero section */
            background: url("assets/img/hero-bg.jpg") top center; /* Ganti dengan gambar berkualitas tinggi */
            background-size: cover;
            position: relative;
            margin-bottom: 30px;
        }

        #hero .container {
            position: relative;
            z-index: 2;
        }

        #hero h1 {
            font-family: "Amatic SC", sans-serif;
            font-size: 64px;
            font-weight: 700;
            line-height: 72px;
            color: var(--white-color);
        }

        #hero p {
            color: var(--white-color);
            margin-bottom: 50px;
            font-size: 24px;
            font-family: "Inter", sans-serif;
        }

        #hero .btn-book-a-table {
            font-family: "Inter", sans-serif;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 12px 36px;
            border-radius: 50px;
            transition: 0.5s;
            color: var(--white-color);
            background: var(--primary-color);
        }

        #hero .btn-book-a-table:hover {
            background: var(--secondary-color);
        }

        #hero::before {
            content: "";
            background: rgba(0, 0, 0, 0.5); /* Overlay gelap */
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        /* About Section Styles */
        #about {
            padding: 50px 0;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: var(--white-color);
        }

        #about .section-title h2,
        #about .section-title p {
            color: var(--white-color);
            text-align: center;
        }

        #about .container {
            color: var(--text-color);
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        #about .book-a-table {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            color: var(--text-color);
        }

        #about .book-a-table h3 {
            color: var(--primary-color);
        }

        /* Menu Section Styles */
        #menu {
            padding: 60px 0;
            background: #f8f8f8;
        }

        #menu .menu-item {
            margin-bottom: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        #menu .menu-item img {
            border-radius: 10px 10px 0 0;
        }

        #menu .menu-item h4 {
            font-size: 20px;
            margin: 15px 0 5px 0;
            padding: 0;
            font-weight: 700;
            color: #555;
        }

        #menu .menu-item p {
            font-size: 15px;
            color: #777;
        }

        #menu .menu-item .price {
            font-size: 18px;
            color: #cda45e;
            font-weight: bold;
        }

        /* Gallery Section Styles */
        #gallery {
            padding: 60px 0;
        }

        #gallery .gallery-item {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        #gallery .gallery-item img {
            transition: transform 0.3s ease;
        }

        #gallery .gallery-item:hover img {
            transform: scale(1.1);
        }

        /* Testimonials Section Styles */
        #testimonials {
            padding: 60px 0;
            background: #f2f2f2;
        }

        #testimonials .testimonial-item {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            background: white;
            margin-bottom: 20px;
        }

        #testimonials .testimonial-item img {
            width: 100px;
            border-radius: 50%;
            margin: 0 auto 20px auto;
        }

        #testimonials .testimonial-item h4 {
            font-size: 18px;
            font-weight: bold;
            color: #555;
        }

        #testimonials .testimonial-item p {
            font-size: 16px;
            color: #777;
            font-style: italic;
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

        /* Gaya Tombol Video */
        .btn-watch-video {
            display: inline-block;
            position: relative;
            padding: 0;
            background-color: transparent;
            border: none;
            border-radius: 10px;
            box-shadow: none;
            overflow: hidden;
            width: 250px;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-watch-video:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .play-image {
            width: 100%;
            height: 100%;
            display: block;
            transition: transform 0.3s ease;
            object-fit: cover;
        }

        .btn-watch-video:hover .play-image {
            transform: scale(1.1);
        }

        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            color: white;
            opacity: 0.8;
            transition: opacity 0.3s ease;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .btn-watch-video:hover .play-icon {
            opacity: 1;
        }
    </style>

</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logo.png" alt="">
                <h1 class="sitename">Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')


        </div>
    </header><!-- End Header -->

    <main class="main">

        

        <!-- ======= About Section ======= -->
        <section id="about" class="about section">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>About Us<br></h2>
                    <p><span>Learn More</span> <span class="description-title">About Quality Time</span></p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        @if ($about && $about->image_path)
                        <img src="{{ asset('storage/' . $about->image_path) }}" class="img-fluid mb-4"
                            alt="Suasana quality time di kafe">
                        @else
                        <p>Tidak ada gambar yang tersedia.</p>
                        @endif
                        <div class="book-a-table">
                            <h3>Create Your Moment</h3>
                            <p>Temukan inspirasi untuk momen berharga Anda.</p>
                        </div>
                    </div>
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">

                            @if ($about && $about->content)
                            <p class="fst-italic">
                                {!! nl2br(e($about->content)) !!}
                            </p>
                            @else
                            <p>Tidak ada konten yang tersedia.</p>
                            @endif

                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Temukan ide aktivitas seru untuk quality
                                        time keluarga.</span>
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Inspirasi kencan romantis dan momen istimewa
                                        bersama
                                        pasangan.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Tips untuk menikmati waktu berkualitas bersama
                                        teman-teman
                                        terbaik.</span></li>
                            </ul>
                            <p>
                                Di Quality Time, kami hadir untuk membantu Anda merencanakan dan memaksimalkan setiap momen
                                berharga.
                                Jelajahi berbagai ide dan tips untuk menciptakan pengalaman yang tak terlupakan.
                            </p>

                            @if ($about && $about->video_url)
                            <div class="d-flex align-items-center justify-content-center" data-aos="fade-up"
                                data-aos-delay="200">
                                <a href="{{ $about->video_url }}" class="glightbox btn-watch-video">
                                    <img src="assets/img/OIP.jpg" alt="Watch Video" class="play-image">
                                    <div class="play-icon">
                                        <i class="bi bi-play-circle-fill"></i>
                                    </div>
                                </a>
                            </div>
                            @else
                            <p>Tidak ada video yang tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

       
       
                </div>

            </div>
        </section><!-- End Testimonials Section -->
    </main><!-- End #main -->
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
                            <strong>Email:</strong> <span>qualitytimecafe45@gmail.com
                            </span><br>
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
                        <a href="#" class="twitter" style="color: #000;"><i
                                class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook" style="color: #000;"><i
                                class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram" style="color: #000;"><i
                                class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin" style="color: #000;"><i
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
                                if (this.closest('.tab-pane').id === 'menu-food') {
                                    quantityInput = document.querySelector(`#food_${menuId}`);
                                } else if (this.closest('.tab-pane').id === 'menu-dimsum') {
                                    quantityInput = document.querySelector(`#dimsum_${menuId}`);
                                } else if (this.closest('.tab-pane').id === 'menu-snack') {
                                    quantityInput = document.querySelector(`#snack_${menuId}`);
                                } else if (this.closest('.tab-pane').id === 'menu-drinks') {
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