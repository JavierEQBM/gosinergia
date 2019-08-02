<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$TypeController = new \App\Http\Controllers\TypeController;

        $types = [
        	[
        		'type' => 'Mayoreo',
        	],

        	[
        		'type' => 'Menudeo',
        	]
        ];

        foreach ($types as $type) {
        	$TypeController->store($type);
        }
    }
}
