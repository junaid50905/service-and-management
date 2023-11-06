@extends('admin.layouts.master')

@section('title')
    Inspection Location
@endsection

@section('main-panel')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Last Inspection Details</h3>
                    <div>
                        <h6><span class="text-muted">Date of inspection: </span>  <span class="text-secondary">{{ $lastInspection->start_date }}</span></h6>
                        <h6><span class="text-muted">Date of inspection: </span>  <span class="text-secondary">{{ $lastInspection->start_time }}</span></h6>
                        <h6><span class="text-muted">End Inspection: </span>  <span class="text-secondary">{{ $lastInspection->end_time ? $lastInspection->end_time : 'Still working' }}</span></h6>
                    </div>
                    <div id="address"></div>
                    <iframe id="lastInspectionMap" width="100%" src="https://maps.google.com/maps?q=<?php echo $lat; ?>,<?php echo $lng; ?>&output=embed"></iframe>
                </div>
            </div>

        </div>
    </div>


@endsection
