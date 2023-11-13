@if (Session::has('parts_add_success'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('parts_add_success') }}")
    </script>
@endif
