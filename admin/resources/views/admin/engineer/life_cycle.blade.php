@extends('admin.layouts.master')

@section('title')
    Engineer life cycle
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ DB::table('engineers')->where('id', $engineerId)->first()->name }}'s working
                        life cycle</h4>
                    <hr>
                    <div class="table-responsive">
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="fw-bold text-dark"> #</th>
                                    <th class="fw-bold text-dark"> Client</th>
                                    <th class="fw-bold text-dark"> Client <br> type</th>
                                    <th class="fw-bold text-dark"> Inspection <br> Location</th>
                                    <th class="fw-bold text-dark"> Product</th>
                                    <th class="fw-bold text-dark"> Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allAppiontmentsOfEngineer as $item)
                                @php
                                    $customerId = $item->user_id;
                                    $soldProductId = $item->sold_product_id;
                                    $branchId = DB::table('sold_products')->where('id', $soldProductId)->first()->branch_id;
                                    $productId = DB::table('sold_products')->where('id', $soldProductId)->first()->product_id;
                                    $branchExist = DB::table('branches')->where('id', $branchId)->where('user_id', $customerId)->exists();
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ DB::table('users')->where('id', $item->user_id)->first()->name }} <br> <span class="text-secondary">{{ $branchExist ? DB::table('branches')->where('id', $branchId)->where('user_id', $customerId)->first()->branch_name : "" }}</span></td>
                                        <td>{{ $item->usertype }}</td>
                                        <td>{{ $branchExist ? DB::table('branches')->where('id', $branchId)->where('user_id', $customerId)->first()->branch_address : DB::table('users')->where('id', $customerId)->first()->address }}</td>
                                        <td>{{ DB::table('products')->where('id', $productId)->first()->name }}</td>
                                        <td>
                                            @php
                                                $status = strtolower($item->status); // Convert status to lowercase for consistency
                                                $colorClass = '';

                                                // Determine the color class based on the status
                                                switch ($status) {
                                                    case 'pending':
                                                        $colorClass = 'warning';
                                                        break;
                                                    case 'assigned':
                                                        $colorClass = 'primary';
                                                        break;
                                                    case 'late':
                                                        $colorClass = 'danger';
                                                        break;
                                                    case 'working':
                                                        $colorClass = 'info';
                                                        break;
                                                    case 'complete':
                                                        $colorClass = 'success';
                                                        break;
                                                }
                                            @endphp
                                            <span
                                                class="badge bg-{{ $colorClass }} rounded-pill py-1 px-2">{{ $item->status }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="fw-bold text-dark"> #</th>
                                    <th class="fw-bold text-dark"> Client</th>
                                    <th class="fw-bold text-dark"> Client <br> type</th>
                                    <th class="fw-bold text-dark"> Inspection <br> Location</th>
                                    <th class="fw-bold text-dark"> Product</th>
                                    <th class="fw-bold text-dark"> Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
