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
        $ProductController = new \App\Http\Controllers\ProductController;

        $products = [
        	[
        		'name' => 'Toalla',
        		'sku' => 11076,
        		'type_id' => \App\Type::where('type', 'Mayoreo')->get()->first()->id,
        	],

        	[
        		'name' => 'Zapatos',
        		'sku' => 12009,
        		'type_id' => \App\Type::where('type', 'Menudeo')->get()->first()->id,
        	],

        	[
        		'name' => 'Bufanda',
        		'sku' => 17895,
        		'type_id' => \App\Type::where('type', 'Menudeo')->get()->first()->id,
        	],
        ];

        foreach ($products as $product) {
        	$ProductController->store($product);
        }
    }
}
