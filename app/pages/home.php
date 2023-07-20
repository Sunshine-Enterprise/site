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
	<link href="<?=ROUTE?>/assets/image/favicons/android-chrome-144x144.png" rel="icon">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D56MEQ917T"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-D56MEQ917T');
    </script>

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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
							
							<!------------------------------------------------------------------>
							<li class="nav-item  @@pages">
								<a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Jobs <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu w-100 mt-0" aria-labelledby="navbarDropdown" style="border: 0px !important;">
								<div class="container">
								<div class="row my-4  w-100">
									<div class="col-md-6 col-lg-6 mb-3 mb-lg-6">
									<div class="list-group list-group-flush">
									<?php
									$query = "select * from industries where disabled = 1 order by IndustryId desc limit 4";
									$rows = query($query);
									?>
										
									<?php
									if($rows){
										foreach($rows as $row):
											?>
										<ul class="category-list  bg-warning ml-4 rounded rounded-4">
											<a href="industry/<?=$row['slug']?>" class="dropdown-item"><?=$row['Nameindustry']?></a>
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
												<a href="industry/<?=$row['slug']?>" class="dropdown-item fw-bold"><?=$row['Nameindustry']?></a>
												</ul>										<?php
										} 
										?>
									</div>
									</div>
								</div>
								</div>
							</div>
							</li>
							<!------------------------------------------------------------------>

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
<div class="bg-image" style="background-image: url('<?=ROUTE?>/assets/image/jumbotron2.png');  background-position: center; background-repeat:no-repeat; background-size: cover; max-width: 100% !important; max-height: 100% !important;">
		<div class="col-md-6">
			<div class="row g-0 overflow-hidden flex-md-row mb-4 h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static ">
					<strong class="d-inline-block mb-2 text-primary-emphasis h1  px-4 text-warning py-3  rounded rounded-3 font-weight-light font-weight-bold" style="">Join us & Explore our Jobs</strong>
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
    =            New Section             =
    =====================================-->


<section class=" section pt-2 pb-3">

		<!-- Container Start -->
		<div class="container">
				<div class="col-12">
					<!-- Section title -->
					<div class="section-title">
						<h2>Search</h2>
						<p class='fw-bold'>Enter keywords or Strings</p>
					

					<div class="advance-search mb-3">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12 align-content-center">									
									<form role="search" action='<?=ROUTE?>/search'>
											<div class="form-row align-items-center">
												<div class="form-group col-xl-8 col-lg-8 col-md-8">
												<input type="search" name='find' value="<?php $_GET['find'] ?? ''?>" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What do you need?">
											</div>
											<div class="form-group col-xl-4 col-lg-4 col-md-4"> 
													<button type="submit" class="btn btn-wa active w-100 bg-warning">Search Now</button>
											</div>
											</div>
											<?php
											if(empty($_GET['find'])){

											}		
											?>
									</form>
								</div>
							</div>
						</div>
					</div>
					</div>

				</div>
			</div>
		</div>
	</section>



<div class="container-fluid">
 	<div class="row px-4">
		<div class="col-12">
		<div class="section-title">
					<h3 class="text-dark font-weight-light h1">Talent Solutions New</h3>
					<p class="pt-3 font-italic h4"></p>
		</div>						
		</div>
		<?php 
		//$query = "SELECT * FROM jobs";
		$query = "select * from jobs where salary > 11 order by id desc limit 4";
		$i=1;
		$rows = query($query);
		?>
		<div class="col-12">
		<div class="trending-ads-slide">
					<?php foreach($rows as $row) : ?>
					<div class="col-sm-12 col-md-3 col-lg-3">
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


<!--====================================
	=    New Section Popular Jobs     =
=====================================-->
	<section class="popular-deals section bg-gray pt-1">
	<div class="container">
		<div class="row" >
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
	
	


<section class="popular-deals section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="text-dark font-weight-light h1">Talent Solutions</h3>
					<p class="pt-3 font-italic h4"></p>
					
				</div>
			</div>
		</div>

		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">
					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
						<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="<?=ROUTE?>/assets/image/meeting.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">Public Sector</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-bullhorn"></i>Recluiting</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="#"><i class="fa fa-users"></i>In state</a>
		    	</li>
		    </ul>
		    <p class="card-text"></p>
		   
		</div>
	</div>
