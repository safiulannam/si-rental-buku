<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        return view('dashboard.users.index');
    }

    public function profile()
    {
        return view('dashboard.profile.index');
    }
}
