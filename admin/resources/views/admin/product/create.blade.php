@extends('admin.layouts.master')

@section('title')
    Add product
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-4">Add new product</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="productName">Product name</label>
                            <input type="text" name="name" class="form-control text-white" id="productName">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productModel">Product model</label>
                            <input type="text" name="model" class="form-control text-white" id="productModel">
                            @error('model')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productPrice">Product price</label>
                            <input type="text" name="price" class="form-control text-white" id="productPrice">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div lass="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id"
                                class="form-select form-select-sm bg-secondary text-light mb-3">
                                <option selected>Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div lass="form-group">
                            <label for="subcategory_id">Subategory</label>
                            <select name="subcategory_id" id="subcategory_id"
                                class="form-select form-select-sm bg-secondary text-light mb-3">
                            </select>
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('product.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
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
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // get the subcategory id from the form
                var category_id = $(this).val()

                $('#subcategory_id').html('');

                $.ajax({
                    type: "GET",
                    url: "{{ url('getSubcategory') }}"+ "/"+ category_id,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('#subcategory_id').html(data);
                    },
                    error: function(error)
                    {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
