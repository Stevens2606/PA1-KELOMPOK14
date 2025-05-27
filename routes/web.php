<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController; // Pastikan nama controllernya benar
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MejaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



// **Halaman Statis**
Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'showAboutPage'])->name('about');

Route::get('/gallery', function () {
    return view('gallery.index');
})->name('gallery');

Route::get('/menupublic', [MenuController::class, 'showPublic'])->name('menu.public');


Route::get('/menu/{menu}', [MenuController::class, 'showDetailPublic'])->name('menus.detail_public');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {  // Contoh: hanya bisa diakses oleh user yang login
    Route::resource('home-content', HomeContentController::class);

    Route::resource('reservations', ReservationController::class);
Route::post('reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');
}); 

// routes/web.php
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');




Route::get('/contactpublic', [ContactController::class, 'showPublic'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'storePublic'])->name('contact.storePublic');

// **Galeri Route (Public)**
Route::get('/galeri', [GaleriController::class, 'showPublic'])->name('galeri.showPublic');
Route::get('/galeri/{galeri}', [GaleriController::class, 'showPublic'])->name('galeri.detailPublic');

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
    Route::post('/pesan', [CartController::class, 'store'])->name('pesan');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');



    // **Menu Testimoni (Memerlukan Autentikasi)**
    Route::post('/testimoni', [TestimoniController::class, 'submit'])->name('testimoni.submit');
        Route::get('/testimoni/{testimoni}/edit', [TestimoniController::class, 'edit'])->name('testimoni.edit');
        Route::put('/testimoni/{testimoni}', [TestimoniController::class, 'update'])->name('testimoni.update');
        Route::delete('/testimoni/{testimoni}', [TestimoniController::class, 'destroyByUser'])->name('testimoni.destroy');

    // **Reservasi Route (Memerlukan Autentikasi)**
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::post('reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');

    // **Orders Route (Memerlukan Autentikasi)**
    Route::get('/orderspublic', [OrderController::class, 'indexPublic'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::put('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel'); // Perhatikan ini diubah menjadi PUT
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Rute DELETE untuk menghapus
Route::put('/admin/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');



    // **Cart Routes (Memerlukan Autentikasi)**
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{rowId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});




Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

// **Testimoni Routes (Public)**
Route::get('/testimoniPublic', [TestimoniController::class, 'showPublic'])->name('testimoni.public');
Route::get('/about', [AboutController::class, 'showAboutPage'])->name('about');
Route::resource('admin/about_us', AboutUsController::class)->middleware(['auth', 'admin']);

Route::get('/about', [AboutController::class, 'showPublic'])->name('about');


// **Rute untuk Admin**
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
   Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    // **CRUD Menu Routes**
    Route::get('/menus', [MenuController::class, 'index'])->name('admin.menus.index');
    Route::get('/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
    Route::post('/menus', [MenuController::class, 'store'])->name('admin.menus.store');
    Route::get('/menus/{menu}', [MenuController::class, 'show'])->name('admin.menus.show');
    Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
    Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('admin.menus.update');
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');

    // **CRUD Testimoni Routes**
    Route::get('/testimonis', [TestimoniController::class, 'index'])->name('admin.testimoni.index');
    Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('admin.testimoni.create');
    Route::get('/testimoni', [TestimoniController::class, 'store'])->name('admin.testimoni.store');
    Route::get('/testimoni/{testimoni}', [TestimoniController::class, 'show'])->name('admin.testimoni.show');
    Route::get('/testimoni/{testimoni}/edit', [TestimoniController::class, 'edit'])->name('admin.testimoni.edit');
    Route::put('/testimoni/{testimoni}', [TestimoniController::class, 'update'])->name('admin.testimoni.update');
    Route::delete('/testimoni/{testimoni}', [TestimoniController::class, 'destroyByAdmin'])->name('admin.testimoni.destroy');
   

    // **CRUD Contact Messages**
    Route::get('/contact-messages', [ContactController::class, 'index'])->name('admin.contact_messages.index');
    Route::get('/contact-messages/{contactMessage}', [ContactController::class, 'showAdmin'])->name('admin.contact_messages.show');
    Route::delete('/contact-messages/{contactMessage}', [ContactController::class, 'destroy'])->name('admin.contact_messages.destroy');

    // **CRUD About Routes**
    Route::get('/abouts', [AboutController::class, 'index'])->name('admin.abouts.index');
    Route::get('/abouts/create', [AboutController::class, 'create'])->name('admin.abouts.create');
    Route::post('/abouts', [AboutController::class, 'store'])->name('admin.abouts.store');
    Route::get('/abouts/{about}', [AboutController::class, 'show'])->name('admin.abouts.show');
    Route::get('/abouts/{about}/edit', [AboutController::class, 'edit'])->name('admin.abouts.edit');
    Route::put('/abouts/{about}', [AboutController::class, 'update'])->name('admin.abouts.update');
    Route::delete('/abouts/{about}', [AboutController::class, 'destroy'])->name('admin.abouts.destroy');

    // **CRUD Galeri Routes (Admin)**
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/galeri/{galeri}', [GaleriController::class, 'show'])->name('admin.galeri.show');
    Route::get('/galeri/{galeri}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // **CRUD Contacts Routes**
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('admin.contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('admin.contacts.store');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('admin.contacts.edit');
    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('admin.contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');


    // **Orders Route (Admin)**
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    Route::put('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    
    // **Reservasi Route (Admin)**
    Route::get('/reservations', [ReservationController::class, 'indexAdmin'])->name('admin.reservations.index');
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('admin.reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('admin.reservations.store');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('admin.reservations.show');
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('admin.reservations.update');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
    Route::post('reservations/{reservation}/confirm', [ReservationController::class, 'confirm'])->name('admin.reservations.confirm');
    Route::post('reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('admin.reservations.cancel');

    Route::get('/mejas', [MejaController::class, 'index'])->name('admin.mejas.index');
    Route::get('/mejas/create', [MejaController::class, 'create'])->name('admin.mejas.create');
    Route::post('/mejas', [MejaController::class, 'store'])->name('admin.mejas.store');
    Route::get('/mejas/{meja}', [MejaController::class, 'show'])->name('admin.mejas.show');
    Route::get('/mejas/{meja}/edit', [MejaController::class, 'edit'])->name('admin.mejas.edit');
    Route::put('/mejas/{meja}', [MejaController::class, 'update'])->name('admin.mejas.update');
    Route::patch('/mejas/{meja}', [MejaController::class, 'update']); // Tambahkan jika Anda menggunakan patch
    Route::delete('/mejas/{meja}', [MejaController::class, 'destroy'])->name('admin.mejas.destroy');
});