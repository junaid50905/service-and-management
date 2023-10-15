@extends('admin.layouts.master')

@section('title')
    Add appliance
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-4">Add new appliance</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('appliance.store') }}" method="POST">
                        @csrf

                        <div lass="form-group">
                            <label>Select category</label>
                            <select name="category_id" id="category"
                                class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div lass="form-group">
                            <label>Select subcategory</label>
                            <select name="subcategory_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Appliance Name</label>
                            <input type="text" name="name" class="form-control text-white">
                        </div>

                        <div class="form-group">
                            <label>Purchase Price</label>
                            <input type="text" name="purchase_price" class="form-control text-white">
                        </div>

                        <div class="form-group">
                            <label>Market Price</label>
                            <input type="text" name="market_price" class="form-control text-white">
                        </div>





                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection
