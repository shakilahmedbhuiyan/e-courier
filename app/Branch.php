<?php

namespace App;

use App\Manager;
use Illuminate\Database\Eloquent\Model;


class Branch extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','phone','address',
    ];


    public function manager(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Manager::class);
    }
    public function employee(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employee::class);
    }


}
