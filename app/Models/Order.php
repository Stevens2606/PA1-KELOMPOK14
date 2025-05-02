<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_id', // Ganti 'menu_name' dengan 'menu_id'
        'quantity',
        'price',
        'total_price',
        'status', // Tambahkan 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu() //Tambahkan relasi ke Menu
    {
        return $this->belongsTo(Menu::class);
    }
}