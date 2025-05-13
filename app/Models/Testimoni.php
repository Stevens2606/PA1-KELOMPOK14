<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    // Definisikan kolom-kolom yang boleh diisi (fillable)
    protected $fillable = [
        'nama',
        'isi',
        'rating',
        'jenis_kelamin',
        'status', // Atau kolom-kolom lain yang Anda punya
    ];
}