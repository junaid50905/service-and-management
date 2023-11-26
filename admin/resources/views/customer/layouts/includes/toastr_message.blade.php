@if (Session::has('request_success'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session('request_success') }}")
    </script>
@endif
