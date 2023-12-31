@extends('admin.layouts.master')

@section('title')
    Edit checklist
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Update checklist</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('checklist.update', $checklist->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="userId">User id</label>
                            <input type="text" value="{{ $checklist->user_id }}" name="user_id" class="form-control text-white" id="userId">
                            @error('user_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="complainInput">Complain</label>
                            <input type="text" value="{{ $checklist->complain }}" name="complain" class="form-control text-white" id="complainInput">
                            @error('complain')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        {{-- <a href="{{ route('subcategory.index') }}" class="btn btn-outline-danger me-2">Cancel</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
