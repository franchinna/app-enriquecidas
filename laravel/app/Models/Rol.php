<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // Definir la relación inversa si es necesario
    public function users()
    {
        return $this->hasMany(User::class, 'rol_id');
    }
}
