<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller {
    public function index(array $data) {
        return app('App\Http\Controllers\ModelController')->index([
            'model' => Product::class,
            'with' => $data['with'],
            'where' => $data['where'],
        ]);
    }

    public function store(array $data) {
        $product = Product::create($data['model']);

        return [
            'success' => true,
            'product' => $this->index([
                'with' => $data['with'],
                'where' => ['id'=>$product->id], 
            ])->first()
        ];
    }

    public function show(array $data) {
        return app('App\Http\Controllers\ModelController')->show([
            'model' => Product::class,
            'id' => $data['id'],
        ]);
    }

    public function update(array $data) {
        Product::find($data['model_id'])->update($data['model']);

        return [
            'success' => true,
            'product' => $this->index([
                'with' => $data['with'],
                'where' => ['id'=>$data['model_id']], 
            ])->first()
        ];
    }

    public function destroy(array $data) {
        return $this->update([
            'model_id' => $data['id'],
            'model' => [
                'status' => false,
            ],
            'with' => [],
        ]);
    }
}
