@extends('layouts.admin')

@section('content')
    <h1>Edit Rental</h1>
    <form action="{{ route('admin.rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Customer</label>
            <select name="user_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $rental->user_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="car_id">Car</label>
            <select name="car_id" class="form-control" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                        {{ $car->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control"
                   value="{{ \Carbon\Carbon::parse($rental->start_date)->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control"
                   value="{{ \Carbon\Carbon::parse($rental->end_date)->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="total_cost">Total Cost</label>
            <input type="number" step="0.01" name="total_cost" class="form-control"
                   value="{{ $rental->total_cost }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Ongoing" {{ $rental->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="Completed" {{ $rental->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ $rental->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Rental</button>
    </form>
@endsection
