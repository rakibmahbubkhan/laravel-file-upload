<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCars = Car::count();
        $totalRentals = Rental::count();
        $totalCustomers = User::where('role', 'customer')->count();
        $ongoingRentals = Rental::where('status', 'Ongoing')->count();
        $completedRentals = Rental::where('status', 'Completed')->count();
        $cancelledRentals = Rental::where('status', 'Cancelled')->count();

        return view('admin.dashboard.index', compact(
            'totalCars', 'totalRentals', 'totalCustomers', 'ongoingRentals', 'completedRentals', 'cancelledRentals'
        ));
    }
}

