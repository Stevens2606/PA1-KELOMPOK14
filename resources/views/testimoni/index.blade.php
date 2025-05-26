<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Testimoni Pelanggan - Quality Time</title>
    <meta name="description" content="Testimoni dari pelanggan setia Quality Time">
    <meta name="keywords" content="testimoni, pelanggan, ulasan, Quality Time">

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

    <!-- Custom CSS for Testimonials -->
    <style>
        /* Variabel Warna (Konsisten dengan Halaman Lain) */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --white-color: #fff;
            --accent-color: #ffc107; /* Warna kuning untuk bintang */
        }

        /* General Body Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
            line-height: 1.6;
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

        /* Testimonials Section Styles (Disesuaikan agar Serasi) */
        #testimonials {
            padding: 50px 0;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: var(--white-color);
        }

        #testimonials .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        #testimonials .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8em;
            color: var(--white-color); /* Menggunakan warna putih */
            margin-bottom: 15px;
        }

        #testimonials .section-header p {
            font-size: 1.2em;
            color: var(--white-color); /* Menggunakan warna putih */
        }

        /* Testimonial Card Styles */
        .testimonial-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .testimonial-card .stars {
            color: var(--accent-color);
            font-size: 1.3em;
            margin-bottom: 15px;
        }

        .testimonial-card p {
            font-style: italic;
            font-size: 1.1em;
            color: var(--text-color);
            margin-bottom: 25px;
        }

        .testimonial-card .profile {
            display: flex;
            align-items: center;
        }

        .testimonial-card .profile img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .testimonial-card .profile div h3 {
            font-size: 1.4em;
            font-weight: 600;
            color: var(--primary-color); /* Menggunakan warna primary */
            margin-bottom: 5px;
        }

        .testimonial-card .profile div h4 {
            font-size: 1.1em;
            color: #777;
            margin-bottom: 0;
        }

        /* Style untuk icon bintang */
        .stars {
            color: var(--accent-color);
            /* Warna kuning untuk bintang */
        }

        /* Testimonial Form Styles */
        .testimoni-form {
            background-color: var(--white-color);
            border-radius: 15px;
            box-shadow: var(--box-shadow);
            padding: 30px;
        }

        .testimoni-form h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2em;
            color: var(--primary-color); /* Menggunakan warna primary */
            margin-bottom: 25px;
            text-align: center;
        }

        .testimoni-form .form-label {
            font-weight: 500;
            color: var(--text-color);
        }

        .testimoni-form .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 1em;
            border: 1px solid #ced4da;
            transition: border-color 0.2s ease-in-out;
        }

        .testimoni-form .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .testimoni-form .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
            padding: 12px 30px;
            font-size: 1.1em;
            border-radius: 8px;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        .testimoni-form .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .testimoni-form .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .testimoni-form .form-check-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #hero h2 {
                font-size: 2.5em;
            }

            #hero p {
                font-size: 1.1em;
            }

            #testimonials .section-header h2 {
                font-size: 2.2em;
            }

            #testimonials .section-header p {
                font-size: 1em;
            }

            .testimonials .testimonial-card p {
                font-size: 1em;
            }

            .testimonials .testimonial-card .profile img {
                width: 60px;
                height: 60px;
            }

            .testimonials .testimonial-card .profile div h3 {
                font-size: 1.2em;
            }

            .testimonials .testimonial-card .profile div h4 {
                font-size: 1em;
            }

            .testimoni-form h3 {
                font-size: 1.7em;
            }
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Quality Time Logo">
                <h1 class="sitename">Quality Time</h1>
                <span>.</span>
            </a>

            @include('layouts.navbar')
        </div>
    </header>

    <main class="main">
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Testimoni Pelanggan</h2>
                    <p>Apa Kata Mereka Tentang <span>Quality Time</span></p>
                </div>

                <div class="row">
                    @foreach ($testimonis as $testimoni)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="testimonial-card">
                                <div class="stars">
                                    @for ($i = 0; $i < $testimoni->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </div>
                                <p>{{ $testimoni->isi }}</p>
                                <div class="profile">
                                    @if ($testimoni->jenis_kelamin == 'pria')
                                        <img src="{{ asset('assets/img/pria.png') }}" alt="Foto Profil Pria">
                                    @elseif ($testimoni->jenis_kelamin == 'wanita')
                                        <img src="{{ asset('assets/img/wanita.png') }}" alt="Foto Profil Wanita">
                                    @else
                                        <img src="{{ asset('assets/img/default-profile.png') }}" alt="Foto Profil">
                                    @endif
                                    <div>
                                        <h3>{{ $testimoni->nama }}</h3>
                                        <h4>{{ $testimoni->jenis_kelamin }}</h4>
                                    </div>
                                </div>
                                @auth
                                    <div class="actions">
                                        <a href="{{ route('admin.testimoni.edit', $testimoni->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $testimoni->id }}">Hapus</button>
                                    </div>
                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="deleteModal{{ $testimoni->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $testimoni->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteModalLabel{{ $testimoni->id }}">Konfirmasi
                                                        Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus testimoni dari
                                                    {{ $testimoni->nama }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('admin.testimoni.destroy', $testimoni->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>

                   <!-- Formulir Tambah Testimoni -->
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8" data-aos="fade-up">
                        <div id="testimoniForm" class="testimoni-form">
                            <h3>Tambahkan Testimoni Anda</h3>
                            <form action="{{ route('testimoni.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Anda</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ old('nama') }}" required placeholder="Masukkan nama Anda">
                                </div>
                                <div class="mb-3">
                                    <label for="isi" class="form-label">Testimoni Anda</label>
                                    <textarea class="form-control" id="isi" name="isi" rows="4" required
                                        placeholder="Tuliskan testimoni Anda di sini">{{ old('isi') }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" style="color: #000;">Rating</label>
                                    <div class="d-flex">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rating"
                                                    id="rating{{ $i }}" value="{{ $i }}" required
                                                    {{ old('rating', 5) == $i ? 'checked' : '' }}>
                                                <label class="form-check-label" for="rating{{ $i }}" style="color: #000;">{{ $i }}
                                                    Bintang</label>
                                            </div>
                                        @endfor
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" style="color: #000;">Jenis Kelamin</label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="pria" value="pria"
                                                {{ old('jenis_kelamin') == 'pria' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="pria"  style="color: #000;">Pria</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="wanita" value="wanita"
                                                {{ old('jenis_kelamin') == 'wanita' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="wanita"  style="color: #000;">Wanita</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
                            </form>
                        </div>
                    </div>
                </div>
        </section><!-- End Testimonials Section -->
    </main>

        <!-- Footer -->
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
    </body>

    </html> 