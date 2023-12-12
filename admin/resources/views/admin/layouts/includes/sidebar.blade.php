@php
    use App\Models\Admin\Admin;
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo text-decoration-none text-white" href="{{ route('admin.dashboard') }}">
            <div style="height: 50px; width: calc(150px + 5vw);">
                <img src="{{ asset('ui/admin') }}/assets/images/logo.png" alt="" style="width: 100% !important;">
            </div>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
            <div style="height: 50px; width: calc(50px + 5vw);">
                <img src="{{ asset('ui/admin') }}/assets/images/logo.png" alt=""
                    style="width: 100% !important;">
            </div>
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('ui/admin') }}/assets/images/faces/face15.jpg"
                            alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">
                            @if (Session::has('loginId'))
                                @php
                                    $user = Admin::where('id', Session::get('loginId'))->first();
                                @endphp
                                {{ $user->name ?? '' }}
                            @endif
                        </h5>
                        <span>{{ $user->type ?? '' }}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>


        <!-- Dashboard -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-view-dashboard"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- -----------------------------serviceandmanagement--------------------------- --}}
        <li class="nav-item nav-category mt-2">
            <span class="nav-link">Service & management</span>
        </li>

        <!-- appiontment -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#appiontment" aria-expanded="false"
                aria-controls="appiontment">
                <span class="menu-icon">
                    <i class="mdi mdi-basket-unfill"></i>
                </span>
                <span class="menu-title">Appiontment</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="appiontment">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('appiontment.solo_index') }}">All solo
                            appiontments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('appiontment.group_index') }}">All
                            group
                            appiontments</a></li>
                </ul>
            </div>
        </li>

            {{-- <!-- checklist -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#checklist" aria-expanded="false"
                aria-controls="checklist">
                <span class="menu-icon">
                    <i class="mdi mdi-battery-charging-40"></i>
                </span>
                <span class="menu-title">Checklist</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="checklist">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('checklist.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('checklist.index') }}">Index</a></li>
                </ul>
            </div>
        </li> --}}

        {{-- sold product --}}
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#sellingProduct" aria-expanded="false"
                aria-controls="sellingProduct">
                <span class="menu-icon">
                    <i class="mdi mdi-assistant"></i>
                </span>
                <span class="menu-title">Sold Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sellingProduct">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('solo_sold_product.index') }}">Solo
                            sold
                            products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('group_sold_product.index') }}">Group
                            sold
                            products</a></li>
                </ul>
            </div>
        </li>

        <!-- Service request -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#serviceRequest" aria-expanded="false"
                aria-controls="serviceRequest">
                <span class="menu-icon">
                    <i class="mdi mdi-battery-charging-40"></i>
                </span>
                <span class="menu-title">Service Request</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="serviceRequest">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('service_request.all_solo_request') }}">Solo</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Group</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category mt-2">
            <span class="nav-link">Admin navigation items</span>
        </li>

        <!-- category -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('category.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-access-point"></i>
                </span>
                <span class="menu-title">Category</span>
            </a>
        </li>

        <!-- subcategory -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('subcategory.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-access-point"></i>
                </span>
                <span class="menu-title">Subcategory</span>
            </a>
        </li>

        <!-- product -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('product.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-access-point"></i>
                </span>
                <span class="menu-title">Product</span>
            </a>
        </li>

        <!-- appliance -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('appliance.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-access-point"></i>
                </span>
                <span class="menu-title">Appliance</span>
            </a>
        </li>


        <!-- admin -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-access-point"></i>
                </span>
                <span class="menu-title">Admin</span>
            </a>
        </li>

        <!-- engineer -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('engineer.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-access-point"></i>
                </span>
                <span class="menu-title">Engineer</span>
            </a>
        </li>

        <!-- customer -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('customer.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-access-point"></i>
                </span>
                <span class="menu-title">Customer</span>
            </a>
        </li>



    </ul>
</nav>
