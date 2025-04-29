<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Edit Testimoni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.10.2/jsoneditor.min.css"
        integrity="sha512-iR59xL+qf9Yf41lJw/bfo4M3XUqM4Lh940mgh8R0nEnU11KRA9hE99wtUdgxGNQJq6tsF95OGfWY/EdRQ+oGxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.10.2/jsoneditor.min.js"
        integrity="sha512-K5fzj2k+jXJg5+q+B2l20bC45Xugw909Jg3Xn/0k7ehUaJpT3jW6030g1i9xXGPO11s9U1dG8sU89uG+Eewg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    <h1 class="mt-4">Edit Testimoni</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">Daftar
                                Testimoni</a></li>
                        <li class="breadcrumb-item active">Edit Testimoni</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit me-1"></i>
                            Edit Testimoni
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

                            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $testimonial->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="job" class="form-label">Pekerjaan:</label>
                                    <input type="text" class="form-control" id="job" name="job"
                                        value="{{ $testimonial->job }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="testimonial_editor" class="form-label">Testimoni (JSON Editor):</label>
                                    <div id="testimonial_editor" style="height: 200px;"></div>
                                    <input type="hidden" name="testimonial" id="testimonial_data">
                                    <small class="form-text text-muted">Enter testimonial content as a JSON string.</small>
                                </div>

                                <div class="mb-3">
                                    <label>Gambar Saat Ini:</label><br>
                                    @if($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"
                                        width="100"><br><br>
                                    @else
                                    Tidak Ada Gambar
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Gambar Baru:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Batal</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>

    <script>
        // Testimonial Editor
        const testimonialContainer = document.getElementById("testimonial_editor");
        const testimonialOptions = {
            mode: 'code', // 'code' for text editing, 'tree' for visual editing
            onChange: function() {
                try {
                    const json = testimonialEditor.get();
                    document.getElementById('testimonial_data').value = JSON.stringify(json);
                } catch (e) {
                    // Handle invalid JSON
                    console.error("Invalid JSON in Testimonial Editor", e);
                    document.getElementById('testimonial_data').value = ''; // Clear the hidden input
                }
            }
        };
        const testimonialEditor = new JSONEditor(testimonialContainer, testimonialOptions);

        // Set initial value if testimonial data exists
        const initialTestimonialValue = `{!! old('testimonial', json_encode($testimonial->testimonial)) !!}`;
        try {
            testimonialEditor.set(JSON.parse(initialTestimonialValue));
            document.getElementById('testimonial_data').value = JSON.stringify(JSON.parse(initialTestimonialValue));
        } catch (e) {
            console.error("Error parsing initial Testimonial JSON", e);
        }
    </script>
</body>

</html>