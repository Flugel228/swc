<?php

namespace App\Http\Controllers\Client\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(): View
    {
        return view('client.user.register');
    }

    public function login(): View
    {
        return view('client.user.login');
    }
}
