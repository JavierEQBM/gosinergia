<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller {
    public function index(array $data) {
        return app('App\Http\Controllers\ModelController')->index([
            'model' => Type::class,
            'with' => [],
        ]);
    }

    public function store(array $data) {
        return Type::create($data);
    }
}
