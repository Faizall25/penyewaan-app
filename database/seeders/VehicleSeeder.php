<?php

namespace Database\Seeders;

use App\Models\Vehicles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Vehicles::create([
            'name' => 'Toyota Hilux',
            'type' => 'personal',
            'fuel_consumption' => 8.5,
            'last_service_date' => '2023-06-01',
        ]);

        Vehicles::create([
            'name' => 'Isuzu D-Max',
            'type' => 'rental',
            'fuel_consumption' => 10.0,
            'last_service_date' => '2023-07-15',
        ]);
    }
}
