<?php
// database/factories/CartFactory.php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition()
    {
        return [
            'user_id' => 1, // O el valor que desees asignar
            'cd_id' => $this->faker->randomNumber(), // Ajusta según tus necesidades
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['In progress', 'Completed']),
            'order' => $this->faker->uuid, // O ajusta según tus necesidades
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
