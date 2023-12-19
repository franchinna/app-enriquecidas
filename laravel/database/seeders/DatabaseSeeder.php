<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(GenresSeeder::class);
        $this->call(ArtistsSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(CdsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CartItemSeeder::class);
    }
}
