<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

            //Super user. Puede crear, actualizar y borrar cds. Comprar. 
            [
                'id' => 1,
                'email' => 'admin@admin.com',
                'name' => 'Admin',
                'rol_id' => 1,
                'available' => 'Y',
                'password' => Hash::make('123456'),
                'created_at' => date('2023-01-01'),
            ],

            [
                'id' => 2,
                'email' => 'test@test.com',
                'name' => 'Test',
                'rol_id' => 2,
                'available' => 'N',
                'password' => Hash::make('123456'),
                'created_at' => date('2023-04-01'),
            ],
            
            [
                'id' => 3,
                'email' => 'terricola@terricola.com',
                'name' => 'terricola',
                'rol_id' => 2,
                'available' => 'Y',
                'password' => Hash::make('123456'),
                'created_at' => date('2023-03-01'),
            ],
            
            [
                'id' => 4,
                'email' => 'pluton@pluton.com',
                'name' => 'pluton',
                'rol_id' => 2,
                'available' => 'Y',
                'password' => Hash::make('123456'),
                'created_at' => date('2023-03-01'),
            ],
            
            [
                'id' => 5,
                'email' => 'venus@venus.com',
                'name' => 'venus',
                'rol_id' => 2,
                'available' => 'Y',
                'password' => Hash::make('123456'),
                'created_at' => date('2023-03-01'),
            ],
            
            [
                'id' => 6,
                'email' => 'marte@marte.com',
                'name' => 'marte',
                'rol_id' => 2,
                'available' => 'N',
                'password' => Hash::make('123456'),
                'created_at' => date('2023-04-01'),
            ],
            
            [
                'id' => 7,
                'email' => 'urano@urano.com',
                'name' => 'urano',
                'rol_id' => 2,
                'available' => 'N',
                'password' => Hash::make('123456'),
                'created_at' => date('2023-09-01'),
            ],
        ]);
    }
}
