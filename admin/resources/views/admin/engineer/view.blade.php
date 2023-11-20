@extends('admin.layouts.master')

@section('title')
    Engineer Details
@endsection

@section('main-panel')
    <section class="vh-100" style="background-color: #9de2ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-light">
                                <div class="flex-shrink-0">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                        alt="Generic placeholder image" class="img-fluid"
                                        style="width: 140px; border-radius: 10px;">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">{{ $engineer->name }}</h5>
                                    <p class="text-muted my-0"><i class="fa-solid fa-envelope"></i> {{ $engineer->email }}</p>
                                    <p class="text-muted"><i class="fa-solid fa-key"></i> {{ $engineer->password }}</p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                        style="background-color: #efefef;">
                                        @php
                                            $totalAssigned = DB::table('appiontments')->where('engineer_id', $engineer->id)->get()->count();
                                            $working = DB::table('appiontments')->where('engineer_id', $engineer->id)->where('status', 'working')->get()->count();
                                            $late = DB::table('appiontments')->where('engineer_id', $engineer->id)->where('status', 'late')->get()->count();
                                            $complete = DB::table('appiontments')->where('engineer_id', $engineer->id)->where('status', 'complete')->get()->count();
                                        @endphp
                                        <div>
                                            <p class="small text-primary mb-1 me-2">Assigned</p>
                                            <p class="mb-0 text-dark text-center">{{ $totalAssigned }}</p>
                                        </div>
                                        <div>
                                            <p class="small text-info mb-1">Working</p>
                                            <p class="mb-0 text-dark text-center">{{ $working }}</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="small text-danger mb-1">Late</p>
                                            <p class="mb-0 text-dark text-center">{{ $late }}</p>
                                        </div>
                                        <div>
                                            <p class="small text-success mb-1">Completed</p>
                                            <p class="mb-0 text-dark text-center">{{ $complete }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
