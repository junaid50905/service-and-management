
@php
    use Illuminate\Support\Str;
@endphp


@extends('admin.layouts.master')

@section('title')
    Selling products
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($sellingProducts) < 1)
            <h4 class="text-danger">No selling products found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List of all selling product</h4> <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Product <br> id</th>
                                    <th>Product <br> name</th>
                                    <th>User <br> id</th>
                                    <th>User <br>name</th>
                                    <th>Selling <br> date</th>
                                    <th>Quantity</th>
                                    <th>S&M</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sellingProducts as $sellingProduct)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sellingProduct->product_id }}</td>
                                        <td>
                                            {{ Str::words(DB::table('products')->where('id', $sellingProduct->product_id)->first()->name, 4 , '...') }}
                                        </td>
                                        <td>{{ $sellingProduct->user_id }}</td>
                                        <td>{{ DB::table('users')->where('id', $sellingProduct->user_id)->first()->name }}</td>
                                        <td>{{ $sellingProduct->selling_date }}</td>
                                        <td>{{ $sellingProduct->quantity }}</td>
                                        <td>{{ $sellingProduct->sam }}</td>
                                        <td>
                                            <a href="{{route('sold_product.edit', $sellingProduct->id)}}" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <a href="{{route('sold_product.delete', $sellingProduct->id)}}" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm">Delete</a>
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
