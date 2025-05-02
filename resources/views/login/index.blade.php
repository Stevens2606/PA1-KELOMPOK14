<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1">
                    <img src="img/logo.png" alt="Logo" width="100px"><br>
                    <b>Quality Time</b>
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masuk ke akun Anda</p>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="Email" required autofocus>
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
                           <div class="input-group-text" id="togglePassword">
                         <i class="fas fa-eye"></i>  <!-- HANYA SATU IKON MATA DI SINI -->
                            </div>
                     </div>
                      @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                     </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 text-center">
                    Belum punya akun? <a href="/register">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/dist/js/adminlte.min.js"></script>

    <script>
  document.addEventListener("DOMContentLoaded", function () {
    var popoverBtn = document.getElementById("popoverBtn");

    var popover = new bootstrap.Popover(popoverBtn, {
      title: "Gabung",
      content: `<div style="text-align: center;">
                        <button onclick="window.location.href='/loginform'" class="btn btn-primary btn-sm mb-2">Login</button>
                        <br>
                        <button onclick="window.location.href='/registerform'" class="btn btn-success btn-sm">Register</button>
                      </div>`,
      html: true,
      placement: "bottom",
    });

    // Agar popover bisa ditutup saat klik di luar area popover
    document.addEventListener("click", function (event) {
      if (!popoverBtn.contains(event.target)) {
        popover.hide();
      }
    });
  });

    function order(menuName, quantityId) {
      // Periksa apakah pengguna sudah login
      @if (Auth::check())
        var quantity = document.getElementById(quantityId).value;
        var phoneNumber = '6285358599959';
        var message = encodeURIComponent(
          "Halo Quality Time,\n\nSaya ingin memesan:\n " + quantity + " " + menuName + "\n\nMohon info selanjutnya. Terima kasih."
        );
        var whatsappURL = "https://wa.me/" + phoneNumber + "?text=" + message;
        window.open(whatsappURL, '_blank');
      @else
        // Jika belum login, langsung alihkan ke halaman login
        window.location.href = "{{ route('loginform') }}"; // Menggunakan route name
      @endif
    }
</script>

    <!--   -->

</body>
</html>