@php
    use App\Models\Admin\SoldProduct;
@endphp

@extends('admin.layouts.master')

@section('title')
    Sold product to group customer
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($group_users) < 1)
                <h4 class="text-danger">Not found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sold products of Group customer</h4>
                        <hr>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Customer id</th>
                                        <th>Customer name</th>
                                        <th>Buying product item</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group_users as $group_user)
                                        @if (SoldProduct::where('user_id', $group_user->id)->exists())
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $group_user->id }}</td>
                                                <td>{{ $group_user->name }}</td>
                                                <td>{{ DB::table('sold_products')->where('user_id', $group_user->id)->count() }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('sold_product.viewGroupProduct', $group_user->id) }}"
                                                        class="btn btn-sm btn-info">Buying history</a>
                                                    <a href="{{ route('sold_product.viewBranchGroup', $group_user->id) }}"
                                                        class="btn btn-sm btn-primary">View branches</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SN</th>
                                        <th>Customer id</th>
                                        <th>Customer name</th>
                                        <th>Buying product item</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>






@endsection
