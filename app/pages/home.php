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
<?php
          
          if(isset($_SESSION['request'])){
            echo $_SESSION['request'];
            unset($_SESSION['request']);
          }
          
        ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="home">
						<img src="<?=ROUTE?>/assets/image/logos/logo1.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">

							<li class="nav-item dropdown">
								<a class="nav-link" href="about">About</a>
							</li>

							

							<li class="nav-item">
							<a class="nav-link" href="team">Team</a>
							</li>

							<li class="nav-item dropdown dropdown-slide @@pages">
							<a class="nav-link" href="blog">Blog</a>
							</li>
							


							<li class="nav-item dropdown dropdown-slide @@dashboard"></li>
							<li class="nav-item  @@pages">
								<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Jobs <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu w-100 mt-0" aria-labelledby="navbarDropdown" style="border: 0px !important;">
								<div class="container">
								<div class="row my-4  w-100">
									<div class="col-md-6 col-lg-6 mb-3 mb-lg-6">
									<div class="list-group list-group-flush">
									<?php
									$query = "select * from industries order by IndustryId desc";
									$rows = query($query);
									?>
										
									<?php
									if($rows){
										foreach($rows as $row):
											?>
										<ul class="category-list  bg-warning ml-4 rounded rounded-4">
											<a href="" class="dropdown-item"><?=$row['Nameindustry']?></a>
										</ul>
													
									</div>
								</div>
									<div class="col-md-6 col-lg-6 mb-6 mb-lg-6">
									<div class="list-group list-group-flush">
									<?php
										endforeach;
									}else{
									?>
												<ul class="category-list">
													<a href="" class="dropdown-item fw-bold"><?=$row['Nameindustry']?></a>
												</ul>										<?php
										} 
										?>
									</div>
									</div>
								</div>
								</div>
							</div>


							
								
							
									
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


    <!--====================================
    =            New Section             =
    =====================================-->
	<div class="bg-image" style="background-image: url('<?=ROUTE?>/assets/image/jumbotron2.png');  background-position: center; background-repeat:no-repeat; background-size: cover;">
		<div class="col-md-6">
			<div class="row g-0 overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static ">
					<strong class="d-inline-block mb-2 text-primary-emphasis h1  px-4 text-light py-3  rounded rounded-3 font-weight-light font-weight-bold sm-bg-pirmary" style="" >Join us & Explore our Jobs</strong>
					<p class="card-text mb-auto justify-content-center px-4 h4 text-light text-light py-3 font-italic">Whether you are seeking top talent, to begin a career at your dream company, we can help you.</p>
					
					<br>
					<div class="row landing-fullwidth__buttons pl-3">
					<a href="request" class="btn bg-warning mx-2 text-light font-weight-bold">Find Talent</a>
					<a href="explore" class="btn bg-warning text-light font-weight-bold">Find a Job</a>
			</div>
				</div>
			</div>
		</div>
	</div>
	

  <!--====================================
	=    New Section Popular Jobs     =
=====================================-->
	<section class="popular-deals section bg-gray pt-1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title justify-content-center mb-1">
					<h3 class="text-dark font-weight-light h1 pt-4">Latest jobs</h3>
					<p class="pt-3 font-italic h4 text-center mb-4">Apply here!!</p>
					
				</div>
			</div>
		</div>
	<?php 
		//$query = "SELECT * FROM jobs";
		$query = "select * from jobs where salary > 15 order by id desc limit 4";
		$i=1;
		$rows = query($query);
	?>

	<div class="container">
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">
					<?php foreach($rows as $row) : ?>
					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
							<div class="category-block ">
								<div class="header-card">
									<h4><?=$row['job_name']?> <span class="float-right"> </span></h4>
									<h4 class="h6"><i class="fa fa-money icon-bg-1"></i><?=' $'.$row['salary']. '/hr'?><span class="float-right"><?=$row['time']?></h4>
								</div>
								<ul class="category-list h2">
									<li class="fw-bold"> Location:<span class="float-right"><?=$row['city'].' / '.$row['state']?></span></li>
								</ul>
								<a href="job/<?=$row['slug']?>" class="btn bg-warning text-dark w-100 h-6">Apply now</a>
							</div>
					</div>
					<?php endforeach;  ?>

				</div>
			</div>
		</div>
	</div>
</section>



<!--===========================================
=            Popular deals section            =
============================================-->
	


	<section class="section pt-2">
		<!-- Container Start -->
					<section class="page-title bg-white ">
				<!-- Container Start -->
				<div class="container">
					<div class="row">
						<div class="col-md-8 offset-md-2 text-center ">
							<!-- Title text -->
							<h3 class="text-dark font-weight-light">Talent Solutions</h3>
					<p class="pt-3 font-italic h4">Our ongoing commitment is connection – bringing together great people and great organizations to build successful relationships.</p>
						</div>
					</div>
				</div>
				<!-- Container End -->
			</section>	
			
			
		<div class="container pt-5">
			<div class="row">

				<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-4"">
					<div class="card vh-25">
					<img class="card-img-top" src="<?=ROUTE?>/assets/image/executive.png" alt="Card image cap">	
					<div class="card-body">
						<h5 class="card-title">PUBLIC SECTOR</h5>
					</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-4"">
					<div class="card vh-25">
					<img class="card-img-top" src="<?=ROUTE?>/assets/image/partners.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">PRIVATE SECTOR</h5>
					</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-4"">
					<div class="card vh-25">
					<img class="card-img-top" src="<?=ROUTE?>/assets/image/contract.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">EXECUTIVE SEARCH</h5>
					</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-4">
					<div class="card vh-25">
					<img class="card-img-top" src="<?=ROUTE?>/assets/image/office.jpg" alt="Card image cap">	
					<div class="card-body">
						<h5 class="card-title">CONTRACTING STAFFING</h5>
					</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-4">
					<div class="card vh-25">
					<img class="card-img-top" src="<?=ROUTE?>/assets/image/temp.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">TEMPORARY STAFFING</h5>
					</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-4">
					<div class="card vh-25">
					<img class="card-img-top" src="<?=ROUTE?>/assets/image/meeting.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">PARTHNERS & STAKEHOLDERS</h5>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>


    <!--====================================
    =            New Section             =
    =====================================-->

	

	<section class="call-to-action overly bg-3 section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row justify-content-md-center text-center">
				<div class="col-md-8">
					<div class="content-holder">
						<h2>Get support you need</h2>
						<ul class="list-inline mt-30">
							<li class="list-inline-item "><a class="btn btn-main bg-warning" href="request">
								Find Talent
							</a></li>
							<li class="list-inline-item"><a class="btn btn-secondary" href="<?=ROUTE?>/explore">Find a Job</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

<!--============================
=            Footer            =
=============================-->
<?php

include '../app/pages/includes/footer.php';

?>

</html>