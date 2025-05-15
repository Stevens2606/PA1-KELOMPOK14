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
        'user_id',
        'jenis_kelamin', // Tambahkan ini
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}