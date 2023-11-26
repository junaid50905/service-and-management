@extends('admin.layouts.master')

@section('title')
    Edit Customer info
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Update customer information</h4><hr>
                <div class="card-body">
                    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="userType"> Type of Customer </label>
                            <select name="usertype" class="form-control text-white" id="userType">
                                <option value="solo" {{ $customer->usertype == 'solo' ? 'selected' : '' }}>Solo</option>
                                <option value="company" {{ $customer->usertype == 'company' ? 'selected' : '' }}>Company</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="customerName">Name</label>
                            <input type="text" value="{{ $customer->name }}" name="name" class="form-control text-white" id="customerName">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customerEmail"> Email</label>
                            <input type="email" value="{{ $customer->email }}" name="email" class="form-control text-white" id="customerEmail">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customerPhone"> Phone</label>
                            <input type="text" value="{{ $customer->phone }}" name="phone" class="form-control text-white" id="customerPhone">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customerAddress"> Address</label>
                            <input type="text" value="{{ $customer->address }}" name="address" class="form-control text-white" id="customerAddress">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customerPassword"> Password</label>
                            <input type="text" value="{{ $customer->password }}" name="password" class="form-control text-white" id="customerPassword">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('customer.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
