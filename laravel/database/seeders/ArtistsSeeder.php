<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('artists')->insert([
            [
                'artist_id' => 1,
                'name' => 'Pink Floyd',
                'country' => 'United Kingdom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 2,
                'name' => 'Maroon 5',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 3,
                'name' => 'Luis Miguel',
                'country' => 'Puerto Rico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 4,
                'name' => 'John Mayer',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 5,
                'name' => 'Queen',
                'country' => 'United Kingdom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
