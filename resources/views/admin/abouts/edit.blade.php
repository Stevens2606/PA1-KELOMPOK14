<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/admintemplate/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/admintemplate/img/favicon.png') }}">
    <title>
        Edit About Us
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/admintemplate/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/admintemplate/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/admintemplate/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
    <style>
        /* Custom CSS untuk tampilan lebih sejuk */
        :root {
            --primary-color: #3498db;
            /* Contoh warna biru */
            --primary-color-darker: #2980b9;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
        }

        .bg-gradient-primary {
            background-image: linear-gradient(195deg, var(--primary-color) 0%, var(--primary-color-darker) 100%);
            /* Menggunakan warna biru */
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-color-darker);
            border-color: var(--primary-color-darker);
        }


        .card {
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            border: 0;
            border-radius: 0.75rem;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .form-group {
            margin-bottom: 1.5rem; /* Tambahkan margin bawah untuk spacing */
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit About Us</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Edit About Us</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                         {{-- Kode Navbar --}}
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Edit About Us</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="p-3">
                                <form action="{{ route('admin.abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="user_id">User ID</label>
                                        <input type="number" name="user_id" id="user_id" class="form-control"
                                            value="{{ $about->user_id }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="video_url">Video URL</label>
                                        <input type="url" name="video_url" id="video_url" class="form-control"
                                            value="{{ $about->video_url }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" id="content" class="form-control" rows="4">{{ $about->content }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_path">Current Image</label><br>
                                        @if($about->image_path)
                                            <img src="{{ asset('storage/' . $about->image_path) }}" alt="Current Image" style="max-width: 200px;"><br><br>
                                        @else
                                            No Image Available
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="image_path">Image Path</label>
                                        <input type="file" name="image_path" id="image_path" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">Cancel</a>
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
                             {{-- Footer --}}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <div class="fixed-plugin">
         {{-- Plugin --}}
    </div>
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