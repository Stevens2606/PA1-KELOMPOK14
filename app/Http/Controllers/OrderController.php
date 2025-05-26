<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderItem; // Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk logging

class OrderController extends Controller
{
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';

    public function indexPublic()
    {
        $userId = Auth::id(); // Dapatkan ID user yang login

        $orders = Order::where('user_id', $userId) // Filter order berdasarkan user_id
                    ->with(['user', 'orderItems.menu']) // Eager load relasi
                    ->get();

        return view('order.index', compact('orders'));
    }

    public function index()
    {
        $orders = Order::with(['user', 'orderItems.menu'])->get(); // Perbarui relasi
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'menu_id' => 'required|exists:menus,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $menu = Menu::findOrFail($validatedData['menu_id']);
            $order = new Order();
            $order->user_id = Auth::id();
            $order->status = self::STATUS_PENDING;
            $order->total_price = 0; // Inisialisasi total_price
            $order->save();

            // Buat OrderItem
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->menu_id = $menu->id;
            $orderItem->quantity = $validatedData['quantity'];
            $orderItem->price = $menu->harga;
            $orderItem->save();

            // Hitung Total Harga
            $totalPrice = $menu->harga * $validatedData['quantity'];
            $order->total_price = $totalPrice;
            $order->save();

            return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat!');

        } catch (\Exception $e) {
            Log::error("Error creating order: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return back()->with('error', 'Terjadi kesalahan saat membuat order. Silakan coba lagi.');
        }
    }

    public function show(Order $order)
    {
        // Pastikan hanya user yang memiliki order yang bisa melihat detail
        if (auth()->user()->id !== $order->user_id) {
            abort(403, 'Unauthorized action.'); // Return 403 - Access Denied
        }

        //Load orderItems relationship
        $order->load('orderItems.menu');

        return view('order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $menus = Menu::all();
        return view('admin.orders.edit', compact('order', 'menus'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => ['required', Rule::in([
                self::STATUS_PENDING,
                self::STATUS_PROCESSING,
                self::STATUS_SHIPPED,
                self::STATUS_DELIVERED,
                self::STATUS_CANCELLED,
            ])],
        ]);

        // Ambil total_price yang sudah ada
        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dihapus.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => ['required', Rule::in([
                self::STATUS_PENDING,
                self::STATUS_PROCESSING,
                self::STATUS_SHIPPED,
                self::STATUS_DELIVERED,
                self::STATUS_CANCELLED,
            ])],
        ]);

        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Status order berhasil diperbarui.');
    }

    // DRY - Don't Repeat Yourself
    private function updateOrderStatus(Order $order, string $status)
    {
        $order->status = $status;
        $order->save();
        return redirect()->route('admin.orders.index')->with('success', 'Status order berhasil diperbarui.');
    }

    public function approve(Order $order)
    {
        return $this->updateOrderStatus($order, self::STATUS_PROCESSING);
    }

    public function reject(Order $order)
    {
        return $this->updateOrderStatus($order, self::STATUS_CANCELLED);
    }

    public function ship(Order $order)
    {
        return $this->updateOrderStatus($order, self::STATUS_SHIPPED);
    }

    public function deliver(Order $order)
    {
        return $this->updateOrderStatus($order, self::STATUS_DELIVERED);
    }

    public function cancel(Request $request, Order $order)
    {
        // Pastikan hanya user yang memiliki order yang bisa membatalkan
        if (auth()->user()->id !== $order->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Hanya bisa dibatalkan jika statusnya pending
        if ($order->status !== self::STATUS_PENDING) {
            return back()->with('error', 'Order tidak dapat dibatalkan karena statusnya sudah ' . $order->status);
        }

        try {
            $order->status = self::STATUS_CANCELLED;
            $order->save();

            return redirect()->route('orders.index')->with('success', 'Order berhasil dibatalkan.');
        } catch (\Exception $e) {
            Log::error("Error cancelling order: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return back()->with('error', 'Terjadi kesalahan saat membatalkan order. Silakan coba lagi.');
        }
    }

      // Method ADMIN di hapus karena sama dengan yang di atas

}