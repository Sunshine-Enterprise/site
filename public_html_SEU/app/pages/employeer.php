<?php
if(!login_status())
{
//  redirect('login');
header('Location: /login' );
}

  //define as a root page
  $section = $url[1] ?? 'home';
          
  //define the new action pages on Array
  $action = $url[2] ?? 'view';
  
  // id for edit and delete
  $id = $url[3] ?? '0';

  $filename = "../app/pages/admin/".$section.".php";
  if(!file_exists($filename)){
    $filename = "../app/pages/admin/404.php";
  }

  // copy signup validation
  //----------------------------
/*
if($section == 'users'){
require_once '../app/pages/admin/users-controller.php';

}else
if($section =='industries'){
  require_once '../app/pages/admin/industries-controller.php';

}else
if($section =='jobs'){
  require_once '../app/pages/admin/jobs-controller.php';

}
if($section =='download'){
  require_once '../app/pages/admin/download.php';

}if($section =='team'){
  require_once '../app/pages/admin/team-controller.php';

}*/

?>

<!DOCTYPE html>

<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Sunshine</title>

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
	<!-----CALL TO SUMMER NOTE--------->
  <link href="<?=ROUTE?>/assets/summernote/summernote-lite.min.css" rel="stylesheet">

</head>

<body class="body-wrapper">
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="<?=ROUTE?>/logout">
						<img src="<?=ROUTE?>/assets/image/logos/logo1.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">							
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link login-button" href="<?=ROUTE?>/logout">Log out</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>

<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-lg-4">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <img src="<?=ROUTE?>/assets/image/user_profile.png" alt="" class="rounded-circle">
            </div>
            <!-- User Name -->
            <h5 class="text-center"><?php echo user('fname').' '.user('lname');?></h5>
            <p> <?php echo date("Y/m/d") ?></p>
            <a  class="btn btn-main-sm" >Sunshine Enterprise USA</a>
          </div>
          
          <!-- delete-account modal -->
          <!-- delete account popup modal start-->
        </div>
      </div>
      <div class="col-lg-8">
        <!-- Dashboard Links -->


        <div class="widget user-dashboard-menu">
        <?php
        
            require_once $filename;
          
        ?>
        </div>
      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>

<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="<?=ROUTE?>/assets/image/logos/logo-dark1.png" alt="logo">
          <!-- description -->
          <p class="alt-color">500 Winderley Place, Suite 218, Maitland, FL 32751</p>
        </div>
      </div>
      <?php if(login_status()):?>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
        <div class="block">
          <h4>Our Services</h4>
          <ul>
            <li><a href="<?=ROUTE?>/admin/users">Users</a></li>
            <li><a href="<?=ROUTE?>/admin/Industries">Industries</a></li>
            <li><a href="<?=ROUTE?>/admin/jobs">Jobs</a></li>

          </ul>
        </div>
      </div>
      <div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
        <div class="block">
          <h4>User Areas</h4>
          <ul>
            <li><a href="<?=ROUTE?>/admin/aplications">Aplications</a></li>
            <li><a href="<?=ROUTE?>/admin/profile">Profile</a></li>
          </ul>
        </div>
      </div>
    <?php  endif;?>
      <div class="col-lg-4 col-md-7">
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
        <!-- Copyright -->
        <div class="copyright">
        <p>Copyright &copy; <?php echo date("Y")?> Designed & Developed by <a class="text-white" href="#">Sunshine</a></p>
        </div>
      </div>
      <div class="col-lg-6">
        <!-- Social Icons -->
        <ul class="social-media-icons text-center text-lg-right">
          <li><a class="fa fa-linkedin" href=""></a></li>
          <li><a class="fa fa-facebook" href=""></a></li>
          <li><a class="fa fa-twitter" href=""></a></li>
          <li><a class="fa fa-instagram" href=""></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="fa fa-angle-up"></i>
  </div>
</footer>

<!-- 
Essential Scripts
=====================================-->
<script src="<?=ROUTE?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?=ROUTE?>/assets/plugins/bootstrap/popper.min.js"></script>
<script src="<?=ROUTE?>/assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?=ROUTE?>/assets/plugins/bootstrap/bootstrap-slider.js"></script>
<script src="<?=ROUTE?>/assets/plugins/tether/js/tether.min.js"></script>
<script src="<?=ROUTE?>/assets/plugins/raty/jquery.raty-fa.js"></script>
<script src="<?=ROUTE?>/assets/plugins/slick/slick.min.js"></script>
<script src="<?=ROUTE?>/assets/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<!-- google map -->
<script src="<?=ROUTE?>/assets/plugins/google-map/map.js" defer></script>

<script src="<?=ROUTE?>/assets/js/script.js"></script>
<script src="<?=ROUTE?>/assets/summernote/summernote-lite.min.js"></script>

<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>

</body>

<style>/:focus{
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(247, 228, 130, 0.84);

  }
</style>

</html>