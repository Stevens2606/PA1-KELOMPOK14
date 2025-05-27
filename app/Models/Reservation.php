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
        'number_of_guests',
        'notes',
        'status',
        'user_id',
        'meja_id',
        'start_time',
        'end_time'
    ];

     protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}