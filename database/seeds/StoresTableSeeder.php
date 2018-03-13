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
            	'nama' => 'MCD',
            	'alamat' => 'Jalan Menuju',
                'src' => 'https://i0.wp.com/muhammad-akbar.com/wp-content/uploads/2015/11/makan-hemat-di-mcdonalds1.jpg?resize=630%2C545'
        	]);

        	DB::table('stores')->insert([
            	'nama' => 'KFC',
            	'alamat' => 'Jalan Pulang',
                'src' => 'https://pbs.twimg.com/profile_images/804290535905259520/K6HVOG1O_400x400.jpg'
        	]);


          
    }
}
