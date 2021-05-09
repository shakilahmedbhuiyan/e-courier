<?php

namespace App\Http\Controllers\Manager;

use App\Courier;
use App\Http\Controllers\Controller;
use App\Mail\CourierNotification;
use App\Manager;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CourierController extends Controller
{

    public function index()
    {
        $manager = $this->branchManager();
        $courier = Courier::with('receiver', 'sender', 'payment', 'from', 'to')->get();
        return view('manager.courierIndex', compact('courier'));
    }


    protected function allCouriers($branch)
    {
        return Courier::with('receiver', 'sender', 'payment', 'from', 'to')
            ->where('booking_office', $branch)->get();
    }

    protected function branchManager()
    {
        return (new Manager)->findManagerById(Auth::user()->id);
    }

    public function processing()
    {
        $manager = $this->branchManager();
        $couriers = Courier::with('receiver', 'sender', 'payment', 'from', 'to')
            ->where([
                ['booking_office', '=', Auth::user()->branch_id],
                ['status', '=', 'processing'],
            ])->whereDate('created_at', Carbon::today())->get();
        $old = Courier::with('receiver', 'sender', 'payment', 'from', 'to')
            ->where([
                ['booking_office', '=', Auth::user()->branch_id],
                ['status', '=', 'processing'],
            ])->whereDate('created_at', '<', Carbon::today())->get();

        return view('manager.processingCouriers', compact('couriers', 'old'));
    }

    public function couriersPdf($status)
    {
        if ($status === 'ready for delivery') {
            $term = 'destination';
        } else {
            $term = 'booking_office';
        }
        $couriers = Courier::with('receiver', 'sender', 'payment', 'from', 'to')
            ->where([
                [$term, '=', $this->branchManager()->branch_id],
                ['status', '=', $status],
            ])->get();

//        $pdf= new Dompdf();
//        $options =new options();
//        $options->setIsHtml5ParserEnabled(true);
//        $pdf->loadHtml(view('pdf.processingCouriers',compact('couriers')) );
//        $pdf->render();
//        $pdf->setPaper('A4','portrait');
//        $pdf->stream('Processing Couriers');
        return view('pdf.Couriers', compact('couriers', 'status'));

    }

    public function AddToPicked($id)
    {

        try {
//            $courier = $this->verifyCourier($id);
            $collect = DB::table('couriers')->where([['id', '=', $id], ['status', '=', 'processing']])
                ->update(['status' => 'picked', 'booking_officer' => $this->branchManager()->employee_id]);
            if ($collect === 1) {
                Mail::mailer('gmail')->send(new CourierNotification($id));
                return response()->json(['success' => true, 'message' => 'Courier picked']);
            }
            return response()->json(['success' => false, 'message' => 'Can not picked']);
        } catch (\Exception $e) {
            return abort(422, $e->getMessage());
        }

    }

    public function picked()
    {
        $couriers = Courier::with('receiver', 'sender', 'payment', 'from', 'to')
            ->where([
                ['booking_office', '=', Auth::user()->branch_id],
                ['status', '=', 'picked'],
            ])->get();
        return view('manager.pickedCouriers', compact('couriers'));
    }


    public function AddToTransit($id)
    {
//        return response()->json($this->branchManager()->employee_id);
        try {
            $transit = DB::table('couriers')->where([['id', '=', $id], ['status', '=', 'picked']])
                ->update(['status' => 'in transit', 'booking_officer' => $this->branchManager()->employee_id]);
            if ($transit === 1) {
                Mail::mailer('gmail')->send(new CourierNotification($id));
                return response()->json(['success' => true, 'message' => 'Courier In Transit']);
            }
            return response()->json(['success' => false, 'message' => 'Can not picked']);
        } catch (\Exception $e) {
            return abort(422, $e->getMessage());
        }

    }


    public function delivery()
    {
        $couriers = Courier::with('receiver', 'sender', 'payment', 'from', 'to')
            ->where([
                ['destination', '=', Auth::user()->branch_id],
                ['status', '=', 'ready for delivery'],
            ])->get();
        return view('manager.readyCouriers', compact('couriers'));
    }

    public function readyForDelivery($id)
    {
        try {
            $courier = $this->verifyCourier($id);
            $collect = DB::table('couriers')->where([['id', '=', $id], ['status', '=', 'in transit']])
                ->update(['status' => 'ready for delivery']);
            if ($collect === 1) {
                Mail::mailer('gmail')->send(new CourierNotification($id));
                return response()->json(['success' => true, 'message' => 'Courier picked for delivery']);
            }
            return response()->json(['error' => true, 'message' => 'Can not picked for delivery']);
        } catch (\Exception $e) {
            return abort(422, $e->getMessage());
        }

    }


    public function delivered($id)
    {
        try {
            $courier = $this->verifyCourier($id);
            $collect = DB::table('couriers')->where([['id', '=', $id], ['status', '=', 'ready for delivery']])
                ->update(['status' => 'delivered']);
            if ($collect === 1) {
                Mail::mailer('gmail')->send(new CourierNotification($id));
                return response()->json(['success' => true, 'message' => 'Courier Marked as Delivered']);
            }
            return response()->json(['error' => true, 'message' => 'Failed to mark as delivered']);
        } catch (\Exception $e) {
            return abort(422, $e->getMessage());
        }
    }


    protected function verifyCourier($id)
    {
        $courier = Courier::where([
            ['id', '=', $id],
            ['destination', '=', Auth::user()->branch_id]
        ])->orWhere([
            ['id', '=', $id],
            ['booking_office', '=', Auth::user()->branch_id]
        ])->first();
        return $courier;
    }

    public function guard()
    {
        return Auth::guard('manager');
    }
}
