<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [
        'community_member_id',
        'departure_date',
        'return_date',
        'destination',
        'reason',
        'takes_lunch',
        'takes_supper',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'return_date' => 'date',
        'takes_lunch' => 'boolean',
        'takes_supper' => 'boolean',
    ];

    public function member()
    {
        return $this->belongsTo(CommunityMember::class);
    }
}