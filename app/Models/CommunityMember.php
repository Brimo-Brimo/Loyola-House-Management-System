<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityMember extends Model
{
    protected $fillable = [

        'user_id',

        'first_name',
        'last_name',
        'other_names',
        'religious_name',

        'photo',

        'email',
        'phone',

        'community',
        'room',

        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roomAllocations()
    {
        return $this->hasMany(RoomAllocation::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}