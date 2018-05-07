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
                'name' => 'Ayam Kentucky',
                'price' => 7000,
                'description' => 'Topingnya ada beragam, mulai dari suwiran ayam, potongan cakwe, kacang, telur, dan bawang goreng',
                'stock' => rand(),
                'store_id' => 1,
                'src' => 'https://cdn.idntimes.com/content-images/community/2018/01/1516684505912-8cdd118569fcbb142ecf3471c2f457b1.jpg'
            ]);

            DB::table('products')->insert([
                'name' => 'Ayam Goreng',
                'price' => 20000,
                'description' => 'Selain ayam, dalam satu paketnya biasanya ada tumis buncis yang enak banget dan tentunya sambal yang selalu bikin nagih!',
                'stock' => rand(),
                'store_id' => 2,
                'src' => 'https://cdn.idntimes.com/content-images/community/2018/01/16123244-391036421244074-2638224223239143424-n-c4d115f55757ca68cc67c3f6146cfc8d.jpg'
            ]);




            

            
        
    	
        
    }
}
