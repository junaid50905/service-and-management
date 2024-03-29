@extends('admin.layouts.master')

@section('title')
Products
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <a href="{{ route('product.create') }}" class="mb-3 btn btn-success"><i class="fa-solid fa-plus"></i>
                            Add new product</a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <div class="table-responsive">
                        <table id="example" class="table table-hover">

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
                                        <a href="{{ route('product.edit', $product->id) }}" class="p-2 btn btn-warning me-"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{ route('product.delete', $product->id) }}" onclick="return confirm('are you sure?')" class="p-2 btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection
