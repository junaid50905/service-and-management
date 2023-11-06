@php
    use App\Models\Admin\Engineer;
    use App\Models\Admin\Category;
    use App\Models\Admin\Subcategory;
@endphp


<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('engineer.dashboard') }}">
            <img src="{{ asset('ui/engineer') }}/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold">Service and Management</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <div class="ms-5">
                @if (Session::has('loginId'))
                    @php
                        $engineer = Engineer::where('id', Session::get('loginId'))->first();
                        $categoryId = $engineer->category_id;
                        $subCategoryId = $engineer->subcategory_id;
                        $categoryName = Category::where('id', $categoryId)->first()->name;
                        $subcategoryName = Subcategory::where('category_id', $categoryId)->where('id', $subCategoryId)->first()->name;
                    @endphp
                    <div class="d-flex gap-3 align-items-center">
                        <img class="img-xs rounded-circle"
                            src="{{ asset('ui/engineer') }}/assets/img/profile-image.jpeg" alt="" height="40"
                            width="40" style="object-fit: cover">
                        <div>
                            <span style="font-size: 14px" class="text-dark">{{ $engineer->name ?? '' }}</span>
                            <span style="font-size: 12px" class="text-warning">(engineer)</span> <br>
                            <span style="font-size: 12px" class="text-primary">({{ $categoryName }}, {{ $subcategoryName }})</span>
                        </div>
                    </div>
                @endif
            </div>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('engineer.dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
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
