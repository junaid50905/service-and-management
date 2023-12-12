@extends('admin.layouts.master')

@section('title')
    Appliances
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <a href="{{ route('appliance.create') }}" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i>
                            Add new appliance</a>
            @if (count($appliances) < 1)
            <h4 class="text-danger">No product found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Appliances</h4>

                    <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Purchase <br> Price</th>
                                    <th>Market <br> Price</th>
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
                                            <a href="{{ route('appliance.edit', $appliance->id) }}" class="btn btn-warning me-2 p-2"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="{{ route('appliance.delete', $appliance->id) }}" onclick="return confirm('are you sure?')" class="btn btn-danger p-2"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Purchase <br> Price</th>
                                    <th>Market <br> Price</th>
                                    <th>Actions</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>






@endsection
