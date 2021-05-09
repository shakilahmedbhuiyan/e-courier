<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Mail\EmployeeRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /*
     * index of employee list with their working branches
     */
    public function index()
    {
        $emp = Employee::with('branch')->doesntHave('managers')->get();
        return view('admin.employees', compact('emp'));
    }


    public function create()
    {
        $branches = Branch::all();
        return view('admin.addEmployee', ['branches' => $branches]);
    }

    public function store(EmployeeRequest $request)
    {

        if (Branch::findOrFail($request->branch)) {

            // generate random 10 char password from below chars
            $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%&!$%&');
            $password = substr($random, 2, 10);
            $verificationCode = substr($random, 4, 6);
            $data = [
                'user' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'verificationCode' => $verificationCode];
            $emp = new Employee();
            $emp->name = $request->name;
            $emp->email = $request->email;
            $emp->phone = $request->phone;
            $emp->branch_id = $request->branch;
            $emp->address = $request->address;
            $emp->verification_code = $verificationCode;
            $emp->password = $password;
            $emp->save();

            Mail::to($request->email)->send(new EmployeeRegistration($data));
            return back()->with(session()->flash('success', 'Employee added successfully and notified via email'));

        }
        return back()->with(session()->flash('error', 'Job failed! Try again.'));

    }


    public function guard()
    {
        return Auth::guard('admin');
    }
}
