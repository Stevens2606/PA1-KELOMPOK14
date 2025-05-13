<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'menu_id',
        'quantity',
        'price',
    ];

    /**
     * Get the cart that owns the CartItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
public function cart()
{
    return $this->belongsTo(Cart::class, 'cart_id');
}


    /**
     * Get the menu that owns the CartItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}