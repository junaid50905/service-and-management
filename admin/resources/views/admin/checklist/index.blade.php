@extends('admin.layouts.master')

@section('title')
    Checklists
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($servicing_orders) < 1)
            <h4 class="text-danger">No checklist found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Checklists</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>appiontment id</th>
                                    <th>selling product id</th>
                                    <th>user id</th>
                                    <th>user name</th>
                                    <th>product id</th>
                                    <th>product name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicing_orders as $servicing_order)
                                    @php
                                        $selling_product_id = DB::table('appiontments')->where('id', $servicing_order->appiontment_id)->first()->selling_product_id

                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $servicing_order->appiontment_id }}</td>
                                        <td>{{ $selling_product_id }}</td>
                                        <td>{{ $user_id = DB::table('selling_products')->where('id', $selling_product_id)->first()->user_id }}</td>
                                        <td>{{ DB::table('users')->where('id', $user_id)->first()->name }}</td>
                                        <td>{{ $product_id = DB::table('selling_products')->where('id', $selling_product_id)->first()->product_id }}</td>
                                        <td>{{ DB::table('products')->where('id', $product_id)->first()->name }}</td>
                                        <td>
                                            <a href="{{ route('checklist.view', $servicing_order->id) }}" class="btn btn-success me-2">View</a>
                                            <a href="" class="btn btn-warning me-2">Edit</a>
                                            <a href="" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
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
