@extends('admin.layouts.master')

@section('title')
Make a appiontment
@endsection

@section('main-panel')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('appiontment.appiontment_store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="sold_product_id" value="{{ $sold_product_id }}">

                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" value="{{ DB::table('users')->where('id', $user_id)->first()->name }}" class="form-control text-black" disabled>
                    </div>

                    <div class="form-group">
                        <label>Branch Name</label>
                        <input type="text" value="{{ DB::table('branches')->where('id', $branch_id)->first()->branch_name }}" class="form-control text-black" disabled>
                    </div>

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" value="{{ DB::table('products')->where('id', $product_id)->first()->name }}" class="form-control text-black" disabled>
                    </div>


                    <button type="submit" class="btn btn-success">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
