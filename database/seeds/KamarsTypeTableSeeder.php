<?php

use Illuminate\Database\Seeder;

class KamarsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('kamar_types')->insert([
            [
            'nama' => 'Standart',
            'harga_malam' => '375000',
             'harga_orang' => '0',
            'keterangan' => 'Kamar Standart ',
           ],
           [
            'nama' => 'Superior',
            'harga_malam' => '400000',
             'harga_orang' => '0',
            'keterangan' => 'Kamar Superior',
           ],
           [
            'nama' => 'Deluxe',
            'harga_malam' => '450000',
             'harga_orang' => '0',
            'keterangan' => 'Kamar Deluxe',
           ],
           [

            'nama' => 'Junior Suite',
            'harga_malam' => '650000',
             'harga_orang' => '0',
            'keterangan' => 'Kamar Junior',

           ],
           [

            'nama' => 'Suite Room',
            'harga_malam' => '800000',
             'harga_orang' => '0',
            'keterangan' => 'Kamar Junior',

           ],
            [

            'nama' => 'Presidential',
            'harga_malam' => '1200000',
             'harga_orang' => '0',
            'keterangan' => 'Kamar Presidential',

           ],

        ]);

    }
}
