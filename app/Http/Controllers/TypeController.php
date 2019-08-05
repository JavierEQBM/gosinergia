<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller {
    public function index(array $data) {
        return app('App\Http\Controllers\ModelController')->index([
            'model' => Type::class,
            'with' => $data['with'],
            'where' => $data['where'],
        ]);
    }

    public function store(array $data) {
        $type = Type::create($data['model']);

        return [
            'success' => true,
            'type' => $this->index([
                'with' => $data['with'],
                'where' => ['id'=>$type->id], 
            ])->first()
        ];
    }
}
