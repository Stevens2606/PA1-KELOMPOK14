<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FINISHED = 'finished'; // Definisikan konstanta untuk status finished

    public function indexPublic()
    {
        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)
                    ->with(['user', 'orderItems.menu'])
                    ->get();

        return view('order.index', compact('orders'));
    }

    public function index()
    {
        $orders = Order::with(['user', 'orderItems.menu'])->get();
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
            $order->total_price = 0;
            $order->save();

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->menu_id = $menu->id;
            $orderItem->quantity = $validatedData['quantity'];
            $orderItem->price = $menu->harga;
            $orderItem->save();

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
        if (auth()->user()->id !== $order->user_id) {
            abort(403, 'Unauthorized action.');
        }

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
                self::STATUS_FINISHED, // Tambahkan finished ke daftar status yang valid
            ])],
        ]);

        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        // Pastikan hanya user yang membuat order yang bisa menghapus
        if (auth()->user()->id !== $order->user_id) {
            return redirect()->route('orders.index')->with('error', 'Anda tidak berhak menghapus order ini.');
        }

        // Hanya izinkan penghapusan jika statusnya 'delivered' atau 'cancelled'
        if (!in_array($order->status, [self::STATUS_DELIVERED, self::STATUS_CANCELLED])) {
            return redirect()->route('orders.index')->with('error', 'Order hanya dapat dihapus jika statusnya sudah Selesai atau Dibatalkan.');
        }

        try {
            DB::transaction(function () use ($order) {
                OrderItem::where('order_id', $order->id)->delete();
                $order->delete();
            });

            return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus.');

        } catch (\Exception $e) {
            Log::error("Error deleting order: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return back()->with('error', 'Terjadi kesalahan saat menghapus order. Silakan coba lagi.');
        }
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
                self::STATUS_FINISHED, // Tambahkan finished ke daftar status yang valid
            ])],
        ]);

        $order->status = $validatedData['status'];
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Status order berhasil diperbarui.');
    }

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
        if (auth()->user()->id !== $order->user_id) {
            abort(403, 'Unauthorized action.');
        }

        if (!in_array($order->status, [self::STATUS_PENDING, self::STATUS_PROCESSING])) {
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
}