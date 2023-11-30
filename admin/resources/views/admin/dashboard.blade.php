

@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('main-panel')
    <div class="row">
        {{-- total products --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('product.index') }}" class="text-decoration-none text-white">
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
                <a href="{{ route('sold_product.index') }}" class="text-decoration-none text-white">
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
                <a href="{{ route('appliance.index') }}" class="text-decoration-none text-white">
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
                <a href="{{ route('engineer.index') }}" class="text-decoration-none text-white">
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

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (count($allTodaysWorkingTasks) < 1)
                        <p style="color: #ff6b6b">There is no engineer currently on duty today</p>
                    @else
                        <a href="{{ route('admin.allTodaysWorkingTasks') }}"
                            class="btn btn-outline-primary {{ $totalNumberOfTodaysWorkingTask <= 2 ? 'disabled' : '' }}">View
                            all ({{ $totalNumberOfTodaysWorkingTask }})</a>
                        <div class="row">
                            @foreach ($allTodaysWorkingTasks as $singleTodaysWorkingTask)
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
                                    $appiontment = DB::table('appiontments')
                                        ->where('id', $singleTodaysWorkingTask->appiontment_id)
                                        ->first();
                                    $soldProductId = $appiontment->sold_product_id;
                                    $userType = $appiontment->usertype;
                                    $soldProduct = DB::table('sold_products')
                                        ->where('id', $soldProductId)
                                        ->first();
                                    $userId = $soldProduct->user_id;
                                    $branchId = $soldProduct->branch_id;
                                    $customer = DB::table('users')
                                        ->where('id', $userId)
                                        ->first();
                                    $customerName = $customer->name;

                                    $exists = DB::table('branches')
                                        ->where('id', $branchId)
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
                                    <div class="text-muted">
                                        <span>{{ $customerName }} {{ $exists ? ' | ' : '' }}</span>
                                        <span>{{ $exists? DB::table('branches')->where('id', $branchId)->where('user_id', $userId)->first()->branch_name: '' }}</span>
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

        {{-- Multiple longitude and latitude --}}


        <h3>Multiple</h3>
        <div id="map" style="height: 500px; width: 900px;"></div>






    </div>

    {{-- Recent 5 tasks --}}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-1 text-info">Recent appiontments</h4>
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
                                            <div class="row preview-item-content d-sm-flex flex-grow">
                                                <div class="col-md-9">
                                                    @php
                                                        $status = $recentsAppiontment->status;
                                                        $appiontmenTakenDate = $recentsAppiontment->appiontment_taken_date;
                                                        $appiontmenTakenTime = $recentsAppiontment->appiontment_taken_time;
                                                        $inspectionDate = $recentsAppiontment->inspection_date;
                                                        $inspectionTime = $recentsAppiontment->inspection_time;
                                                        $soldProductId = $recentsAppiontment->sold_product_id;
                                                        $soldProduct = DB::table('sold_products')
                                                            ->where('id', $soldProductId)
                                                            ->first();
                                                        $productId = $soldProduct->product_id;
                                                        $userId = $soldProduct->user_id;
                                                        $productName = DB::table('products')
                                                            ->where('id', $productId)
                                                            ->first()->name;
                                                        $userName = DB::table('users')
                                                            ->where('id', $userId)
                                                            ->first()->name;
                                                        $userType = DB::table('users')
                                                            ->where('id', $userId)
                                                            ->first()->usertype;
                                                    @endphp
                                                    <a href="{{ $userType == 'solo' ? route('appiontment.solo_index') : route('appiontment.group_index') }}"
                                                        class="text-light text-decoration-none">
                                                        <h6 class="preview-subject">{{ $productName }}</h6>
                                                    </a>
                                                    <p class="text-muted mb-0">{{ $userName }} | {{ $userType }}
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
                                                    <p class="text-muted mb-0">
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




    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBZYFFfyeW467TIU2Gry9RZWo3LUsZXjA&libraries=places&callback=initMap"
        async defer></script>

    <script>
        // Get the data from Blade and use it in a script tag
        var allTodaysWorkingTasks = @json($allTodaysWorkingTasks);

        // Now 'allTodaysWorkingTasks' holds your data as a JavaScript object
        console.log(allTodaysWorkingTasks); // You can perform operations with this data in JavaScript


    </script>

    <script>
    $(document).ready(function () {
        // Initialize the map
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 23.8, lng: 90.4 }, // Center the map at a specific location
            zoom: 8 // Set the initial zoom level
        });

        // Array of appointment details
        var appointments = [
            {
                latitude: 23.794004,
                longitude: 90.403981,
                status: "working",
                name: 'junaid',
                phone: '0133233'
            },
            {
                latitude: 23.994008,
                longitude: 90.413959,
                status: "working",
                name: 'arman',
                phone: '0343323'
            }
        ];

        // Add markers for each appointment
        appointments.forEach(function (appointment) {
            var latLng = new google.maps.LatLng(appointment.latitude, appointment.longitude);

            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: 'Status: ' + appointment.status
            });

            // Create info window content
            var contentString =
                '<div>' +
                '<p class="text-dark"><strong>Name:</strong> ' + appointment.name + '</p>' +
                '<p class="text-dark"><strong>Phone:</strong> ' + appointment.phone + '</p>' +
                '</div>';

            // Create info window for each marker
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            // Show info window on marker hover
            marker.addListener('mouseover', function () {
                infowindow.open(map, marker);
            });

            // Close info window on marker mouseout
            marker.addListener('mouseout', function () {
                infowindow.close(map, marker);
            });
        });
    });
</script>




@endsection
