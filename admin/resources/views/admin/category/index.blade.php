@extends('admin.layouts.master')

@section('title')
    Categories
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-6 grid-margin">
            <a href="{{ route('category.create') }}" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Add new
                category</a>
            @if (count($categories) < 1)
                <h4 class="text-danger">No category found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-warning me-2"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('category.delete', $category->id) }}"
                                                    onclick="return confirm('are you sure?')" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash"></i></a>
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
