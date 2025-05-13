<!-- resources/views/admin/menus/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/admintemplate/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/admintemplate/img/favicon.png') }}">
    <title>Edit Menu</title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/admintemplate/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/admintemplate/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/admintemplate/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
    <!-- Custom CSS (Optional) -->
    <style>
        .input-group-outline.is-focused .form-label {
            color: #1e88e5 !important;
            /* Warna label saat input fokus */
        }

        .bg-gradient-primary {
            background-image: linear-gradient(195deg, #42a5f5 0%, #1e88e5 100%) !important;
            /* Warna gradien biru */
        }

        .btn-primary {
            background-color: #1e88e5 !important;
            border-color: #1e88e5 !important;
        }

        .btn-primary:hover {
            background-color: #1565c0 !important;
            border-color: #1565c0 !important;
        }

        .bg-gradient-secondary {
            background-image: linear-gradient(195deg, #a8b8d8 0%, #6c757d 100%) !important;
            /* Warna gradien abu-abu untuk tombol Batal */
        }

        .btn-secondary {
            background-color: #6c757d !important;
            border-color: #6c757d !important;
        }

        .btn-secondary:hover {
            background-color: #545b62 !important;
            border-color: #495057 !important;
        }

        /* CSS untuk input file */
        .file-upload-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-upload-container input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .file-upload-container .btn {
            /* Gaya tombol sesuai tema Anda */
        }

        /* Style untuk label "Gambar (Optional)" */
        .input-group-outline label.form-label {
            transform: translateY(0);
            /* Mengembalikan posisi label ke atas */
            font-size: 0.875rem;
            /* Ukuran font yang sesuai */
            color: #8898aa;
            /* Warna teks yang sesuai */
        }

        /* Style untuk span yang menampilkan nama file */
        .file-name {
            margin-left: 10px;
            font-style: italic;
            color: #8898aa;
        }

         /* Tambahkan gaya tambahan jika diperlukan */
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Menu</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Edit Menu</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                        <!-- Navbar Items (Optional) -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Edit Menu</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="p-3">
                                <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-outline my-3 @if(old('nama', $menu->nama)) is-filled @endif">
                                                <label class="form-label">Nama Menu</label>
                                                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $menu->nama) }}" required>
                                            </div>
                                            @error('nama')
                                            <div class="text-danger px-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-outline my-3 @if(old('harga', $menu->harga)) is-filled @endif">
                                                <label class="form-label">Harga</label>
                                                <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga', $menu->harga) }}" required>
                                            </div>
                                            @error('harga')
                                            <div class="text-danger px-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group input-group-outline my-3 @if(old('deskripsi', $menu->deskripsi)) is-filled @endif">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required>{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                                            </div>
                                            @error('deskripsi')
                                            <div class="text-danger px-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-outline my-3 @if(old('kategori', $menu->kategori)) is-filled @endif">
                                                <label class="form-label">Kategori</label>
                                                <input type="text" class="form-control" name="kategori" id="kategori" value="{{ old('kategori', $menu->kategori) }}" required>
                                            </div>
                                            @error('kategori')
                                            <div class="text-danger px-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-outline my-3">
                                                <input type="file" class="form-control" name="gambar" id="gambar" style="display: none;" onchange="updateFileName(this)">
                                                <label for="gambar" class="btn btn-outline-primary btn-sm">Pilih File</label>
                                                <span id="file-name" class="ms-2">Tidak ada file yang dipilih</span>
                                            </div>
                                            @error('gambar')
                                            <div class="text-danger px-3">{{ $message }}</div>
                                            @enderror

                                            @if($menu->gambar)
                                            <img src="{{ asset('storage/menus/' . $menu->gambar) }}" alt="{{ $menu->nama }}" width="100">
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn bg-gradient-primary">Update</button>
                                            <a href="{{ route('admin.menus.index') }}" class="btn bg-gradient-secondary">Batal</a>
                                        </div>
                                    </div>
                                </form>
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
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <!-- Footer Items (Optional) -->
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!-- Fixed Plugin (Optional) -->

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
    <!-- Material Dashboard JS -->
    <script src="{{ asset('admin/admintemplate/js/material-dashboard.min.js?v=3.2.0') }}"></script>
    <!-- Script untuk mengaktifkan class "is-filled" pada input yang sudah memiliki nilai -->
    <script>
        const inputs = document.querySelectorAll('.input-group-outline input, .input-group-outline textarea');
        inputs.forEach(input => {
            if (input.value) {
                input.parentNode.classList.add('is-filled');
            }
            input.addEventListener('focus', function() {
                this.parentNode.classList.add('is-focused');
            });
            input.addEventListener('blur', function() {
                this.parentNode.classList.remove('is-focused');
                if (this.value) {
                    this.parentNode.classList.add('is-filled');
                } else {
                    this.parentNode.classList.remove('is-filled');
                }
            });
        });

        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : 'Tidak ada file yang dipilih';
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
</body>

</html>