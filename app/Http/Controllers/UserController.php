<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {
    public function index(array $data) {
        return app('App\Http\Controllers\ModelController')->index([
            'model' => User::class,
            'with' => $data['with'],
            'where' => $data['where'],
        ]);
    }

    public function store(array $data) {
        $user = user::create($data['model']);

        return [
            'success' => true,
            'user' => $this->index([
                'with' => $data['with'],
                'where' => ['id'=>$user->id], 
            ])->first()
        ];
    }
}
