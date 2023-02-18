
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>DR. Engine</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/one-page-parallax/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/one-page-parallax/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body data-bs-spy='scroll' data-bs-target='#header' data-bs-offset='51'>
	<div id="page-container" class="fade">
		<div id="header" class="header navbar navbar-transparent navbar-fixed-top navbar-expand-lg">
			<div class="container-fluid">
				<a href="index.html" class="navbar-brand">
					<span class="brand-logo"></span>
					<span class="brand-text">
						<span class="text-primary">DR.</span> Engine
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
						<li class="nav-item"><a class="nav-link" href="#gallery" data-click="scroll-to-target">GALLERY</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ url('login') }}"><button class="btn btn-indigo btn-lg btn-theme">LOGIN</button></a></li>	
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
				<h1>Welcome to DR. Engine</h1>
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
					<div class="col-lg-4">
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="animate__flipInX">
								<img src="assets/img/user/user-1.jpg" alt="Ryan Teller" />
							</div>
							<div class="info">
								<h3 class="name">Ryan Teller</h3>
								<div class="title text-primary">OWNER</div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="animate__flipInX">
								<img src="assets/img/user/user-2.jpg" alt="Jonny Cash" />
							</div>
							<div class="info">
								<h3 class="name">Johnny Cash</h3>
								<div class="title text-primary">CHIEF MECHANIC</div>
								<p>Donec quam felis, ultricies nec, pellentesque eu sem. Nulla consequat massa vierra quis enim.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="animate__flipInX">
								<img src="assets/img/user/user-3.jpg" alt="Mia Donovan" />
							</div>
							<div class="info">
								<h3 class="name">Mia Donovan</h3>
								<div class="title text-primary">ADMIN</div>
								<p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean ligula imperdiet. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="service" class="content" data-scrollview="true">
			<div class="container">
				<h2 class="content-title">Our Services</h2>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-cog"></i></div>
							<div class="info">
								<h4 class="title">Easy to Customize</h4>
								<p class="desc">Duis in lorem placerat, iaculis nisi vitae, ultrices tortor. Vestibulum molestie ipsum nulla. Maecenas nec hendrerit eros, sit amet maximus leo.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-paint-brush"></i></div>
							<div class="info">
								<h4 class="title">Clean & Careful Design</h4>
								<p class="desc">Etiam nulla turpis, gravida et orci ac, viverra commodo ipsum. Donec nec mauris faucibus, congue nisi sit amet, lobortis arcu.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-file"></i></div>
							<div class="info">
								<h4 class="title">Well Documented</h4>
								<p class="desc">Ut vel laoreet tortor. Donec venenatis ex velit, eget bibendum purus accumsan cursus. Curabitur pulvinar iaculis diam.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-code"></i></div>
							<div class="info">
								<h4 class="title">Re-usable Code</h4>
								<p class="desc">Aenean et elementum dui. Aenean massa enim, suscipit ut molestie quis, pretium sed orci. Ut faucibus egestas mattis.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-shopping-cart"></i></div>
							<div class="info">
								<h4 class="title">Online Shop</h4>
								<p class="desc">Quisque gravida metus in sollicitudin feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-heart"></i></div>
							<div class="info">
								<h4 class="title">Free Support</h4>
								<p class="desc">Integer consectetur, massa id mattis tincidunt, sapien erat malesuada turpis, nec vehicula lacus felis nec libero. Fusce non lorem nisl.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        
		<div id="gallery" class="content" data-scrollview="true">
			<div class="container" data-animation="true" data-animation-type="animate__fadeInDown">
				<h2 class="content-title">Our Gallery</h2>
				<div class="row row-space-10">					
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<div class="image">
								<a href="#"><img src="../assets/img/work/work-img-1.jpg" alt="Work 1" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Aliquam molestie</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>		
					</div>
					
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<div class="image">
								<a href="#"><img src="../assets/img/work/work-img-2.jpg" alt="Work 2" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Quisque at pulvinar lacus</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>						
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<div class="image">
								<a href="#"><img src="../assets/img/work/work-img-3.jpg" alt="Work 3" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Vestibulum et erat ornare</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>						
					</div>					
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<div class="image">
								<a href="#"><img src="../assets/img/work/work-img-4.jpg" alt="Work 4" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Sed vitae mollis magna</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<div class="image">
								<a href="#"><img src="../assets/img/work/work-img-5.jpg" alt="Work 5" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Suspendisse at mattis odio</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<div class="image">
								<a href="#"><img src="../assets/img/work/work-img-6.jpg" alt="Work 6" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Aliquam vitae commodo diam</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<div class="image">
								<a href="#"><img src="../assets/img/work/work-img-7.jpg" alt="Work 7" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Phasellus eu vehicula lorem</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<div class="image">
								<a href="#"><img src="../assets/img/work/work-img-8.jpg" alt="Work 8" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Morbi bibendum pellentesque</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer" class="footer">
			<div class="container">
				<div class="footer-brand">
					<div class="footer-brand-logo"></div>
					DR.Engine
				</div>
				<p>
					&copy; Copyright Kirara Bernstein 2023 <br />
				</p>
			</div>
		</div>
	</div>
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/js/one-page-parallax/vendor.min.js"></script>
	<script src="assets/js/one-page-parallax/app.min.js"></script>
	
</body>
</html>