<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Nav extends Controller
{

    public function showAddManager()
    {
        return view();
    }

    public function guard()
    {
        return Auth::guard('admin');
    }
}
