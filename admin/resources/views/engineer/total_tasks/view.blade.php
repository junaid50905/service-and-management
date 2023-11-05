@php
    use App\Models\Admin\Appiontment;

@endphp

@extends('engineer.layouts.master')
@section('title')
    Task details
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow p-3 mb-5 bg-body rounded">

                <div>
                    @php
                        $appiontmentStatus = Appiontment::where('id', $appiontment_id)->first()->status;
                    @endphp
                    <span class="badge badge-sm {{ $appiontmentStatus == 'assigned' ? 'bg-gradient-primary' : '' }} {{ $appiontmentStatus == 'late' ? 'bg-gradient-danger' : '' }} {{ $appiontmentStatus == 'working' ? 'bg-gradient-info' : '' }} {{ $appiontmentStatus == 'complete' ? 'bg-gradient-success' : '' }}">{{ $appiontmentStatus }}</span>
                </div>

                <div class="card-header pb-0">
                    <h4>Task Details</h4>
                </div>

                <!-- ========== Start Section ========== -->

                <div class="row">
                    <div class="col-md-4 my-2">

                        <!-- ==========  start inspection ========== -->
                        <div id="locationForm">
                            <input type="hidden" name="appiontment_id" value="{{ $appiontment_id }}" id="appiontment_id">
                            <input type="hidden" name="latitude" id="latitudeInput">
                            <input type="hidden" name="longitude" id="longitudeInput">
                            <button type="submit" class="btn btn-primary" id="startInspectionBtn"><i class="fa-solid fa-hourglass-start"></i> Start inspection</button>
                        </div>
                        <!-- ========= start inspection ================================== -->

                        <!-- ========== stop inspection ========== -->
                        <form action="{{ route('engineer.stop_inspection', $appiontment_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" id="stopInspectionBtn"><i class="fa-solid fa-stopwatch"></i> Stop inspection</button>
                        </form>

                        <!-- ========== stop inspection ==================================== -->

                        <!-- ==========  complete the task ========== -->

                        @if ($appiontmentStatus == 'working')
                        <form action="{{ route('engineer.complete_task', $appiontment_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Complete Task</button>
                        </form>
                        @endif
                        <!-- ========= complete the task ========== -->

                        
                    </div>

                    <div class="col-md-8 my-2">
                        <button type="button" id="shareLocation" class="btn btn-primary"><i
                                class="fa-solid fa-location-dot"></i> Show Location</button>
                        <div id="map">
                            <div id="mapShowingStatus"></div>
                        </div>
                    </div>
                </div>


                <!-- ========== End Section ========== -->



                <div class="card-body pb-2">
                    <div class="row">
                        <div class="col-md-6 border-end my-4">
                            <h3 class="border-bottom text-secondary py-2">Product Details</h3>
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
                            <h3 class="border-bottom text-secondary py-2">Customer Details</h3>
                            <div>
                                @if (!$branchExists)
                                    <h5 class="text-muted">Inspection area</h5>
                                @endif
                                <h4>{{ $customer->usertype == 'group' ? 'Head-Office : ' : '' }}{{ $customer->name }}</h4>
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
                                            <p class="text-xs text-muted mb-0"><b>Admin name:</b> {{ $branch->admin_name }}
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


    <!-- ========== Start Location ========== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        window.addEventListener('load', function() {
            // console.log("Windows loading");

            //Getting dashboard  ( Checking if we are in dashboard or not)
            var dashboard = document.getElementById("page_name");
            //Start button
            var start_button = document.getElementById("start_button");
            //Stop button
            var stop_button = document.getElementById("timer_submit");
            //timer
            var hour = document.getElementById("hour");
            var mint = document.getElementById("min");
            var secd = document.getElementById("sec");

            // console.log(timer.innerHTML);

            if (dashboard != null && localStorage.getItem('start_button') == null) {
                // console.log("in Dashboard and start button not clicked");
                //Declaring variable
                var hr = 0;
                var min = 0;
                var sec = 0;

            } else if ((dashboard != null && localStorage.getItem('start_button') != null)) {
                $("#start_button").prop("disabled", true);
                $("#start_button").removeClass("btn-outline-success");
                $("#start_button").addClass("btn-light");
                start_button.innerHTML = "Running";

            }




            if (start_button) {
                start_button.addEventListener('click', function() {
                    // console.log('start button working');
                    localStorage.setItem('start_button', 'clicked');
                    $("#start_button").prop("disabled", true);
                    $("#start_button").removeClass("btn-outline-success");
                    $("#start_button").addClass("btn-light");
                    start_button.innerHTML = "Running";
                    var total_time = document.getElementById("total_time");
                    if (total_time) {
                        total_time.innerHTML = "Counting...";
                    }
                    timerCycle();

                })
            }
            if (stop_button) {
                stop_button.addEventListener('click', function() {

                    // saveData(hr, min, sec);                          To get data after stop button active this fuction
                    localStorage.clear();
                    hour.innerHTML = '00';
                    mint.innerHTML = '00';
                    secd.innerHTML = '00';
                    var total_time = document.getElementById("total_time");
                    if (total_time) {
                        total_time.innerHTML = hr + ':' + min + ':' + sec;
                    }
                    //Stopping the cycle
                    clearTimeout(cycle);
                    hr = 0;
                    min = 0;
                    sec = 0;
                    $("#start_button").prop("disabled", false);
                    $("#start_button").addClass("btn-success");
                    $("#start_button").removeClass("btn-light");
                    start_button.innerHTML = "Start";


                })
            }
            //continue timer on other pages
            if (dashboard == null && localStorage.getItem('start_button') != null) {
                sec = localStorage.getItem('sec');
                min = localStorage.getItem('min');
                hr = localStorage.getItem('hr');
                timerCycle();
                //continue timer on coming back Dashboard
            } else if (dashboard != null && localStorage.getItem('start_button') != null) {
                sec = localStorage.getItem('sec');
                min = localStorage.getItem('min');
                hr = localStorage.getItem('hr');
                timerCycle();
            }

            function timerCycle() {
                sec = parseInt(sec);
                min = parseInt(min);
                hr = parseInt(hr);

                sec = sec + 1;

                if (sec == 60) {
                    min = min + 1;
                    sec = 0;
                }
                if (min == 60) {
                    hr = hr + 1;
                    min = 0;
                    sec = 0;
                }

                if (sec < 10 || sec == 0) {
                    sec = '0' + sec;
                }
                if (min < 10 || min == 0) {
                    min = '0' + min;
                }
                if (hr < 10 || hr == 0) {
                    hr = '0' + hr;
                }

                localStorage.setItem('hr', hr);
                localStorage.setItem('min', min);
                localStorage.setItem('sec', sec);
                // console.log(timer);
                // console.log(timer.innerHTML);

                hour.innerHTML = hr;
                mint.innerHTML = min;
                secd.innerHTML = sec;

                // if (dashboard == null && localStorage.getItem('start_button') != null) {
                //     var side_timer = document.getElementById('time_title');
                //     if (side_timer) {
                //         handling other counter changeing URL        [Put Where you want to show your counter after URL change]
                //         hour.innerHTML = hr;
                //         min.innerHTML = min;
                //         sec.innerHTML = sec;
                //     }

                // } else {

                // }


                cycle = setTimeout(timerCycle, 1000);
            }

            //AJax funtion to save the data


            // function saveData(hr, min, sec) {

            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         type: 'POST',
            //         url: '/timer',
            //         data: {

            //             'hr': hr,
            //             'min': min,
            //             'sec': sec,

            //         },
            //         success: function (data) {
            //             document.getElementById("time_msg").innerHTML = data.msg;
            //             $("#time_msg").slideDown(1000);
            //             $("#time_msg").delay(3000).slideUp(1000);
            //         },
            //         error: function (data, textStatus, errorThrown) {
            //             console.log("Error:");
            //             console.log(data);

            //         },
            //     });

            // }

        })
    </script>

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
                        if(lat && lng){
                            $('#startInspectionBtn').css('display', 'block')
                        }else{
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
                        $('#startInspectionBtn').html("You have started inspection");
                        $("#startInspectionBtn").prop("disabled", true);
                        $('#stopInspectionBtn').css('display', 'block')
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

                // total timer
                // $(document).on('click', '.stopTimerBtn', function() {

                //     var getWorkingTimeFromDiv = $('#total_time').text();
                //     $('#workingTime').val(getWorkingTimeFromDiv)
                //     var working_time = $('#workingTime').val()
                //     var appiontment_id = $('#appiont_id').val()


                //     $(document).on('click', '#inspectionComplete', function() {
                //         console.log({
                //             working_time,
                //             appiontment_id
                //         });
                //         $.ajaxSetup({
                //             headers: {
                //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                //                     'content')
                //             }
                //         });

                //         $.ajax({
                //             type: "POST",
                //             url: "{{ url('engineer/total-tasks/stop-inspection') }}"+ "/"+ appiontment_id,
                //             dataType: "json",
                //             data: {
                //                 working_time: working_time,
                //             },
                //             success: function(data) {
                //                 console.log('stop inspection');
                //             },
                //             error: function(error) {
                //                 console.log(error);
                //             }
                //         });
                //     })

                // })


            })
        });
    </script>



    <!-- ========== End Location ========== -->
@endsection
