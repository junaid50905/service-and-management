@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('main-panel')
    <div class="row">
        {{-- total products --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('product.index') }}" class="text-decoration-none text-white">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $totalProducts }}</h3>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Products</h6>
                </div>
                </a>
            </div>
        </div>
        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('sold_product.index') }}" class="text-decoration-none text-white">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $totalSalesProducts }}</h3>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Sales Products</h6>
                </div>
                </a>
            </div>
        </div>
    </div>
@endsection
