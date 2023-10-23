@extends('admin.layouts.master')


@section('title')
    Assign engineer
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Assign engineer</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('appiontment.assign_engineer_store') }}" method="POST">
                        @csrf

                        <input type="hidden" value="{{ $appiontmentId }}" name="appiontment_id">



                        <div lass="form-group">
                            <label>Select engineer</label>
                            <select name="engineer_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                @if ($engineers->count() > 0)
                                    @foreach ($engineers as $engineer)
                                        <option value={{ $engineer->id }}>{{ $engineer->name }}</option>
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
                            <input type="date" name="date" required class="form-control text-light" min="{{ date('Y-m-d') }}">
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
    </div>


@endsection
