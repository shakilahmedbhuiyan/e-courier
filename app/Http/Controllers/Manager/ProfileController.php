<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $manager= (new Manager)->findManagerByEmail(Auth::user()->email);

        return view('manager.profile',compact('manager'));
    }
}
