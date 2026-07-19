<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wing extends Model
{
    protected $fillable = [
        'building_id',
        'name',
        'code',
        'description',
        'active',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
    public function floors()
     {
        return $this->hasMany(Floor::class);
    }
}