</div>



					</div>
					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="<?=ROUTE?>/assets/image/partners.png" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">Human Resourses</a></h4>
			<ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single"><i class="fa fa-bullhorn"></i>Recluiting</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="#"><i class="fa fa-users"></i>In State</a>
		    	</li>
		    </ul>
		    <p class="card-text"></p>
		   
		</div>
	</div>
</div>



					</div>
					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="<?=ROUTE?>/assets/image/contract.png" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">Private Sector</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-bullhorn"></i>Recluiting</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="#"><i class="fa fa-users"></i>In State</a>
		    	</li>
		    </ul>
		    <p class="card-text"></p>
		  
		</div>
	</div>
</div>



					</div>
					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="<?=ROUTE?>/assets/image/office.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="">Contracts</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href=""><i class="fa fa-bullhorn"></i>Recluiting</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="#"><i class="fa fa-users"></i>In State</a>
		    	</li>
		    </ul>
		    <p class="card-text"></p>
		   
		</div>
	</div>
</div>



					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Container Start -->
<section class="section p-0">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>Our specialties</h2>
				</div>
			</div>
			<?php 
				  $query = "SELECT * FROM industries";
			 	  $row = query($query);
				  foreach ($row as $key):
			?>
			<!--------------->
			<div class="col-sm-12 col-md-6 col-lg-4 mb-2 mt-0">
				<div class="card border-0">
					<div class="thumb-content">
						<!-- <div class="price">$200</div> -->
						<a href="<?=ROUTE?>/industry/<?=$key['slug']?>">
						<div class="category-block border-0 mb-0 shadow-none py-0">
							<div class="header">
							<img class="card-img-top img-fluid rounded" src="<?=ROUTE?>/assets/image/<?=$key['IndustryId']?>.png" alt="Card image cap">
							</div>
						</div>
						</a>
					</div>
					<div class="card-body pt-0">
						<h4 class="card-title text-center mb-0"><a href=""><?=$key['Nameindustry']?></a></h4>
						<ul class="list-inline product-meta text-center">
							<?php $query1 = "SELECT COUNT(id) FROM jobs WHERE industry_id = ".$key['IndustryId']."";
								  $consult = query($query1);
								 
								?>
							
							<li class="list-inline-item">
								<a class="" href="<?=ROUTE?>/industry/<?=$key['slug']?>">Jobs Avaible: <?php  print_r($consult[0]['COUNT(id)']);?></a>
							</li>
						</ul>
						<p class="card-text"></p>
					
					</div>
				</div>
		    </div>
			<!--------------->
			<?php endforeach; ?>

		</div>
	</div>
</section>
<!-- Container End -->




