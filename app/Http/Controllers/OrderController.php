<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function indexPublic()
    {
        $orders = Order::with(['user', 'menu'])->get(); // Eager load relations
        return view('order.index', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'menu'])->get(); // Eager load relations
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.orders.create', compact('menus')); // Pastikan menggunakan view admin
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil data menu dari database
        $menu = Menu::findOrFail($request->menu_id);

        // Hitung total harga
        $totalPrice = $menu->harga * $request->quantity;

        // Buat order baru
        $order = new Order();
        $order->menu_id = $validatedData['menu_id'];
        $order->quantity = $validatedData['quantity'];
        $order->price = $menu->harga; // Simpan harga per item
        $order->total_price = $totalPrice; // Simpan total harga

        // Simpan User ID (Jika Ada)
        $order->user_id = Auth::id();


        $order->status = 'pending'; // Set status default
        $order->save();

        return redirect()->route('menu.public')->with('success', 'Order berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order')); // Pastikan view admin
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $menus = Menu::all();
        return view('admin.orders.edit', compact('order', 'menus')); // Pastikan view admin
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'in:pending,processing,shipped,delivered,cancelled', // Validasi status
        ]);

        // Ambil data menu dari database
        $menu = Menu::findOrFail($request->menu_id);

        // Hitung total harga
        $totalPrice = $menu->harga * $request->quantity;

        $order->menu_id = $validatedData['menu_id'];
        $order->quantity = $validatedData['quantity'];
        $order->price = $menu->harga; // Simpan harga per item
        $order->total_price = $totalPrice; // Simpan total harga
        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil diperbarui.'); // Redirect ke admin
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dihapus.'); // Redirect ke admin
    }

    /**
     * Update the status of the specified resource in storage.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Status order berhasil diperbarui.'); // Redirect ke admin
    }

    public function indexAdmin()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function showAdmin(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function approve(Order $order)
    {
        $order->status = 'processing'; // Atau status lain yang sesuai
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil disetujui dan sedang diproses.');
    }

    public function reject(Order $order)
    {
        $order->status = 'cancelled';
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil ditolak.');
    }

    public function ship(Order $order)
    {
        $order->status = 'shipped';
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dikirim.');
    }

    public function deliver(Order $order)
    {
        $order->status = 'delivered';
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil ditandai sebagai terkirim.');
    }

    public function cancel(Order $order)
    {
        $order->status = 'cancelled';
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dibatalkan.');
    }

    public function destroyAdmin(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dihapus.');
    }

}