@extends('admin.layouts.master')

@section('title')
    Edit subcategory
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Update subcategory information</h4><hr>
                <div class="card-body">
                    <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="subcategoryName">Subcategory Name</label>
                            <input type="text" name="name" value="{{ $subcategory->name }}" class="form-control text-white" id="subcategoryName">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div lass="form-group">
                            <label>Select category</label>
                            <select name="category_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }} {{ $category->id == $subcategory->category_id ? 'selected' : '' }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
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
