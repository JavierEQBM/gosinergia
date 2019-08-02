<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {
    public function store(array $data) {
        return User::create($data);
    }
}
