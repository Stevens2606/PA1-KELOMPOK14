<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <style>
        body {
            background-image: url('{{ asset('assets/img/about.jpg') }}'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Memastikan gambar latar memenuhi seluruh layar */
            display: flex;
            align-items: center; /* Vertikal center */
            justify-content: center; /* Horizontal center */
        }

        .login-box {
            width: 400px; /* Lebar container */
            max-width: 90%; /* Agar responsif di layar kecil */
            min-height: 550px; /* Tinggi container */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Vertikal center content di dalam container */
        }

        .card-outline {
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang putih semi-transparan untuk card */
            border: none; /* Hilangkan border */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Efek bayangan */
            border-radius: 10px; /* Tambahkan border-radius untuk sudut yang lebih lembut */
            padding: 30px; /* Tambahkan padding di dalam card */
            min-height: 500px; /* Tinggi card */
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
            padding-bottom: 20px; /* Tambahkan padding di bawah header */
        }

        .login-box-msg {
            color: #343a40; /* Warna teks lebih gelap */
            font-size: 1.2em; /* Perbesar ukuran font pesan */
            margin-bottom: 30px; /* Tambahkan margin di bawah pesan */
        }

        /* Gaya tambahan untuk input dan tombol */
        .form-control {
            font-size: 1.1em;
            padding: 0.75rem 1rem;
        }

        .btn-primary {
            font-size: 1.2em;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            width: 100%; /* Membuat tombol memenuhi lebar kolom */
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me label {
            margin-left: 5px;
        }
    </style>

</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="card card-outline card-dark">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="100px"><br>
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
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-eye" id="togglePassword"></i>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="remember-me">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 text-center">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
                this.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                password.type = 'password';
                this.classList.remove('fa-eye-slash');
            }
        });
    </script>

</body>

</html>