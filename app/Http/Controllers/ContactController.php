<?php

namespace App\Http\Controllers;

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