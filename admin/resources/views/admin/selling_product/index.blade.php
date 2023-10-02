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
                    <h4 class="card-title">List of all selling product</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product id</th>
                                    <th>User id</th>
                                    <th>Selling date</th>
                                    <th>Warranty end date</th>
                                    <th>S&M</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sellingProducts as $sellingProduct)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sellingProduct->product_id }}</td>
                                        <td>{{ $sellingProduct->user_id }}</td>
                                        <td>{{ $sellingProduct->selling_date }}</td>
                                        <td>{{ $sellingProduct->warranty_end_date }}</td>
                                        <td>{{ $sellingProduct->sam }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning me-2">Edit</a>
                                            <a href="#" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
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
