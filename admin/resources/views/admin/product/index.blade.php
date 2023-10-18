@extends('admin.layouts.master')

@section('title')
    Products
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
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @php
                                                $wrapped_name = wordwrap($product->name, 40, "\n", true);
                                            @endphp
                                            {!! nl2br(e($wrapped_name)) !!}
                                        </td>
                                        <td>{{ $product->model }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ DB::table('categories')->where('id', $product->category_id)->first()->name }}</td>
                                        <td>{{ DB::table('subcategories')->where('id', $product->subcategory_id)->first()->name }}</td>
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
