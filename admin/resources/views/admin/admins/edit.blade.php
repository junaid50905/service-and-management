@extends('admin.layouts.master')

@section('title')
    Update admin
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-4">Update admin info</h4>
                <hr>
                <div class="card-body">
                    <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select type</label>
                                <select class="form-select" name="type">
                                    <option value="admin" {{ $admin->type == 'admin' ?? 'selected' }}>Admin</option>
                                    <option value="superadmin" {{ $admin->type == 'superadmin' ?? 'selected' }}>Superadmin</option>
                                </select>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control text-white" value="{{ $admin->name }}">
                            </div>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control text-white" value="{{ $admin->email }}">
                            </div>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control text-white" value="{{ $admin->password }}">
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        <a href="{{ route('admin.index') }}" class="btn btn-outline-danger me-2">Cancel</a>

                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
