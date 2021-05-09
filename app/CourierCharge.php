<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourierCharge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category','regular','express','next_day',
    ];
}
