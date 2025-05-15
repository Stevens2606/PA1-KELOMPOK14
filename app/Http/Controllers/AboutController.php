<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\Validator; // Import Validator facade

class AboutController extends Controller
{
    /**
     * Display a listing of the resource. (Untuk Admin - Daftar About Us)
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource. (Untuk Admin - Form Tambah About Us)
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage. (Untuk Admin - Simpan About Us Baru)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'team' => 'nullable|array', // Ubah validasi menjadi array
            'values' => 'nullable|array', // Ubah validasi menjadi array
            'video_url' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            About::create([
                'user_id' => Auth::id(), // Set user_id saat membuat About baru
                'title' => $request->title,
                'description' => $request->description,
                'mission' => $request->mission,
                'vision' => $request->vision,
                'team' => $request->team, // Tidak perlu json_encode lagi
                'values' => $request->values, // Tidak perlu json_encode lagi
                'video_url' => $request->video_url,
            ]);

            return redirect()->route('admin.abouts.index')
                ->with('success', 'About section created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Failed to create About section. ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource. (Untuk Admin - Detail About Us)
     */
    public function show(About $about)
    {
        return view('admin.abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource. (Untuk Admin - Form Edit About Us)
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage. (Untuk Admin - Update About Us)
     */
    public function update(Request $request, About $about)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'team' => 'nullable|array', // Ubah validasi menjadi array
            'values' => 'nullable|array', // Ubah validasi menjadi array
            'video_url' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $about->update([
                'title' => $request->title,
                'description' => $request->description,
                'mission' => $request->mission,
                'vision' => $request->vision,
                'team' => $request->team, // Tidak perlu json_encode lagi
                'values' => $request->values, // Tidak perlu json_encode lagi
                'video_url' => $request->video_url,
            ]);
            return redirect()->route('admin.abouts.index')
                ->with('success', 'About section updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Failed to update About section. ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage. (Untuk Admin - Hapus About Us)
     */
    public function destroy(About $about)
    {
        try {
            $about->delete();
            return redirect()->route('admin.abouts.index')
                ->with('success', 'About section deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Failed to delete About section. ' . $e->getMessage()]);
        }
    }

    /**
     * Display the About Us section on the public website. (Untuk Tampilan Publik)
     */
    public function showAboutPage()
    {
        $about = About::first(); // Ambil entri About Us pertama (atau gunakan pagination jika ada banyak)
        return view('about.index', compact('about'));
    }
}