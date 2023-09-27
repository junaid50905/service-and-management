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

<<<<<<< HEAD
{{-- product --}}

@if (Session::has('product_create'))
=======

{{-- engineer --}}

@if (Session::has('engineer_create'))
>>>>>>> 33be8f67ec816d79d1c7792ef7eabf387a9db677
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
<<<<<<< HEAD
        toastr.success("{{ session('product_create') }}")
    </script>
@endif

@if (Session::has('product_delete'))
=======
        toastr.success("{{ session('engineer_create') }}")
    </script>
@endif

@if (Session::has('engineer_delete'))
>>>>>>> 33be8f67ec816d79d1c7792ef7eabf387a9db677
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
<<<<<<< HEAD
        toastr.error("{{ session('product_delete') }}")
=======
        toastr.error("{{ session('engineer_delete') }}")
>>>>>>> 33be8f67ec816d79d1c7792ef7eabf387a9db677
    </script>
@endif


<<<<<<< HEAD
@if (Session::has('product_update'))
=======
@if (Session::has('engineer_update'))
>>>>>>> 33be8f67ec816d79d1c7792ef7eabf387a9db677
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
<<<<<<< HEAD
        toastr.success("{{ session('product_update') }}")
    </script>
@endif
=======
        toastr.success("{{ session('engineer_update') }}")
    </script>
@endif
>>>>>>> 33be8f67ec816d79d1c7792ef7eabf387a9db677
