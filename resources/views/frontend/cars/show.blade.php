@extends('layouts.frontend')

@section('content')
    <h1>{{ $car->name }}</h1>
    <p><strong>Brand:</strong> {{ $car->brand }}</p>
    <p><strong>Model:</strong> {{ $car->model }}</p>
    <p><strong>Year:</strong> {{ $car->year }}</p>
    <p><strong>Type:</strong> {{ $car->car_type }}</p>
    <p><strong>Daily Rent Price:</strong> {{ $car->daily_rent_price }}</p>
    <p><strong>Availability:</strong> {{ $car->availability ? 'Available' : 'Not Available' }}</p>
    @if($car->image)
        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" style="max-width: 100%;">
    @endif
    @auth
        @if($car->availability)
            <form action="{{ route('rentals.store') }}" method="POST">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        @else
            <p class="text-danger">This car is not available for booking.</p>
        @endif
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to book this car.</p>
    @endauth
@endsection
