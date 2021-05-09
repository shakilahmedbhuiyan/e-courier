<?php

namespace App\Http\Controllers\User;

use App\Courier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $shipped = Courier::with('receiver', 'sender', 'payment', 'from', 'to')
            ->where('shipper_id',  Auth::user()->id)->get();
        $received = Courier::with('receiver', 'sender', 'payment', 'from', 'to')
            ->where('receiver_id',  Auth::user()->id)->get();
        $title = 'User Profile';
        return View('user.profile',compact('title','shipped','received'));
    }






    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function guard()
    {
        return Auth::guard('user');
    }
}
