<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{

    protected $fillable = [
        'receiver_id', 'shipper_id', 'tracking_code', 'booking_officer', 'booking_office', 'destination', 'shipping_address', 'weight', 'unit', 'category', 'total', 'description', 'status', 'payment_id','created_at','updated_at',
    ];


    public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_id','id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'shipper_id','id');
    }
    public function payment()
    {
        return $this->HasOne(Payment::class,'courier_id','id');
    }
    public function from()
    {
        return $this->belongsTo(Branch::class,'booking_office','id');
    }
    public function to()
    {
        return $this->belongsTo(Branch::class,'destination','id');
    }


}
