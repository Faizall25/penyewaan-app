<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'fuel_consumption', 'last_service_date'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
