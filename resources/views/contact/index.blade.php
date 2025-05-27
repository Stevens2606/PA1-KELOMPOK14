<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Contact Us - Quality Time Cafe & Resto</title>
    <meta name="description" content="Contact Quality Time Cafe & Resto for reservations, inquiries, and feedback.">
    <meta name="keywords" content="contact, cafe, restaurant, reservation, inquiries, feedback">

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
        /* Variabel Warna */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
            min-height: 100vh;
        }

        /* Style untuk mempercantik peta */
        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            /* Proporsi aspek 16:9, sesuaikan jika perlu */
            position: relative;
            height: 0;
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            transition: transform 0.3s ease;
        }

        .map-responsive:hover {
            transform: scale(1.03);
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
            border: 0;
            border-radius: 15px;
        }

        /* Style untuk pesan error */
        .error-message {
            color: #e74c3c;
            font-size: 0.9em;
            margin-top: 5px;
        }

        /* Style untuk Contact Section */
        #contact {
            background-color: #87CEEB;
            /* Sky Blue */
            padding: 50px 0;
        }

        #contact .info-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        #contact .info-item {
            margin-bottom: 15px;
        }

        #contact .info-item .bi {
            color: #DC143C;
            /* Crimson */
            font-size: 24px;
            margin-right: 10px;
        }

        #contact .info-item h3 {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 5px;
        }

        #contact .info-item p {
            font-size: 0.9em;
            color: #555;
        }

        /* Style untuk Formulir */
        #contact .php-email-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        #contact .php-email-form .form-group {
            margin-bottom: 20px;
        }

        #contact .php-email-form .form-control {
            border-radius: 5px;
            padding: 10px;
            font-size: 0.9em;
            color: #333;
            border: 1px solid #ccc;
        }

        #contact .php-email-form textarea.form-control {
            height: 120px;
        }

        /* Tombol */
        #contact .php-email-form button[type="submit"] {
            background-color: #DC143C;
            /* Crimson */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
        }

        /* Responsif */
        @media (max-width: 768px) {
            #contact {
                padding: 30px 0;
            }

            #contact .info-item h3 {
                font-size: 1em;
            }

            #contact .info-item p {
                font-size: 0.8em;
            }
        }

        /* Style tambahan untuk membuat lebih menarik */
        #contact .section-header h2 {
            font-family: 'Amatic SC', cursive;
            font-size: 4em;
        }

        #contact .php-email-form button[type="submit"] {
            position: relative;
            overflow: hidden;
        }

        #contact .php-email-form button[type="submit"]:after {
            content: '\f1d8';
            font-family: 'bootstrap-icons';
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: all 0.3s ease;
        }

        #contact .php-email-form button[type="submit"]:hover:after {
            opacity: 1;
            right: 10px;
        }

        /* Tambahan style untuk tata letak yang lebih baik pada layar kecil */
        @media (max-width: 576px) {
            .map-responsive {
                padding-bottom: 75%;
            }

            .col-lg-6 {
                margin-bottom: 30px;
            }
        }

        /* Style untuk pesan keberhasilan */
        .success-message {
            color: #28a745;
            font-size: 1em;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Quality Time Cafe & Resto Logo">
                <h1 class="sitename">Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.1855594823637!2d99.15456507478052!3d2.445188997533752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031ff2d0e29dcfb%3A0xa06b380d9db2cf6c!2sQuality%20Time%20Cafe!5e0!3m2!1sid!2sid!4v1742575756925!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="info-container">
                            <div class="info-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>
                                        <h3>Our Address</h3>
                                        <p>Jl. Patuan Nagari No.49, Ps. Porsea, Kec. Porsea, Toba, Sumatera Utara 22384</p>
                                    </div>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone"></i>
                                    <div>
                                        <h3>Give Us a Call</h3>
                                        <p>085358599959</p>
                                    </div>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope"></i>
                                    <div>
                                        <h3>Send Us an Email</h3>
                                        <p>admin@example.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <div>
                                        <h3>We're Open</h3>
                                        <p>Mon-Sun: 10 AM - 11 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <form id="contactForm" action="{{ route('contact.storePublic') }}" method="post" class="php-email-form">
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

                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 form-group">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <!-- Pesan Keberhasilan (Awalnya Tersembunyi) -->
                                    <div class="sent-message" style="display:none;">Pesan Anda telah dikirim. Terima kasih!</div>
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->
    </main>

        <footer id="footer" class="footer" style="background-color: var(--white-color); color: var(--text-color);">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon" style="color: var(--primary-color);"></i>
                    <div class="address">
                        <h4 class="text-dark">Address</h4>
                        <p>Jl. Patuan Nagari No.49, Ps. Porsea, Kec. Porsea, Toba, Sumatera Utara 22384</p>
                        <p></p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon" style="color: var(--primary-color);"></i>
                    <div>
                        <h4 class="text-dark">Contact</h4>
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
                        <h4 class="text-dark">Opening Hours</h4>
                        <p>
                            <strong>Mon-Sun:</strong> <span>10 am - 11pm</span><br>

                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-dark">Follow Us</h4>
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

        </footer>
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