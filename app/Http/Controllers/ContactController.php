<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showPublic()
    {
        $contacts = Contact::all(); // Ambil semua data kontak
        return view('contact.index', compact('contacts')); // Kirim data ke view
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all(); // Ambil semua data kontak
        return view('admin.contacts.index', compact('contacts')); // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'email' => 'required|email',
            'address_embed' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contacts.index')
                         ->with('success','Kontak berhasil ditambahkan.');
    }

    public function storePublic(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|max:255',
                'message' => 'required',
            ]);

            // Simpan data ke database (jika diperlukan)
            // atau
            // Kirim email

            // Misalnya, menyimpan ke database:
            \App\Models\ContactMessage::create($validatedData); // Ganti Message dengan ContactMessage

            return redirect()->route('contact')->with('success', 'Your message has been sent. Thank you!');

        } catch (\Exception $e) {
            \Log::error($e); // Catat error ke log Laravel
            // Atau, tampilkan pesan error (hanya untuk debugging, jangan di produksi!)
            // dd($e);
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'phone_number' => 'required',
            'email' => 'required|email',
            'address_embed' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')
                         ->with('success','Kontak berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
                         ->with('success','Kontak berhasil dihapus');
    }
}