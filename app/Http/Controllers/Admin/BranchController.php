<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{


    public function index()
    {
        $data = Branch::all();
        return view('admin.branches', compact('data'));
    }

    public function create()
    {
        return view('admin.addBranch');
    }

    public function store(BranchRequest $request)
    {
        if (Branch::create($request->validated())) {

            $branch = Branch::where('email', $request->email)->get();
            $emp = Employee::with('branch')->doesntHave('managers')->get();

            return view('admin.branchAdded', compact('branch', 'emp'))
                ->with(session()->flash('success', 'Branch Added Successfully'));

        }
        return back()->with('error', 'Failed to add branch! Try again');

    }

    public function addManager(Request $request)
    {
        /* update Branch Id on Employee Table */
        $employee = Employee::find($request->manager);
        $employee->branch_id = $request->branch;
        $employee->save();
        /* Set new manager with the brand new branch */
        $manager = new Manager();
        $manager->employee_id = $request->manager;
        $manager->branch_id = $request->branch;
        $manager->save();
        return redirect()->route('branches.index')->with(session()->flash('success', 'New Branch added with a manager'));
    }

    /*
     * Show a branch with all its information
     */
    public function branch($id)
    {
        $branch = Branch::where('id', $id)->get();
        $manager = Manager::with('employee')->where('branch_id', $id)->get();
        return view('admin.branchInfo', compact('branch', 'manager'));
    }

    public function guard()
    {
        return Auth::guard('admin');
    }
}
