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
                        <h6 class="text-muted font-weight-normal">Total Sold Products</h6>
                    </div>
                </a>
            </div>
        </div>

        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('appliance.index') }}" class="text-decoration-none text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ DB::table('appliances')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Number of appliance</h6>
                    </div>
                </a>
            </div>
        </div>

        {{-- total sales producs --}}
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('engineer.index') }}" class="text-decoration-none text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ DB::table('engineers')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Number of Engineers</h6>
                    </div>
                </a>
            </div>
        </div>


    </div>

    <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <h4 class="card-title">Transaction History</h4>
                    <canvas id="transaction-history" class="transaction-chart chartjs-render-monitor" style="display: block; width: 293px; height: 146px;" width="293" height="146"></canvas>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Transfer to Paypal</h6>
                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$236</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Tranfer to Stripe</h6>
                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$593</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Open Projects</h4>
                      <p class="text-muted mb-1">Your data status</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <i class="mdi mdi-file-document"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Admin dashboard design</h6>
                                <p class="text-muted mb-0">Broadcast web app mockup</p>
                              </div>
                              <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">15 minutes ago</p>
                                <p class="text-muted mb-0">30 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-success">
                                <i class="mdi mdi-cloud-download"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Wordpress Development</h6>
                                <p class="text-muted mb-0">Upload new design</p>
                              </div>
                              <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">1 hour ago</p>
                                <p class="text-muted mb-0">23 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-info">
                                <i class="mdi mdi-clock"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Project meeting</h6>
                                <p class="text-muted mb-0">New project discussion</p>
                              </div>
                              <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">35 minutes ago</p>
                                <p class="text-muted mb-0">15 tasks, 2 issues</p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-danger">
                                <i class="mdi mdi-email-open"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Broadcast Mail</h6>
                                <p class="text-muted mb-0">Sent release details to team</p>
                              </div>
                              <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">55 minutes ago</p>
                                <p class="text-muted mb-0">35 tasks, 7 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-warning">
                                <i class="mdi mdi-chart-pie"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">UI Design</h6>
                                <p class="text-muted mb-0">New application planning</p>
                              </div>
                              <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">50 minutes ago</p>
                                <p class="text-muted mb-0">27 tasks, 4 issues </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
