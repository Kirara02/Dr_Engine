<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dr.Engine</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="DR.Engine Website" />
	<meta content="" name="Kirara Bernstein" />

    <!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="../assets/css/vendor.min.css" rel="stylesheet" />
	<link href="../assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	
	<!-- ================== BEGIN page-css ================== -->
	<link href="../assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />	
	<!-- ================== END page-css ================== -->
</head>
<body>

    <!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

    <!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed ">
		<!-- BEGIN #header -->
		@include('components.navbar')
		<!-- END #header -->
	
		<!-- BEGIN #sidebar -->
		@include('components.sidebar')
		<!-- END #sidebar -->

		<!-- BEGIN #sidebar -->
		<div id="content" class="app-content">
			@yield('content')
		</div>
		<!-- END #sidebar -->
	</div>

	<script>
		$('#data-table-default').DataTable({
            responsive: true
        });
		</script>
    <!-- ================== BEGIN core-js ================== -->
	<script src="../assets/js/vendor.min.js"></script>
	<script src="../assets/js/app.min.js"></script>
	<script src="../assets/js/theme/default.min.js"></script>
	<!-- ================== END core-js ================== -->
	
	<!-- ================== BEGIN datatables-js ================== -->
	<script src="../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	@yield('script')
	<!-- ================== END datatables-js ================== -->
	
	<!-- ================== BEGIN page-js ================== -->
	<script src="../assets/plugins/flot/source/jquery.canvaswrapper.js"></script>
	<script src="../assets/plugins/flot/source/jquery.colorhelpers.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.saturated.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.browser.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.drawSeries.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.uiConstants.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.time.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.resize.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.pie.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.crosshair.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.categories.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.navigate.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.touchNavigate.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.hover.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.touch.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.selection.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.symbol.js"></script>
	<script src="../assets/plugins/flot/source/jquery.flot.legend.js"></script>
	<script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="../assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="../assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
	<script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/demo/dashboard.js"></script>
	<!-- ================== END page-js ================== -->
</body>
</html>