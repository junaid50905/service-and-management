@php
    use Illuminate\Support\Str;

@endphp
@extends('admin.layouts.master')

@section('title')
    View products of customer
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($products) < 1)
                <h4 class="text-danger">No product found for this customer</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        {{-- @foreach ($products as $product)
                            <div class="d-flex gap-4 my-3 border border-success p-3 text-secondary">
                                <div>
                                    <img src="https://e7.pngegg.com/pngimages/130/184/png-clipart-multi-function-printer-inkjet-printing-epson-printer-ink-electronics.png"
                                        alt="" height="70" width="70" class="rounded-circle">
                                </div>
                                <div>
                                    <h3 class="mt-2">
                                        {{ DB::table('products')->where('id', $product->product_id)->first()->name }}
                                    </h3>
                                    <p><b>Product ID: </b>{{ $product->product_id }}</p>
                                    <p><b>Time of Warranty: </b>{{ $product->time_of_warranty }} months</p>
                                    <p><b>S&M: </b>{{ $product->sam == 0 ? 'NO' : 'YES' }}</p>
                                    <p><b>Model:</b>{{ DB::table('products')->where('id', $product->product_id)->first()->model }}</p>
                                    <p><b>Price and Quantity:</b>{{ $price = DB::table('products')->where('id', $product->product_id)->first()->price }}
                                        X {{ $product->quantity }} = {{ $product->quantity * $price }}
                                    </p>
                                    <a href="{{ route('appiontment.appiontment_for_solo_customer', $product->id) }}" onclick="return confirm('Are you sure, you want to take an appiontment for this product?')" class="btn btn-sm btn-info">Make an appiontment</a>
                                </div>
                            </div>
                        @endforeach --}}

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Time of Warranty <br> (month)</th>
                                    <th>S&M</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="https://e7.pngegg.com/pngimages/130/184/png-clipart-multi-function-printer-inkjet-printing-epson-printer-ink-electronics.png"
                                        alt="" height="70" width="70" class="rounded-circle"></td>
                                        <td>{{ Str::words(DB::table('products')->where('id', $product->product_id)->first()->name, 4, '...')}}</td>
                                        <td>{{ $product->time_of_warranty }}</td>
                                        <td>{{ $product->sam == 0 ? 'NO' : 'YES' }} {{ $product->id }}</td>
                                        <td><a href="{{ route('appiontment.appiontment_for_solo_customer', $product->id) }}" onclick="return confirm('Are you sure, you want to take an appiontment for this product?')" class="btn btn-sm btn-info">Make an appiontment</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Time of Warranty <br> (month)</th>
                                    <th>S&M</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
