@extends('admin.layouts.master')

@section('title')
    Create Selling Product
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3"> New Selling Product</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('selling_product.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="userID"> User ID</label>
                            <input type="text" name="user_id" class="form-control text-white" id="userID">
                            @error('user_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productID"> Select Product</label>
                            <select name="product_id" class="form-control text-white">
                                <option selected>Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sellingdate"> Selling Date</label>
                            <input type="date" name="selling_date" class="form-control text-white" id="sellingdate">
                            @error('selling_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="servicemanagement"> SAM</label>
                            <select name="sam" class="form-control text-white">
                                <option selected>With Service?</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="productQuantity"> Product Quantity </label>
                            <input type="number" name="quantity" class="form-control text-white" id="productQuantity">
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
