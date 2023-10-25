@include('engineer.layouts.includes.head')

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  @include('engineer.layouts.includes.sidebar')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('engineer.layouts.includes.topbar')
    <!-- End Navbar -->
    <div class="container">
        @yield('main-panel')
    </div>

  </main>
  @include('engineer.layouts.includes.settings')
@include('engineer.layouts.includes.scripts')
</body>

</html>
