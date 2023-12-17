@extends('customer.layouts.master')
@section('title')
    customer Dashboard
@endsection

@section('main-panel')
    <div class="row pb-5">
        @if (count($servicingProducts) < 1)
            <p>No product in servicing</p>
        @else
            @foreach ($servicingProducts as $servicingProduct)
                @php
                    $soldProduct = DB::table('sold_products')
                        ->where('id', $servicingProduct->sold_product_id)
                        ->first();
                    $productId = $soldProduct->product_id;
                    $productName = DB::table('products')
                        ->where('id', $productId)
                        ->first()->name;
                @endphp
                <div class="col-xl-4 col-sm-6 mb-xl-0 my-3">
                    <div class="card shadow bg-body rounded">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="numbers">
                                        <p class="text-xxs mb-0 text-uppercase font-weight-bold badge badge-sm {{ $servicingProduct->status == 'pending' ? 'bg-gradient-secondary' : '' }} {{ $servicingProduct->status == 'assigned' ? 'bg-gradient-primary' : '' }} {{ $servicingProduct->status == 'late' ? 'bg-gradient-danger' : '' }} {{ $servicingProduct->status == 'working' ? 'bg-gradient-info' : '' }} {{ $servicingProduct->status == 'complete' ? 'bg-gradient-success' : '' }}">
                                            {{ $servicingProduct->status }}</p>
                                        <h6 class="font-weight-bolder text-muted">
                                            {{ $productName }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
        @endif
    </div>




@endsection
