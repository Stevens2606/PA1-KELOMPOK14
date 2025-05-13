<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Detail Reservasi - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        ol.breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 20px;
        }
        ol.breadcrumb li {
            display: inline;
        }
        ol.breadcrumb li a {
            text-decoration: none;
            color: #007bff;
        }
        ol.breadcrumb li.active {
            color: #6c757d;
        }
        .detail-container {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
        }
        .detail-row {
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: bold;
            margin-right: 10px;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h1>Detail Reservasi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.reservations.index') }}">Daftar Reservasi</a></li>
            <li class="breadcrumb-item active">Detail Reservasi</li>
        </ol>

        <div class="detail-container">
            <div class="detail-row">
                <span class="detail-label">ID:</span>
                <span>{{ $reservation->id }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Nama:</span>
                <span>{{ $reservation->name }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Email:</span>
                <span>{{ $reservation->email }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Telepon:</span>
                <span>{{ $reservation->phone }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Waktu Reservasi:</span>
                <span>{{ $reservation->reservation_time->format('d-m-Y H:i') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Jumlah Tamu:</span>
                <span>{{ $reservation->number_of_guests }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Catatan:</span>
                <span>{{ $reservation->notes ?? '-' }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Status:</span>
                <span>{{ $reservation->status }}</span>
            </div>

            <a href="{{ route('admin.reservations.index') }}" class="btn btn-secondary">Kembali ke Daftar Reservasi</a>
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