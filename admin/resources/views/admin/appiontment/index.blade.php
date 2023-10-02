@php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
@endphp

@extends('admin.layouts.master')

@section('title')
    All appiontments
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($allAppiontments) < 1)
                <h4 class="text-danger">No appiontments found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of All Appiontments</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>selling <br> product id</th>
                                        <th>user id</th>
                                        <th>User <br> Name</th>
                                        <th>Product <br> Name</th>
                                        <th>Selling <br> Date</th>
                                        <th>Warranty <br> end Date</th>
                                        <th>Warranty <br>left</th>
                                        <th>Status</th>
                                        <th>S&M</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($allAppiontments as $appiontment)
                                        @php
                                            $sellingProductId = $appiontment->selling_product_id;
                                            $userId = DB::table('selling_products')
                                                ->where('id', $appiontment->selling_product_id)
                                                ->first()->user_id;
                                            $productId = DB::table('selling_products')
                                                ->where('id', $appiontment->selling_product_id)
                                                ->first()->product_id;
                                            $sellingDate = DB::table('selling_products')
                                                ->where('id', $appiontment->selling_product_id)
                                                ->first()->selling_date;
                                            $warrantyEndDate = DB::table('selling_products')
                                                ->where('id', $appiontment->selling_product_id)
                                                ->first()->warranty_end_date;
                                            $sam = DB::table('selling_products')
                                                ->where('id', $appiontment->selling_product_id)
                                                ->first()->sam;

                                            $date1 = Carbon::parse($warrantyEndDate);
                                            $date2 = Carbon::now();
                                            $diffInDays = $date1->diffInDays($date2);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sellingProductId }}</td>
                                            <td>{{ $userId }}</td>
                                            <td>{{ DB::table('users')->where('id', $userId)->first()->name }}</td>
                                            <td>{{ DB::table('products')->where('id', $productId)->first()->name }}</td>
                                            <td>{{ $sellingDate }}</td>
                                            <td>{{ $warrantyEndDate }}</td>
                                            <td>{{ $diffInDays }} days</td>
                                            <td>
                                                @php
                                                    $status = strtolower($appiontment->status); // Convert status to lowercase for consistency
                                                    $colorClass = '';

                                                    // Determine the color class based on the status
                                                    switch ($status) {
                                                        case 'pending':
                                                            $colorClass = 'btn-warning';
                                                            break;
                                                        case 'assigned':
                                                            $colorClass = 'btn-primary';
                                                            break;
                                                        case 'late':
                                                            $colorClass = 'btn-danger';
                                                            break;
                                                        case 'complete':
                                                            $colorClass = 'btn-success';
                                                            break;
                                                        // Add more cases for other statuses if needed
                                                    }
                                                @endphp
                                                <button
                                                    class="btn {{ $colorClass }} btn-sm">{{ $appiontment->status }}</button>
                                            </td>
                                            <td>{{ $sam }}</td>
                                            <td>
                                                @if ($appiontment->status === 'pending')
                                                    <a href="{{ route('appiontment.assign_engineer', $appiontment->id) }}"
                                                        class="btn btn-outline-behance btn-sm">Assign Engineer</a>
                                                @elseif($appiontment->status === 'assigned')
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
