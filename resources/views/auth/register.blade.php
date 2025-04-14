<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

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

        .register-box {
            width: 400px; /* Sesuaikan lebar sesuai kebutuhan */
        }

        .card-outline {
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang putih semi-transparan untuk card */
            border: none; /* Hilangkan border */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
        }

        .login-box-msg {
            color: #343a40; /* Warna teks lebih gelap */
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-dark">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h1">
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" width="100px"><br>
                    <b>Quality Time</b>
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Buat Akun Baru</p>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
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

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               placeholder="Konfirmasi Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
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

                <p class="mt-3 text-center">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-center">Login</a>
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
                this.classList.remove('fa-eye-slash');
            }
        });
    </script>
</body>

</html>