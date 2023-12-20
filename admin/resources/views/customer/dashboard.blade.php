@php
    use Illuminate\Support\Str;
@endphp
@extends('customer.layouts.master')
@section('title')
    customer Dashboard
@endsection

@section('main-panel')
    <div class="row pb-5">
        @if (count($servicingProducts) < 1)
            <p>No product in servicing</p>
        @else
            @foreach ($servicingProducts as $index => $servicingProduct)
                @php
                    $soldProduct = DB::table('sold_products')
                        ->where('id', $servicingProduct->sold_product_id)
                        ->first();
                    $productId = $soldProduct->product_id;
                    $productName = DB::table('products')
                        ->where('id', $productId)
                        ->first()->name;
                @endphp
                <div class="col-xl-4 col-sm-6 mb-xl-0 my-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{ $index }}">
                    <div class="card shadow bg-body rounded">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="numbers">
                                        <span class="text-xxs mb-0 text-uppercase font-weight-bold badge badge-sm {{ $servicingProduct->status == 'pending' ? 'bg-gradient-secondary' : '' }} {{ $servicingProduct->status == 'assigned' ? 'bg-gradient-primary' : '' }} {{ $servicingProduct->status == 'late' ? 'bg-gradient-danger' : '' }} {{ $servicingProduct->status == 'working' ? 'bg-gradient-info' : '' }} {{ $servicingProduct->status == 'complete' ? 'bg-gradient-success' : '' }}">
                                            {{ $servicingProduct->status }}</span> <span class="text-xs text-secondary">{{ $servicingProduct->updated_at }}</span>
                                        <h6 class="font-weight-bolder text-muted">
                                            {{ Str::limit($productName, 30, '...') }}

                                        </h6>
                                        <span class="text-xs text-secondary">Appiontment Taken :
                                            {{ $servicingProduct->appiontment_taken_date }},
                                            {{ $servicingProduct->appiontment_taken_time }}</span> <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $index }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel{{ $index }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p
                                    class="text-xxs mb-0 text-uppercase font-weight-bold badge badge-sm {{ $servicingProduct->status == 'pending' ? 'bg-gradient-secondary' : '' }} {{ $servicingProduct->status == 'assigned' ? 'bg-gradient-primary' : '' }} {{ $servicingProduct->status == 'late' ? 'bg-gradient-danger' : '' }} {{ $servicingProduct->status == 'working' ? 'bg-gradient-info' : '' }} {{ $servicingProduct->status == 'complete' ? 'bg-gradient-success' : '' }}">
                                    {{ $servicingProduct->status }}</p>
                                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6 class="font-weight-bolder text-muted"> {{ $productName }} </h6>
                                <p class="p-0 m-0"><span class="text-xs text-secondary">Appiontment Taken :
                                        {{ $servicingProduct->appiontment_taken_date }},{{ $servicingProduct->appiontment_taken_time }}</span>
                                </p>
                                @if (in_array($servicingProduct->status, ['assigned', 'late', 'working', 'complete']))
                                    <div class="mt-3">
                                        <p class="m-0 p-0"><b>Engineer Details</b></p>
                                        <span class="m-0 p-0 text-xs text-secondary">Name: {{ DB::table('engineers')->where('id', $servicingProduct->engineer_id)->first()->name }}</span> <br>
                                        <span class="m-0 p-0 text-xs text-secondary">Phone: {{ DB::table('engineers')->where('id', $servicingProduct->engineer_id)->first()->phone }}</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>




@endsection
