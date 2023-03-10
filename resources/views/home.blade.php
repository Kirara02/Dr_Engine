
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('/') }}assets/css/one-page-parallax/vendor.min.css" rel="stylesheet" />
	<link href="{{ asset('/') }}assets/css/vendor.min.css" rel="stylesheet" />
	<link href="{{ asset('/') }}assets/css/one-page-parallax/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body data-bs-spy='scroll' data-bs-target='#header' data-bs-offset='51'>
	<div id="page-container" class="fade">
		<div id="header" class="header navbar navbar-transparent navbar-fixed-top navbar-expand-lg">
			<div class="container-fluid">
				<a href="index.html" class="navbar-brand">
					<span class="brand-logo"></span>
					<span class="brand-text">
						<span class="text-primary">dr.</span> Engine
					</span>
				</a>
				<button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#header-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="header-navbar">
					<ul class="nav navbar-nav navbar-end align-items-center">
						<li class="nav-item"><a class="nav-link active" href="#home" data-click="scroll-to-target">HOME</a></li>
						<li class="nav-item"><a class="nav-link" href="#about" data-click="scroll-to-target">ABOUT</a></li>
						<li class="nav-item"><a class="nav-link" href="#mechanic" data-click="scroll-to-target">MECHANIC</a></li>
						<li class="nav-item"><a class="nav-link" href="#service" data-click="scroll-to-target">SERVICES</a></li>
						@if(auth()->user() == null)
							<li class="nav-item"><a class="nav-link" href="{{ url('login') }}"><button class="btn btn-indigo btn-lg btn-theme">LOGIN</button></a></li>	
						@endif
					</ul>
				</div>
			</div>
		</div>
        
		<div id="home" class="content has-bg home">
			<div class="content-bg" style="background-image: url(assets/img/bg/bg-home.jpg);" 
				data-paroller="true" 
				data-paroller-factor="0.5"
				data-paroller-factor-xs="0.25">
			</div>
			<div class="container home-content">
				<h1>Welcome to dr. Engine</h1>
				<h3>Workshop information system website</h3>
				<p>
					Provides repair services for cars and motorbikes.
				</p>
			</div>
		</div>
        
		<div id="about" class="content" data-scrollview="true">
			<div class="container" data-animation="true" data-animation-type="animate__fadeInDown">
				<h2 class="content-title">About Us</h2>
				<div class="row">
					<div class="col-lg-12">
						<div class="about">
							<h3 class="mb-3">Our Story</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
								Vestibulum posuere augue eget ante porttitor fringilla. 
								Aliquam laoreet, sem eu dapibus congue, velit justo ullamcorper urna, 
								non rutrum dolor risus non sapien. Vivamus vel tincidunt quam. 
								Donec ultrices nisl ipsum, sed elementum ex dictum nec. 
							</p>
							<p>
								In non libero at orci rutrum viverra at ac felis. 
								Curabitur a efficitur libero, eu finibus quam. 
								Pellentesque pretium ante vitae est molestie, ut faucibus tortor commodo. 
								Donec gravida, eros ac pretium cursus, est erat dapibus quam, 
								sit amet dapibus nisl magna sit amet orci. 
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
        
		<div id="mechanic" class="content" data-scrollview="true">
			<div class="container">				
				<h2 class="content-title">Our mechanic</h2>
				<div class="row">
					@foreach (\App\Models\Mekanik::with(['member'])->where('statusAktivasi','1')->get() as $meka)
						<div class="col-lg-4">
							<div class="team">
								<div class="image" data-animation="true" data-animation-type="animate__flipInX">
									<img src="{{ asset('./storage/'.$meka->member->foto) }}" width="200px" alt="{{ $meka->member->nama }}" />
								</div>
								<div class="info">
									<h3 class="name">{{ $meka->member->nama }}</h3>
									<div class="title text-primary">Mekanik</div>
									<p><b>Alamat:</b> {{ $meka->alamat }}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>

		<div id="service" class="content" data-scrollview="true">
			<div class="container">
				<h2 class="content-title">Our Services</h2>
				<div class="row">
					@foreach (\App\Models\JenisKerusakan::all() as $jenis)
						<div class="col-lg-4 col-md-6">
							<div class="service">
								<div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fas fa-wrench"></i></div>
								<div class="info">
									<h4 class="title">{{ $jenis->jenisKerusakan }}</h4>
									<p class="desc">{{ $jenis->deskripsi }}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
        
		<div id="footer" class="footer h-250px">
			<div class="container">
				<div class="footer-brand">
					<div class="footer-brand-logo"></div>
					<b>dr.</b> Engine
				</div>
				<p>
					&copy; Copyright Kirara Bernstein 2023 <br />
				</p>
			</div>
		</div>
	</div>
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ ('/') }}assets/js/one-page-parallax/vendor.min.js"></script>
	<script src="{{ ('/') }}assets/js/one-page-parallax/app.min.js"></script>
	<script src="{{ ('/') }}assets/plugins/jquery/dist/jquery.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$(document).ready(function(){
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
			});
		});
	</script>
</body>
</html>