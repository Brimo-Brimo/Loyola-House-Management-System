<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
    'role_id',
    'first_name',
    'last_name',
    'email',
    'phone',
    'community',
    'designation',
    'gender',
    'date_of_birth',
    'nationality',
    'profile_photo',
    'password',
    'is_active',
];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'date_of_birth' => 'date',
            'is_active' => 'boolean',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Relationship with Role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function staff()
{
    return $this->hasOne(Staff::class);
}
    public function isAdmin()
{
    return $this->role->name === 'Administrator';
}

public function isKitchen()
{
    return $this->role->name === 'Kitchen';
}

public function isReception()
{
    return $this->role->name === 'Reception';
}

public function isMember()
{
    return $this->role->name === 'Community Member';
}

public function isGuest()
{
    return $this->role->name === 'Guest';
}
public function mealBookings()
{
    return $this->hasMany(MealBooking::class);
}
public function roomBookings()
{
    return $this->hasMany(RoomBooking::class);
}
public function awayNotices()
{
    return $this->hasMany(AwayNotice::class);
}
public function communityMember()
{
    return $this->hasOne(CommunityMember::class);
}
}