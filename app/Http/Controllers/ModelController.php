<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller {
    public function index(array $data) {
        return $data['model']::all();
    }

    public function show(array $data) {
        return $data['model']::find($data['id']);
    }
}
