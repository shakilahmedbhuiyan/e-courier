<?php

namespace App\Http\Controllers;

use App\Branch;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $delivery=[
          'express','regular','next_day',
        ];
        $branches=Branch::all();
        $title='';
        return view('user.home',compact('branches','delivery','title'));
    }

    public function addCourier(Request $request){
        $q=$request->validate([
            'branchFrom' => 'required|integer|exists:App\Branch,id',
            'branchTo' => 'required|integer|exists:App\Branch,id|different:branchFrom',
            'delivery' => 'required|string|in:express,regular,next_day',
            'receiver' => 'required|email:rfc,dns',
        ]);
        return redirect()->route('courier.book',$q);
    }

    public function tracking(Request $request)
    {
        $request->validate([
            'trackingCode' => 'required|min:11|max:17|exists:App\Courier,tracking_code',
            'receiver_email' => 'required|email:rfc,dns|exists:App\User,email'
        ]);

        return redirect()->route('courier.track',$request->trackingCode);

    }


}
