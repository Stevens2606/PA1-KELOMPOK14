<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <style>
        body {
            background-image: url('{{ asset('assets/img/cafe.jpg') }}');
            /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            /* Memastikan gambar latar memenuhi seluruh layar */
            display: flex;
            align-items: center;
            /* Vertikal center */
            justify-content: center;
            /* Horizontal center */
            color: #fff;
            /* Text color for dark mode */
        }

        .register-box {
            width: 400px;
            /* Lebar container */
            max-width: 90%;
            /* Agar responsif di layar kecil */
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Vertikal center content di dalam container */
        }

        .card-outline {
            background-color: rgba(34, 49, 63, 0.8);
            /* Dark background */
            border: none;
            /* Hilangkan border */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
            /* Efek bayangan lebih kuat */
            border-radius: 15px;
            /* Tambahkan border-radius untuk sudut yang lebih lembut */
            padding: 40px;
            /* Tambahkan padding di dalam card */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-outline:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.7);
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
            padding-bottom: 30px;
            /* Tambahkan padding di bawah header */
            text-align: center;
        }

        .login-box-msg {
            color: #fff;
            /* Warna teks lebih terang */
            font-size: 1.3em;
            /* Perbesar ukuran font pesan */
            margin-bottom: 30px;
            /* Tambahkan margin di bawah pesan */
            font-weight: 500;
        }

        /* Gaya tambahan untuk input dan tombol */
        .form-control {
            font-size: 1.1em;
            padding: 0.75rem 1rem;
            border-radius: 7px;
            background-color: rgba(52, 73, 94, 0.5);
            /* Dark input background */
            color: #fff;
            border: none;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .btn-primary {
            font-size: 1.2em;
            padding: 0.75rem 1.5rem;
            border-radius: 7px;
            width: 100%;
            /* Membuat tombol memenuhi lebar kolom */
            background-color: #3498db;
            /* Light blue button */
            border-color: #3498db;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            /* Darker blue on hover */
            border-color: #2980b9;
        }

        /* Tambahan: Style untuk tautan login */
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 1.1em;
        }

        .login-link a {
            color: #3498db;
            font-weight: 500;
        }

        /* Style untuk icon mata */
        #togglePassword {
            cursor: pointer;
            color: #fff;
        }

        .input-group-text {
            background-color: transparent;
            border: none;
            color: #fff;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-dark">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="120px"><br>
                    <b>Quality Time</b>
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Buat Akun Baru</p>

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye" id="togglePassword"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Konfirmasi Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                    </div>
                </form>

                <p class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
                this.classList.toggle('fa-eye-slash');
            } else {
                password.type = 'password';
                this.classList.toggle('fa-eye-slash');
            }
        });
    </script>
</body>

</html>