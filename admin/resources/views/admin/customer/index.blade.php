

@extends('admin.layouts.master')

@section('title')
    Customer
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($customers) < 1)
            <h4 class="text-danger">No Customer found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customer's List</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> User ID</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Phone</th>
                                    <th> Address</th>
                                    <th> Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->password }}</td>
                                        <td>
                                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning me-2">Edit</a>
                                            <a href="{{ route('customer.delete', $customer->id) }}" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>






@endsection
