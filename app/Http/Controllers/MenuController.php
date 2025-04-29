<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource (for Admin).
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));  //Lokasi view diubah
    }

    /**
     * Show the form for creating a new resource (for Admin).
     */
    public function create()
    {
        return view('admin.menus.create'); //Lokasi view diubah
    }

    /**
     * Store a newly created resource in storage (for Admin).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required|in:FOOD,DRINKS,DIMSUM,SNACK', // Validasi kategori yang benar
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('public/menus', $nama_gambar);
            $data['gambar'] = $nama_gambar;  // Simpan nama file saja
        }

        Menu::create($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil ditambahkan.');  //Route name diubah
    }

    /**
     * Display the specified resource (for Admin).
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu'));  //Lokasi view diubah
    }

    /**
     * Show the form for editing the specified resource (for Admin).
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));  //Lokasi view diubah
    }

    /**
     * Update the specified resource in storage (for Admin).
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required|in:FOOD,DRINKS,DIMSUM,SNACK', // Validasi kategori yang benar
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($menu->gambar) {
                Storage::delete('public/menus/' . $menu->gambar);
            }

            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('public/menus', $nama_gambar);
            $data['gambar'] = $nama_gambar; // Simpan nama file saja
        }

        $menu->update($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil diupdate.'); //Route name diubah
    }

    /**
     * Remove the specified resource from storage (for Admin).
     */
    public function destroy(Menu $menu)
    {
        if ($menu->gambar) {
            Storage::delete('public/menus/' . $menu->gambar);
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dihapus.'); //Route name diubah
    }

    /**
     * Display a listing of the resource for public viewing.
     */
    public function showPublic()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));  //Lokasi view diubah
    }

    /**
     * Display the specified resource for public viewing (Detail).
     */
    public function showDetailPublic(Menu $menu)
    {
        return view('menu.detail', compact('menu')); // Ubah lokasi view sesuai kebutuhan
    }
}