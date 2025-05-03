<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Buat Reservasi Baru</title>
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
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.js') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        /* Gaya tambahan yang diperlukan untuk form reservasi, disesuaikan agar serasi */
        .reservation-form {
            margin-top: 20px;
        }

        .reservation-form .form-group {
            margin-bottom: 15px;
        }

        .reservation-form .form-label {
            font-weight: bold;
            color: #fff; /* Warna teks putih */
        }

        .reservation-form .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #333; /* Latar belakang gelap */
            color: #fff; /* Warna teks putih */
        }

        .reservation-form .btn-primary,
        .reservation-form .btn-secondary {
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
        <!-- ======= Reservation Section ======= -->
        <section id="reservations" class="menu dark-background">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Buat Reservasi Baru</h2>
                    <p>Isi Form <span>Reservasi</span></p>
                </div>

                <form action="{{ route('reservations.store') }}" method="POST" class="reservation-form">
                    @csrf

                    <!-- ID (Otomatis, tidak perlu diisi user) -->
                    <!-- Status (Otomatis, default "pending") -->
                    <!-- Aksi (Ditentukan oleh sistem atau admin) -->

                    <div class="form-group">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Telepon:</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="reservation_time" class="form-label">Waktu Reservasi:</label>
                        <input type="datetime-local" class="form-control" id="reservation_time"
                            name="reservation_time" value="{{ old('reservation_time') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="number_of_guests" class="form-label">Jumlah Tamu:</label>
                        <input type="number" class="form-control" id="number_of_guests"
                            name="number_of_guests" value="{{ old('number_of_guests') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="notes" class="form-label">Catatan:</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </section><!-- End Reservation Section -->
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

</body>

</html>