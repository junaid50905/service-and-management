@php
    use App\Models\Admin\Appiontment;

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
            <div class="card">
                <div class="card-body pt-4 p-3">
                    <div>
                        @php
                            $appiontmentStatus = Appiontment::where('id', $appiontment_id)->first()->status;
                        @endphp
                        <a href="{{ route('engineer.total_tasks') }}" class="me-3"><i class="fa-solid fa-angle-left"></i> Back</a>
                        <span class="badge badge-sm {{ $appiontmentStatus == 'assigned' ? 'bg-gradient-primary' : '' }} {{ $appiontmentStatus == 'late' ? 'bg-gradient-danger' : '' }} {{ $appiontmentStatus == 'working' ? 'bg-gradient-info' : '' }} {{ $appiontmentStatus == 'complete' ? 'bg-gradient-success' : '' }}">{{ $appiontmentStatus }}</span>
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
                                        class="fa-solid fa-stopwatch"></i> Stop inspection</button>
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



    <!-- ========== End Location ========== -->
@endsection
