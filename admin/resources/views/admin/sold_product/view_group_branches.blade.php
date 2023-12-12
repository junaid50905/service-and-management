@extends('admin.layouts.master')

@section('title')
    Branches
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($branches) < 1)
            <h4 class="text-danger">No branch found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Branches</h4> <hr>
                    <div class="table-responsive">
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Branch Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>
                                        <a href="{{ route('sold_product.viewGroupBranchProducts', [$customer_id, $branch->id]) }}" class="btn btn-sm btn-success">View products</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Branch Name</th>
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
