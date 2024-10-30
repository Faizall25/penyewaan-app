<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $admin = User::where('role', 'admin')->first();
        $direktur = User::where('role', 'direktur')->first();
        $vehicle = Vehicles::first();

        Booking::create([
            'user_id' => $admin->id,
            'vehicle_id' => $vehicle->id,
            'approver_id' => $direktur->id,
            'start_date' => Carbon::now()->addDays(1),
            'end_date' => Carbon::now()->addDays(3),
            'status' => 'pending'
        ]);
    }
}
