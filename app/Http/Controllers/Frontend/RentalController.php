<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotification;
use App\Mail\RentalConfirmation;
use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Auth::user()->rentals()->with('car')->get();
        return view('frontend.rentals.index', compact('rentals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $car = Car::findOrFail($request->car_id);

        if (!$car->availability) {
            return redirect()->back()->with('error', 'Car is not available for the selected dates.');
        }

        // Convert start_date and end_date to Carbon instances
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        // Calculate the total cost
        $totalCost = $car->daily_rent_price * $startDate->diffInDays($endDate);

        $rental = Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_cost' => $totalCost,
        ]);

        // Update car availability
        $car->availability = false;
        $car->save();

        // Send email notifications
        Mail::to(Auth::user()->email)->send(new RentalConfirmation($rental));
        Mail::to('rakibmahbubkhan@gmail.com')->send(new AdminNotification($rental));

        return redirect()->route('rentals.index')->with('success', 'Car booked successfully.');
    }

    public function destroy(Rental $rental)
    {
        if ($rental->user_id != Auth::id()) {
            return redirect()->route('rentals.index')->with('error', 'You are not authorized to cancel this booking.');
        }

        if ($rental->start_date <= now()) {
            return redirect()->route('rentals.index')->with('error', 'Cannot cancel a rental that has already started.');
        }

        $rental->delete();

        // Update car availability
        $car = $rental->car;
        $car->availability = true;
        $car->save();

        return redirect()->route('rentals.index')->with('success', 'Booking canceled successfully.');
    }
}

