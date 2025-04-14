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

    // Register (Pendaftaran) - menyesuaikan jika diperlukan untuk form biasa
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', //Tambahkan confirmed untuk konfirmasi password
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

            $user = Auth::user(); //Ambil user yang terotentikasi

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
            } else {
                return redirect()->route('welcome'); // Redirect ke halaman welcome
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput(); // Kembalikan ke form login dengan error
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