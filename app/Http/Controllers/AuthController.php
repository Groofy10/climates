<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public static function userIsAdmin()
    {
        return Auth::check() && Auth::user()->role === 'Admin';
    }
}
