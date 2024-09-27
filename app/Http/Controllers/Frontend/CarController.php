<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::query();
        if ($request->filled('type') && $request->type !== 'ALL') {
            $cars->where('car_type', $request->type);
        }
        if ($request->filled('brand')) {
            $cars->where('brand', 'LIKE', '%' . $request->brand . '%');
        }
        if ($request->filled('price') && is_numeric($request->price)) {
            $cars->where('daily_rent_price', '<=', $request->price);
        }
        $cars = $cars->get();
        return view('frontend.cars.index', compact('cars'));
    }


    public function show(Car $car)
    {
        return view('frontend.cars.show', compact('car'));
    }
}

