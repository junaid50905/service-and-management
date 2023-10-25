@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('main-panel')
    <div class="row">
        {{-- total products --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('product.index') }}" class="text-decoration-none text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalProducts }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Products</h6>
                    </div>
                </a>
            </div>
        </div>
        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('sold_product.index') }}" class="text-decoration-none text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalSalesProducts }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Sold Products</h6>
                    </div>
                </a>
            </div>
        </div>

        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('appliance.index') }}" class="text-decoration-none text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ DB::table('appliances')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Number of appliance</h6>
                    </div>
                </a>
            </div>
        </div>

        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('engineer.index') }}" class="text-decoration-none text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ DB::table('engineers')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Number of Engineers</h6>
                    </div>
                </a>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <h4 class="card-title text-info">Transaction History</h4>
                    <canvas id="transaction-history" class="transaction-chart chartjs-render-monitor"
                        style="display: block; width: 293px; height: 146px;" width="293" height="146"></canvas>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Transfer to Paypal</h6>
                            <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                        </div>
                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">$236</h6>
                        </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Tranfer to Stripe</h6>
                            <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                        </div>
                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">$593</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-1 text-info">Recent appiontments</h4>
                    </div>
                    @if (count($recentsAppiontments) < 1)
                        <p>No recent appiontment found</p>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    @foreach ($recentsAppiontments as $recentsAppiontment)
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div>
                                                    <img height="60" width="60"
                                                        src="https://purepng.com/public/uploads/large/purepng.com-canon-color-photo-printerelectronics-printer-9415246651465xvll.png"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="row preview-item-content d-sm-flex flex-grow">
                                                <div class="col-md-9">
                                                    @php
                                                        $status = $recentsAppiontment->status;
                                                        $appiontmenTakenDate = $recentsAppiontment->appiontment_taken_date	;
                                                        $appiontmenTakenTime = $recentsAppiontment->appiontment_taken_time;
                                                        $inspectionDate = $recentsAppiontment->inspection_date;
                                                        $inspectionTime = $recentsAppiontment->inspection_time;
                                                        $soldProductId = $recentsAppiontment->sold_product_id;
                                                        $soldProduct = DB::table('sold_products')->where('id', $soldProductId)->first();
                                                        $productId = $soldProduct->product_id;
                                                        $userId = $soldProduct->user_id;
                                                        $productName = DB::table('products')->where('id', $productId)->first()->name;
                                                        $userName = DB::table('users')->where('id', $userId)->first()->name;
                                                        $userType = DB::table('users')->where('id', $userId)->first()->usertype;
                                                    @endphp
                                                    <a href="{{ $userType == 'solo' ? route('appiontment.solo_index') : route('appiontment.group_index') }}" class="text-light text-decoration-none"><h6 class="preview-subject">{{ $productName }}</h6></a>
                                                    <p class="text-muted mb-0">{{ $userName }} | {{ $userType }}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p class="text-muted">
                                                        @switch($status)
                                                            @case('pending')
                                                                {{ $appiontmenTakenDate }}
                                                                @break
                                                            @case('assigned')
                                                                {{ $inspectionDate }}
                                                                @break
                                                        @endswitch
                                                    </p>
                                                    <p class="text-muted mb-0">
                                                        @switch($status)
                                                            @case('pending')
                                                                <p class="text-warning">{{ $status }}</p>
                                                                @break
                                                            @case('assigned')
                                                                <p class="text-primary">{{ $status }}</p>
                                                                @break
                                                            @case('late')
                                                                <p class="text-danger">{{ $status }}</p>
                                                                @break
                                                            @case('complete')
                                                                <p class="text-success">{{ $status }}</p>
                                                                @break
                                                        @endswitch
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
