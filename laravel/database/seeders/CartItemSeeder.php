<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    public function run()
    {
        DB::table('cart_items')->insert([
            
            [
                'id' => 1,
                'cart_id' => 1,
                'cd_id' => 4,
                'quantity' => 2,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'cart_id' => 1,
                'cd_id' => 5,
                'quantity' => 2,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'cart_id' => 1,
                'cd_id' => 1,
                'quantity' => 5,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'cart_id' => 2,
                'cd_id' => 1,
                'quantity' => 3,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'cart_id' => 2,
                'cd_id' => 2,
                'quantity' => 2,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'cart_id' => 3,
                'cd_id' => 5,
                'quantity' => 2,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'cart_id' => 3,
                'cd_id' => 1,
                'quantity' => 2,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'cart_id' => 4,
                'cd_id' => 3,
                'quantity' => 2,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'cart_id' => 5,
                'cd_id' => 3,
                'quantity' => 1,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'cart_id' => 6,
                'cd_id' => 1,
                'quantity' => 3,
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
        ]);
    }
}
