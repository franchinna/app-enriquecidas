<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //use HasFactory;    
    protected $table = 'carts';
    protected $primaryKey = 'id';


    protected $fillable = [
        'user_id',
        'status',
        'id'
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relación con el modelo CartItem
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Relación con el modelo Cd
    public function cd()
    {
        return $this->belongsTo(Cd::class, 'cd_id', 'cd_id');
    }
}
