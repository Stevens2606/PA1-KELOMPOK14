<!-- resources/views/admin/orders/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/admintemplate/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/admintemplate/img/favicon.png') }}">
    <title>
        Daftar Pesanan
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
    <link id="pagestyle" href="{{ asset('admin/admintemplate/css/material-dashboard.css?v=3.2.0') }}"
        rel="stylesheet" />

    <style>
        /* Custom CSS untuk tampilan lebih sejuk */
        :root {
            --primary-color: #667eea;
            --secondary-color: #43cea2;
            --light-gray: #f8f9fa;
            --text-color: #343a40;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-gray);
            color: var(--text-color);
        }

        .bg-gradient-primary {
            background-image: linear-gradient(195deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
        }

        .btn-primary {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color) !important;
            border-color: var(--secondary-color) !important;
        }

        .btn-outline-primary {
            color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color) !important;
            color: #fff !important;
        }

        .card {
            box-shadow: var(--box-shadow);
            border: 0;
            border-radius: 0.75rem;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        /* Style tombol update */
        .btn-info {
            background-color: var(--secondary-color) !important;
            border-color: var(--secondary-color) !important;
            color: #fff !important;
            padding: 0.5rem 0.8rem;
        }

        .btn-info:hover {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        /* Style untuk tombol Hapus */
        .btn-link.text-danger {
            color: #dc3545 !important;
        }

        .btn-link.text-danger:hover {
            color: #c82333 !important;
        }

        /* Toast styles */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }

        /* Custom CSS untuk notifikasi */
        .notification-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-time {
            font-size: 0.8em;
            color: #777;
        }

        /* Style untuk dropdown status */
        select.form-control.form-control-sm {
            appearance: none;
            /* Hapus panah default */
            padding-right: 2.5rem;
            /* Beri ruang untuk ikon */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-down' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Daftar Pesanan</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Daftar Pesanan</h6>
                </nav>
                
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-2">
            @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Daftar Pesanan</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Pengguna</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Menu</th>
                                           
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Total Harga</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $order->id }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $order->user->name ?? 'Guest' }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                 @foreach($order->orderItems as $orderItem)
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $orderItem->menu->nama ?? 'Tidak Ada' }} ({{ $orderItem->quantity }})
                                                    </span><br>
                                                @endforeach
                                            </td>
                                          
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">Rp
                                                    {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $order->status }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="ms-auto text-end pe-3">
                                                    <!-- Form untuk update status -->
                                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status"
                                                            class="form-control form-control-sm">

                                                            <option value="processing"
                                                                {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                                Processing</option>
                                                            <option value="shipped"
                                                                {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                                                Shipped</option>

                                                            <option value="delivered"
                                                                {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                                                delivered</option>
                                                           
                                                            <option value="finished"
                                                                {{ $order->status == 'finished' ? 'selected' : '' }}>
                                                                finished</option>
                                                        </select>
                                                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                                                    </form>

                                                    <form
                                                        action="{{ route('admin.orders.destroy', $order->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-link text-danger text-sm me-0"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus order ini?')"><i
                                                                class="material-icons text-sm me-2"></i>Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>

    
    </div>

    

    <!--   Core JS Files   -->
    <script src="{{ asset('admin/admintemplate/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/admintemplate/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <!-- Pusher Library -->
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
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
    <script>
        // Pusher.logToConsole = true; // For debugging
        var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', { // Replace with your Pusher key
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}' // Replace with your Pusher cluster
        });

        var channel = pusher.subscribe('orders'); // Channel name

        channel.bind('order.status.updated', function (data) { // Event Name
            // Terima notifikasi
            let notificationList = document.getElementById('notification-list');
            let notificationCount = document.getElementById('notification-count');
            let notificationToast = document.getElementById('notificationToast');

            // Buat item notifikasi baru
            let notificationItem = document.createElement('li');
            notificationItem.classList.add('mb-2');
            notificationItem.innerHTML = `
                <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                                Pesanan <b>${data.order_id}</b> telah diubah statusnya menjadi <b>${data.status}</b>
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                Baru saja
                            </p>
                        </div>
                    </div>
                </a>
            `;

            // Tambahkan notifikasi ke daftar
            notificationList.prepend(notificationItem);

            // Update jumlah notifikasi
            let currentCount = parseInt(notificationCount.innerText);
            notificationCount.innerText = currentCount + 1;

            // Tampilkan notifikasi (misalnya, dengan toaster)
            // Tampilkan pesan toast
            let toastBody = notificationToast.querySelector('.toast-body');
            toastBody.innerHTML = `Pesanan <b>${data.order_id}</b> telah diubah statusnya menjadi <b>${data.status}</b>`;

            let toast = new bootstrap.Toast(notificationToast);
            toast.show();
        });
    </script>
</body>

</html>