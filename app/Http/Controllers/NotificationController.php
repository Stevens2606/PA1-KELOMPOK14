<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Logika untuk mengambil notifikasi (contoh sementara)
        $notifications = []; // Ganti dengan data notifikasi yang sebenarnya

        return view('admin.notifications.index', compact('notifications'));
    }
}
