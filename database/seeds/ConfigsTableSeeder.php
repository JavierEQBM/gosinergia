<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ConfigController = new \App\Http\Controllers\ConfigController;

        $configs = [
        	[
        		'config' => 'autologin',
        		'value1' => false,
        	],
        ];

        foreach ($configs as $config) {
        	$ConfigController->store($config);
        }
    }
}
