@extends('admin.layouts.master')

@section('title')
    Assigned engineer detailed
@endsection

@section('main-panel')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('appiontment.estimated_time_store', $appiontment_id) }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Estimated time" name="estimated_time" class="form-control text-light mb-2" value="{{ DB::table('appiontments')->where('id', $appiontment_id)->first()->estimated_time }}">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
