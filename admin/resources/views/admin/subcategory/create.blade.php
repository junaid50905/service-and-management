@extends('admin.layouts.master')

@section('title')
    Create subcategory
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Create new subcategory</h4><hr>
                <div class="card-body">
                    <form action="{{ route('subcategory.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="subcategoryCreate">Subcategory Name</label>
                            <input type="text" name="name" class="form-control text-white" id="subcategoryCreate">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div lass="form-group">
                            <select name="category_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                <option value="" selected>Select category</option>
                                @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('subcategory.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
