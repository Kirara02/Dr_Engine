<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }} - {{ config('app.name', 'Laravel') }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="DR.Engine Website" />
	<meta content="" name="Kirara Bernstein" />

    <!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/default/app.min.css') }}" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	
	<!-- ================== BEGIN page-css ================== -->
	<link href="{{ asset('/') }}assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="{{ asset('/') }}assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="{{ asset('/') }}assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="{{ asset('/') }}assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="{{ asset('/') }}assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="{{ asset('/') }}assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />	
	<!-- ================== END page-css ================== -->
	@stack('style')
</head>
<body>

    <!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

    <!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed app-content-full-height">
		<!-- BEGIN #header -->
		@include('components.navbar')
		<!-- END #header -->
	
		<!-- BEGIN #sidebar -->
		@include('components.sidebar')
		<!-- END #sidebar -->

		<!-- BEGIN #sidebar -->
		<div id="content" class="app-content d-flex flex-column p-0">
			<div class="app-content-padding flex-grow-1">
				@yield('content')
			</div>
		</div>
		<!-- END #sidebar -->
	</div>

    <!-- ================== BEGIN core-js ================== -->
	<script src="{{ asset('/') }}assets/js/vendor.min.js"></script>
	<script src="{{ asset('/') }}assets/js/app.min.js"></script>
	<script src="{{ asset('/') }}assets/js/theme/default.min.js"></script>
	<!-- ================== END core-js ================== -->
	
	<!-- ================== BEGIN datatables-js ================== -->
	<script src="{{ asset('/') }}assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset('/') }}assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset('/') }}assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{ asset('/') }}assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<!-- ================== END datatables-js ================== -->
	
	<!-- ================== BEGIN page-js ================== -->
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.canvaswrapper.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.colorhelpers.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.saturated.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.browser.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.drawSeries.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.uiConstants.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.time.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.resize.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.pie.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.crosshair.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.categories.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.navigate.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.touchNavigate.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.hover.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.touch.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.selection.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.symbol.js"></script>
	<script src="{{ asset('/') }}assets/plugins/flot/source/jquery.flot.legend.js"></script>
	<script src="{{ asset('/') }}assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="{{ asset('/') }}assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="{{ asset('/') }}assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
	<script src="{{ asset('/') }}assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="{{ asset('/') }}assets/js/demo/dashboard.js"></script>
	<script src="{{ asset('/') }}assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- ================== END page-js ================== -->
	<script>
		$('.table').DataTable({
            autoWidth: true,
			responsive: true,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ]
        });

		$(".table").on('click', '.btn-delete', function(e) {
            e.preventDefault();

			Swal.fire({
                title: 'Hapus data?',
                text: "Hapus data bersifat permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit()
                }
            })
        });

		$(".logout").on('click', function() {
            Swal.fire({
                title: 'Logout?',
                text: "Anda akan logout!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#logout-form").submit()
                }
            })
        })
	</script>
	@stack('script')
</body>
</html>