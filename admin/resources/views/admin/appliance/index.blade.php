@extends('admin.layouts.master')

@section('title')
    Appliances
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($appliances) < 1)
            <h4 class="text-danger">No product found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Appliances</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Purchase Price</th>
                                    <th>Market Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appliances as $appliance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ DB::table('categories')->where('id', $appliance->category_id)->first()->name }}</td>
                                        <td>{{ DB::table('subcategories')->where('id', $appliance->subcategory_id)->first()->name }}</td>
                                        <td>{{ DB::table('products')->where('id', $appliance->product_id)->first()->name }}</td>
                                        <td>{{ $appliance->name }}</td>
                                        <td>{{ $appliance->purchase_price }}</td>
                                        <td>{{ $appliance->market_price }}</td>
                                        <td>
                                            <a href="{{ route('appliance.edit', $appliance->id) }}" class="btn btn-warning me-2">Edit</a>
                                            <a href="{{ route('appliance.delete', $appliance->id) }}" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
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
