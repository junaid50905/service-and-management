@php
    use Illuminate\Support\Facades\Hash;
@endphp

@extends('admin.layouts.master')

@section('title')
    Customer Details
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                        alt="" height="80" width="80" class="rounded-circle mb-3">
                    <div>
                        <h4><b>{{ $customer->name }} ({{ $customer->usertype }})</b></h4>
                        <p>----------------- Headoffice Info ------------------</p>
                        <p><i class="fa-solid fa-envelope"></i> {{ $customer->email }}</p>
                        <p><i class="fa-solid fa-location-dot"></i> {{ $customer->address }}</p>
                        <p><i class="fa-solid fa-phone"></i> {{ $customer->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
        @if ($customer->usertype === 'group')
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><b>SN</b></th>
                                    <th scope="col"><b>Branch Name</b></th>
                                    <th scope="col"><b>Branch Address</b></th>
                                    <th scope="col"><b>Admin Name</b></th>
                                    <th scope="col"><b>Email</b></th>
                                    <th scope="col"><b>Phone</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $branches = DB::table('branches')->where('user_id', $customer->id)->get();
                                @endphp
                                @foreach ($branches as $branch)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>{{ $branch->branch_address }}</td>
                                    <td>{{ $branch->admin_name }}</td>
                                    <td>{{ $branch->admin_email }}</td>
                                    <td>{{ $branch->admin_phone }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
