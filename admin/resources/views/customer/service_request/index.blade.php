@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
@endphp

@extends('customer.layouts.master')

@section('title')
    Request services
@endsection

@section('main-panel')
    <div class="row py-5">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4 class="mt-3">Your all service requests</h4>
                </div>
                @if (count($serviceRequestProducts) < 1)
                    <p>No service request found</p>
                @else
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table id="example" class="table table-striped align-items-center mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">SN
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">
                                            Product
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">
                                            Purchased <br> Date
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">
                                            Warranty <br>End Date
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">S&M
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceRequestProducts as $serviceRequestProduct)
                                    @php
                                        $soldProduct = DB::table('sold_products')->where('id', $serviceRequestProduct->sold_product_id)->first();
                                        $productId = $soldProduct->product_id;
                                        $product = DB::table('products')->where('id', $productId)->first();
                                        $prouctName = $product->name;
                                        $serviceRequestStatus = DB::table('service_requests')->where('id', $serviceRequestProduct->id)->first()->status;
                                    @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="https://www.telpo.com.cn/uploadfiles/2022/09/TPS320-POS.png"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{ Str::words($prouctName, 8,'...') }}
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">Warranty: {{ $soldProduct->time_of_warranty }} (months)</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-3 text-sm">{{ $soldProduct->selling_date }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-3 text-sm">
                                                            {{ Carbon::parse($soldProduct->selling_date)->addMonths($soldProduct->selling_date)->format('Y-m-d') }}
                                                            sdsd
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-3 text-sm">{{ $soldProduct->selling_date == 1 ? 'YES' : 'NO' }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-sm btn-{{ $serviceRequestStatus == 'taken' ? 'secondary' : 'success' }} font-weight-bold">{{ $serviceRequestStatus == 'taken' ? 'Taken' : 'Sent' }}</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">SN
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">
                                            Product
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">
                                            Purchased <br> Date
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">
                                            Warranty <br>End Date
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">S&M
                                        </th>
                                        <th class="text-uppercase text-xxs font-weight-bolder opacity-9">Status
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
