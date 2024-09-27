@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ isset($rental) ? 'Edit Rental' : 'Add New Rental' }}</h1>
        <form action="{{ isset($rental) ? route('admin.rentals.update', $rental->id) : route('admin.rentals.store') }}" method="POST">
            @csrf
            @if(isset($rental))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="user_id">Customer</label>
                <select name="user_id" class="form-control" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ isset($rental) && $rental->user_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="car_id">Car</label>
                <select name="car_id" class="form-control" required>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}" {{ isset($rental) && $rental->car_id == $car->id ? 'selected' : '' }}>{{ $car->name }} ({{ $car->brand }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ $rental->start_date ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ $rental->end_date ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="total_cost">Total Cost</label>
                <input type="number" step="0.01" name="total_cost" class="form-control" value="{{ $rental->total_cost ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-success">{{ isset($rental) ? 'Update Rental' : 'Add Rental' }}</button>
        </form>
    </div>
@endsection
