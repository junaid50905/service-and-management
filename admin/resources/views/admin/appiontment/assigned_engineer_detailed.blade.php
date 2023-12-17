@extends('admin.layouts.master')

@section('title')
Assigned engineer detailed
@endsection

@section('main-panel')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h4 class="m-3 mb-0 text-center card-title">Assigned engineer detailed</h4>
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <p><b>Name : </b>{{ $engineerDetails->name }}</p>
                        <p><b>Email : </b>{{ $engineerDetails->email }}</p>
                        <p><b>Password : </b>{{ $engineerDetails->password }}</p>
                        <p><b>Phone : </b>{{ $engineerDetails->phone }}</p>
                        <p><b>Address : </b>{{ $engineerDetails->address }}</p>
                    </div>
                </div><br>
                <div class="card">
                    <div class="card-body">
                        <p><b>Category :
                            </b>{{ DB::table('categories')->where('id', $engineerDetails->category_id)->first()->name }}</p>
                        <p><b>Subcategory :
                            </b>{{ DB::table('subcategories')->where('id', $engineerDetails->subcategory_id)->first()->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection