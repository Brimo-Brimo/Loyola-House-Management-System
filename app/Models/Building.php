<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Wing;

class Building extends Model
{
    protected $fillable = [
        'name',
        'code',
        'type',
        'floors',
        'description',
        'active',
    ];

    /**
     * A building has many wings.
     */
    public function wings()
    {
        return $this->hasMany(Wing::class);
    }
}