<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UserController = new \App\Http\Controllers\UserController;

        $users = [
        	[
        		'name' => 'Root',
        		'email' => 'root@gosinergia.com',
        		'password' => Hash::make('root'),
        	],
        ];

        foreach ($users as $user) {
        	$UserController->store($user);
        }
    }
}
