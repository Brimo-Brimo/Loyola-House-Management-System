<?php

namespace App\Models;

use App\Models\GuestRoomAllocation;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [

        'full_name',

        'gender',

        'phone',

        'email',

        'institution',

        'purpose',

        'check_in',

        'expected_checkout',

        'status'

    ];
    public function roomAllocations()
{
    return $this->hasMany(GuestRoomAllocation::class);
}
public function mealAttendances()
{
    return $this->hasMany(GuestMealAttendance::class);
}
}