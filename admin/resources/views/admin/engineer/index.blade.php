@extends('admin.layouts.master')

@section('title')
    Categories
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($engineers) < 1)
            <h4 class="text-danger">No Engineer found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Engineer's List</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Password</th>
                                    <th> Phone</th>
                                    <th> Address</th>
                                    <th> Category</th>
                                    <th> Subcategory</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($engineers as $engineer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $engineer->name }}</td>
                                        <td>{{ $engineer->email }}</td>
                                        <td>{{ $engineer->password }}</td>
                                        <td>{{ $engineer->phone }}</td>
                                        <td>{{ $engineer->address }}</td>
                                        <td>{{ DB::table('categories')->where('id', $engineer->category_id)->first()->name }}</td>
                                        <td>{{ DB::table('subcategories')->where('id', $engineer->subcategory_id)->first()->name }}</td>
                                        <td>
                                            <a href="{{ route('engineer.edit', $engineer->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <a href="{{ route('engineer.delete', $engineer->id) }}" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
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
