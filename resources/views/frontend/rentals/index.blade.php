@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h1>Your Rentals</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Rental ID</th>
                <th>Car Details</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                    <td>{{ $rental->start_date }}</td>
                    <td>{{ $rental->end_date }}</td>
                    <td>{{ $rental->total_cost }}</td>
                    <td>{{ $rental->status }}</td>
                    <td>
                        @if($rental->status == 'Ongoing')
                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
