<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil reservasi hanya untuk user yang login
        $reservations = Reservation::where('user_id', Auth::id())
            ->with('meja') // Eager loading relasi meja
            ->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mejas = Meja::all(); // Ambil semua meja
        return view('reservations.create', compact('mejas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // App\Http\Controllers\ReservationController.php
    // App\Http\Controllers\ReservationController.php
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'number_of_guests' => 'required|integer|min:1',
        'meja_id' => 'required|exists:mejas,id',
    ]);

    $startTime = Carbon::parse($request->start_time);
    $endTime = Carbon::parse($request->end_time);

    // Cek apakah meja sudah dipesan dalam rentang waktu
    $overlappingReservation = Reservation::where('meja_id', $request->meja_id)
        ->where('status', '!=', 'cancelled')
        ->where(function ($query) use ($startTime, $endTime) {
            $query->where(function ($q) use ($startTime, $endTime) {
                $q->where('start_time', '<', $endTime)
                  ->where('end_time', '>', $startTime);
            });
        })
        ->exists();

    if ($overlappingReservation) {
        throw ValidationException::withMessages([
            'start_time' => ['Meja ini sudah dipesan pada waktu tersebut.'],
        ]);
    }

    $meja = Meja::find($request->meja_id);

    $reservation = new Reservation($request->all());
    $reservation->user_id = Auth::id();
    $reservation->meja_id = $request->meja_id;
    $reservation->start_time = $startTime;
    $reservation->end_time = $endTime;
    $reservation->status = 'pending';
    $reservation->save();

    return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dibuat.');
}


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        // Pastikan user yang mencoba melihat reservasi adalah pemiliknya
        if ($reservation->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.'); // Atau redirect ke halaman lain
        }
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        // Pastikan user yang mencoba mengedit reservasi adalah pemiliknya
        if ($reservation->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.'); // Atau redirect ke halaman lain
        }
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Pastikan user yang mencoba mengupdate reservasi adalah pemiliknya
        if ($reservation->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.'); // Atau redirect ke halaman lain
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'reservation_time' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
      public function destroy(Request $request, Reservation $reservation)
    {
        // Pastikan user yang mencoba menghapus reservasi adalah pemiliknya
        if ($reservation->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.'); // Atau redirect ke halaman lain
        }

        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dihapus.');
    }

    public function cancel(Request $request, Reservation $reservation)
    {
        // Pastikan user yang mencoba membatalkan reservasi adalah pemiliknya
        if ($reservation->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.'); // Atau redirect ke halaman lain
        }

        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dibatalkan.');
    }

    // **ADMIN CONTROLLERS**

    public function indexAdmin()
    {
        $reservations = Reservation::all(); // Mengambil semua data reservasi
        return view('admin.reservations.index', compact('reservations'));
    }

    public function showAdmin(Reservation $reservation)
    {
        return view('admin.reservations.show', compact('reservation'));
    }

    public function confirm(Reservation $reservation)
    {
        $reservation->status = 'confirmed';
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservasi berhasil dikonfirmasi.');
    }

    public function destroyAdmin(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservasi berhasil dihapus.');
    }
}