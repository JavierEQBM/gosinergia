<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller {
    public function index() {
        return app('App\Http\Controllers\TypeController')->index([]);
    }
}
