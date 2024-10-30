<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Initialize query for bookings
        $datas = Booking::query();

        // Apply search filter if provided
        if ($request->has('search')) {
            $datas->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })->orWhereHas('vehicle', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Load necessary relationships for the view
        $datas = $datas->with(['user', 'vehicle', 'approver'])->orderBy('id', 'desc')->paginate(5)->withQueryString();

        // Retrieve all users and vehicles for dropdowns or filters
        $users = User::all();
        $vehicles = Vehicles::all();

        // Return view with data
        return view('admin.pages.booking.index', compact('datas', 'users', 'vehicles'));
    }
}
