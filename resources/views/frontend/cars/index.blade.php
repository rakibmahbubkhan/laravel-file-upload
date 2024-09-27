@extends('layouts.frontend')

@section('content')
    <h1>Available Cars</h1>
    <form method="GET" action="{{ route('cars.index') }}">
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control">
                <option value="">All</option>
                <option value="SUV">SUV</option>
                <option value="Sedan">Sedan</option>
                <!-- Add more car types as needed -->
            </select>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Max Daily Rent Price</label>
            <input type="number" name="price" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Type</th>
            <th>Daily Rent Price</th>
            <th>Availability</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->name }}</td>
                <td>@if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" style="max-width: 30%;">
                    @endif</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->car_type }}</td>
                <td>{{ $car->daily_rent_price }}</td>
                <td>{{ $car->availability ? 'Available' : 'Not Available' }}</td>
                <td>
                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
