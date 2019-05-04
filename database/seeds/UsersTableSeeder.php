<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('users')->insert([


            [
                'name' => 'Ipi',
                        'username' => 'admin',
                        'jabatan' => 'administrator',
                        'email' => 'admin@demo.com',
                        'password' => bcrypt('123456'),
                        'level' => '1',
                        'active' => '1',
           ],

             [
                'name' => 'Sarah',
                        'username' => 'front',
                        'jabatan' => 'front office',
                        'email' => 'front@demo.com',
                        'password' => bcrypt('123456'),
                        'level' => '2',
                        'active' => '1',
           ],

             [
                'name' => 'Amelia',
                        'username' => 'room',
                        'jabatan' => 'room service',
                        'email' => 'room@demo.com',
                        'password' => bcrypt('123456'),
                        'level' => '3',
                        'active' => '1',
           ],

            
        ]);
    }
}
