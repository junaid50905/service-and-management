@extends('admin.layouts.master')

@section('title')
    Create Customer
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Add New Customer</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="userType"> Type of Customer </label>
                            <select name="usertype" class="form-control text-white" id="userType">
                                <option selected>Select Type </option>
                                <option value="solo">Solo</option>
                                <option value="group">Group</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="customerName"> Name</label>
                            <input type="text" name="name" class="form-control text-white" id="customerName" placeholder="Name/Company Name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customerPhone"> Email</label>
                            <input type="email" name="email" class="form-control text-white" id="customerEmail">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customerPhone"> Phone</label>
                            <input type="text" name="phone" class="form-control text-white" id="customerPhone">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customerAddress"> Address</label>
                            <input type="text" name="address" class="form-control text-white" id="customerAddress">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customerPassword"> Password</label>
                            <input type="text" name="password" class="form-control text-white" id="customerPassword">
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
