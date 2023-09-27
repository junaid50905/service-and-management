{{-- category --}}

@if (Session::has('category_create'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('category_create') }}")
    </script>
@endif

@if (Session::has('category_delete'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.error("{{ session('category_delete') }}")
    </script>
@endif


@if (Session::has('category_update'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('category_update') }}")
    </script>
@endif


{{-- engineer --}}

@if (Session::has('engineer_create'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('engineer_create') }}")
    </script>
@endif

@if (Session::has('engineer_delete'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.error("{{ session('engineer_delete') }}")
    </script>
@endif


@if (Session::has('engineer_update'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('engineer_update') }}")
    </script>
@endif