<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'genre_id' => 1,
                'name' => 'Rock and Roll',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 2,
                'name' => 'Country',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 3,
                'name' => 'Dance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 4,
                'name' => 'Jazz',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 5,
                'name' => 'Blues',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
