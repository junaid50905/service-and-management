@php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
@endphp

@extends('admin.layouts.master')

@section('title')
    All group appiontments
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($allAppiontments) < 1)
                <h4 class="text-danger">No appiontments found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of All Group Appiontments</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="small_font">#</th>
                                        {{-- <th>Appiontment <br> ID</th> --}}
                                        <th class="small_font">Customer <br> Name</th>
                                        <th class="small_font">Branch</th>
                                        <th class="small_font">Product <br> Name</th>
                                        <th class="small_font">Selling <br> Date</th>
                                        <th class="small_font">Status</th>
                                        <th class="small_font">Appiontment Taken <br> Date and Time</th>
                                        <th class="small_font">Inspection Last <br> Date and Time</th>
                                        <th class="small_font">Action</th>
                                    </tr>
                                    @foreach ($allAppiontments as $appiontment)
                                        @php
                                            $soldProductId = $appiontment->sold_product_id;
                                            $customerId = DB::table('sold_products')
                                                ->where('id', $soldProductId)
                                                ->first()->user_id;
                                            $branchId = DB::table('sold_products')
                                                ->where('id', $soldProductId)
                                                ->first()->branch_id;
                                            $branchName = DB::table('branches')
                                                ->where('id', $branchId)
                                                ->first()->branch_name;

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
                                            <td class="small_font">{{ $loop->iteration }}</td>
                                            {{-- <td class="small_font">{{ $appiontment->id }}</td> --}}
                                            <td class="small_font">{{ $customerName }}</td>
                                            <td class="small_font">{{ $branchName }}</td>
                                            <td class="small_font">{{ $productName }}</td>
                                            <td class="small_font">{{ $sellingDate }}</td>
                                            <td class="small_font">
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
                                            <td class="small_font">
                                                {{ Carbon::parse($appiontment->appiontment_taken_date)->format('Y-M-d') ?? '' }} <br>
                                                {{ $appiontment->appiontment_taken_time > 12.00 ? $appiontment->appiontment_taken_time."PM" : $appiontment->appiontment_taken_time."AM" }}
                                            </td>
                                            <td class="small_font">
                                                {{ $appiontment->inspection_date }} <br>
                                                @if ($appiontment->inspection_time)
                                                {{ $appiontment->inspection_time > 12.00 ? $appiontment->inspection_time."PM" : $appiontment->inspection_time."AM" ?? '' }}
                                                @else
                                                    {{ 'Assign first' }}

                                                @endif

                                            </td>
                                            <td class="small_font">
                                                @if ($appiontment->status === 'pending')
                                                    <a href="{{ route('appiontment.assign_engineer', $appiontment->id) }}"
                                                        class="btn btn-outline-behance btn-sm small_font">Assign Engineer</a>
                                                @elseif($appiontment->status === 'assigned')
                                                    {{-- <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Has been assigned</button><br> --}}
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}" class="btn btn-info btn-sm my-2 d-flex justify-items-center align-items-center small_font max_content"><i class="mdi mdi-eye"></i><span>Engineer</span></a>
                                                @elseif($appiontment->status === 'late')
                                                    {{-- <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Has been assigned</button><br> --}}
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}" class="btn btn-info btn-sm my-2 d-flex justify-items-center align-items-center small_font max_content"><i class="mdi mdi-eye"></i><span>Engineer</span></a>
                                                @elseif($appiontment->status === 'working')
                                                    {{-- <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Has been assigned</button><br> --}}
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}" class="btn btn-info btn-sm my-2 d-flex justify-items-center align-items-center small_font max_content"><i class="mdi mdi-eye"></i><span>Engineer</span></a>
                                                @elseif($appiontment->status === 'complete')
                                                    {{-- <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Has been assigned</button><br> --}}
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}" class="btn btn-info btn-sm my-2 d-flex justify-items-center align-items-center small_font max_content"><i class="mdi mdi-eye"></i><span>Engineer</span></a>
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
