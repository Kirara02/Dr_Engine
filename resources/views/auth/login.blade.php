
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Login | DR.Engine</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="DR>Engine" />
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
		<!-- BEGIN login -->
		<div class="login login-with-news-feed">
			<!-- BEGIN news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url(../assets/img/login-bg/login-bg-11.jpg)"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b>dr.</b>Engine</h4>
				</div>
			</div>
			<!-- END news-feed -->
			
			<!-- BEGIN login-container -->
			<div class="login-container">
				<!-- BEGIN login-header -->
				<div class="login-header mb-30px">
					<div class="brand">
						<div class="d-flex align-items-center">
							<span class="logo"></span>	
							<b>dr.</b> Engine
						</div>
						<small>Website Sistem Informasi Bengkel</small>
					</div>
					<div class="icon">
						<i class="fa fa-sign-in-alt"></i>
					</div>
				</div>
				<!-- END login-header -->
				
				<!-- BEGIN login-content -->
				<div class="login-content">
					
					<form action="{{ route('auth') }}" method="POST" class="fs-13px">
						@csrf
						<div class="form-floating mb-15px">
							<input type="text" class="form-control h-45px fs-13px" placeholder="Username" name="username" id="username" autocomplete="off" />
							<label for="username" class="d-flex align-items-center fs-13px text-gray-600">Username</label>
						</div>
						@error('username')
							<small class="text-danger">{{ $message }}</small>
						@enderror
						<div class="form-floating mb-15px">
							<input type="password" class="form-control h-45px fs-13px" placeholder="Password" name="password" id="password" autocomplete="off"/>
							<label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
						</div>
						@error('password')
							<small class="text-danger">{{ $message }}</small>
						@enderror
						<div class="mb-15px">
							<button type="submit" class="btn btn-success d-block h-45px w-100 btn-lg fs-14px">Sign me in</button>
						</div>
						<div class="mb-40px pb-40px text-inverse">
							Not a member yet? Click <a href="{{ url('register') }}" class="text-primary">here</a> to register.
						</div>
						<hr class="bg-gray-600 opacity-2" />
						<div class="text-gray-600 text-center text-gray-500-darker mb-0">
							&copy; Kirara Bernstein 2023
						</div>
					</form>
				</div>
				<!-- END login-content -->
			</div>
			<!-- END login-container -->
		</div>
		<!-- END login -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="../assets/js/vendor.min.js"></script>
	<script src="../assets/js/app.min.js"></script>
	<script src="../assets/js/theme/default.min.js"></script>
	<!-- ================== END core-js ================== -->
</body>
</html>