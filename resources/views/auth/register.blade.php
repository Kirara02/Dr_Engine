
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>DR.Engine</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="DR.Engine Website" />
	<meta content="" name="Kirara Bernstein" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="../assets/css/vendor.min.css" rel="stylesheet" />
	<link href="../assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body class='pace-top'>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->


	<!-- BEGIN #app -->
	<div id="app" class="app">
		<!-- BEGIN register -->
		<div class="register register-with-news-feed">
			<!-- BEGIN news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url(../assets/img/login-bg/login-bg-15.jpg)"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b>DR.</b> Engine</h4>
				</div>
			</div>
			<!-- END news-feed -->
			
			<!-- BEGIN register-container -->
			<div class="register-container">
				<!-- BEGIN register-header -->
				<div class="register-header mb-25px h1">
					<div class="mb-1">Sign Up</div>
					<small class="d-block fs-15px lh-16">Create your Account. It’s free and always will be.</small>
				</div>
				<!-- END register-header -->
				
				<!-- BEGIN register-content -->
				<div class="register-content">
					<form action="index.html" method="GET" class="fs-13px">
						<div class="mb-3">
							<label class="mb-2">Username <span class="text-danger">*</span></label>
							<input type="text" class="form-control fs-13px" placeholder="Username" />
						</div>
						<div class="mb-4">
							<label class="mb-2">Password <span class="text-danger">*</span></label>
							<input type="password" class="form-control fs-13px" placeholder="Password" />
						</div>
						<div class="mb-4">
							<label class="mb-2">Confirm Password <span class="text-danger">*</span></label>
							<input type="password" class="form-control fs-13px" placeholder="Confirm Password" />
						</div>
						<div class="form-check mb-4">
							<input class="form-check-input" type="checkbox" value="" id="agreementCheckbox" />
							<label class="form-check-label" for="agreementCheckbox">
								By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
							</label>
						</div>
						<div class="mb-4">
							<button type="submit" class="btn btn-primary d-block w-100 btn-lg h-45px fs-13px">Sign Up</button>
						</div>
						<div class="mb-4 pb-5">
							Already a member? Click <a href="login_v3.html">here</a> to login.
						</div>
						<hr class="bg-gray-600 opacity-2" />
						<p class="text-center text-gray-600">
							&copy; Kirara Bernstein 2023
						</p>
					</form>
				</div>
				<!-- END register-content -->
			</div>
			<!-- END register-container -->
		</div>
		<!-- END register -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="../assets/js/vendor.min.js"></script>
	<script src="../assets/js/app.min.js"></script>
	<script src="../assets/js/theme/default.min.js"></script>
	<!-- ================== END core-js ================== -->
</body>
</html>