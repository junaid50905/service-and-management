@extends('admin.layouts.master')

@section('title')
    Add appliance
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-title mt-3 ms-4">Add new appliance</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('appliance.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="col-md-4">
                                <div lass="form-group">
                                    <label>Category</label>
                                    <select name="category_id" id="category_id"
                                        class="form-select form-select-sm bg-secondary text-light mb-3">
                                        <option selected>Select category</option>
                                        @foreach ($categories as $category)
                                            <option value={{ $category->id }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div lass="form-group">
                                    <label>Select subcategory</label>
                                    <select name="subcategory_id" id="subcategory_id"
                                        class="form-select form-select-sm bg-secondary text-light mb-3">

                                    </select>
                                    @error('subcategory_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div lass="form-group">
                                    <label>Select product</label>
                                    <select name="product_id" id="product_id"
                                        class="form-select form-select-sm bg-secondary text-light mb-3">

                                    </select>
                                    @error('product_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Appliance Name</label>
                                    <input type="text" name="name" class="form-control text-white">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Purchase Price</label>
                                    <input type="text" name="purchase_price" class="form-control text-white">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Market Price</label>
                                    <input type="text" name="market_price" class="form-control text-white">
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('change', '#category_id', function() {
                // ajax setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // get the subcategory id from the form
                var category_id = $(this).val()

                $('#subcategory_id').html('');

                $.ajax({
                    type: "GET",
                    url: "{{ url('getSubcategory') }}" + "/" + category_id,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#subcategory_id').html(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $(document).on('change', '#subcategory_id', function() {
                // ajax setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // get the subcategory id from the form
                var category_id = $('#category_id').val()
                var subcategory_id = $(this).val()

                $('#product_id').html('');

                $.ajax({
                    type: "GET",
                    url: "getProduct"+"/"+category_id+"/"+subcategory_id,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#product_id').html(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
