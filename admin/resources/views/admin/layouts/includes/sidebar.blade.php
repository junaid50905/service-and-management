<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo text-decoration-none text-white" href="{{ route('dashboard') }}">
            <h3>Aamra S&M</h3>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset('ui/admin') }}/assets/images/logo-mini.svg" alt="logo" /></a>
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
                        <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                        <span>Gold Member</span>
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
        <li class="nav-item nav-category mt-2">
            <span class="nav-link">Admin navigation items</span>
        </li>
        <!-- Dashboard -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-view-dashboard"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- category -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false"
                aria-controls="category">
                <span class="menu-icon">
                    <i class="mdi mdi-access-point"></i>
                </span>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Index</a></li>
                    </li>
                </ul>
            </div>
        </li>

        <!-- subcategory -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#subcategory" aria-expanded="false"
                aria-controls="subcategory">
                <span class="menu-icon">
                    <i class="mdi mdi-airplane"></i>
                </span>
                <span class="menu-title">Subcategory</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="subcategory">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('subcategory.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('subcategory.index') }}">Index</a></li>
                    </li>
                </ul>
            </div>
        </li>

        <!-- product -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false"
                aria-controls="product">
                <span class="menu-icon">
                    <i class="mdi mdi-alarm-plus"></i>
                </span>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">Index</a></li>
                </ul>
            </div>
        </li>

        <!-- appliance -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#appliance" aria-expanded="false"
                aria-controls="appliance">
                <span class="menu-icon">
                    <i class="mdi mdi-anchor"></i>
                </span>
                <span class="menu-title">Appliance</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="appliance">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('appliance.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('appliance.index') }}">Index</a></li>
                </ul>
            </div>
        </li>

        <!-- engineer -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#engineer" aria-expanded="false"
                aria-controls="engineer">
                <span class="menu-icon">
                    <i class="mdi mdi-arrange-send-backward"></i>
                </span>
                <span class="menu-title">Engineer</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="engineer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('engineer.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('engineer.index') }}">Index</a></li>
                </ul>
            </div>
        </li>

        <!-- customer -->
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#customer" aria-expanded="false"
                aria-controls="customer">
                <span class="menu-icon">
                    <i class="mdi mdi-arrow-down-bold-hexagon-outline"></i>
                </span>
                <span class="menu-title">Customer</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('customer.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('customer.index') }}">Index</a></li>
                </ul>
            </div>
        </li>



        {{-- selling product --}}
        <li class="nav-item menu-items mt-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#sellingProduct" aria-expanded="false"
                aria-controls="sellingProduct">
                <span class="menu-icon">
                    <i class="mdi mdi-assistant"></i>
                </span>
                <span class="menu-title">Sell Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sellingProduct">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('selling_product.create') }}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('selling_product.index') }}">Index</a></li>
                </ul>
            </div>
        </li>

        {{-------------------------------serviceandmanagement-----------------------------}}
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
                    <li class="nav-item"> <a class="nav-link" href="{{ route('appiontment.check_user_product_form') }}">Make an appiontment</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('appiontment.index') }}">All appiontments</a></li>
                </ul>
            </div>
        </li>

        <!-- checklist -->
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
        </li>

        <li class="nav-item menu-items mt-2">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <span class="menu-icon">
                    <i class="mdi mdi-beer"></i>
                </span>
                <span class="menu-title">Form Elements</span>
            </a>
        </li>
    </ul>
</nav>


