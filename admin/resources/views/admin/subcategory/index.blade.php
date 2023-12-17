@extends('admin.layouts.master')

@section('title')
    Categories
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <a href="{{ route('subcategory.create') }}" class="mb-3 btn btn-success"><i class="fa-solid fa-plus"></i>
                            Add new subcategory</a>
            @if (count($subcategories) < 1)
                <h4 class="text-danger">No subcategories found</h4>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Subcategories</h4>
                        <div class="table-responsive">
                            <table id="example" class="table" style="width:100%">
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
                                            <td>{{ DB::table('categories')->where('id', $subcategory->category_id)->first()->name }}
                                            </td>
                                            <td>{{ $subcategory->name }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                    class="p-2 btn btn-warning me-2"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('subcategory.delete', $subcategory->id) }}"
                                                    onclick="return confirm('are you sure?')" class="p-2 btn btn-danger"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
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
