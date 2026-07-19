<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMealAttendance extends Model
{
    protected $fillable = [
        'staff_id',
        'meal_date',
        'meal',
        'present',
    ];

    protected $casts = [
        'meal_date' => 'date',
        'present' => 'boolean',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}