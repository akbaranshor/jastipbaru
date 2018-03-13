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
            	'name' => 'Double Cheese',
            	'price' => 47500,
            	'description' => 'Berat 450 Gram, Tinggi: 0 Cm, Lebar: 0 Cm, Panjang 0 Cm',
            	'stock' => 0,
                'store_id' => 1,
                'src' => 'https://www.mcdonalds.com.my/storage/foods/September2017/thumb2doublecheeseburger-efc3a63a9d.jpg'
        	]);

            DB::table('products')->insert([
                'name' => 'Drum Stick',
                'price' => 57500,
                'description' => 'Berat 180 Gram , Tinggi: 0 Cm, Lebar: 0 Cm, Panjang 0 Cm',
                'stock' => rand(),
                'store_id' => 2,
                'src' => 'https://gzira.kfc-malta.com/binary_resources/10312466'
            ]);


            

            
        
    	
        
    }
}
