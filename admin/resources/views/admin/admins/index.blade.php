@extends('admin.layouts.master')

@section('title')
    Admins
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <a href="{{ route('admin.create') }}" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i>
                            Add new admin</a>
            @if (count($admins) < 1)
            <h4 class="text-danger">No admin found</h4>
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin's List</h4> <hr>
                    <div class="table-responsive">
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->type }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning btn-sm me-2 p-2"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="{{ route('admin.delete', $admin->id) }}" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm p-2"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Type</th>
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
