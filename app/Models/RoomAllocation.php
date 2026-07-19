<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomAllocation extends Model
{
    protected $fillable = [

        'community_member_id',

        'room_id',

        'allocated_from',

        'allocated_to',

        'active'

    ];

    public function member()
    {
        return $this->belongsTo(CommunityMember::class,'community_member_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}