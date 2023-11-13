@extends('admin.layouts.master')

@section('title')
    Today's all working tasks
@endsection

@section('main-panel')


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{url()->previous()}}" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i>Back</a>
                    @if (count($allTasks) < 1)
                        <p style="color: #ff6b6b">There is no engineer currently on duty today</p>
                    @else
                        <h3 class="text-primary mb-3">Today's all working tasks</h3>
                        <div class="row">
                            @foreach ($allTasks as $singleTodaysWorkingTask)
                                @php
                                    $engineer = DB::table('engineers')
                                        ->where('id', $singleTodaysWorkingTask->engineer_id)
                                        ->first();
                                    $categoryId = $engineer->category_id;
                                    $subCategoryId = $engineer->subcategory_id;
                                    $engineerCategory = DB::table('categories')
                                        ->where('id', $categoryId)
                                        ->first()->name;
                                    $engineerSubcategory = DB::table('subcategories')
                                        ->where('category_id', $categoryId)
                                        ->where('id', $subCategoryId)
                                        ->first()->name;
                                    $appiontment = DB::table('appiontments')->where('id', $singleTodaysWorkingTask->appiontment_id)->first();
                                    $soldProductId = $appiontment->sold_product_id;
                                    $userType = $appiontment->usertype;
                                    $soldProduct = DB::table('sold_products')->where('id', $soldProductId)->first();
                                    $userId = $soldProduct->user_id;
                                    $branchId = $soldProduct->branch_id;
                                    $customer = DB::table('users')->where('id', $userId)->first();
                                    $customerName = $customer->name;

                                    $exists = DB::table('branches')->where('id', $branchId)
                                            ->where('user_id', $userId)
                                            ->exists();


                                @endphp
                                <div class="col-md-6 my-2">
                                    <div>
                                        <span>{{ $engineer->name }}</span>
                                        <span class="text-muted">(<span>{{ $engineerCategory }}</span> |
                                            <span>{{ $engineerSubcategory }}</span> |
                                            <span>{{ $engineer->phone }}</span>)
                                        </span>
                                    </div>
                                    <div>
                                        <span>{{ $customerName }} {{ $exists ? ' | ' : '' }}</span>
                                        <span>{{ $exists ? DB::table('branches')->where('id', $branchId)->where('user_id', $userId)->first()->branch_name : '' }}</span>
                                    </div>
                                    <iframe width="100%"
                                        src="https://maps.google.com/maps?q=<?php echo $singleTodaysWorkingTask->latitude; ?>,<?php echo $singleTodaysWorkingTask->longitude; ?>&output=embed"></iframe>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
