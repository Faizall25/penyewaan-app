<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function approvals()
    {
        return $this->hasMany(Booking::class, 'approver_id');
    }
}
