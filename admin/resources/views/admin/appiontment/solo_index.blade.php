@php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
@endphp

@extends('admin.layouts.master')

@section('title')
    All solo appiontments
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($allAppiontments) < 1)
                <h4 class="text-danger">No appiontments found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of All Solo Customer Appiontments</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Appiontment <br> ID</th>
                                        <th>Customer <br> Name</th>
                                        <th>Product <br> Name</th>
                                        <th>Selling <br> Date</th>
                                        <th>Status</th>
                                        <th>Appiontment Taken <br> Date and Time</th>
                                        <th>Inspection Last <br> Date and Time</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($allAppiontments as $appiontment)
                                        @php
                                            $soldProductId = $appiontment->sold_product_id;
                                            $customerId = DB::table('sold_products')
                                                ->where('id', $soldProductId)
                                                ->first()->user_id;

                                            $customerName = DB::table('users')
                                                ->where('id', $customerId)->first()->name;
                                            $productId = DB::table('sold_products')
                                                ->where('id', $soldProductId)
                                                ->first()->product_id;
                                            $productName = DB::table('products')
                                                ->where('id', $productId)
                                                ->first()->name;
                                            $sellingDate = DB::table('sold_products')
                                                ->where('id', $soldProductId)
                                                ->first()->selling_date;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $appiontment->id }}</td>
                                            <td>{{ $customerName }}</td>
                                            <td>{{ $productName }}</td>
                                            <td>{{ $sellingDate }}</td>
                                            <td>
                                                @php
                                                    $status = strtolower($appiontment->status); // Convert status to lowercase for consistency
                                                    $colorClass = '';

                                                    // Determine the color class based on the status
                                                    switch ($status) {
                                                        case 'pending':
                                                            $colorClass = 'text-warning';
                                                            break;
                                                        case 'assigned':
                                                            $colorClass = 'text-primary';
                                                            break;
                                                        case 'late':
                                                            $colorClass = 'text-danger';
                                                            break;
                                                        case 'working':
                                                            $colorClass = 'text-info';
                                                            break;
                                                        case 'complete':
                                                            $colorClass = 'text-success';
                                                            break;
                                                        // Add more cases for other statuses if needed
                                                    }
                                                @endphp
                                                <button
                                                    class="btn {{ $colorClass }} btn-sm">{{ $appiontment->status }}</button>
                                            </td>
                                            <td>
                                                {{ Carbon::parse($appiontment->appiontment_taken_date)->format('Y-M-d') ?? '' }} <br>
                                                {{ $appiontment->appiontment_taken_time > 12.00 ? $appiontment->appiontment_taken_time."PM" : $appiontment->appiontment_taken_time."AM" }}
                                            </td>
                                            <td>
                                                {{ $appiontment->inspection_date }} <br>
                                                @if ($appiontment->inspection_time)
                                                {{ $appiontment->inspection_time > 12.00 ? $appiontment->inspection_time."PM" : $appiontment->inspection_time."AM" ?? '' }}
                                                @else
                                                    {{ 'Assign first' }}

                                                @endif

                                            </td>
                                            <td>
                                                @if ($appiontment->status === 'pending')
                                                    <a href="{{ route('appiontment.assign_engineer', $appiontment->id) }}"
                                                        class="btn btn-outline-behance btn-sm">Assign Engineer</a>
                                                @elseif($appiontment->status === 'assigned')
                                                    <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Has been assigned</button><br>
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}" class="btn btn-info btn-sm my-2 d-flex align-items-center"><i class="mdi mdi-eye"></i><span>view engineer details</span></a>
                                                @elseif($appiontment->status === 'late')
                                                    <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Has been assigned</button><br>
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}" class="btn btn-info btn-sm my-2 d-flex align-items-center"><i class="mdi mdi-eye"></i><span>view engineer details</span></a>
                                                @elseif($appiontment->status === 'working')
                                                    <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Has been assigned</button><br>
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}" class="btn btn-info btn-sm my-2 d-flex align-items-center"><i class="mdi mdi-eye"></i><span>view engineer details</span></a>
                                                @elseif($appiontment->status === 'complete')
                                                    <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Has been assigned</button><br>
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}" class="btn btn-info btn-sm my-2 d-flex align-items-center"><i class="mdi mdi-eye"></i><span>view engineer details</span></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
