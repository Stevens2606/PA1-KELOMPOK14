<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController; // Tambahkan import untuk MenuController
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// **Halaman Statis**
Route::get('/', function () {
    return view('home.welcome');
})->name('home'); // Route untuk halaman utama

Route::get('/about', function () {
    return view('about.index');
})->name('about'); // Route untuk halaman about

//Route::get('/menu', function () { //Route ini ditimpa karena menggunakan MenuController
//    return view('menu.index');
//})->name('menu'); // Route untuk halaman menu

Route::get('/testimoni', function () {
    return view('testimoni.index');
})->name('testimoni'); // Route untuk halaman testimoni

Route::get('/gallery', function () {
    return view('gallery.index');
})->name('gallery'); // Route untuk halaman gallery

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact'); // Route untuk halaman contact

// **Autentikasi (AuthController)**
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post'); // route bernama register.post

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); //route bernama login.post

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// **Rute yang Membutuhkan Autentikasi (Middleware 'auth')**
Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', function () {
        return view('home.welcome'); // halaman welcome
    })->name('welcome');

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

// **Rute untuk Admin (Middleware 'auth' dan 'isAdmin')**
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Halaman dashboard admin
    })->name('admin.dashboard');

    Route::get('/pegawai', function () {
        return view('pegawai.index');
    })->name('pegawai'); // Route untuk halaman pegawai (hanya admin)


    // **CRUD Menu Routes (Admin Only)**
    Route::get('/admin/menus', [MenuController::class, 'index'])->name('admin.menus.index');           // Daftar menu
    Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');    // Form tambah menu
    Route::post('/admin/menus', [MenuController::class, 'store'])->name('admin.menus.store');           // Simpan menu baru
    Route::get('/admin/menus/{menu}', [MenuController::class, 'show'])->name('admin.menus.show');            // Detail menu
    Route::get('/admin/menus/{menu}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');       // Form edit menu
    Route::put('/admin/menus/{menu}', [MenuController::class, 'update'])->name('admin.menus.update');         // Update menu (PUT)
    Route::delete('/admin/menus/{menu}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');     // Hapus menu
});

// **Public Menu Route (Accessible to All)**
Route::get('/menu', [MenuController::class, 'showPublic'])->name('menu'); // Daftar menu untuk publik
Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menus.detail_public');  //Detail menu untuk public, ganti 'show' dengan method yang sesuai