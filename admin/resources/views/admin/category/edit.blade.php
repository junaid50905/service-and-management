@extends('admin.layouts.master')

@section('title')
    Edit category
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Update category information</h4><hr>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="categoryCreate">Category Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control text-white" id="categoryCreate">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-primary me-2">Update</button>
                        <a href="{{ route('category.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
