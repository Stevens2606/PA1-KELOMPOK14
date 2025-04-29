<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage; // Import model
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data ke database
        ContactMessage::create($validatedData);

        // Kirim respon sukses (bisa diarahkan kembali ke halaman kontak atau menampilkan pesan)
        return redirect()->route('contact.index')->with('success', 'Pesan Anda telah terkirim!');
    }

    // Metode untuk menampilkan daftar pesan (khusus untuk admin)
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get(); // Ambil semua pesan, urutkan dari terbaru
        return view('contact.index', compact('messages')); // Kirim ke view admin
    }

    // Metode untuk menampilkan detail pesan (khusus untuk admin)
    public function show(ContactMessage $contactMessage)
    {
        // Tandai pesan sebagai sudah dibaca
        $contactMessage->update(['is_read' => true]);

        return view('admin.contact_messages.show', compact('contactMessage'));
    }

    // (Opsional) Metode untuk menghapus pesan
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact_messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}