<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'cd_id',
        'quantity',
    ];

    // Relación con el modelo Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Relación con el modelo Cd
    public function cd()
    {
        return $this->belongsTo(Cd::class, 'cd_id', 'cd_id');
    }
}
