<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealAttendance extends Model
{
    protected $fillable = [

        'community_member_id',

        'meal_date',

        'meal',

        'status',

    ];

    public function communityMember()
    {
        return $this->belongsTo(CommunityMember::class);
    }
}