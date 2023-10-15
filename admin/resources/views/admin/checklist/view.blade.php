@extends('admin.layouts.master')

@section('title')
    view checklist
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-title">
                    <h3>View the checklist</h3>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="bg-primary p-3">
                                <h5>Product Detailed</h5><hr>
                                <p>Service order id : {{ $servicing_order_id }}</p>
                                <p>Appiontment id : {{ $appiontment_id }}</p>
                                <p>Selling product id : {{ $selling_product_id }}</p>
                                <p>product ID : {{ $product_id }}</p>
                                <p>product Name : {{ $product_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="bg-secondary p-3">
                                <h5>User Detailed</h5><hr>
                                <p>User id : {{ $user_id }}</p>
                                <p>User Name : {{ $user_name }}</p>
                                <p>User Email : {{ $user_email }}</p>
                                <p>User Phone : {{ $user_phone }}</p>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="bg-success p-3">
                                <h5>Appliance Detailed</h5><hr>
                                <table class="table text-white">
                                    <tr>
                                        <td><b>Appliance Name</b></td>
                                        <td><b>Appliance Price</b></td>
                                    </tr>
                                    @foreach ($appliances as $appliance)
                                    <tr>
                                        <td>{{ $appliance->appliance_name }}</td>
                                        <td>{{ $appliance->appliance_price }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
