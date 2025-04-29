<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    // Nama tabel (jika berbeda dari konvensi Laravel)
    protected $table = 'contact_messages';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read', // Jika Anda ingin kolom is_read juga bisa diisi secara mass assignment
    ];

    // (Opsional) Kolom yang tidak boleh diisi
    // protected $guarded = ['id'];

    // (Opsional) Jika Anda ingin mengubah format tanggal
    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d H:i:s',
    //     'updated_at' => 'datetime:Y-m-d H:i:s',
    // ];

    // (Opsional) Jika Anda tidak ingin menggunakan timestamps (created_at, updated_at)
    // public $timestamps = false;
}