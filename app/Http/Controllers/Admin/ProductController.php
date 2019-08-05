<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller {
    public function index() {
        return app('App\Http\Controllers\ProductController')->index([
            'with' => ['type'],
            'where' => ['status'=>1],
        ]);
    }

    public function store(\App\Http\Requests\Product\Store $request) {
        return app('App\Http\Controllers\ProductController')->store([
            'model' => [
                'name' => $request->name,
                'sku' => $request->sku,
                'type_id' => $request->type_id,
                'visible' => $request->visible,
            ],

            'with' => [
                'type',
            ],
        ]);
    }

    public function show($id) {
        return app('App\Http\Controllers\ProductController')->show([
            'id' => $id,
        ]);
    }

    public function update(\App\Http\Requests\Product\Update $request, $id) {
        $product = Product::find($request->id);

        return app('App\Http\Controllers\ProductController')->update([
            'model_id' => $request->id,
            'model' => [
                'name' => isset($request->name) ? $request->name : $product->name,
                'type_id' => isset($request->type_id) ? $request->type_id : $product->type_id,
                'visible' => isset($request->visible) ? $request->visible : $product->visible,
            ],

            'with' => [
                'type',
            ],
        ]);
    }

    public function destroy($id) {
        return app('App\Http\Controllers\ProductController')->destroy([
            //'id' => $request->id,
            'id' => $id,
        ]);
    }
}
