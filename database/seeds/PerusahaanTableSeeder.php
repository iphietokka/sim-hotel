<?php

use Illuminate\Database\Seeder;

class PerusahaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('perusahaans')->insert([
            'nama_hotel' => 'Hotel Melati',
            'nama_perusahaan' => 'PT.Maju Mundur',
            'alamat_jalan' => 'Jalan. Ahmad Yani No.22',
            'alamat_kabupaten' => 'Bantul',
            'alamat_provinsi' => 'Daerah Istimewa Yogyakarta',
            'nomor_telp' => '09876543321',
            'nomor_fax' => '027412345',
            'website' => 'www.majumundur.com',
           
            'email' => 'maju@mundur.com',
            
        ]);
    }
}
