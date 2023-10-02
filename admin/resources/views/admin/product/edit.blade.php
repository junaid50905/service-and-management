@extends('admin.layouts.master')

@section('title')
    Edit product
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-4">Update product</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="productName">Product name</label>
                            <input type="text" value="{{ $product->name }}" name="name" class="form-control text-white" id="productName">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productModel">Product model</label>
                            <input type="text" value="{{ $product->model }}" name="model" class="form-control text-white" id="productModel">
                            @error('model')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productPrice">Product price</label>
                            <input type="text" value="{{ $product->price }}" name="price" class="form-control text-white" id="productPrice">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productWarranty">Time of warranty</label>
                            <input type="text" value="{{ $product->time_of_warranty }}" name="time_of_warranty" class="form-control text-white"
                                id="productWarranty">
                            @error('time_of_warranty')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div lass="form-group">
                            <label for="category">Select category</label>
                            <select name="category_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($categories as $category)
                                <option value={{ $category->id }} {{ $category->id == $product->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div lass="form-group">
                            <label for="subcategory">Select subcategory</label>
                            <select name="subcategory_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($subcategories as $subcategory)
                                <option value={{ $subcategory->id }} {{ $subcategory->id == $product->subcategory_id ? 'selected' : ''}}>{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('product.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
