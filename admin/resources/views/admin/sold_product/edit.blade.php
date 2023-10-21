@extends('admin.layouts.master')

@section('title')
    Edit Customer info
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Update customer information</h4><hr>
                <div class="card-body">
                    <form action="{{ route('selling_product.update', $selling_product->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="userID"> User ID</label>
                            <input type="text" name="user_id" value="{{ $selling_product->user_id }}" class="form-control text-white" id="userID">
                            @error('user_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

            
                        <div class="form-group">
                            <label for="productID"> Select Product</label>
                            <select name="product_id" class="form-control text-white">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id === $selling_product->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sellingdate"> Selling Date</label>
                            <input type="date" name="selling_date" value="{{ $selling_product->selling_date }}" class="form-control text-white" id="sellingdate" min="{{ now()->toDateString() }}">
                            @error('selling_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="servicemanagement"> SAM</label>
                            <select name="sam" class="form-control text-white">
                                <option value="1" {{ $selling_product->sam ===1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $selling_product->sam ===0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="productQuantity"> Product Quantity </label>
                            <input type="number" name="quantity" value="{{ $selling_product->quantity }}" class="form-control text-white" id="productQuantity">
                            @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('selling_product.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
