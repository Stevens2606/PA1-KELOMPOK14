<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Tambahkan user_id ke fillable
        'title',
        'description',
        'mission',
        'vision',
        'team',
        'values',
        'video_url',
    ];

    protected $casts = [
        'team' => 'array',
        'values' => 'array',
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}