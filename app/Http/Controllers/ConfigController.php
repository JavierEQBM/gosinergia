<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;

class ConfigController extends Controller {
    public function index(array $data) {
        return app('App\Http\Controllers\ModelController')->index([
            'model' => Config::class,
            'with' => $data['with'],
            'where' => $data['where'],
        ]);
    }

    public function store(array $data) {
        $config = Config::create($data['model']);

        return [
            'success' => true,
            'config' => $this->index([
                'with' => $data['with'],
                'where' => ['id'=>$config->id], 
            ])->first()
        ];
    }
}
