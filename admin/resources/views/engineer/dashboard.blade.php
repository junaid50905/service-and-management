@extends('engineer.layouts.master')
@section('title')
    Engineer Dashboard
@endsection

@section('main-panel')
    <div class="row justify-content-center">
        {{-- Total assigned tasks --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-1">
            <a href="{{ route('engineer.total_tasks') }}" class="text-decoration-none">
                <div class="card shadow-lg mb-1 bg-body rounded">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-secondary text-sm mb-0 text-uppercase font-weight-bold">Total Assigned Tasks</p>
                                <h4 class="font-weight-bolder text-info">
                                    {{ $totalTasks }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                <i class="fa-solid fa-list-check text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        {{-- Working tasks --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-1">
            <div class="card shadow-lg mb-1 bg-body rounded">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-secondary text-sm mb-0 text-uppercase font-weight-bold">Working Tasks</p>
                                <h4 class="font-weight-bolder text-success">
                                    {{ $workingTasks }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa-solid fa-list-check text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Completed tasks --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-1">
            <div class="card shadow-lg mb-1 bg-body rounded">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-secondary text-sm mb-0 text-uppercase font-weight-bold">Completed Tasks</p>
                                <h4 class="font-weight-bolder text-success">
                                    {{ $totalCompletedTasks }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="fa-solid fa-list-check text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- recently assigned tasks --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-1">
            <a href="" class="text-decoration-none">
                <div class="card shadow-lg mb-1 bg-body rounded">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-secondary text-sm mb-0 text-uppercase font-weight-bold text-muted">Recently assigned tasks</p>
                                <h4 class="font-weight-bolder" style="color: rgb(255, 187, 0)">
                                    {{ $recentAssignedTasks }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        {{-- due tasks --}}
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-1">
            <div class="card shadow-lg mb-1 bg-body rounded">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-secondary text-sm mb-0 text-uppercase font-weight-bold">Late tasks</p>
                                <h4 class="font-weight-bolder text-danger">
                                    {{ $totalLateTasks }}
                                </h4>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i style="font-size: 20px" class="fa-regular fa-clock opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

