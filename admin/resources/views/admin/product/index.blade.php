@extends('admin.layouts.master')

@section('title')
    Categories
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($products) < 1)
            <h4 class="text-danger">No product found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th class="d-flex flex-column">
                                        <span>Warranty</span>
                                        <span>(months)</span>
                                    </th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->model }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->time_of_warranty }}</td>
                                        <td>{{ $product->category_id }}</td>
                                        <td>{{ $product->subcategory_id }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning me-2">Edit</a>
                                            <a href="{{ route('product.delete', $product->id) }}" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
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
