<?php

namespace App\Http\Services\Booking;

use App\Http\DTO\BookingDTO;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class AddBookingService
{
    public static function handle(BookingDTO $bookingDTO)
    {
        try {
            $booking = Booking::create($bookingDTO->toArray());
            return $booking;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
