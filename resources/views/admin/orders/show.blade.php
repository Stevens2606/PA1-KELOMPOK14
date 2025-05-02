<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">Quality Time</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Menu Management</div>
                        <a class="nav-link" href="{{ route('admin.menus.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Daftar Menu
                        </a>
                        <!-- Testimoni Link -->
                        <a class="nav-link" href="{{ route('admin.testimoni.index') }}">
                            <!--  Ganti 'testimonis' dengan rute yang benar jika berbeda -->
                            <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                            <!-- Gunakan ikon yang sesuai, ini hanya contoh -->
                            Testimoni
                        </a>
                        <!-- About Us Link -->
                        <a class="nav-link" href="{{ route('admin.abouts.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                            About Us
                        </a>
                        <a class="nav-link" href="{{ route('admin.galeri.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                            Gallery
                        </a>
                        <a class="nav-link" href="{{ route('admin.contacts.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Contact
                        </a>

                        <!-- Reservations Link -->
                        <a class="nav-link" href="{{ route('admin.reservations.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                            Reservations
                        </a>
                         <!-- Orders Link -->
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Orders
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Detail Order</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Daftar Order</a></li>
                        <li class="breadcrumb-item active">Detail Order</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Detail Order
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Label</th>
                                        <th>Informasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pelanggan</td>
                                        <td>{{ $order->customer_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Kontak</td>
                                        <td>{{ $order->contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Detail Order</td>
                                        <td>{{ $order->order_details }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Harga</td>
                                        <td>{{ number_format($order->total_amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Kembali ke Daftar Order</a>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright © Quality Time 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            ·
                            <a href="#">Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>