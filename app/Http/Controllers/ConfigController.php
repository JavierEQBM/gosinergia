<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;

class ConfigController extends Controller
{
    public function store(array $data) {
        return Config::create($data);
    }
}
