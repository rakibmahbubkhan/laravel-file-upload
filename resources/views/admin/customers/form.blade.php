@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ isset($customer) ? 'Edit Customer' : 'Add New Customer' }}</h1>
        <form action="{{ isset($customer) ? route('admin.customers.update', $customer->id) : route('admin.customers.store') }}" method="POST">
            @csrf
            @if(isset($customer))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $customer->name ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $customer->email ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{{ $customer->phone_number ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $customer->address ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-success">{{ isset($customer) ? 'Update Customer' : 'Add Customer' }}</button>
        </form>
    </div>
@endsection
