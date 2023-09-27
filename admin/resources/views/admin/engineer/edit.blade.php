@extends('admin.layouts.master')

@section('title')
    Edit category
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Update Engineer Information</h4><hr>
                <div class="card-body">
                    <form action="{{ route('engineer.update', $engineer->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="categoryCreate"> Name</label>
                            <input type="text" name="name" value="{{ $engineer->name }}" class="form-control text-white" id="categoryCreate">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="engineerCreate1"> Phone</label>
                            <input type="text" name="phone" value="{{ $engineer->phone }}" class="form-control text-white" id="engineerCreate1">
                        </div>
                        <div class="form-group">
                            <label for="engineerCreate2"> Address</label>
                            <input type="text" name="address" value="{{ $engineer->address }}" class="form-control text-white" id="engineerCreate2">
                        </div>
                        <button type="submit" class="btn btn-outline-primary me-2">Update</button>
                        <a href="{{ route('engineer.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
