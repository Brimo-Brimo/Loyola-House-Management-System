<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestMealAttendance extends Model
{
    protected $fillable = [

        'guest_id',

        'meal_date',

        'meal',

        'status',

    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}