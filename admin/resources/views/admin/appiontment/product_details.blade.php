@extends('admin.layouts.master')

@section('title')
Make a appiontment
@endsection

@section('main-panel')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>product Name</th>
                        <th>selling date</th>
                        <th>Warranty end date</th>
                        <th>S&M</th>
                        <th>Warranty left</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>{{ $productName }}</td>
                        <td>{{ $selling_date }}</td>
                        <td>{{ $warranty_end_date }}</td>
                        <td>{{ $sam }}</td>
                        <td>{{ $diffInDays }} days</td>
                        <td>
                            <form action="{{ route('appiontment.appiontment_store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="selling_product_id" value="{{ $sellingProduct->id }}">

                                <button type="submit" class="btn btn-success">appiontment taken</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
