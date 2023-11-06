{{-- @php
    use App\Models\Admin\Appiontment;
    use App\Models\Admin\SoldProduct;
    use App\Models\Admin\Product;
    use App\Models\Admin\Category;
    use App\Models\Admin\Subcategory;
    use App\Models\User;
    use App\Models\Admin\Branch;

@endphp



@extends('engineer.layouts.master')
@section('title')
    Total tasks
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header pb-0">
                    <h6>Total tasks</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">SN</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Product
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2">
                                        Customer</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-0">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($totalTasks as $task)
                                    @php
                                        $appiontment = Appiontment::where('id', $task->appiontment_id)->first();
                                        $appiontmentStatus = $appiontment->status;
                                        $appiontmentInspectionDate = $appiontment->inspection_date;
                                        $appiontmentInspectionTime = $appiontment->inspection_time;
                                        $soldProductId = $appiontment->sold_product_id;
                                        $soldProduct = SoldProduct::where('id', $soldProductId)->first();
                                        $customerId = $soldProduct->user_id;
                                        $branchId = $soldProduct->branch_id;

                                        $exists = Branch::where('id', $branchId)
                                            ->where('user_id', $customerId)
                                            ->exists();

                                        $customer = User::where('id', $customerId)->first();
                                        $customerName = $customer->name;
                                        $customerType = $customer->usertype;
                                        $productId = $soldProduct->product_id;
                                        $product = Product::where('id', $productId)->first();
                                        $productName = $product->name;
                                        $productCategoryId = $product->category_id;
                                        $category = Category::where('id', $productCategoryId)->first()->name;
                                        $productSubcategoryId = $product->subcategory_id;
                                        $subcategory = Subcategory::where('category_id', $productCategoryId)
                                            ->where('id', $productSubcategoryId)
                                            ->first()->name;
                                    @endphp
                                    <tr>
                                        <td class="ps-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://www.startech.com.bd/image/cache/catalog/printer/epson/ecotank-l1250/ecotank-l1250-01-500x500.webp"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $productName }}</h6>
                                                    <p class="text-xs text-secondary mb-0">category: {{ $category }}
                                                        |
                                                        subcategory: {{ $subcategory }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $customerName }}</h6>
                                            <p class="text-xs text-secondary mb-0">
                                                {{ $exists? Branch::where('id', $branchId)->where('user_id', $customerId)->first()->branch_name . '|': '' }}
                                                {{ $customerType }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <span class="badge badge-sm {{ $appiontmentStatus == 'assigned' ? 'bg-gradient-primary' : '' }} {{ $appiontmentStatus == 'late' ? 'bg-gradient-danger' : '' }} {{ $appiontmentStatus == 'working' ? 'bg-gradient-info' : '' }} {{ $appiontmentStatus == 'complete' ? 'bg-gradient-success' : '' }}">{{ $appiontmentStatus }}</span>
                                            <p class="text-xs text-secondary mb-0">Inspection Last Date: <br>
                                                {{ $appiontmentInspectionDate }} |
                                                {{ $appiontmentInspectionTime > 12.0 ? $appiontmentInspectionTime . 'PM' : $appiontmentInspectionTime . 'AM' }}
                                            </p>
                                        </td>
                                        <td>
                                            <a href="{{ route('engineer.task_view', $task->appiontment_id) }}"
                                                class="text-dark font-weight-bold text-xs">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}




@php
    use App\Models\Admin\Appiontment;
    use App\Models\Admin\SoldProduct;
    use App\Models\Admin\Product;
    use App\Models\Admin\Category;
    use App\Models\Admin\Subcategory;
    use App\Models\User;
    use App\Models\Admin\Branch;

@endphp



@extends('engineer.layouts.master')
@section('title')
    Total tasks
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">SN</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Product
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2">
                                        Customer</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Status
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-0">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($totalTasks as $task)
                                    @php
                                        $appiontment = Appiontment::where('id', $task->appiontment_id)->first();
                                        $appiontmentStatus = $appiontment->status;
                                        $appiontmentInspectionDate = $appiontment->inspection_date;
                                        $appiontmentInspectionTime = $appiontment->inspection_time;
                                        $soldProductId = $appiontment->sold_product_id;
                                        $soldProduct = SoldProduct::where('id', $soldProductId)->first();
                                        $customerId = $soldProduct->user_id;
                                        $branchId = $soldProduct->branch_id;

                                        $exists = Branch::where('id', $branchId)
                                            ->where('user_id', $customerId)
                                            ->exists();

                                        $customer = User::where('id', $customerId)->first();
                                        $customerName = $customer->name;
                                        $customerType = $customer->usertype;
                                        $productId = $soldProduct->product_id;
                                        $product = Product::where('id', $productId)->first();
                                        $productName = $product->name;
                                        $productCategoryId = $product->category_id;
                                        $category = Category::where('id', $productCategoryId)->first()->name;
                                        $productSubcategoryId = $product->subcategory_id;
                                        $subcategory = Subcategory::where('category_id', $productCategoryId)
                                            ->where('id', $productSubcategoryId)
                                            ->first()->name;
                                    @endphp
                                    <tr>
                                        <td class="ps-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://www.startech.com.bd/image/cache/catalog/printer/epson/ecotank-l1250/ecotank-l1250-01-500x500.webp"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $productName }}</h6>
                                                    <p class="text-xs text-secondary mb-0">category: {{ $category }}
                                                        |
                                                        subcategory: {{ $subcategory }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $customerName }}</h6>
                                            <p class="text-xs text-secondary mb-0">
                                                {{ $exists? Branch::where('id', $branchId)->where('user_id', $customerId)->first()->branch_name . '|': '' }}
                                                {{ $customerType }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <span class="badge badge-sm {{ $appiontmentStatus == 'assigned' ? 'bg-gradient-primary' : '' }} {{ $appiontmentStatus == 'late' ? 'bg-gradient-danger' : '' }} {{ $appiontmentStatus == 'working' ? 'bg-gradient-info' : '' }} {{ $appiontmentStatus == 'complete' ? 'bg-gradient-success' : '' }}">{{ $appiontmentStatus }}</span>
                                            <p class="text-xs text-secondary mb-0">Inspection Last Date: <br>
                                                {{ $appiontmentInspectionDate }} |
                                                {{ $appiontmentInspectionTime > 12.0 ? $appiontmentInspectionTime . 'PM' : $appiontmentInspectionTime . 'AM' }}
                                            </p>
                                        </td>
                                        <td>
                                            <a href="{{ route('engineer.task_view', $task->appiontment_id) }}"
                                                class="text-dark font-weight-bold text-xs">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
