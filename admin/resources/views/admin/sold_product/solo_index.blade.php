@php
    use App\Models\Admin\SoldProduct;
@endphp

@extends('admin.layouts.master')

@section('title')
    Selling products
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($solo_users) < 1)
                <h4 class="text-danger">Not found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sold products of solo customer</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table">
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
                                    @foreach ($solo_users as $solo_user)
                                        @if (SoldProduct::where('user_id', $solo_user->id)->exists())
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $solo_user->id }}</td>
                                                <td>{{ $solo_user->name }}</td>
                                                <td>{{ DB::table('sold_products')->where('user_id', $solo_user->id)->count() }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('sold_product.viewSoloProduct', $solo_user->id) }}"
                                                        class="btn btn-sm btn-success">View products</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>






@endsection
