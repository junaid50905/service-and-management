@php
    use App\Models\User;
@endphp


<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="{{ route('customer.dashboard') }}">
            <div style="height: 50px; width: calc(130px + 5vw); background: black; padding: 2px; border-radius: 3px;">
                <img src="{{ asset('ui/customer') }}/assets/img/logo.png" alt="" style="width: 100% !important; margin-top: 10px;">
            </div>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <div class="ms-5">
                @if (Session::has('loginId'))
                    @php
                        $customer = User::where('id', Session::get('loginId'))->first();
                    @endphp
                    <div class="d-flex gap-3 align-items-center">
                        <img class="img-xs rounded-circle"
                            src="{{ asset('ui/customer') }}/assets/img/profile-image.jpeg" alt="" height="40"
                            width="40" style="object-fit: cover">
                        <div>
                            <span style="font-size: 14px" class="text-dark">{{ $customer->name ?? '' }}</span>
                        </div>
                    </div>
                @endif
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.purchased_products') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Purchased Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.all_service_requests') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">All service requests</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.admin_contact') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin Contact Info</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/profile.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
