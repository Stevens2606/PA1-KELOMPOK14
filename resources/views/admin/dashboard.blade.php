<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/admintemplate/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/admintemplate/img/favicon.png') }}">
    <title>
        Admin Dashboard
    </title>

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Material+Icons">

    <!-- CSS Files (Asumsikan Anda sudah punya Bootstrap terpasang) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin/admintemplate/css/nucleo-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/admintemplate/css/nucleo-svg.css') }}" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/admintemplate/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
              
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                       
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Si Admin</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                           
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-white shadow-sm h-100 card-hover">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="material-icons opacity-10">restaurant_menu</i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-sm mb-0 font-weight-bold">Jumlah Menu</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $menuCount }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-white shadow-sm h-100 card-hover">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="material-icons opacity-10">shopping_cart</i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-sm mb-0 font-weight-bold">Jumlah Order</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $orderCount }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card bg-white shadow-sm h-100 card-hover">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                    <i class="material-icons opacity-10">event</i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-sm mb-0 font-weight-bold">Jumlah Reservasi</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $reservationCount }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-white shadow-sm h-100 card-hover">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="material-icons opacity-10">forum</i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-sm mb-0 font-weight-bold">Jumlah Testimoni</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $testimoniCount }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Core JS Files -->
    <script src="{{ asset('admin/admintemplate/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/plugins/chartjs.min.js') }}"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Skrip tambahan Anda -->
</body>

</html>