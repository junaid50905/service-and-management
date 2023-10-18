@extends('admin.layouts.master')

@section('title')
    Edit appliance
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-4">Update appliance information</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('appliance.update', $appliance->id) }}" method="POST">
                        @csrf

                        <div lass="form-group">
                            <label>Category</label>
                            <select name="category_id" id="category"
                                class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }} {{ $category->id == $appliance->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div lass="form-group">
                            <label>Subcategory</label>
                            <select name="subcategory_id" class="form-select form-select-sm bg-secondary text-light mb-3">
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $appliance->subcategory_id ? 'selected' : ''}}>{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Appliance Name</label>
                            <input type="text" value="{{ $appliance->name }}" name="name" class="form-control text-white">
                        </div>

                        <div class="form-group">
                            <label>Purchase Price</label>
                            <input type="text" value="{{ $appliance->purchase_price }}" name="purchase_price" class="form-control text-white">
                        </div>

                        <div class="form-group">
                            <label>Market Price</label>
                            <input type="text" value="{{ $appliance->market_price }}" name="market_price" class="form-control text-white">
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('appliance.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
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
