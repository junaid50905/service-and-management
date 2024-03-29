@php
    use Carbon\Carbon;
@endphp
@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('main-panel')
    <div class="row">

        {{-- highcharts --}}
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
            </div>
        </div>

        {{-- total products --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('product.index') }}" class="text-white text-decoration-none">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalProducts }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Products</h6>
                    </div>
                </a>
            </div>
        </div>
        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('sold_product.index') }}" class="text-white text-decoration-none">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalSalesProducts }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Sold Products</h6>
                    </div>
                </a>
            </div>
        </div>

        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('appliance.index') }}" class="text-white text-decoration-none">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ DB::table('appliances')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Number of appliance</h6>
                    </div>
                </a>
            </div>
        </div>

        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('engineer.index') }}" class="text-white text-decoration-none">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ DB::table('engineers')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Number of Engineers</h6>
                    </div>
                </a>
            </div>
        </div>
    </div>



    {{-- Multiple longitude and latitude --}}

    <div class="mt-2 mb-3 row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (count($allTodaysWorkingTasks) < 1)
                        <p style="color: #ff6b6b">There is no engineer currently on duty today</p>
                    @else
                        <div id="map" style="height: 80vh; width: 100%;"></div>

                        <div id="map" style="height: 40vh; width: 100%;"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>




    {{-- Recent 5 tasks --}}
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <h4 class="card-title">Todays Summary</h4>
                    <canvas id="transaction-history" width="282" height="141"
                        style="display: block; width: 282px; height: 141px;" class="mb-4 chartjs-render-monitor"></canvas>
                    <div class="p-1 my-2 d-flex justify-content-between align-items-center border-top border-bottom">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Appiontments </h6>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold">{{ count($allTodaysAppiontments) }}</h6>
                        </div>
                    </div>
                    <div class="p-1 my-2 d-flex justify-content-between align-items-center border-top border-bottom">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Assigned </h6>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold">
                                {{ $allTodaysAppiontments->where('status', 'assigned')->count() }}</h6>
                        </div>
                    </div>
                    <div class="p-1 my-2 d-flex justify-content-between align-items-center border-top border-bottom">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Late </h6>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold">
                                {{ $allTodaysAppiontments->where('status', 'late')->count() }}</h6>
                        </div>
                    </div>
                    <div class="p-1 my-2 d-flex justify-content-between align-items-center border-top border-bottom">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Working </h6>
                        </div>
                        <div>
                            <h6 class="mb-0 font-weight-bold">{{ count($allTodaysWorkingTasks) }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="flex-row d-flex justify-content-between">
                        <h4 class="mb-1 card-title text-info">Recent appiontments</h4>
                    </div>
                    @if (count($recentsAppiontments) < 1)
                        <p>No recent appiontment found</p>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    @foreach ($recentsAppiontments as $recentsAppiontment)
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div>
                                                    <img height="60" width="60"
                                                        src="https://purepng.com/public/uploads/large/purepng.com-canon-color-photo-printerelectronics-printer-9415246651465xvll.png"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="flex-grow row preview-item-content d-sm-flex">
                                                <div class="col-md-9">
                                                    @php
                                                        $status = $recentsAppiontment->status;
                                                        $appiontmenTakenDate = $recentsAppiontment->appiontment_taken_date;
                                                        $appiontmenTakenTime = $recentsAppiontment->appiontment_taken_time;
                                                        $inspectionDate = $recentsAppiontment->inspection_date;
                                                        $inspectionTime = $recentsAppiontment->inspection_time;
                                                        $soldProductId = $recentsAppiontment->sold_product_id;
                                                        $soldProduct = DB::table('sold_products')->where('id', $soldProductId)->first();
                                                        $productId = $soldProduct->product_id;
                                                        $userId = $soldProduct->user_id;
                                                        $productName = DB::table('products')->where('id', $productId)->first()->name;
                                                        $userName = DB::table('users')->where('id', $userId)->first()->name;
                                                        $userType = DB::table('users')->where('id', $userId)->first()->usertype;
                                                    @endphp
                                                    <a href="{{ $userType == 'solo' ? route('appiontment.solo_index') : route('appiontment.group_index') }}"
                                                        class="text-light text-decoration-none">
                                                        <h6 class="preview-subject">{{ $productName }}</h6>
                                                    </a>
                                                    <p class="mb-0 text-muted">{{ $userName }} | {{ $userType }}
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p class="text-muted">
                                                        @switch($status)
                                                            @case('pending')
                                                                {{ $appiontmenTakenDate }}
                                                            @break

                                                            @case('assigned')
                                                                {{ $inspectionDate }}
                                                            @break

                                                            @case('late')
                                                                {{ $inspectionDate }}
                                                            @break

                                                            @case('working')
                                                                {{ $inspectionDate }}
                                                            @break

                                                            @case('complete')
                                                                {{ $inspectionDate }}
                                                            @break
                                                        @endswitch
                                                    </p>
                                                    <p class="mb-0 text-muted">
                                                        @switch($status)
                                                            @case('pending')
                                                            <p class="text-warning">{{ $status }}</p>
                                                        @break

                                                        @case('assigned')
                                                            <p class="text-primary">{{ $status }}</p>
                                                        @break

                                                        @case('late')
                                                            <p class="text-danger">{{ $status }}</p>
                                                        @break

                                                        @case('working')
                                                            <p class="text-info">{{ $status }}</p>
                                                        @break

                                                        @case('complete')
                                                            <p class="text-success">{{ $status }}</p>
                                                        @break
                                                    @endswitch
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    {{-- highcharts --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>




    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBZYFFfyeW467TIU2Gry9RZWo3LUsZXjA&libraries=places&callback=initMap"
        async defer></script>




{{-- highcharts --}}
<script>
    var yearMonthData = @json($year_month);
    var appiontments = {!! json_encode($appiontments) !!};
    var completedTasks = {!! json_encode($completedTasks) !!};
    var lateTasks = {!! json_encode($lateTasks) !!};
    var workingTasks = {!! json_encode($workingTasks) !!};

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Month wise report',
            align: 'left'
        },
        xAxis: {
            categories: yearMonthData,
            crosshair: true,
        },
        yAxis: {
            min: 0,
            max: 50,
            title: {
                text: 'Within 50'
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
                name: 'Appiontments',
                data: appiontments
            },
            {
                name: 'Working',
                data: workingTasks
            },
            {
                name: 'Completed',
                data: completedTasks
            },
            {
                name: 'Late',
                data: lateTasks
            }
        ]
    });
