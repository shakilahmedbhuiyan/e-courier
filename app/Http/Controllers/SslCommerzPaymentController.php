<?php

namespace App\Http\Controllers;


use App\Courier;
use App\Mail\CourierBooking;
use App\Mail\PaymentConfirm;
use App\Payment;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SslCommerzPaymentController extends Controller
{


    public function index(Request $request)
    {

        $courier = DB::table('couriers')
            ->where('tracking_code', $request->product_name)
            ->updateOrInsert(
                [
                    'shipper_id' => $request->cus_id,
                    'receiver_id' => $request->receiver,
                    'tracking_code' => $request->product_name,
                    'booking_office' => $request->from,
                    'destination' => $request->to,
                    'shipping_address' => $request->shipping_address,
                    'weight' => $request->weight,
                    'unit' => $request->unit,
                    'category' => $request->product_category,
                    'delivery' => $request->shipping_method,
                    'description' => $request->description,
                    'total' => $request->total,
                ]);

        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $request->total;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $request->tran_id;

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->cus_name;
        $post_data['cus_email'] = $request->cus_email;
        $post_data['cus_add1'] = $request->cus_add1;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->cus_phone;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "E-Courier";
        $post_data['ship_add1'] = "Dhaka-HQ";
        $post_data['ship_add2'] = "";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1230";
        $post_data['ship_phone'] = "01842055800";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = $request->shipping_method;
        $post_data['product_name'] = $request->product_name;
        $post_data['product_category'] = $request->product_category;
        $post_data['product_profile'] = "physical-goods";


        $courier=DB::table('couriers')->where('tracking_code',$request->product_name)->first();
        #Before  going to initiate the payment order status need to insert or update as Pending.
        $payment = DB::table('payments')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'user_id' => $request->cus_id,
                'courier_id' => $courier->id,
                'amount' => $post_data['total_amount'],
                'status' => 'pending',
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'created_at' => now(),
            ]);


        $data=Courier::with('receiver','sender','payment')->where('tracking_code',$request->product_name)->first();
//        dd($data->status);
        if ($data){
            Mail::mailer('mailtrap')->to($data->sender->email)
                ->cc($data->receiver->email)
                ->send(new CourierBooking($data));
        }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            echo($payment_options->toArray);
            $payment_options = array();
        }


    }


    public function success(Request $request): void
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();
        $order_detials = DB::table('payments')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount', 'updated_at', 'courier_id')->first();

        if ($order_detials->status === 'pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {

                $update_payment = DB::table('payments')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'completed', 'updated_at' => now()]);
                $update_courier = DB::table('couriers')
                    ->where('id', $order_detials->courier_id)
                    ->update(['status' => 'processing', 'updated_at' => now()]);

                $payments= Payment::with('sender','courier')
                    ->where('transaction_id',$tran_id)
                    ->first();
                Mail::mailer('mailtrap')->to($payments->sender->email)
                    ->send(new PaymentConfirm($payments));


                echo "<br >Transaction is successfully Completed.";
                echo "<br/> Go to home <a href='" . route('home') . "'>Click Here</a>";
//                Mail::mailer('mailtrap')->to('')
            }
            else {

                $update_product = DB::table('payments')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'failed', 'updated_at' => now()]);
                echo "Transaction Failed!";
            }
        } else if ($order_detials->status === 'processing' || $order_detials->status === 'complete') {

            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('payments')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status === 'pending') {
            $update_product = DB::table('payments')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'failed']);
            $payments= Payment::with('sender','courier')
                ->where('transaction_id',$tran_id)
                ->first();
            Mail::mailer('mailtrap')->to($payments->sender->email)
                ->send(new PaymentConfirm($payments));
            echo "Transaction is Failed";
            echo "<br/> Go to home <a href='" . session()->previousUrl() . "'>Click Here</a>";
        } else if ($order_detials->status === 'processing' || $order_detials->status === 'complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('payments')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount', 'courier_id')->first();

        if ($order_detials->status === 'pending') {

            $delete_courier = DB::table('couriers')
                ->where('id', $order_detials->courier_id)->delete();
            $update_product = DB::table('payments')
                ->where('transaction_id', $tran_id)->delete();

            echo "Transaction is Cancel";
            echo "<br/> Go to home <a href='" . route('home') . "'>Click Here</a>";
        } else if ($order_detials->status === 'processing' || $order_detials->status == 'complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('payments')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status === 'pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);

                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('payments')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('payments')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'processing' || $order_details->status == 'complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
