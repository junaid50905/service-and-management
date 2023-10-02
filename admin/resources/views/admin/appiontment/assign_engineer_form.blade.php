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
                                @foreach ($engineers as $engineer)
                                    <option value={{ $engineer->id }}>{{ $engineer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-behance">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
