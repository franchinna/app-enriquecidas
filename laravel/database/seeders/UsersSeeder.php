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
        //

        DB::table('users')->insert([

            //Super user. Puede crear, actualizar y borrar cds. Comprar. 
            [
                'user_id' => 1,
                'email' => 'admin@admin.com',
                'name' => 'Admin',
                'rol' => 1,
                'password' => Hash::make('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            //Usuario normal, solo puede comprar. 
            [
                'user_id' => 2,
                'email' => 'test@test.com',
                'name' => 'Test',
                'rol' => 0,
                'password' => Hash::make('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
            //Usuario normal, solo puede comprar. 
            [
                'user_id' => 3,
                'email' => 'terricola@terricola.com',
                'name' => 'terricola',
                'rol' => 0,
                'password' => Hash::make('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
