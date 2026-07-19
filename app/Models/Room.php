<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [

    'building_id',

    'wing_id',

    'floor_id',

    'room_number',

    'room_type',

    'capacity',

    'status',

    'description',

    'photo',

    'wifi',

    'ensuite',

    'accessible',

    'air_conditioned',

    'television',

    'balcony',

    'active',

];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function wing()
    {
        return $this->belongsTo(Wing::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function bookings()
    {
        return $this->hasMany(RoomBooking::class);
    }
}