<?php

namespace App\Http\Controllers\Manager;

use App\Branch;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.dashboard');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect()->route('manager.login');
    }

    public function branches()
    {
        $branches= Branch::all();
        return view('manager.branches',compact('branches'));
    }

    public function employees()
    {
        $employees=Employee::where('branch_id', Auth::user()->branch_id)->get();
        return view('manager.employees',compact('employees'));
    }
    public function guard()
    {
        return Auth::guard('manager');
    }
}
