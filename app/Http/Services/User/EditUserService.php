<?php

namespace App\Http\Services\User;

use Illuminate\Support\Facades\Log;

class EditUserService
{
    public static function handle(){
        try {

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new \Exception($th);
        }
    }
}