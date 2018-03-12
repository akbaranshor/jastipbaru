<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		DB::table('products')->insert([
            	'name' => 'Kacang Hijau Bollen',
            	'price' => 47500,
            	'description' => 'Berat 450 Gram, Tinggi: 0 Cm, Lebar: 0 Cm, Panjang 0 Cm',
            	'stock' => 0,
                'src' => 'img/Kacang_Hijau_Bollen.jpg'
        	]);

            DB::table('products')->insert([
                'name' => 'Almond Cookies',
                'price' => 57500,
                'description' => 'Berat 180 Gram , Tinggi: 0 Cm, Lebar: 0 Cm, Panjang 0 Cm',
                'stock' => rand(),
                'src' => 'img/Almond_Cookies_12.jpg'
            ]);

            DB::table('products')->insert([
                'name' => 'Brownies Kukus Original',
                'price' => 47500,
                'description' => 'Berat 900 Gram , Tinggi: 0 Cm, Lebar: 0 Cm, Panjang 0 Cm',
                'stock' => rand(),
                'src' => 'img/Brownies_Kukus_Original2.jpg'
            ]);

            DB::table('products')->insert([
                'name' => 'Bagelen Special Keju',
                'price' => 51000,
                'description' => 'Berat 273 Gram , Tinggi: 25 Cm, Lebar: 8 Cm, Panjang 20 Cm',
                'stock' => rand(),
                'src' => 'img/bagelen_kartika_toast_special_cheese252g'
            ]);

            DB::table('products')->insert([
                'name' => 'Bagelen Special Butter',
                'price' => 50000,
                'description' => 'Berat 252 Gram , Tinggi: 25 Cm, Lebar: 8 Cm, Panjang 20 Cm',
                'stock' => rand(),
                'src' => 'img/44.jpg'
            ]);

            DB::table('products')->insert([
                'name' => 'Pisang Bollen Mini',
                'price' => 4600,
                'description' => 'Berat 700 Gram , Tinggi: 0 Cm, Lebar: 0 Cm, Panjang 0 Cm',
                'stock' => rand(),
                'src' => 'img/Pisang_Bollen2.jpg'
            ]);
    	
    }
}
