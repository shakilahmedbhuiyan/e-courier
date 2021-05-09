<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Manager extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_id', 'employee_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function employee(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    /*
    * return specific managers with corresponding branch and personal information
    * @param $id is the employee_id in employees table
    *
    */

    public function findManagerById($id)
    {
        return self::with('branch', 'employee')->where('employee_id', $id)->first();

    }

    public function findManagerByEmail($email)
    {
        $employee = Employee::with('branch', 'managers')->where('email', $email)->get();
        foreach ($employee as $m) {
            $manager = self::where('employee_id', $m->id)->get();
            if ($manager->count() === 1) {
                return $employee;
            }
            abort(406, 'No manager Found');
        }
        return 'No manager found';

    }





}

