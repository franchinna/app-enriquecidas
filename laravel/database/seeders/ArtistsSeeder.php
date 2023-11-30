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
            [
                'artist_id' => 6,
                'name' => 'Ed Sheeran',
                'country' => 'United Kingdom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 7,
                'name' => 'Beyoncé',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 8,
                'name' => 'Shawn Mendes',
                'country' => 'Canada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 9,
                'name' => 'Adele',
                'country' => 'United Kingdom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 10,
                'name' => 'Drake',
                'country' => 'Canada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 11,
                'name' => 'Taylor Swift',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 12,
                'name' => 'Justin Bieber',
                'country' => 'Canada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 13,
                'name' => 'Rihanna',
                'country' => 'Barbados',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 14,
                'name' => 'Bruno Mars',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 15,
                'name' => 'Katy Perry',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 16,
                'name' => 'Coldplay',
                'country' => 'United Kingdom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 17,
                'name' => 'Eminem',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'artist_id' => 18,
                'name' => 'Ariana Grande',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
