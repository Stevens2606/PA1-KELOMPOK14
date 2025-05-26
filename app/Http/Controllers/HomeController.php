<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menuCount = Menu::count();
        $orderCount = Order::count();
        $reservationCount = Reservation::count();
        $testimoniCount = Testimoni::count();

        return view('admin.dashboard', compact(
            'menuCount',
            'orderCount',
            'reservationCount',
            'testimoniCount'
        ));
    }
}
