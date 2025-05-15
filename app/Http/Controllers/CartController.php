<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::with('cartItems.menu')->firstOrCreate(['user_id' => auth()->id()]);
        // Eager load cartItems dan relasi menu

        return view('carts.index', compact('cart'));
    }

    

    public function checkout(Request $request)
{
    // Pastikan pengguna sudah login
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Anda harus login untuk melanjutkan.');
    }

    $cart = Cart::with('cartItems')->firstOrCreate(['user_id' => Auth::id()]);

    if (!$cart) {
        return redirect()->route('menu.public')->with('error', 'Keranjang tidak ditemukan.');
    }

    $cartItems = $cart->cartItems;

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
    }


    // START TRANSACTION
    DB::beginTransaction();
    try {
        // Buat pesanan baru
        $order = new Order();
        $order->user_id = Auth::id();
        $order->status = 'pending';

        $totalAmount = 0;
        // Tambahkan item pesanan ke dalam tabel order_items
        foreach ($cartItems as $item) {
            $totalAmount += $item->price * $item->quantity;
        }
        $order->total_price = $totalAmount; // Hitung total *sebelum* menyimpan order
        $order->save(); // Save the order

        // Tambahkan item pesanan ke dalam tabel order_items
        foreach ($cartItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->menu_id = $item->menu_id;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->price;
            $orderItem->save();
        }

        // Hapus semua item di keranjang setelah pesanan dibuat
        CartItems::where('cart_id', $cart->id)->delete();


        // COMMIT TRANSACTION
        DB::commit();

        $orderId = $order->id;
        //Flash the order id ke sesi
        Session::flash('order_id', $orderId);
        return redirect()->route('orders.index')->with('success', 'Pesanan Anda telah berhasil dibuat!');


    } catch (\Exception $e) {
    DB::rollback();
    // DEBUG: tampilkan pesan error asli
    dd($e->getMessage());
    // …atau kalau ingin lewat flash:
    // return redirect()->back()->with('error', $e->getMessage());
        }

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mungkin tidak diperlukan secara eksplisit, bisa digabung ke 'store'
        // return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $menuId = $request->input('menu_id');
    $quantity = $request->input('quantity_' . $menuId, 1); // Mengambil nilai quantity dari request, defaultnya 1

    $menu = Menu::findOrFail($menuId);
    $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

    $cartItem = CartItems::where('cart_id', $cart->id)
        ->where('menu_id', $menuId)
        ->first();

    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        $cartItem = new CartItems([
            'cart_id' => $cart->id,
            'menu_id' => $menuId,
            'quantity' => $quantity,
            'price' => $menu->harga, // Ambil harga dari Menu
        ]);
        $cartItem->save();
    }

    return redirect()->route('cart.index')->with('success', 'Menu added to cart!'); // Redirect ke halaman cart
}

// public function store(Request $request)
// {
//     $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

//     if ($cart->items()->count() == 0) {
//         return back()->with('error', 'Keranjang kosong.');
//     }

//     // Lakukan proses checkout semua item
//     // Misalnya buat order berdasarkan item yang ada

//     return redirect()->route('cart.index')->with('success', 'Checkout berhasil!');
// }


    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return view('carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        return view('carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     */

// app/Http/Controllers/CartController.php

    public function remove($id)
    {
        // Logika untuk menghapus item dari keranjang
        $cartItem = CartItems::findOrFail($id);

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang.'); // Sesuaikan dengan nama route keranjang Anda
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1', // Pastikan quantity minimal 1
        ]);
        $cartItem = CartItems::findOrFail($id);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Quantity updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartItem = CartItems::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}