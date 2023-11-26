@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
@endphp


@extends('customer.layouts.master')

@section('title')
    Purchased products
@endsection

@section('main-panel')
    <div class="row py-5">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4 class="mt-3">All Purchased Products</h4>
                </div>
                @if (count($products) < 1)
                    <p>You did not purchased any products yet</p>
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
                                        <th
                                            class="text-uppercase text-xxs font-weight-bolder opacity-9 ps-0">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
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
                                                            {{ Str::words(DB::table('products')->where('id', $product->product_id)->first()->name, 8,'...') }}

                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">Quantity:
                                                            {{ $product->quantity }} | Warranty:
                                                            {{ $product->time_of_warranty }} (months)</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-3 text-sm">{{ $product->selling_date }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-3 text-sm">
                                                            {{ Carbon::parse($product->selling_date)->addMonths($product->time_of_warranty)->format('Y-m-d') }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-3 text-sm">{{ $product->sam == 1 ? 'YES' : 'NO' }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('customer.request_service', $product->id) }}"
                                                    class="btn btn-sm btn-success font-weight-bold" onclick="return confirm('Are you sure?')">Request Service
                                                </a>
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
                                        <th
                                            class="text-uppercase text-xxs font-weight-bolder opacity-9 ps-0">
                                            Action</th>
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
