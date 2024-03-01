<!-- Bootstrap core JavaScript-->
<script src="{{ asset('template-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('template-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('template-admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('template-admin/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('template-admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('template-admin/js/demo/chart-pie-demo.js') }}"></script>

<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Validasi Toastr -->
<script>
    @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}')
    @endif
</script>
<script>
    @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}')
    @endif
</script>


<!-- Sweet Alert 2-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
