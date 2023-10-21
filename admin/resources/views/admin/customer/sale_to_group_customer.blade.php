@extends('admin.layouts.master')

@section('title')
    Sale product to group customer
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Sale product to group customer</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('customer.saleToGroupCustomerStore') }}" method="POST" class="text-secondary">
                        @csrf

                        <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="">Branch name</label>
                                    <input type="text" id="branch_name" name="branch_name"
                                        class="form-control text-light">
                                </div>
                                <div id="branches_container"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="">Branch address</label>
                                    <input type="text" id="branch_address" name="branch_address" class="form-control text-light">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="from-group">
                                    <label for="">Admin name</label>
                                    <input type="text" id="admin_name" name="admin_name" class="form-control text-light">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="from-group">
                                    <label for="">Admin email</label>
                                    <input type="text" id="admin_email" name="admin_email" class="form-control text-light">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="from-group">
                                    <label for="">Admin phone</label>
                                    <input type="text" id="admin_phone" name="admin_phone" class="form-control text-light">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
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
                            </div>
                            <div class="col-md-4">
                                <div lass="form-group">
                                    <label for="subcategory_id">Subategory</label>
                                    <select name="subcategory_id" id="subcategory_id"
                                        class="form-select form-select-sm bg-secondary text-light mb-3">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div lass="form-group">
                                    <label for="product_id">Product</label>
                                    <select name="product_id" id="product_id"
                                        class="form-select form-select-sm bg-secondary text-light mb-3">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sellingdate"> Selling Date</label>
                                    <input type="date" name="selling_date" class="form-control text-white"
                                        id="sellingdate">
                                    @error('selling_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="servicemanagement"> SAM</label>
                                    <select name="sam" class="form-control text-white">
                                        <option selected>With Service?</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="productQuantity"> Product Quantity </label>
                                    <input type="text" name="quantity" class="form-control text-white"
                                        id="productQuantity">
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Time of warranty</label>
                                <div class="input-group my-2">
                                    <input name="time_of_warranty" type="text" class="form-control text-light"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2">months</span>
                                    @error('time_of_warranty')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('sold_product.index') }}" class="btn btn-outline-danger me-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- get category and subcategory --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // get subcategory
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

            // get product
            $(document).on('change', '#subcategory_id', function() {
                // ajax setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // get the subcategory id from the form
                var subcategory_id = $(this).val()

                $('#product_id').html('');

                $.ajax({
                    type: "GET",
                    url: "{{ url('getProduct') }}" + "/" + subcategory_id,
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


    {{-- get existing branches --}}
    <script type="text/javascript">
        $(document).ready(function() {
            var userId = $('#user_id').val()
            $(document).on('keyup', '#branch_name', function() {
                var value = $(this).val()
                $.ajax({
                    type: "GET",
                    url: "{{ url('getBranches') }}" + "/" + userId,
                    data: {
                        'name': value
                    },
                    success: function(data) {
                        $('#branches_container').html(data)
                    }
                });
            })

            $(document).on('click', 'li', function() {
                var branch_name = $(this).text()
                var branch_address = $(this).attr('aria-branch-address');
                var branch_id = $(this).attr('aria-branch-id');
                var admin_name = $(this).attr('aria-admin-name');
                var admin_email = $(this).attr('aria-admin-email');
                var admin_phone = $(this).attr('aria-admin-phone');
                $('#branch_name').val(branch_name)
                $('#branch_address').val(branch_address)
                $('#admin_name').val(admin_name)
                $('#admin_email').val(admin_email)
                $('#admin_phone').val(admin_phone)
                $('#branches_container').html('')

            })


        });
    </script>
@endsection
