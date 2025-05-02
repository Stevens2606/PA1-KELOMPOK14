<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all(); // Mengambil semua data reservasi
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'reservation_time' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
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
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dihapus.');
    }

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

    public function cancel(Reservation $reservation)
    {
        
        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservasi berhasil dibatalkan.');
    }

    public function destroyAdmin(Reservation $reservation)
    {
        

        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservasi berhasil dihapus.');
    }
}