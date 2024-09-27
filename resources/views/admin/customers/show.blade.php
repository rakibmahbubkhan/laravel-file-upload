@extends('layouts.admin')

@section('content')
    <h1>Customer Details</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $customer->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>Address:</strong> {{ $customer->address }}</p>
            <p><strong>Role:</strong> {{ ucfirst($customer->role) }}</p>
            <p><strong>Joined:</strong> {{ $customer->created_at->format('d M Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Back to Customers</a>
            <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-warning">Edit Customer</a>
        </div>
    </div>
@endsection
