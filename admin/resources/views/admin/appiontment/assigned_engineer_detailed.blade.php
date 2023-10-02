@extends('admin.layouts.master')

@section('title')
Assigned engineer detailed
@endsection

@section('main-panel')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-title m-3">Assigned engineer detailed</h4><hr>
            <div class="card-body">
                <p><b>Name : </b>{{ $engineerDetails->name }}</p>
                <p><b>Phone : </b>{{ $engineerDetails->phone }}</p>
                <p><b>Address : </b>{{ $engineerDetails->address }}</p>
                <p><b>Category : </b>{{ DB::table('categories')->where('id', $engineerDetails->category_id)->first()->name }}</p>
                <p><b>Subcategory : </b>{{ DB::table('subcategories')->where('id', $engineerDetails->subcategory_id)->first()->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
