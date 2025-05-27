<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function showPublic()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'email' => 'required|email',
            'address_embed' => 'required',
        ]);

        // Dapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Gabungkan data dari request dengan user_id
        $data = $request->all();
        $data['user_id'] = $userId;

        Contact::create($data);

        return redirect()->route('admin.contacts.index')
                         ->with('success','Kontak berhasil ditambahkan.');
    }

    public function storePublic(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|max:255',
                'message' => 'required',
            ]);

            // Simpan data ke database
            ContactMessage::create($validatedData);

            // Redirect dengan pesan sukses
            return redirect()->route('contact.index')->with('success', 'Your message has been sent. Thank you!');

        } catch (\Exception $e) {
            // Log kesalahan
            \Log::error('Gagal menyimpan pesan kontak: ' . $e->getMessage());

            // Redirect dengan pesan kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
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
     * Update the specified resource.
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
     * Remove the specified resource.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
                         ->with('success','Kontak berhasil dihapus');
    }
}