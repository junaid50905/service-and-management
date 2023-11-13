@extends('admin.layouts.master')

@section('title')
    Parts need for this product
@endsection

@section('main-panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-primary">Parts need</h3>
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col fw-bold">S&M</th>
                                <th scope="col fw-bold">Selling Date</th>
                                <th scope="col fw-bold">Time of Warranty</th>
                                <th scope="col fw-bold">Warranty End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="fw-lighter text-secondary">{{ $sam ? 'Yes' : 'No' }}</th>
                                <td class="fw-lighter text-secondary">{{ $sellingDate }}</td>
                                <td class="fw-lighter text-secondary">{{ $timeOfWarranty }} months</td>
                                <td class="fw-lighter text-secondary">{{ $warrantyEndDate }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @foreach ($parts as $part)
                        {{ $part->appliance_name }} <br />
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
