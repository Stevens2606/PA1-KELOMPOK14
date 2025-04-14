<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Edit Menu</title>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
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
        @include('admin.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Menu</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Daftar Menu</a></li>
                        <li class="breadcrumb-item active">Edit Menu</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit me-1"></i>
                            Edit Menu
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $menu->nama }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi"
                                        name="deskripsi">{{ $menu->deskripsi }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga:</label>
                                    <input type="number" class="form-control" id="harga" name="harga" step="0.01"
                                        value="{{ $menu->harga }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori:</label>
                                    <select class="form-control" id="kategori" name="kategori" required>
                                        <option value="FOOD" {{ $menu->kategori=='FOOD' ? 'selected' : '' }}>FOOD
                                        </option>
                                        <option value="DIMSUM" {{ $menu->kategori=='DIMSUM' ? 'selected' : '' }}>DIMSUM
                                        </option>
                                        <option value="SNACK" {{ $menu->kategori=='SNACK' ? 'selected' : '' }}>SNACK
                                        </option>
                                        <option value="DRINKS" {{ $menu->kategori=='DRINKS' ? 'selected' : '' }}>DRINKS
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Gambar Saat Ini:</label><br>
                                    @if($menu->gambar)
                                    <img src="{{ asset('images/' . $menu->gambar) }}" alt="{{ $menu->nama }}"
                                        width="100"><br><br>
                                    @else
                                    Tidak Ada Gambar
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Upload Gambar Baru:</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright © Your Website 2023</div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>