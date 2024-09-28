@extends('layouts.admin')

@section('content')
    <h1>Dashboard Overview</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Cars</h5>
                    <p class="card-text">{{ $totalCars }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Rentals</h5>
                    <p class="card-text">{{ $totalRentals }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ongoing Rentals</h5>
                    <p class="card-text">{{ $ongoingRentals }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Completed Rentals</h5>
                    <p class="card-text">{{ $completedRentals }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cancelled Rentals</h5>
                    <p class="card-text">{{ $cancelledRentals }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
