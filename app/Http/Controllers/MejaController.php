<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mejas = Meja::all(); // Ambil semua data meja
        return view('admin.mejas.index', compact('mejas')); // Kirim data ke view admin
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mejas.create'); // Tampilkan form untuk membuat meja baru (admin)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'nomor_meja' => 'required|string|max:255|unique:mejas,nomor_meja',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,dipesan,tidak_tersedia',
        ]);

        // Buat objek Meja baru dan isi dengan data yang sudah divalidasi
        Meja::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.mejas.index')->with('success', 'Meja berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        return view('admin.mejas.show', compact('meja')); // Tampilkan detail meja (admin)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        return view('admin.mejas.edit', compact('meja')); // Tampilkan form untuk mengedit meja (admin)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meja $meja)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'nomor_meja' => 'required|string|max:255|unique:mejas,nomor_meja,' . $meja->id,
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,dipesan,tidak_tersedia',
        ]);

        // Update data meja dengan data yang sudah divalidasi
        $meja->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.mejas.index')->with('success', 'Meja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        // Hapus data meja
        $meja->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.mejas.index')->with('success', 'Meja berhasil dihapus.');
    }
}