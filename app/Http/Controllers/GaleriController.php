<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GaleriController extends Controller
{
    // Daftar Galeri (Admin)
    public function index()
    {
        $galeris = Galeri::all();
        return view('admin.galeri.index', compact('galeris'));
    }

    // Form Tambah Galeri (Admin)
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan Galeri Baru (Admin)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $gambarPath = $request->file('gambar')->store('public/galeri');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => str_replace('public/', '', $gambarPath),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    // Tampilkan Detail Galeri (Admin)
    public function show(Galeri $galeri)
    {
        return view('admin.galeri.show', compact('galeri'));
    }

    // Form Edit Galeri (Admin)
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    // Update Galeri (Admin)
    public function update(Request $request, Galeri $galeri)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            Storage::delete('public/' . $galeri->gambar);

            $gambarPath = $request->file('gambar')->store('public/galeri');
            $data['gambar'] = str_replace('public/', '', $gambarPath);
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    // Hapus Galeri (Admin)
    public function destroy(Galeri $galeri)
    {
        Storage::delete('public/' . $galeri->gambar);

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }

    // Tampilkan Galeri Publik
    public function showPublic()
    {
        $galeris = Galeri::all();
        return view('gallery.index', compact('galeris'));
    }
}