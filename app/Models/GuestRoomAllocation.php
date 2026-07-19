<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestRoomAllocation extends Model
{
    protected $fillable = [
        'guest_id',
        'room_id',
        'allocated_from',
        'allocated_to',
        'active'
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}