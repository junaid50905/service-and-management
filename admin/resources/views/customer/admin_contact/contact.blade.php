@extends('customer.layouts.master')
@section('title')
    Admin contact
@endsection

@section('main-panel')
    <h4 class="text-white">Admin Contact Information</h4>

    <div class="row pb-5 justify-content-center">
        <div class="col-xl-6 col-sm-6 mb-xl-0 my-2">
            <div class="card shadow bg-body rounded p-2">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder">
                                    +88-01913397419 <br> +88-01777758392
                                </h6>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa-solid fa-phone text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 mb-xl-0 my-2">
            <div class="card shadow bg-body rounded p-2">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder">
                                    <i class="fa-solid fa-arrow-right"></i> sales.solutions@aamra.com.bd <br> <i class="fa-solid fa-arrow-right"></i> info@aamrasolutions.com
                                </h6>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa-solid fa-envelope text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 mb-xl-0 my-2">
            <div class="card shadow bg-body rounded p-2">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <h6 class="font-weight-bolder">
                                    16th Floor, Safura Tower, 20 Kemal Ataturk Ave, Dhaka 1213
                                </h6>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa-solid fa-location-dot text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
