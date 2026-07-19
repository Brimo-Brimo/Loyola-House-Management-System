<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwayNotice extends Model
{
    protected $fillable = [
        'user_id',
        'departure_date',
        'departure_time',
        'return_date',
        'return_time',
        'destination',
        'reason',
        'status',
        'approved_by',
        'approved_at',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'return_date'    => 'date',
        'departure_time' => 'datetime:H:i',
        'return_time'    => 'datetime:H:i',
        'approved_at'    => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}