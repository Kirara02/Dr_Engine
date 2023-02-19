
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
					<form action="{{ route('register.store') }}" method="POST" class="fs-13px" enctype="multipart/form-data">
						@method('POST')
						@csrf
						<div class="form-group mb-3">
							<label class="mb-2">Nama Lengkap <span class="text-danger">*</span></label>
							<input type="text" class="form-control fs-13px" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}" />
							@error('nama')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label class="mb-2">No handphone <span class="text-danger">*</span></label>
							<input type="text" class="form-control fs-13px" name="nohp" id="nohp" placeholder="No Handphone" value="{{ old('nohp') }}"/>
							@error('nohp')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label class="mb-2">Email <span class="text-danger">*</span></label>
							<input type="text" class="form-control fs-13px" name="email" id="email" placeholder="Email" value="{{ old('email') }}"/>
							@error('email')
								<small class="text-danger">{{ $message }}</small>
							@enderror	
						</div>
						<div class="form-group mb-3">
							<label class="mb-2">KTP <span class="text-danger">*</span></label>
							<input type="text" class="form-control fs-13px" name="ktp" id="ktp" placeholder="KTP" value="{{ old('ktp') }}"/>
							@error('ktp')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label class="mb-2">Foto <span class="text-danger">*</span></label>
							<input type="file" class="form-control fs-13px" name="foto" id="foto" placeholder="Foto" value="{{ old('foto') }}"/>
							@error('foto')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label class="mb-2">Alamat <span class="text-danger">*</span></label>
							<textarea class="form-control" name="alamat" rows="3" id="alamat" >{{ old('alamat') }}</textarea>	
							@error('alamat')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label class="mb-2">Username <span class="text-danger">*</span></label>
							<input type="text" class="form-control fs-13px" name="username" id="username" placeholder="username" {{ old('username') }}/>
							@error('username')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label class="mb-2">Password <span class="text-danger">*</span></label>
							<input type="password" class="form-control fs-13px" name="password" id="password" placeholder="Password" {{ old('password') }}/>
							@error('password')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label class="mb-2">Confirm Password <span class="text-danger">*</span></label>
							<input type="password" class="form-control fs-13px" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" />
							@error('password_confirmation')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>
						<div class="mb-3">
							<button type="submit" class="btn btn-primary d-block w-100 btn-lg h-45px fs-13px">Sign Up</button>
						</div>
						<div class="mb-4 pb-5 text-inverse">
							Already a member? Click <a href="{{ url('login') }}">here</a> to login.
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