<!DOCTYPE html>

<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title><?=APP_NAME?></title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

	<!-- favicon -->
	<link href="<?=ROUTE?>/assets/image/favicons/android-chrome-144x144.png" rel="shortcut icon">

	<!-- 
	Essential stylesheets
	=====================================-->
	<link href="<?=ROUTE?>/assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?=ROUTE?>/assets/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
	<link href="<?=ROUTE?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=ROUTE?>/assets/plugins/slick/slick.css" rel="stylesheet">
	<link href="<?=ROUTE?>/assets/plugins/slick/slick-theme.css" rel="stylesheet">
	<link href="<?=ROUTE?>/assets/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="<?=ROUTE?>/assets/css/styles_sunshine.css" rel="stylesheet">
	<link href="<?=ROUTE?>/assets/css/style.css" rel="stylesheet">

</head>

<body class="body-wrapper">


<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="home">
						<img src="assets/image/logos/logo1.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">

							<li class="nav-item dropdown dropdown-slide @@dashboard">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#!">Request Talent<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<ul class="dropdown-menu">

									<li><a class="dropdown-item @@dashboardPage" href="visit">For Visitors</a></li>
									<li><a class="dropdown-item @@dashboardMyAds" href="request">Make a request</a></li>

								</ul>
							</li>
							<li class="nav-item dropdown dropdown-slide @@pages">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Find a job <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<ul class="dropdown-menu">
									<li><a class="dropdown-item @@package" href="<?=ROUTE?>/explore">Jobs</a></li>
									<li><a class="dropdown-item @@about" href="<?=ROUTE?>/about">About Us</a></li>
									<li><a class="dropdown-item @@contact" href="<?=ROUTE?>/team">Our Team</a></li>
									<li><a class="dropdown-item @@blog" href="<?=ROUTE?>/blog">Blog</a></li>
									<li><a class="dropdown-item @@terms" href="<?=ROUTE?>/terms">Terms &amp; Conditions</a></li>
								</ul>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
							<a class="nav-link login-button border-secondary text-secondary rounded" href="<?=ROUTE?>/login">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white add-button bg-warning" href="<?=ROUTE?>/signup"><i class="fa fa-plus-circle"></i> Register Here</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>


<section class="my-4">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search nice-select-white">
				<form role="search"  action='<?=ROUTE?>/search'>
						<div class="form-row align-items-center">
							<div class="form-group col-xl-8 col-lg-8 col-md-8">
							<input type="search" name='find' value="<?php $_GET['find'] ?? '' ?>" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What do you need?">
							</div>
							<div class="form-group col-xl-4 col-lg-4 col-md-4"> 

								<button type="submit" class="btn btn-wa active w-100 bg-warning">Search Now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>