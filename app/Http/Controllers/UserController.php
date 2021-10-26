<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //register user
    public function showUserAdd()
    {
        return view('admin/userAdd');
    }
}
