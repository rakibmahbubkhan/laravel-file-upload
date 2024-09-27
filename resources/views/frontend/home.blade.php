@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h1>Welcome to Car Rental System</h1>
        <p>Find the best cars for rent at affordable prices.</p>

        @if(auth()->check() && auth()->user()->isAdmin())
            <a href="{{ route('admin.cars.index') }}" class="btn btn-primary">Browse Cars</a>
        @else
            <a href="{{ route('cars.index') }}" class="btn btn-primary">Browse Cars</a>
        @endif
    </div>
@endsection

