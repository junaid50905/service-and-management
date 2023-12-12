@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Carbon;

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
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Selling Date</th>
                                    <th>Warranty <br> (month)</th>
                                    <th>Warranty <br> End Date</th>
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
                                        <td>{{ Str::words(DB::table('products')->where('id', $product->product_id)->first()->name, 10, '...')}}</td>
                                        <td>{{ $product->selling_date }}</td>
                                        <td>{{ $product->time_of_warranty }}</td>
                                        <td>{{ Carbon::parse($product->selling_date)->addMonths($product->time_of_warranty)->format('Y-m-d') }}</td>
                                        <td>{{ $product->sam == 0 ? 'NO' : 'YES' }}</td>
                                        <td><a href="{{ route('appiontment.appiontment_for_solo_customer', $product->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Take appiontment" onclick="return confirm('Are you sure, you want to take an appiontment for this product?')" class="btn btn-sm btn-info p-2"><i class="fa-solid fa-calendar-check"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Selling Date</th>
                                    <th>Warranty <br> (month)</th>
                                    <th>Warranty <br> End Date</th>
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
