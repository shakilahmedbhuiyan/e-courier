<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Courier;

class Payment extends Model
{
    public function courier()
    {
        return $this->belongsTo(Courier::class,'courier_id','id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
