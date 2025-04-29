<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil pengguna yang terautentikasi
        return view('admin.dashboard', ['user' => $user]); // Oper pengguna ke tampilan
    }
}