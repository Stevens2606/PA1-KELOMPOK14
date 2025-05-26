<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

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
            color: #fff; /* Text color for dark mode */
        }

        .login-box {
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

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me label {
            margin-left: 7px;
            font-size: 1.1em;
        }

        /* Tambahan: Style untuk tautan lupa password */
        .forgot-password {
            text-align: center;
            margin-top: 15px;
            font-size: 1.1em;
        }

        .forgot-password a {
            color: #3498db;
        }

        /* Tambahan: Style untuk tautan daftar */
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 1.1em;
        }

        .register-link a {
            color: #3498db;
            font-weight: 500;
        }

        /* Tambahan: style untuk icon mata */
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

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="card card-outline card-dark">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="120px"><br>
                    <b>Quality Time</b>
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masuk ke akun Anda</p>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required autofocus>
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

                    <div class="remember-me">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="forgot-password">
                    <a href="#">Lupa Password?</a>
                </p>

                <p class="register-link">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
        });
    </script>

</body>

</html>