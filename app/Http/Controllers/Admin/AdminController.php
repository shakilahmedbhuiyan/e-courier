<?php

namespace App\Http\Controllers\Admin;


use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        return View('admin.dashboard');
    }

    public function showAdminList()
    {
        return view('admin.admins');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }



}
