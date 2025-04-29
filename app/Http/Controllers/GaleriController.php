<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage

class GaleriController extends Controller
{
    // Fungsi untuk tampilan publik
    public function showPublic()
    {
        $galeris = Galeri::all();
        return view('galeri.show', compact('galeris'));
    }

    // Fungsi di bawah ini untuk admin
    public function index()
    {
        $galeris = Galeri::all();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'nullable',
        ]);

        $gambar = $request->file('gambar');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $pathGambar = $gambar->storeAs('public/galeri', $namaGambar); // Simpan di storage/app/public/galeri

        Galeri::create([
            'judul' => $request->judul,
            'gambar' => $namaGambar, // Simpan hanya nama file
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show(Galeri $galeri)
    {
        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'nullable',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            Storage::delete('public/galeri/' . $galeri->gambar);

            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/galeri', $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupdate.');
    }

    public function destroy(Galeri $galeri)
    {
        // Hapus gambar dari storage
        Storage::delete('public/galeri/' . $galeri->gambar);

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}