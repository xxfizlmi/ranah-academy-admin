<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $data = ['title','Ranah Academy Admin'];
        return view('Auth/index');
    }
}
