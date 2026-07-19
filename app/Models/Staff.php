<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'user_id',
        'staff_number',
        'first_name',
        'other_names',
        'last_name',
        'department',
        'position',
        'phone',
        'takes_lunch',
        'takes_supper',
        'active',
    ];

    protected $casts = [
        'takes_lunch' => 'boolean',
        'takes_supper' => 'boolean',
        'active' => 'boolean',
    ];

    public function meals()
    {
        return $this->hasMany(StaffMealAttendance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}