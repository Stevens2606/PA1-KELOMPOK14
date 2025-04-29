<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController; // Import AboutController
use App\Http\Controllers\GaleriController;  // Import GaleriController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// **Halaman Statis**
Route::get('/', function () {
    return view('home.welcome');
})->name('home');

// Route::get('/about', function () {  // Hapus atau komentari yang ini
//     return view('about.index');
// })->name('about');

Route::get('/about', [AboutController::class, 'showAboutPage'])->name('about');  // Tambahkan ini

Route::get('/gallery', function () {
    return view('gallery.index');
})->name('gallery');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/galeri', [GaleriController::class, 'showPublic'])->name('galeri.showPublic');

// **Autentikasi**
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// **Rute yang Membutuhkan Autentikasi**
Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', function () {
        return view('home.welcome');
    })->name('welcome');

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

// **Public Routes for Menu and Testimonials**
Route::get('/menu', [MenuController::class, 'showPublic'])->name('menu.public');
Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menus.detail_public');

// **Testimoni Routes (Public)**
Route::get('/testimoniPublic', [TestimoniController::class, 'showPublic'])->name('testimoni.public'); // Menampilkan daftar testimoni dan formulir
Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store'); // Menyimpan testimoni baru

// Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('testimoni.create'); // Hapus ini, karena formulir ada di halaman index

// **Rute untuk Admin**
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // **CRUD Menu Routes**
    Route::resource('menus', MenuController::class)->names([
        'index' => 'admin.menus.index',
        'create' => 'admin.menus.create',
        'store' => 'admin.menus.store',
        'show' => 'admin.menus.show',
        'edit' => 'admin.menus.edit',
        'update' => 'admin.menus.update',
        'destroy' => 'admin.menus.destroy',
    ]);

    // **CRUD Testimoni Routes**
    Route::resource('testimoni', TestimoniController::class)->names([
        'index' => 'admin.testimoni.index',
        'create' => 'admin.testimoni.create',
        'store' => 'admin.testimoni.store',
        'show' => 'admin.testimoni.show',
        'edit' => 'admin.testimoni.edit',
        'update' => 'admin.testimoni.update',
        'destroy' => 'admin.testimoni.destroy',
    ]);

    // **CRUD Contact Messages**
    Route::get('/contact-messages', [ContactController::class, 'indexAdmin'])->name('admin.contact_messages.index');
    Route::get('/contact-messages/{contactMessage}', [ContactController::class, 'showAdmin'])->name('admin.contact_messages.show');
    Route::delete('/admin/contact-messages/{contactMessage}', [ContactController::class, 'destroy'])->name('admin.contact_messages.destroy');

    // **CRUD About Routes**
    Route::resource('abouts', AboutController::class)->names([
        'index' => 'admin.abouts.index',
        'create' => 'admin.abouts.create',
        'store' => 'admin.abouts.store',
        'show' => 'admin.abouts.show',
        'edit' => 'admin.abouts.edit',
        'update' => 'admin.abouts.update',
        'destroy' => 'admin.abouts.destroy',
    ]);

    // **CRUD Galeri Routes (Admin)**
    Route::prefix('galeri')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('admin.galeri.index');
        Route::get('/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
        Route::post('/', [GaleriController::class, 'store'])->name('admin.galeri.store');
        Route::get('/{galeri}', [GaleriController::class, 'show'])->name('admin.galeri.show');
        Route::get('/{galeri}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
        Route::put('/{galeri}', [GaleriController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/{galeri}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
    });

});

// **Public Route for Galeri**
Route::get('/galeri/{galeri}', [GaleriController::class, 'showPublic'])->name('galeri.showPublic');