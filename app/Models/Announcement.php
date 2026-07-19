<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [

        'user_id',
        'title',
        'message',
        'audience',
        'start_date',
        'end_date',
        'is_active',
        'is_pinned',
        'status',
        'approved_by',
        'approved_at',

    ];

    protected $casts = [

        'start_date' => 'date',
        'end_date' => 'date',
        'approved_at' => 'datetime',
        'is_active' => 'boolean',
        'is_pinned' => 'boolean',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}