@include('admin.layouts.includes.head')

<body>
    <div class="container-scroller">
        <!-- top notification -->
        @include('admin.layouts.includes.top_notification')
        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.includes.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/top_nav.html -->
            @include('admin.layouts.includes.top_nav')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('main-panel')
                    
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.layouts.includes.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.layouts.includes.scripts')
    <!-- End custom js for this page -->
</body>

</html>
