@php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Cache;
@endphp

@extends('admin.layouts.master')

@section('title')
    Assign engineer
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <h4 class="card-title mt-2 ms-4">Assign engineer</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('appiontment.assign_engineer_store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $appiontmentId }}" name="appiontment_id" id="appiontment_id">
                        @error('appiontment_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row">

                            <div class="col-md-12">
                                <div lass="form-group">
                                    <label>Select engineer</label>
                                    <select name="engineer_id" id="engineer_id"
                                        class="form-select form-select-sm bg-secondary text-light mb-3" required>
                                        @if ($engineers->count() > 0)
                                            <option selected>Select engineer</option>
                                            @foreach ($engineers as $engineer)
                                                <option value="{{ $engineer->id }}" {{ DB::table('appiontments')->where('id', $appiontmentId)->first()->blockedEngineerId == $engineer->id ? 'disabled' : ''}}>{{ $engineer->name }}</option>
                                            @endforeach
                                        @else{
                                            <option>No engineer found for this product</option>
                                            }
                                        @endif
                                    </select>
                                    @if ($engineers->count() < 1)
                                        <a href="{{ route('engineer.create') }}" class="btn btn-sm btn-info mb-2">+ Add
                                            Engineer</a>
                                    @endif

                                </div>
                                @error('engineer_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" required class="form-control text-light"
                                        min="{{ date('Y-m-d') }}" max="{{ Carbon::now()->addDays(15)->format('Y-m-d') }}"
                                        required>
                                </div>
                                @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="time" name="time" required class="form-control text-light" required>
                                </div>
                                @error('time')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <button type="submit" class="btn btn-behance w-100">save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card p-3">
                <div id="calendar"></div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var allAppiontments = @json($events);
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'month'
                },
                events: allAppiontments,
            })
        });
    </script>



    <script>

        $(document).ready(function() {
            $(document).on('change', '#engineer_id', function() {
                var engineerId = $(this).val();
                var appointmentId = $('#appiontment_id').val();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('update.reserve.status') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'engineer_id': engineerId,
                        'appointment_id': appointmentId
                    },
                    success: function(response) {
                        // Handle success, if needed
                        //var blockedEngineer = response.data.engineer

                        // console.log(response.data.engineer);


                    },
                    error: function(xhr, status, error) {
                        // Handle error, if any
                        console.error(xhr.responseText);
                    }
                });
            });
        });

    </script>


@endsection
