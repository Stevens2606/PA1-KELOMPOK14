<!-- resources/views/admin/menus/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/admintemplate/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/admintemplate/img/favicon.png') }}">
    <title>
        Detail Menu
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/admintemplate/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/admintemplate/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/admintemplate/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />

    <style>
        /* Custom CSS untuk tampilan lebih sejuk */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
        }

        .bg-gradient-primary {
            background-image: linear-gradient(195deg, #42a5f5 0%, #1e88e5 100%);
        }

        .btn-primary {
            background-color: #1e88e5;
            border-color: #1e88e5;
        }

        .btn-primary:hover {
            background-color: #1565c0;
            border-color: #1565c0;
        }

        .sidebar .nav-item .nav-link {
            color: #6c757d;
        }

        .sidebar .nav-item .nav-link i {
            color: #6c757d;
        }

        .sidebar .nav-item .nav-link:hover {
            color: #495057;
        }

        .sidebar .nav-item .nav-link:hover i {
            color: #495057;
        }

        .card {
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            border: 0;
            border-radius: 0.75rem;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Menu</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Detail Menu</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <!-- Search Bar (Optional) -->
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                        <!-- ... (bagian navbar lainnya) ... -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Informasi Menu</p>
                                <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                    class="btn btn-primary btn-sm ms-auto">Edit</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama Menu</label>
                                        <input class="form-control" type="text" value="{{ $menu->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Harga</label>
                                        <input class="form-control" type="text"
                                            value="Rp. {{ number_format($menu->harga, 0, ',', '.') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                        <textarea class="form-control" rows="3" readonly>{{ $menu->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kategori</label>
                                        <input class="form-control" type="text" value="{{ $menu->kategori }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Gambar Menu</p>
                            <div class="row">
                                <div class="col-md-12">
                                    @if($menu->gambar)
                                    <img src="{{ asset('storage/menus/' . $menu->gambar) }}" alt="{{ $menu->nama }}"
                                        style="max-width: 200px;">
                                    @else
                                    <p>Tidak Ada Gambar</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold"
                                    target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/admintemplate/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/admintemplate/js/material-dashboard.min.js?v=3.2.0') }}"></script>
</body>

</html>