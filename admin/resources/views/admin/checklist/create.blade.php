@extends('admin.layouts.master')

@section('title')
    Create checklist
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Create a checklist</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('checklist.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="appiontmentId">Appiontment id</label>
                            <input type="text" name="appiontment_id" class="form-control text-white" id="appiontmentId">
                            @error('appiontment_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Parts</label>
                            <input type="text" name="parts[]" class="form-control text-white" multiple>
                            @error('parts')
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
