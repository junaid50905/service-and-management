@php
    use Illuminate\Support\Str;
@endphp


@extends('admin.layouts.master')

@section('title')
    All customers
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($customers) < 1)
                <h4 class="text-danger">No customer found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Customer List</h4> <hr>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> User ID</th>
                                    <th> Type</th>
                                    <th> Name</th>
                                    <th> Phone</th>
                                    <th> Address</th>
                                    <th> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-xs">{{ $customer->id }}</td>
                                        <td>{{ $customer->usertype }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ Str::words($customer->address, 7, '...') }}</td>
                                        <td>
                                            <a href="{{ $customer->usertype == 'solo' ? route('customer.saleToSoloCustomerForm', $customer->id) : route('customer.saleToGroupCustomerForm', $customer->id) }}"
                                                class="btn btn-sm btn-info me-2 p-2"><i class="fa-solid fa-cart-plus"></i></a>
                                            <a href="{{ route('customer.edit', $customer->id) }}"
                                                class="btn btn-sm btn-warning me-2 p-2"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="{{ route('customer.delete', $customer->id) }}"
                                                onclick="return confirm('are you sure?')"
                                                class="btn btn-sm btn-danger p-2"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th> User ID</th>
                                    <th> Type</th>
                                    <th> Name</th>
                                    <th> Phone</th>
                                    <th> Address</th>
                                    <th> Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
