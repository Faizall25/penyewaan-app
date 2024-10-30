<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'approver_id',
        'start_date',
        'end_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function isApprovedAdmin()
    {
        return $this->status === 'approved_ladmin';
    }

    public function isApprovedDirektur()
    {
        return $this->status === 'approved_direktur';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isRejectedAdmin()
    {
        return $this->status === 'rejected_admin';
    }
    public function isRejectedDirektur()
    {
        return $this->status === 'rejected_direktur';
    }
}
