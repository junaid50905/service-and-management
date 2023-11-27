@php
    use Carbon\Carbon;
@endphp

@extends('admin.layouts.master')

@section('title')
    Assign engineer
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <h4 class="card-title mt-3 ms-4">Assign engineer</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('appiontment.assign_engineer_store') }}" method="POST">
                        @csrf

                        <input type="hidden" value="{{ $appiontmentId }}" name="appiontment_id">
                        <div lass="form-group">
                            <select name="engineer_id" id="engineer_id"
                                class="form-select form-select-sm bg-secondary text-light mb-3">
                                @if ($engineers->count() > 0)
                                    <option selected>Select engineer</option>
                                    @foreach ($engineers as $engineer)
                                        <option value="{{ $engineer->id }}">{{ $engineer->name }}</option>
                                    @endforeach
                                @else{
                                    <option>No engineer found for this product</option>
                                    }
                                @endif
                            </select>
                            @if ($engineers->count() < 1)
                                <a href="{{ route('engineer.create') }}" class="btn btn-sm btn-info mb-2">+ Add Engineer</a>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" required class="form-control text-light"
                                min="{{ date('Y-m-d') }}" max="{{ Carbon::now()->addDays(15)->format('Y-m-d') }}">
                        </div>

                        <div class="form-group">
                            <label>Time</label>
                            <input type="time" name="time" required class="form-control text-light">
                        </div>

                        <button type="submit" class="btn btn-behance">save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            {{-- <div class="card p-2">
                <h4 class="mt-2">Engineer blocked time slots</h4>
                <div id="engineerBlockSlot" class="row ms-3 justify-content-center"></div>
            </div> <br> --}}
            <div class="card p-2">
                <h4 class="mt-2">Engineer blocked time slots</h4>
                <div class="row ms-3 justify-content-center" id="engineerBlockSlot">
                    @foreach ($app as $item)
                        @foreach ($engineers as $engineer)
                            @if ($engineer->id == $item->engineer_id)
                                <div class="col-md-3">
                                    <div class="item border p-2 my-2">
                                        <p>{{ DB::table('engineers')->where('id', $item->engineer_id)->first()->name }}</p>
                                        <p class="text{{ $item->status == 'late' ? '-danger' : ($item->status == 'working' ? '-info' : '-primary') }}">{{ $item->status }}</p>
                                        <p>{{ $item->inspection_date }}</p>
                                        <p>{{ $item->inspection_time }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div> <br>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#engineer_id', function() {
                // ajax setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var engineerId = $(this).val()

                $.ajax({
                    type: "GET",
                    url: "{{ url('getEngineerBlockSlot') }}" + "/" + engineerId,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#engineerBlockSlot').html(data)
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>



@endsection
