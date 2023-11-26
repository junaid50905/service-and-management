@extends('admin.layouts.master')

@section('title')
    All solo service request
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($allServiceRequest) < 1)
                <h4 class="text-danger">No service request found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All solo service requests</h4>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Product Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allServiceRequest as $serviceRequest)
                                        @php
                                            $customer = DB::table('users')
                                                ->where('id', $serviceRequest->user_id)
                                                ->first();
                                            $customerName = $customer->name;
                                            $soldProduct = DB::table('sold_products')
                                                ->where('id', $serviceRequest->sold_product_id)
                                                ->first();
                                            $productId = $soldProduct->product_id;
                                            $product = DB::table('products')
                                                ->where('id', $productId)
                                                ->first();
                                            $productName = $product->name;
                                            $categoryId = $product->category_id;
                                            $subcategoryId = $product->subcategory_id;
                                            $category = DB::table('categories')
                                                ->where('id', $categoryId)
                                                ->first()->name;
                                            $subcategory = DB::table('subcategories')
                                                ->where('category_id', $categoryId)
                                                ->where('id', $subcategoryId)
                                                ->first()->name;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <p class="mb-1">{{ $customerName }}</p>
                                            </td>
                                            <td>
                                                <p class="mb-1">{{ $productName }}</p>
                                                <p class="text-xs text-secondary mb-0">category: {{ $category }} |
                                                    subcategory: {{ $subcategory }}</p>
                                            </td>
                                            <td>
                                                @php
                                                    $status = DB::table('service_requests')->where('id', $serviceRequest->id)->first()->status;
                                                @endphp
                                                @if ($status == 'taken')
                                                    <span class="badge bg-secondary">Taken</span>
                                                @else
                                                <a href="{{ route('service_request.take_appiontment',[$serviceRequest->sold_product_id, $serviceRequest->id]) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Take appiontment"
                                                    onclick="return confirm('Are you sure, you want to take an appiontment for this product?')"
                                                    class="btn btn-sm btn-info p-2"><i
                                                        class="fa-solid fa-calendar-check"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Product Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>






@endsection
