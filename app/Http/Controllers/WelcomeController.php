<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Contact;
use App\Models\Testimoni;
use App\Models\Galeri;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $menus = Menu::take(100)->get(); // Ambil 5 menu pertama
        $contacts = Contact::take(3)->get(); // Ambil 3 kontak pertama
        $feedbacks = Testimoni::take(4)->get(); // Ambil 4 testimoni pertama
        $galeris = Galeri::take(6)->get(); // Ambil 6 galeri pertama

        return view('home.welcome', compact('menus', 'contacts', 'feedbacks', 'galeris'));
    }
}