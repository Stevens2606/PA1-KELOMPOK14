<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource for admin.
     */
    public function index()
    {
        $testimonis = Testimoni::all(); // Ambil semua testimoni (termasuk yang pending)
        return view('admin.testimonis.index', compact('testimonis')); // Kirim ke view admin
    }

    /**
     * Display a listing of approved testimoni for public viewing.
     */
    public function showPublic()
    {
        $testimonis = Testimoni::all(); // Ambil hanya testimoni yang disetujui
        return view('testimoni.index', compact('testimonis')); // Kirim ke view public
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonis.create'); // Tampilkan form create untuk admin
    }

    /**
     * Store a newly created resource in storage (Admin).
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'isi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Testimoni::create($request->all());

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.'); // Redirect ke index admin
    }

    /**
     * Display the specified resource (Admin).
     */
    public function show(Testimoni $testimoni)
    {
        return view('admin.testimonis.show', compact('testimoni')); // Kirim ke view admin
    }

    /**
     * Show the form for editing the specified resource (Admin).
     */
    public function edit(Testimoni $testimoni)
    {
        return view('admin.testimonis.edit', compact('testimoni')); // Kirim ke view admin
    }

    /**
     * Update the specified resource in storage (Admin).
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'isi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'in:pending,approved,rejected' //Tambahkan validasi status
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $testimoni->update($request->all());

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.'); // Redirect ke index admin
    }

    /**
     * Remove the specified resource from storage (Admin).
     */
    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.'); // Redirect ke index admin
    }

    /**
     * Submit a new testimoni (Public).
     */
    public function submit(Request $request)
    {
        // Validasi data (SANGAT PENTING)
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'isi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'jenis_kelamin' => 'nullable|in:pria,wanita,lainnya', // Validasi jenis_kelamin (ENUM)
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan testimoni
        $testimoni = new Testimoni();
        $testimoni->nama = $request->nama;
        $testimoni->isi = $request->isi;
        $testimoni->rating = $request->rating;
        $testimoni->jenis_kelamin = $request->jenis_kelamin;  // Assign jenis_kelamin
        // $testimoni->user_id = Auth::id();  // Hapus baris ini atau gunakan Opsi 1 (autentikasi)
        $testimoni->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('testimoni.public')->with('success', 'Testimoni Anda berhasil dikirim.'); // Redirect ke route yang benar
    }
}