</script>




    <script>
        $(document).ready(function() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 23.8,
                    lng: 90.4
                },
                zoom: 10
            });

            var allTodaysWorkingTasks = @json($allTodaysWorkingTasks);

            allTodaysWorkingTasks.forEach(function(appointment) {
                var latLng = new google.maps.LatLng(appointment.latitude, appointment.longitude);

                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    title: 'Status: ' + appointment.status
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Fetch engineer's name using engineer_id
                $.ajax({
                    // url: '/getEngineersLocationInOneMap/' + appointment.engineer_id, // Replace with your Laravel endpoint to fetch engineer data
                    url: "{{ url('admin/getEngineersLocationInOneMap') }}" + "/" + appointment
                        .engineer_id + "/" + appointment
                        .appiontment_id, // Replace with your Laravel endpoint to fetch engineer data
                    method: 'GET',
                    success: function(data) {
                        console.log(data);
                        var engineerName = data.engineer
                            .name; // Assuming 'name' is the property containing the engineer's name
                        var userId = data.appiontment
                            .user_id; // Assuming 'name' is the property containing the engineer's name

                        var contentString =
                            '<div>' +
                            '<p class="text-dark">' + engineerName +
                            '</p>' +
                            '</div>';

                        var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });

                        marker.addListener('mouseover', function() {
                            infowindow.open(map, marker);
                        });

                        marker.addListener('mouseout', function() {
                            infowindow.close(map, marker);
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching engineer data:', error);
                    }
                });
            });
        });
    </script>


@endsection

