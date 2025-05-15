<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'reservation_time',
        'number_of_guests',
        'notes',
        'status',
        'user_id',  // Tambahkan ini
    ];

    protected $casts = [
        'reservation_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}