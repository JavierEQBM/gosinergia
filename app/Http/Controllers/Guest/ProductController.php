<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller {
    public function index() {
        return app('App\Http\Controllers\ProductController')->index([
        	'with' => ['type'],
            'where' => ['visible'=>1, 'status'=>1],
        ]);
    }

    public function show($id) {
        return app('App\Http\Controllers\ProductController')->show([
        	'id' => $id,
        ]);
    }
}
