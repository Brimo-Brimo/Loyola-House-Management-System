<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [

        'wing_id',

        'name',

        'code',

        'description',

        'active'

    ];

    public function wing()
    {
        return $this->belongsTo(Wing::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}