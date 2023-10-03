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
        toastr.success("{{ session('category_delete') }}")
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


{{-- subcategory --}}
@if (Session::has('subcategory_create'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('subcategory_create') }}")
    </script>
@endif

@if (Session::has('subcategory_delete'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('subcategory_delete') }}")
    </script>
@endif


@if (Session::has('subcategory_update'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('subcategory_update') }}")
    </script>
@endif

{{-- product --}}
@if (Session::has('product_create'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('product_create') }}")
    </script>
@endif

@if (Session::has('product_delete'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('product_delete') }}")
    </script>
@endif


@if (Session::has('product_update'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('product_update') }}")
    </script>
@endif

{{-- engineer --}}
@if (Session::has('engineer_create'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
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
        toastr.success("{{ session('engineer_delete') }}")
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


{{-- checklist --}}
@if (Session::has('unavailable_user'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.error("{{ session('unavailable_user') }}")
    </script>
@endif

@if (Session::has('checklist_create'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.success("{{ session('checklist_create') }}")
    </script>
@endif

@if (Session::has('checklist_update'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('checklist_update') }}")
    </script>
@endif


@if (Session::has('checklist_delete'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('checklist_delete') }}")
    </script>
@endif


{{-- appiontment --}}

@if (Session::has('user_or_product_unavailable'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.error("{{ session('user_or_product_unavailable') }}")
    </script>
@endif


@if (Session::has('appiontment_taken'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('appiontment_taken') }}")
    </script>
@endif


@if (Session::has('appiontment_assigned'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('appiontment_assigned') }}")
    </script>
@endif