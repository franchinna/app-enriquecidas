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

        DB::table('carts')->insert([

            [
                'id' => 1,
                'user_id' => 2,
                'status' => 'In progress',
                'created_at' => date('2023-01-11'),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'user_id' => 7,
                'status' => 'In progress',
                'created_at' => date('2023-10-10'),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'status' => 'In progress',
                'created_at' => date('2023-11-01'),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'status' => 'Finished',
                'created_at' => date('2023-12-01'),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'user_id' => 6,
                'status' => 'Finished',
                'created_at' => date('2023-01-01'),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'user_id' => 5,
                'status' => 'Finished',
                'created_at' => date('2023-02-01'),
                'updated_at' => now(),
            ],
        ]);
    }
}
