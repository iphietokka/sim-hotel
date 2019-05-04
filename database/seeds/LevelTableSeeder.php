<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('levels')->insert([

            [
            'nama' => 'Admin',
            'keterangan' => 'administrator', 
            ],
             [
            'nama' => 'Front',
            'keterangan' => 'Front Office', 
            ],
             [
            'nama' => 'Petugas',
            'keterangan' => 'Room Service', 
            ],
            
           
            
        ]);
    }
}
