@php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;
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
                        <hr>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="small_font">#</th>
                                        {{-- <th>Appiontment <br> ID</th> --}}
                                        <th class="small_font">Customer <br> Name</th>
                                        <th class="small_font">Product <br> Name</th>
                                        <th class="small_font">Selling <br> Date</th>
                                        <th class="small_font">Status</th>
                                        <th class="small_font">Appiontment <br> Taken Date <br> and Time</th>
                                        <th class="small_font">Inspection <br> Last Date <br> and Time</th>
                                        <th class="small_font">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allAppiontments as $appiontment)
                                        @php
                                            $soldProductId = $appiontment->sold_product_id;
                                            $customerId = DB::table('sold_products')
                                                ->where('id', $soldProductId)
                                                ->first()->user_id;

                                            $customerName = DB::table('users')
                                                ->where('id', $customerId)
                                                ->first()->name;
                                            $productId = DB::table('sold_products')
                                                ->where('id', $soldProductId)
                                                ->first()->product_id;
                                            $productName = DB::table('products')
                                                ->where('id', $productId)
                                                ->first()->name;
                                            $sellingDate = DB::table('sold_products')
                                                ->where('id', $soldProductId)
                                                ->first()->selling_date;
                                            $appIdExistsOnPartsForProduct = DB::table('parts_for_product')
                                                ->where('appiontment_id', $appiontment->id)
                                                ->exists();
                                        @endphp
                                        <tr>
                                            <td class="small_font">{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $appiontment->id }}</td> --}}
                                            <td class="small_font">{{ $customerName }}</td>
                                            <td class="small_font">{{ Str::words($productName, 4, '...') }}</td>
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
                                                    class="btn {{ $colorClass }} btn-sm small_font">{{ $appiontment->status }}</button>
                                            </td>
                                            <td class="small_font">
                                                {{ Carbon::parse($appiontment->appiontment_taken_date)->format('Y-M-d') ?? '' }}
                                                <br>
                                                {{ $appiontment->appiontment_taken_time > 12.0 ? $appiontment->appiontment_taken_time . 'PM' : $appiontment->appiontment_taken_time . 'AM' }}
                                            </td>
                                            <td class="small_font">
                                                {{ $appiontment->inspection_date }} <br>
                                                @if ($appiontment->inspection_time)
                                                    {{ $appiontment->inspection_time > 12.0 ? $appiontment->inspection_time . 'PM' : $appiontment->inspection_time . 'AM' ?? '' }}
                                                @else
                                                    {{ 'Assign first' }}
                                                @endif

                                            </td>
                                            <td class="small_font">
                                                @if ($appiontment->status === 'pending')
                                                    <a href="{{ route('appiontment.assign_engineer', [$appiontment->id, $productId]) }}"
                                                        class="btn btn-outline-behance btn-sm small_font">Assign</a>
                                                @elseif($appiontment->status === 'assigned')
                                                    {{-- <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Assigned</button><br> --}}
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}"
                                                        class="btn btn-info btn-sm my-2 p-2 d-flex align-items-center small_font max_content"><i
                                                            class="fa-solid fa-user"></i></a>
                                                @elseif($appiontment->status === 'late')
                                                    {{-- <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Assigned</button><br> --}}
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}"
                                                        class="btn btn-info btn-sm my-2 p-2 d-flex align-items-center small_font max_content"><i
                                                            class="fa-solid fa-user"></i></a>
                                                @elseif($appiontment->status === 'working')
                                                    {{-- <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Assigned</button><br> --}}
                                                    <div class="d-flex gap-1">
                                                        <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}"
                                                            class="btn btn-info btn-sm my-2 p-2 d-flex align-items-center small_font max_content"><i
                                                                class="fa-solid fa-user"></i></a>

                                                        <a href="{{ route('appiontment.estimated_time', $appiontment->id) }}"
                                                            class="btn btn-{{ $appiontment->estimated_time ? 'secondary' : 'info' }} btn-sm my-2 p-2 d-flex align-items-center small_font max_content" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ DB::table('appiontments')->where('id', $appiontment->id)->first()->estimated_time . " days" }}"><i
                                                                class="fa-solid fa-clock"></i></a>

                                                        @if (DB::table('inspections')->where('appiontment_id', $appiontment->id)->where('inspection', 'start')->first())
                                                            <a href="{{ route('appiontment.inspection_location', $appiontment->id) }}"
                                                                class="btn btn-secondary btn-sm p-2 my-2 d-flex align-items-center small_font max_content"><i
                                                                    class="mdi mdi-google-maps"></i></a>
                                                        @endif

                                                        @if ($appIdExistsOnPartsForProduct)
                                                            <a href="{{ route('appiontment.parts_need', $appiontment->id) }}"
                                                                class="btn btn-primary btn-sm my-2 p-2 d-flex align-items-center small_font max_content"><i
                                                                    class="fa-solid fa-screwdriver-wrench"></i></a>
                                                        @endif
                                                    </div>
                                                @elseif($appiontment->status === 'complete')
                                                    {{-- <button class="btn btn-secondary btn-sm disabled" role="button"
                                                        aria-disabled="true">Assigned</button><br> --}}
                                                    <a href="{{ route('appiontment.assigned_engineer_detailed', $appiontment->id) }}"
                                                        class="btn btn-info btn-sm my-2 p-2 d-flex align-items-center small_font max_content"><i
                                                            class="fa-solid fa-user"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="small_font">#</th>
                                        {{-- <th>Appiontment <br> ID</th> --}}
                                        <th class="small_font">Customer <br> Name</th>
                                        <th class="small_font">Product <br> Name</th>
                                        <th class="small_font">Selling <br> Date</th>
                                        <th class="small_font">Status</th>
                                        <th class="small_font">Appiontment <br> Taken Date <br> and Time</th>
                                        <th class="small_font">Inspection <br> Last Date <br> and Time</th>
                                        <th class="small_font">Action</th>
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