<section class="section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
					<div class="col-md-12">
						<div class="section-title justify-content-center mb-1">
								<h3 class="text-dark h1 pt-4">Talent Solutions </h3>
						</div>
					</div>
					</div>
					
					
					<div class="col-lg-12">
						<div col="12">
							<ul class="nav nav-pills justify-content-center px-3 py-2" id="pills-tab" role="tablist">
								<li class="nav-item py-2 px-1">
									<a class="nav-link active bg-warning " id="pills-home-tab" data-toggle="pill" href="#pills-private" role="tab" aria-controls="pills-home"
									 aria-selected="true">For Private Sector</a>
								</li>
								<li class="nav-item py-2 px-1">
									<a class="nav-link bg-warning" id="pills-profile-tab" data-toggle="pill" href="#pills-public" role="tab" aria-controls="pills-profile"
									 aria-selected="false"> For Public Sector</a>
								</li>
								<li class="nav-item py-2 px-1">
									<a class="nav-link bg-warning" id="pills-contact-tab" data-toggle="pill" href="#pills-executive" role="tab" aria-controls="pills-contact"
									 aria-selected="false">Executive Search</a>
								</li>
								<li class="nav-item py-2 px-1">
									<a class="nav-link bg-warning" id="pills-stake-tab" data-toggle="pill" href="#pills-stake" role="tab" aria-controls="pills-stake"
									 aria-selected="false">For Stakeholders</a>
								</li>
								<li class="nav-item py-2 px-1">
									<a class="nav-link bg-warning" id="pills-contract-tab" data-toggle="pill" href="#pills-contract" role="tab" aria-controls="pills-contract"
									 aria-selected="false">Contract Staffing</a>
								</li>
								<li class="nav-item py-2 px-1">
									<a class="nav-link bg-warning" id="pills-temporal-tab" data-toggle="pill" href="#pills-temporal" role="tab" aria-controls="pills-temporal"
									 aria-selected="false">Temporal Staff</a>
								</li>
							</ul>
						</div>
						<div class="product-details">	
							
					<div class="content mt-0 pt-0">
					
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-private" role="tabpanel" aria-labelledby="pills-home-tab">
								<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<h3 class="tab-title">Private Sector</h3>
									<p class="text-justify">We offer a variety of staffing and recruitment
										solutions for corporations, small businesses and
										private sector organizations. Working with the
										right staffing and recruiting partner can reduce
										your overhead, operational costs and improve
										productivity. </p>
								</div>
								 <div class="col-lg-6 col-md-12 col-sm-12">
										<!------------>
										
										<img class="card-img-top img-fluid mt-3 rounded" src="<?=ROUTE?>/assets/image/privateSec.png" alt="Card image cap">
										
										<!------------>
								</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pills-public" role="tabpanel" aria-labelledby="pills-profile-tab">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h3 class="tab-title">Public Sector</h3>
										<p class="text-justify">Sunshine Enterprise USA (SEU) understands the specific demands of government and public sector organizations.
											Our experience in staffing the myriad industries comprising this sector gives us a leading edge over competitor
									agencies. This advantage is directly passed on to our clients, allowing us to deliver the best and most qualified 
									candidates available. </p>
									<p class="text-justify">We offer a variety of staffing and recruitment
										solutions for corporations, small businesses and
										private sector organizations. Working with the
										right staffing and recruiting partner can reduce
										your overhead, operational costs and improve
										productivity.</p>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<!------------>
										
										<img class="card-img-top img-fluid mt-3" src="<?=ROUTE?>/assets/image/partners.png" alt="Card image cap">
										
										<!------------>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pills-executive" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Executive Roles We Have Placed:</h3>
								<div class="row">								
									<div class="col-lg-3 col-md-6 col-sm-12 pb-3">
									<p class="font-weight-bold text-dark">Engineering/Public Works/Utilities:</p>
									<?php
									$engineers = 
									array("City Engineer", "Department of Transportation", "(DOT) Engineer",
									 "Assistant City Engineer", "Director of Public Services", "Public Works Director", "Public Works Assistant Director",
									 "Water District Executive Director", "Water District General Manager", "Planning & Engineering Director", "Director of Projects",
									 "Engineering Project Manager",	"City Planner", "Chief Plant Operator", "Assistant Utilities Director", "Director of Utilities");
									 $count = 1;
									?>
										<ul>
											<?php foreach ($engineers as $key): ?>
													<li class="py-1"><?=$count++;?><?='. '.$key?></li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-12">
									<?php
									$admins = 
									array("Administrative Services Director", "Manager of Town Services", 
									 "Management Assistant Chief", "Officer", "Human Resources/Civil Services", "Director of Human Resources",
									 "Management", "Intergovernmental Services", "Fleet Equipment Services", "Facilities Services Manager",
									 "Assistant Municipal Garage",	"Fixed Base Operator", "(FBO) Services", "Arts Director");
									 $count1 = 1;
									?>
									<p class="font-weight-bold text-dark">Administrative Services Services:</p>
										<ul>
											<?php foreach ($admins as $key): ?>
													<li class="py-1"><?=$count1++;?><?='. '.$key?></li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-12">
									<p class="font-weight-bold text-dark">Development Services:</p>
									<?php
									$services = 
									array("Community Development", "Manager Development Services", 
									 "Deputy Director of Development", "Tourism Development Director","Community Development", "Community Services",
									  "Director of Human Resources", "Senior Building Inspector", "Chief Building Official", "New Urbanist");
									 $count2 = 1;
									?>
										<ul>
											<?php foreach ($services as $key): ?>
													<li class="py-1"><?=$count2++;?><?='. '.$key?></li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-12">
									<p class="font-weight-bold text-dark">Information Technology:</p>
									<?php
									$it = 
									array("IT Director", "Chief Technology Officer", 
									 "Chief Information Officer", "IT Assistant Director", "IT Manager",
									  "IT Manager (Police Department)", "IT Developer", "GIS Manager", "Senior Software Developer");
									 $count3 = 1;
									?>
										<ul>
											<?php foreach ($it as $key): ?>
													<li class="py-1"><?=$count3++;?><?='. '.$key?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pills-stake" role="tabpanel" aria-labelledby="pills-contact-tab">
							    <div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
								  <h3 class="tab-title">For Stakeholders</h3>
								  <p class="text-justify">We create alliances with minority-owned partners
