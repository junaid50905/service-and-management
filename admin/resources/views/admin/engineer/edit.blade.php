@extends('admin.layouts.master')

@section('title')
    Edit engineer info
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Update engineer information</h4><hr>
                <div class="card-body">
                    <form action="{{ route('engineer.update', $engineer->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="engineerName">Name</label>
                            <input type="text" value="{{ $engineer->name }}" name="name" class="form-control text-white" id="engineerName">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="engineerPhone">Phone</label>
                            <input type="text" value="{{ $engineer->phone }}" name="phone" class="form-control text-white" id="engineerPhone">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="engineerAddress">Address</label>
                            <input type="text" value="{{ $engineer->address }}" name="address" class="form-control text-white" id="engineerAddress">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div lass="form-group">
                            <label for="category">Select category</label>
                            <select name="category_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($categories as $category)
                                <option value={{ $category->id }} {{ $category->id == $engineer->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div lass="form-group">
                            <label for="subcategory">Select subcategory</label>
                            <select name="subcategory_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($subcategories as $subcategory)
                                <option value={{ $subcategory->id }} {{ $subcategory->id == $engineer->subcategory_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('engineer.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
