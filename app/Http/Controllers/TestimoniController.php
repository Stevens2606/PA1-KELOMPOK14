<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function __construct()
    {
        // Semua method butuh otentikasi, kecuali showPublic dan submit
        $this->middleware('auth')->except(['showPublic', 'submit']);
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function index()
    {
        $testimonis = Testimoni::all();
        return view('admin.testimonis.index', compact('testimonis'));
    }

    /**
     * Display a listing of approved testimoni for public viewing.
     */
    public function showPublic()
    {
        $testimonis = Testimoni::all(); // Hanya tampilkan yang disetujui
        return view('testimoni.index', compact('testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonis.create');
    }

    /**
     * Store a newly created resource in storage (Admin).
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'isi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $testimoni = new Testimoni($validatedData);
        $testimoni->status = 'approved';
        $testimoni->save();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    /**
     * Display the specified resource (Admin).
     */
    public function show(Testimoni $testimoni)
    {
        return view('admin.testimonis.show', compact('testimoni'));
    }

    /**
     * Show the form for editing the specified resource (User and Admin).
     */
    public function edit(Testimoni $testimoni)
    {
        if (!Auth::user()->isAdmin() && Auth::id() !== $testimoni->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit testimoni ini.');
        }

        return view('testimoni.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage (User and Admin).
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        if (!Auth::user()->isAdmin() && Auth::id() !== $testimoni->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit testimoni ini.');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'isi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $testimoni->update($validatedData);

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
        } else {
            return redirect()->route('testimoni.public')->with('success', 'Testimoni berhasil diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage (Admin).
     */
    public function destroyByAdmin(Testimoni $testimoni)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus testimoni ini.');
        }

        $testimoni->delete();
        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus (Admin).');
    }

    /**
     * Remove the specified resource from storage (User).
     */
    public function destroyByUser(Testimoni $testimoni)
    {
        if (Auth::id() !== $testimoni->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus testimoni ini.');
        }

        $testimoni->delete();
        return redirect()->route('testimoni.public')->with('success', 'Testimoni berhasil dihapus.');
    }

    /**
     * Submit a new testimoni (Public).
     */
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'isi' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'jenis_kelamin' => 'nullable|in:pria,wanita,lainnya',
        ]);

        $testimoni = new Testimoni();
        $testimoni->nama = $request->nama;
        $testimoni->isi = $request->isi;
        $testimoni->rating = $request->rating;
        $testimoni->jenis_kelamin = $request->jenis_kelamin;
        $testimoni->user_id = Auth::id(); // Pastikan ini ada dan benar
        $testimoni->save();

        return redirect()->route('testimoni.public')->with('success', 'Testimoni Anda berhasil dikirim. Menunggu persetujuan admin.');
    }

    // Tambahkan method untuk admin menyetujui/menolak testimoni
    public function approve(Testimoni $testimoni)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Anda tidak memiliki izin untuk menyetujui testimoni.');
        }

        $testimoni->status = 'approved';
        $testimoni->save();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil disetujui.');
    }

    public function reject(Testimoni $testimoni)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Anda tidak memiliki izin untuk menolak testimoni.');
        }

        $testimoni->status = 'rejected';
        $testimoni->save();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditolak.');
    }
}