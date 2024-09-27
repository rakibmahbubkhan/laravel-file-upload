@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ isset($car) ? 'Edit Car' : 'Add New Car' }}</h1>
        <form action="{{ isset($car) ? route('admin.cars.update', $car->id) : route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($car))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Car Name</label>
                <input type="text" name="name" class="form-control" value="{{ $car->name ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" name="brand" class="form-control" value="{{ $car->brand ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" class="form-control" value="{{ $car->model ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="year">Year of Manufacture</label>
                <input type="number" name="year" class="form-control" value="{{ $car->year ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="car_type">Car Type</label>
                <input type="text" name="car_type" class="form-control" value="{{ $car->car_type ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="daily_rent_price">Daily Rent Price</label>
                <input type="number" step="0.01" name="daily_rent_price" class="form-control" value="{{ $car->daily_rent_price ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="availability">Availability</label>
                <select name="availability" class="form-control" required>
                    <option value="1" {{ isset($car) && $car->availability ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ isset($car) && !$car->availability ? 'selected' : '' }}>Not Available</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Car Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">{{ isset($car) ? 'Update Car' : 'Add Car' }}</button>
        </form>
    </div>
@endsection
