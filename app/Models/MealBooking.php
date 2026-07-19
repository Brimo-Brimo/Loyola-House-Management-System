<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealBooking extends Model
{
    protected $fillable = [
        'user_id',
        'meal_date',
        'meal',
        'booked',
    ];

    protected $casts = [
        'meal_date' => 'date',
        'booked' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}