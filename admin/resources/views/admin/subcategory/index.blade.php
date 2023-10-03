@extends('admin.layouts.master')

@section('title')
    Categories
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (count($subcategories) < 1)
            <h4 class="text-danger">No subcategories found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Subcategories</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subcategory->category_id }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>
                                            <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-warning me-2">Edit</a>
                                            <a href="{{ route('subcategory.delete', $subcategory->id) }}" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
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