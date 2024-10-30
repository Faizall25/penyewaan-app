<?php

namespace App\Http\Services\Vehicle;

use Illuminate\Support\Facades\Log;

class AddVehicleService
{
    public static function handle(){
        try {

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new \Exception($th);
        }
    }
}
