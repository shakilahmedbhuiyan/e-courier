<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerValidation;
use App\Mail\PromoteToManager;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;


class ManagerController extends Controller
{

    public function index()
    {
        $managers= $this->managers();
        return view('admin.managers', compact('managers'));
    }

    public function create($id)
    {
        $emp =Employee::with('branch')->doesntHave('managers')->where('id',$id)->get();
        if ($emp->count()){
            $branches= Branch::all();
            return view('admin.addManager', ['branches'=>$branches,'id'=>$id,'emp'=>$emp]);
        }
        return abort('412','Employee Already Assigned to a Branch');

    }

    public function store(ManagerValidation $request)
    {
        $manager=new Manager();
        $manager->employee_id = $request->id;
        $manager->branch_id = $request->branch;
        $manager->save();

        $emp= Employee::where('id',$request->id)
        ->update(['branch_id' => $request->branch]);

        $data= $manager->findManagerById($request->id);
        try {
            Mail::to($data->employee->email)->send(new PromoteToManager($data,$request->date));
        }
        catch(\Exception $e)
        {
            return abort(412,$e->getMessage());
        }

        return redirect()->route('managers.index')->with(session()->flash('success','New manager addedd'));
    }

    public function delete($id){
        $delete=Manager::findOrFail($id);
        $delete->delete();
        if($delete)
        {
            return response()->json(['success'=>true,'message'=>'Manager deleted successfully']);
        }
        return redirect()->route('managers.index');

    }


    /*
     * return all managers with their corresponding branch and personal information
     *
     */
    private function managers()
    {
       return Manager::with('branch','employee')->get();
    }



    public function guard()
    {
        return Auth::guard('admin');
    }
}
