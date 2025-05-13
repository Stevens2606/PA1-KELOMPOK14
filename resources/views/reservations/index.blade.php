<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Daftar Reservasi</title>
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
        /* Gaya tambahan yang diperlukan untuk order, disesuaikan agar serasi */
        :root {
            --primary-color: #3498db;
            --primary-color-darker: #2980b9;
            --light-gray: #f8f9fa;
            --text-color: #333;
            --dark-gray: #2C3E50;
            /* Warna abu-abu gelap untuk latar belakang */
        }

        body {
            background-color: var(--light-gray);
            /* Latar belakang luar body */
            min-height: 100vh;
            /* Menambahkan tinggi minimum untuk body */
        }

        .reservation-list {
            margin-top: 20px;
        }

        .reservation-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #ffffff;
            /* Warna latar belakang putih */
            color: #000000;
            /* Warna teks hitam */
        }

        .reservation-item h4 {
            margin-top: 0;
            color: #000000;
            /* Warna teks hitam */
        }

        .reservation-item p {
            margin-bottom: 5px;
            color: #000000;
            /* Warna teks hitam */
        }

        /* Menghapus dark-background dari section reservations */
        #reservations {
            background-color: var(--bs-body-color);
            /* Latar belakang seperti pada gambar */
            color: #ffffff;
            /* Teks putih */
            padding: 30px 0;
            min-height: calc(100vh - 150px);
            /* Sesuaikan 150px dengan perkiraan tinggi header + footer */
            display: flex;
            flex-direction: column; /* Menata elemen di dalam section secara vertikal */
        }

        #reservations .section-header h2,
        #reservations .section-header p {
            color: #ffffff;
            /* Teks putih pada judul */
        }

        /* Atur footer menjadi seperti gambar */
        #footer {
            background-color: var(--bs-body-color);
            /* Latar belakang gelap */
            color: #ffffff;
            /* Teks putih */
        }

        #footer h4,
        #footer p,
        #footer a {
            color: #ffffff;
            /* Teks putih pada footer */
        }

        /* Tombol action agar teks nya berwarna hitam */
        .action-buttons a,
        .action-buttons form button {
            color: #000000;
        }

        /* Flex grow untuk konten utama */
        .content {
            flex-grow: 1; /* Mengizinkan konten utama untuk mengisi ruang yang tersedia */
        }
    </style>

</head>

<body class="index-page">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <h1>Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')
        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Reservation Section ======= -->
        <section id="reservations" class="menu">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Daftar Reservasi</h2>
                    <p>Kelola <span>Reservasi</span></p>
                </div>

                <div class="text-center mb-3">
                    <a href="{{ route('reservations.create') }}" class="btn btn-primary">Buat Reservasi Baru</a>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- content container -->
                <div class="content">
                    @if(count($reservations) > 0)
                    <div class="reservation-list">
                        @foreach($reservations as $reservation)
                        <div class="reservation-item">
                            <h4>Reservasi #{{ $reservation->id }}</h4>
                            <p>Nama: {{ $reservation->name }}</p>
                            <p>Email: {{ $reservation->email }}</p>
                            <p>Telepon: {{ $reservation->phone }}</p>
                            <p>Waktu Reservasi: {{ $reservation->reservation_time->format('d-m-Y H:i') }}</p>
                            <p>Jumlah Tamu: {{ $reservation->number_of_guests }}</p>
                            <p>Status: {{ $reservation->status }}</p>

                            <div class="action-buttons">
                                <a href="{{ route('admin.reservations.show', $reservation->id) }}"
                                    class="btn btn-info btn-sm">Lihat</a>

                                @if ($reservation->status == 'pending')
                                <form action="{{ route('admin.reservations.confirm', $reservation->id) }}"
                                    method="POST" style="display: inline-block;">
                                    @csrf
                                </form>
                                @endif

                                @if ($reservation->status != 'cancelled')
                                <form action="{{ route('admin.reservations.cancel', $reservation->id) }}"
                                    method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin membatalkan reservasi ini?')">Batal</button>
                                </form>
                                @endif

                                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                    method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus reservasi ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-center">Tidak ada reservasi yang ditemukan.</p>
                    @endif
                </div>
                <!-- End content container -->
            </div>
        </section><!-- End Reservation Section -->
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

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>