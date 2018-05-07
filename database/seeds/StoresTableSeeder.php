<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	DB::table('stores')->insert([
                'nama' => 'Kantin Jatinangor',
                'alamat' => 'Jl. Raya Cirebon - Bandung No.196, Cikeruh, Jatinangor, Kabupaten Sumedang, Jawa Barat 45363',
                'src' => 'http://cdn2.tstatic.net/jabar/foto/bank/images/kantin-jatinangor_20170809_142419.jpg'
            ]);

            DB::table('stores')->insert([
                'nama' => 'AGL',
                'alamat' => 'Jl. Raya Jatinangor KM.21, Hegarmanah, Jatinangor, Kabupaten Sumedang, Jawa Barat 45363',
                'src' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkDjvclRGNCEYtjbg6uqLKT2jV9SlfU2ARjU1FWmGIKleCnlMN'
            ]);
          
    }
}
