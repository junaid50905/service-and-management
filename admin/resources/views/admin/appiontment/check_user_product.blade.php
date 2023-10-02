@extends('admin.layouts.master')

@section('title')
Make a appiontment
@endsection

@section('main-panel')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('appiontment.check_user_product_store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" name="user_id" class="form-control text-white">
                    </div>

                    <div class="form-group">
                        <label>Product Id</label>
                        <input type="text" name="product_id" class="form-control text-white">
                    </div>

                    <button type="submit" class="btn btn-success">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