to help customers meet M/WBE and SBE spend
goals. Our valued partners include certified MBE,
WBE, DBE, SBE (8A), HUB Zone business,
American & Alaskan native and service-disabled
veteran owned companies.
</p>
							    </div>
								<div class="col-lg-6 col-md-12 col-sm-12">
										<!------------>
										
										<img class="card-img-top img-fluid mt-3 rounded" src="<?=ROUTE?>/assets/image/executive.png" alt="Card image cap">
										
										<!------------>
								</div>
							    </div>
							</div>
							<div class="tab-pane fade" id="pills-contract" role="tabpanel" aria-labelledby="pills-contact-tab">
							    <div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">

								<h3 class="tab-title">Contract Staffing</h3>
								<p class="text-justify">
								Regardless of project size, we can tailor our
								recruiting searches to the specific and unique
								needs of our clients, to ensure exceptional
								results.</p>
								<p class="text-justify">
									<ol>
										<li> <strong>-</strong> Finding the best candidate for a role within your organization can be a daunting process.<br><br></li>
										<li> <strong>-</strong> Scheduling and conducting interviews can be costly, time-consuming, and resource prohibitive. <br><br></li>
										<li> <strong>-</strong> Ultimately, there is no guarantee that all of your hard work will produce a viable candidate. <br><br></li>
										<li> <strong>-</strong> At Sunshine Enterprise USA (SEU), we understand and embrace these challenges.<br><br></li>
										<li> <strong>-</strong> Allow us to source and deliver the best candidate for your project, within your outlined timeline and budget. Our customized plans deliver superior results on your schedule.<br><br></li>
									</ol>
									<br></p>
									<p class="text-center"><strong class="text-dark">We have the time and talent…let us work for you!</strong></p>

							    </div>
								<div class="col-lg-6 col-md-12 col-sm-12">
										<!------------>
										
										<img class="card-img-top img-fluid mt-3 rounded" src="<?=ROUTE?>/assets/image/contract.png" alt="Card image cap">
										
										<!------------>
								</div>
							    </div>
							</div>
							<div class="tab-pane fade" id="pills-temporal" role="tabpanel" aria-labelledby="pills-contact-tab">
							    <div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
								<h3 class="tab-title">Temporal Staff</h3>

								<p class="text-justify">
								Our exceptional staffing success rate is a direct
								result of our refined recruiting techniques and
								quality management process.</p>
								<p class="text-justify">
								Risk minimization - a complimentary service we offer at Sunshine Enterprise USA (SEU).
								SEU will manage timesheets, payroll, insurance, and benefits for each candidate that we provide.
								 This, in turn, will allow you to focus your attention on candidate assessment – 
								 to determine whether he/she will be a good long-term solution for your organization.</p>
							    </div>
								<div class="col-lg-6 col-md-12 col-sm-12">
										<!------------>
										
										<img class="card-img-top img-fluid mt-3 rounded" src="<?=ROUTE?>/assets/image/temp.png" alt="Card image cap">
										
										<!------------>
								</div>
							    </div>
							 </div>
								 
								 </div>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>

<?php

include '../app/pages/includes/footer.php';

?>

<style>
  .form-control:focus{
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(247, 228, 130, 0.84);

  }

  html, body{
  height:100%
}
</style>

</html>