<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{

    public function showPublic()
    {
        $about = About::first(); // Ambil entri pertama About Us dari database

        // Atau, jika Anda ingin mengambil entri terbaru:
        // $about = About::latest()->first();

        return view('about.index    ', ['about' => $about]);
    }
    /**
     * Menampilkan daftar "About Us" (halaman index).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $abouts = About::all();

        return view('admin.abouts.index', ['abouts' => $abouts]);
    }

    /**
     * Menampilkan form untuk membuat entri "About Us" yang baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Menyimpan entri "About Us" yang baru dibuat ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'content' => $request->input('content'),
            'video_url' => $request->input('video_url'),
            'user_id' => Auth::id(),  // Dapatkan ID user yang sedang login
        ];

        // Handle upload gambar
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/abouts', $filename);
            $data['image_path'] = 'abouts/' . $filename;
        }

        // Membuat entri "About Us" yang baru
        About::create($data);

        // Redirect
        return redirect()->route('admin.abouts.index')->with('success', 'Entri "About Us" berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit entri "About Us" yang ada.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\View\View
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Memperbarui entri "About Us" yang ada di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, About $about)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'content' => $request->input('content'),
            'video_url' => $request->input('video_url'),
        ];

        // Handle upload gambar
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama jika ada
            if ($about->image_path) {
                Storage::delete('public/' . $about->image_path);
            }

            $image = $request->file('image_path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/abouts', $filename);
            $data['image_path'] = 'abouts/' . $filename;
        }

        // Memperbarui entri "About Us"
        $about->update($data);

        // Redirect
        return redirect()->route('admin.abouts.index')->with('success', 'Entri "About Us" berhasil diperbarui.');
    }

    /**
     * Menghapus entri "About Us" dari database.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(About $about)
    {
        // Hapus gambar jika ada
        if ($about->image_path) {
            Storage::delete('public/' . $about->image_path);
        }

        $about->delete();

        return redirect()->route('admin.abouts.index')->with('success', 'Entri "About Us" berhasil dihapus.');
    }
}