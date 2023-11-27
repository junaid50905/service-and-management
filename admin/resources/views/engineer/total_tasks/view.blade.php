@php
    use App\Models\Admin\Appiontment;
    use Carbon\Carbon;
@endphp

@extends('engineer.layouts.master')
@section('title')
    Task details
@endsection

@section('page-title')
    Task-details
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="timerOption">
                <h3 id="timer" class="text-light">00:00:00</h3>
            </div>
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <div>
                        @php
                            $appiontmentStatus = Appiontment::where('id', $appiontment_id)->first()->status;
                        @endphp
                        <a href="{{ route('engineer.total_tasks') }}" class="me-3"><i class="fa-solid fa-angle-left"></i>
                            Back</a>
                        <span
                            class="badge badge-sm {{ $appiontmentStatus == 'assigned' ? 'bg-gradient-primary' : '' }} {{ $appiontmentStatus == 'late' ? 'bg-gradient-danger' : '' }} {{ $appiontmentStatus == 'working' ? 'bg-gradient-info' : '' }} {{ $appiontmentStatus == 'complete' ? 'bg-gradient-success' : '' }}">{{ $appiontmentStatus }}</span>
                    </div>


                    <!-- ========== Start Section ========== -->
                    <div class="row">
                        <div class="col-md-4 my-2">

                            <!-- ==========  start inspection ========== -->
                            <div id="locationForm">
                                <input type="hidden" name="appiontment_id" value="{{ $appiontment_id }}"
                                    id="appiontment_id">
                                <input type="hidden" name="latitude" id="latitudeInput">
                                <input type="hidden" name="longitude" id="longitudeInput">
                                <button type="submit" class="btn btn-primary" id="startInspectionBtn"><i
                                        class="fa-solid fa-hourglass-start"></i> Start inspection</button>
                            </div>
                            <!-- ========= start inspection ================================== -->

                            <!-- ========== stop inspection ========== -->
                            <form action="{{ route('engineer.stop_inspection', $appiontment_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" id="stopInspectionBtn"><i
                                        class="fa-solid fa-stopwatch"></i>Stop inspection</button>
                            </form>
                            <!-- ========== stop inspection ==================================== -->

                            <!-- ==========  complete the task ================================== -->
                            @if ($appiontmentStatus == 'working')
                                <form action="{{ route('engineer.complete_task', $appiontment_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success" id="completeTaskBtn">Complete
                                        Task</button>
                                </form>
                            @endif
                            <!-- ========= complete the task =================================== -->

                            @if ($appiontmentStatus == 'working')
                                <div>
                                    <h5>Write the parts name for this product</h5>
                                    <form action="{{ route('needed_parts.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $appiontment_id }}" name="appiontment_id"
                                            placeholder="wheel, power button">
                                        <input name="appliance_name[]" data-role="tagsinput" class="form-control" />
                                        <button type="submit" class="btn btn-sm btn-primary mt-1">Submit</button>
                                    </form>
                                    @php
                                        $parts = DB::table('parts_for_product')
                                            ->where('appiontment_id', $appiontment_id)
                                            ->get();
                                    @endphp
                                    @if (count($parts) > 0)
                                        <p>Parts List:</p>
                                        @foreach ($parts as $part)
                                            <button
                                                class="m-1 btn btn-sm btn-secondary text-black">{{ $part->appliance_name }}</button>
                                        @endforeach
                                    @endif
                                </div>
                            @endif

                        </div>

                        <div class="col-md-6 my-2">
                            <button type="button" id="shareLocation" class="btn btn-primary"><i
                                    class="fa-solid fa-location-dot"></i> Show Location</button>
                            <div id="map">
                                <div id="mapShowingStatus"></div>
                            </div>
                        </div>

                        @php
                            $inspections = DB::table('inspections')
                                ->where('appiontment_id', $appiontment_id)
                                ->orderBy('start_date', 'desc')
                                ->get();

                        @endphp
                        @if (count($inspections) > 0)
                            <div class="col-md-2 my-2 border">
                                <h6>All inspections</h6>
                                <div style="height: 300px;  overflow: auto;">
                                    @foreach ($inspections as $inspection)
                                        @php

                                            $time1 = Carbon::createFromFormat('H:i:s', $inspection->end_time);
                                            $time2 = Carbon::createFromFormat('H:i:s', $inspection->start_time);

                                            // Calculate the difference in seconds
                                            $timeDifferenceInSeconds = $time1->diffInSeconds($time2);

                                            // Convert the difference to a meaningful format (e.g., hours, minutes, seconds)
                                            $hours = floor($timeDifferenceInSeconds / 3600);
                                            $minutes = floor(($timeDifferenceInSeconds % 3600) / 60);
                                            $seconds = $timeDifferenceInSeconds % 60;
                                        @endphp
                                        <div class="bg-primary my-1 p-1 rounded text-light">
                                            <p class="m-0"><i class="fa-solid fa-calendar"></i>
                                                {{ $inspection->start_date }}</p>
                                            <p class="m-0"><i class="fa-solid fa-play"></i>
                                                {{ $inspection->start_time }}</p>
                                            <p class="m-0"><i class="fa-solid fa-pause"></i> {{ $inspection->end_time }}
                                            <p class="m-0">Hours - {{ $hours }} <br> Minutes - {{ $minutes }} <br> Seconds - {{ $seconds }}</p>
                                        </div>
                                    @endforeach
                                </div>
                        @endif
                    </div>



                </div>


                <!-- ========== End Section ========== -->



                <div class="card-body pb-2">
                    <div class="row">
                        <div class="col-md-6 border-end border-start my-4">
                            <h3 class="border-bottom text-primary py-2">Product Details</h3>
                            <div class="d-flex">
                                <img src="https://www.startech.com.bd/image/cache/catalog/printer/epson/ecotank-l1250/ecotank-l1250-01-500x500.webp"
                                    class="avatar avatar-sm me-3">
                                <div>
                                    <h4>{{ $product->name }}</h4>
                                    <div class="d-flex gap-3">
                                        <p class="text-xs text-muted mb-0">Category: {{ $category->name }}</p>
                                        <p class="text-xs text-muted mb-0">Subcategory: {{ $subcategory->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 border-end my-4">
                            <h3 class="border-bottom text-primary py-2">Customer Details</h3>
                            <div>
                                @if (!$branchExists)
                                    <h5 class="text-muted">Inspection area</h5>
                                @endif
                                <h4>{{ $customer->usertype == 'group' ? 'Head-Office : ' : '' }}{{ $customer->name }}
                                </h4>
                                <div class="row">
                                    <div class="col-md-6 p-2">
                                        <p class="text-xs text-muted mb-0"><b>Type:</b> {{ $customer->usertype }}</p>
                                    </div>

                                    <div class="col-md-6 p-2">
                                        <p class="text-xs text-muted mb-0"><b>Email:</b> {{ $customer->email }}</p>
                                    </div>

                                    <div class="col-md-6 p-2">
                                        <p class="text-xs text-muted mb-0"><b>phone:</b> {{ $customer->phone }}</p>
                                    </div>

                                    <div class="col-md-6 p-2">
                                        <p class="text-xs text-muted mb-0"><b>Address:</b> {{ $customer->address }}</p>
                                    </div>
                                </div> <br>
                            </div>
                            @if ($branchExists)
                                <div style="border-top: dashed">
                                    <h5 class="text-muted">Inspection area</h5>
                                    <h4>{{ $customer->usertype == 'group' ? 'Branch : ' : '' }}{{ $branch->branch_name }}
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6 p-2">
                                            <p class="text-xs text-muted mb-0"><b>Address:</b>
                                                {{ $branch->branch_address }}</p>
                                        </div>

                                        <div class="col-md-6 p-2">
                                            <p class="text-xs text-muted mb-0"><b>Admin name:</b>
                                                {{ $branch->admin_name }}
                                            </p>
                                        </div>

                                        <div class="col-md-6 p-2">
                                            <p class="text-xs text-muted mb-0"><b>Admin email:</b>
                                                {{ $branch->admin_email }}</p>
                                        </div>

                                        <div class="col-md-6 p-2">
                                            <p class="text-xs text-muted mb-0"><b>Admin phone:</b>
                                                {{ $branch->admin_phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- ========== Start Location ========== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBZYFFfyeW467TIU2Gry9RZWo3LUsZXjA&libraries=places&callback=initMap"
        async defer></script>

    <script>
        $(document).ready(function() {
            // getting location
            $('#shareLocation').click(function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((showPosition) => {
                        const lat = showPosition.coords.latitude;
                        const lng = showPosition.coords.longitude;

                        $('#latitudeInput').val(lat)
                        $('#longitudeInput').val(lng)

                        var locationLatituteValue = $('#latitudeInput').val()
                        var locationLongitudeValue = $('#longitudeInput').val()



                        if (!isNaN(lat) && !isNaN(lng)) {
                            const latlng = {
                                lat: parseFloat(lat),
                                lng: parseFloat(lng)
                            };

                            var map = new google.maps.Map(document.getElementById("map"), {
                                zoom: 10,
                                center: latlng,
                            });
                            new google.maps.Marker({
                                position: latlng,
                                map,
                            });
                        } else {
                            alert('Invalid latitude and longitude values.');
                        }

                        // showing the start inspection button
                        if (lat && lng) {
                            $('#startInspectionBtn').css('display', 'block')
                        } else {
                            console.log('map does not found');
                        }
                    }, (error) => {
                        alert('Geolocation error: ' + error.message);
                    });
                } else {
                    alert('Geolocation is not supported by this browser');
                }
                $(this).hide();
                $('#mapShowingStatus').html('Showing your current location......')

            });


            // start inspection
            $(document).on('click', '#startInspectionBtn', function() {
                const appiontmentId = $('#appiontment_id').val()
                const latitude = $('#latitudeInput').val()
                const longitude = $('#longitudeInput').val()


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('engineer.start_inspection') }}",
                    dataType: "json",
                    data: {
                        appiontment_id: appiontmentId,
                        latitude: latitude,
                        longitude: longitude
                    },
                    success: function(data) {
                        localStorage.setItem(`working_state_${appiontmentId}`, appiontmentId);

                        if (localStorage.getItem(`working_state_${appiontmentId}`) ==
                            appiontmentId) {
                            $('#startInspectionBtn').html("You have started inspection");
                            $("#startInspectionBtn").prop("disabled", true);
                            $('#stopInspectionBtn').css('display', 'block');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })

            var appiontId = $('#appiontment_id').val()

            if (localStorage.getItem(`working_state_${appiontId}`) == appiontId) {
                $('#startInspectionBtn').html("You have started inspection");
                $("#startInspectionBtn").prop("disabled", true);
                $('#stopInspectionBtn').css('display', 'block');
            }




            // complete inspection button
            $(document).on('click', '#stopInspectionBtn', function() {
                const appId = $('#appiontment_id').val()
                if (localStorage.getItem(`working_state_${appId}`) == appId) {
                    localStorage.removeItem(`working_state_${appId}`);
                }
            })


        });
    </script>

    <script>
        let intervalId;
        let seconds = 0;
        let minutes = 0;
        let hours = 0;

        function updateTime() {
            seconds++;
            if (seconds >= 60) {
                seconds = 0;
                minutes++;
                if (minutes >= 60) {
                    minutes = 0;
                    hours++;
                }
            }

            const formattedTime =
                (hours < 10 ? '0' + hours : hours) + ':' +
                (minutes < 10 ? '0' + minutes : minutes) + ':' +
                (seconds < 10 ? '0' + seconds : seconds);

            $('#timer').text(formattedTime);

            // Store time in local storage
            localStorage.setItem('timerHours', hours);
            localStorage.setItem('timerMinutes', minutes);
            localStorage.setItem('timerSeconds', seconds);
        }

        $(document).ready(function() {
            // Retrieve time from local storage if exists
            hours = parseInt(localStorage.getItem('timerHours')) || 0;
            minutes = parseInt(localStorage.getItem('timerMinutes')) || 0;
            seconds = parseInt(localStorage.getItem('timerSeconds')) || 0;

            const formattedTime =
                (hours < 10 ? '0' + hours : hours) + ':' +
                (minutes < 10 ? '0' + minutes : minutes) + ':' +
                (seconds < 10 ? '0' + seconds : seconds);

            $('#timer').text(formattedTime);

            // Check if timer was running before page reload
            const timerRunning = localStorage.getItem('timerRunning');

            if (timerRunning === 'true') {
                intervalId = setInterval(updateTime, 1000);
            }
        });

        $('#startInspectionBtn').on('click', function() {
            // Start the timer
            intervalId = setInterval(updateTime, 1000);

            // Set timer running state in local storage
            localStorage.setItem('timerRunning', 'true');
        });

        $('#stopInspectionBtn').on('click', function() {
            // Stop the timer and clear interval
            clearInterval(intervalId);

            // Set timer running state in local storage
            localStorage.setItem('timerRunning', 'false');

            localStorage.removeItem('timerRunning');
            localStorage.removeItem('timerSeconds');
            localStorage.removeItem('timerMinutes');
            localStorage.removeItem('timerHours');
        });
    </script>

    <!-- ========== End Location ========== -->
@endsection
