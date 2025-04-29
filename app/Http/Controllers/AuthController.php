<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Register (Pendaftaran)
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Tambahkan confirmed untuk konfirmasi password
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); // Kembalikan ke form dengan error dan input
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Otomatis login setelah register

        return redirect()->route('home'); // Redirect ke home atau halaman welcome
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('welcome');
            }
        }

        // Autentikasi gagal
        $user = User::where('email', $request->email)->first(); // Cek apakah email ada

        if ($user) {
            // Email ditemukan, tapi password salah
            return back()->withErrors([
                'password' => 'Password yang Anda masukkan salah.', // Pesan password salah
            ])->withInput(['email' => $request->email]); // Kembalikan ke form dengan email diisi
        } else {
            // Email tidak ditemukan
            return back()->withErrors([
                'email' => 'Email ini tidak terdaftar.', // Pesan email tidak ditemukan
            ])->withInput(); // Kembalikan ke form tanpa mengisi apapun
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke halaman utama atau login
    }

    // Profile
    public function profile()
    {
        return view('profile', ['user' => Auth::user()]); // Render view profile dengan data user
    }

    // HANYA UNTUK DEVELOPMENT - JANGAN DI PRODUCTION
    public function createAdmin(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true, // Set sebagai admin
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}