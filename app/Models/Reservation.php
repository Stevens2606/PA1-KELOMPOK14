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
    ];

    protected $casts = [
        'reservation_time' => 'datetime',
    ];
}