<?php

namespace App\Http\Controllers\User;

use App\Branch;
use App\Courier;
use App\CourierCharge;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourierRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CourierController extends Controller
{

    public function create(Request $request)
    {
        $title = 'Book Courier';
        try {
            $data = $request->toArray();
            $from = Branch::where('id', $data['branchFrom'])->select('id', 'name', 'address')->get();
            $to = Branch::where('id', $data['branchTo'])->select('id', 'name', 'address')->get();
            $category = CourierCharge::all();
            return view('user.courierBooking', compact('from', 'to', 'data', 'category', 'title'));
        } catch (\Exception $e) {
            return abort('406', $e->getMessage());
        }
    }


    public function getDeliveryCategory(Request $request)
    {
        $category = $request->query('category');
        $delivery = $request->query('delivery');
        $result = CourierCharge::where('category', $category)->select($delivery)->get();
        foreach ($result as $d) {
            if ($request->wantsJson()) {
                return response($d->$delivery);
            }
            return $d->$delivery;
        }
    }


    public function store(CourierRequest $request)
    {

        try {

            $findSender = User::updateOrCreate(['email' => $request->senderEmail],
                [
                    'name' => $request->senderName,
                    'email' => $request->senderEmail,
                    'phone' => $request->senderPhone,
                    'address' => $request->senderAddress
                ]);
            $findReceiver = User::updateOrCreate(['email' => $request->receiverEmail],
                [
                    'name' => $request->receiverName,
                    'email' => $request->receiverEmail,
                    'phone' => $request->receiverPhone,
                    'address' => $request->receiverAddress
                ]);
        } catch (\Exception $e) {
            abort(406, 'Entered Phone Number already exists to other user');
        }

        /*
         * to generate tracking code:
         * 1. get 2=first 2 character of delivery method
         * 2. get random number between 4-987 and multiply by booking office id
         * 3. add underscore and get first character of sender email
         * 4. add current time(his)
         */
        $tracking_code = substr($request->delivery, 0, 2) .
            (random_int('4', '987') * $request->from) . "_" .
            substr($request->senderEmail, 0, 3) .
            date('his');
        /*
         * to generate transaction_id:
         * 1. get first 5 character of tracking code and add underscore
         * 2. HASH the tracking code and get 8 character from 10 offset
         */
        $transaction_id = substr($tracking_code, 0, 5) . '_'
            . substr(HASH::make($tracking_code), 10, 8);

        return $this->payment($request, $transaction_id, $tracking_code, $findSender->id, $findReceiver->id);


    }

    public function payment($request, $transaction_id, $tracking_code, $sender, $receiver)
    {
        $title = "Payment";
        return view('user.payment', compact('request', 'transaction_id', 'tracking_code', 'sender', 'receiver', 'title'));

    }

    public function track(Request $request)
    {
        $title = "Courier Track";
        if ($tracking_code = $request->segment(3)) {
            try {
                $courier = Courier::with('sender', 'receiver', 'payment', 'from', 'to')
                    ->where('tracking_code', $tracking_code)->first();
                return view('user.courierTracking', compact('courier', 'title'));

            } catch (\Exception $e) {
                return abort(404, $e->getMessage());
            }

        }

    }

}
