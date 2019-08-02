<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller {
    public function index(array $data) {
        return app('App\Http\Controllers\ModelController')->index([
            'model' => Product::class,
        ]);
    }

    public function store(array $data) {
        return Product::create($data);
    }

    public function show(array $data) {
        return app('App\Http\Controllers\ModelController')->show([
            'model' => Product::class,
            'id' => $data['id'],
        ]);
    }

    public function update(array $data) {
        return [
            'success' => Product::find($data['model_id'])->update($data['model']),
        ];
    }

    public function destroy(array $data) {
        return $this->update([
            'model_id' => $data['id'],
            'model' => [
                'status' => false,
            ],
        ]);
    }
}
