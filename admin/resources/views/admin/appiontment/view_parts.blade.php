@extends('admin.layouts.master')

@section('title')
    Parts need for this product
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col fw-bold">S&M</th>
                                <th scope="col fw-bold">Selling Date</th>
                                <th scope="col fw-bold">Time of Warranty</th>
                                <th scope="col fw-bold">Warranty End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="fw-lighter text-secondary">{{ $sam ? 'Yes' : 'No' }}</th>
                                <td class="fw-lighter text-secondary">{{ $sellingDate }}</td>
                                <td class="fw-lighter text-secondary">{{ $timeOfWarranty }} months</td>
                                <td class="fw-lighter text-secondary">{{ $warrantyEndDate }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="text-primary my-1">Parts need</h3>
                    @foreach ($parts as $part)
                        {{ $part->appliance_name }} <br />
                    @endforeach
                    @php
                        $soldProductId = DB::table('appiontments')
                            ->where('id', $appiontmentId)
                            ->first()->sold_product_id;
                        $productId = DB::table('sold_products')
                            ->where('id', $soldProductId)
                            ->first()->product_id;
                        $appliances = DB::table('appliances')
                            ->where('product_id', $productId)
                            ->get();
                    @endphp
                    <h4 class="text-info my-2">Our appliances</h4>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col fw-bold">Appliance name</th>
                                <th scope="col fw-bold">Purchase price</th>
                                <th scope="col fw-bold">Market price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appliances as $appliance)
                                <tr>
                                    <td class="fw-lighter text-secondary">{{ $appliance->name }}</td>
                                    <td class="fw-lighter text-secondary">{{ $appliance->purchase_price }}</td>
                                    <td class="fw-lighter text-secondary">{{ $appliance->market_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col fw-bold">Appliance name</th>
                                <th scope="col fw-bold">Purchase price</th>
                                <th scope="col fw-bold">Market price</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
