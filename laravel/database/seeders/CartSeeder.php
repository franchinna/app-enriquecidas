<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart')->insert([
            // [
            //     'cd_id' => 1,
            //     'quantity' => 1,
            //     'order'=> 9238,
            //     'status'=> 'in progress',
            //     'created_at' => date('Y-m-d'),
            //     'updated_at' => date('Y-m-d'),
            //     'user_id' => 2
            // ],
            // [
            //     'cd_id' => 2,
            //     'quantity' => 3,
            //     'order'=> 9238,
            //     'status'=> 'in progress',
            //     'created_at' => date('Y-m-d'),
            //     'updated_at' => date('Y-m-d'),
            //     'user_id' => 2
            // ],
            // [
            //     'cd_id' => 3,
            //     'quantity' => 4,
            //     'order'=> 9238,
            //     'status'=> 'in progress',
            //     'created_at' => date('Y-m-d'),
            //     'updated_at' => date('Y-m-d'),
            //     'user_id' => 2
            // ],
            // [
            //     'cd_id' => 2,
            //     'quantity' => 3,
            //     'order'=> 0001,
            //     'status'=> 'Delivered',
            //     'created_at' => date('Y-m-d'),
            //     'updated_at' => date('Y-m-d'),
            //     'user_id' => 2
            // ],
            // [
            //     'cd_id' => 3,
            //     'quantity' => 4,
            //     'order'=> 0001,
            //     'status'=> 'Delivered',
            //     'created_at' => date('Y-m-d'),
            //     'updated_at' => date('Y-m-d'),
            //     'user_id' => 2
            // ],
        ]);
    }
}
