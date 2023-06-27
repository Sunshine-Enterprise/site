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

}

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

							<?php
              echo '<pre>';
              print_r($_GET['url']);
              ?>
							
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
<!-- Modal -->
<div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img src="<?=ROUTE?>/assets/images/account/Account1.png" class="img-fluid mb-2" alt="">
        <h6 class="py-2">Are you sure you want to delete your account?</h6>
        <p>Do you really want to delete these records? This process cannot be undone.</p>
        <textarea class="form-control" name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
      </div>
      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
        </div>
      </div>
      <div class="col-lg-8">
        <!-- Dashboard Links -->
        <?php 
        $id = user('id');

        $query = "Select role FROM users where id = $id";
        $permission = query_row($query);
        if($permission['role'] == 'admin'){
        ?>
        <div class="widget user-dashboard-menu">
          <ul>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
              <li><a href="<?=ROUTE?>/admin/users"><i class="fa fa-user-circle"></i> Users</a></li>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
              <li ><a href="<?=ROUTE?>/admin/jobs"><i class="fa fa-bullhorn"></i> My Jobs</a></li>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
              <li><a href="<?=ROUTE?>/admin/employeers"><i class="fa fa-users"></i> Employeers</a></li>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
              <li><a href="<?=ROUTE?>/admin/industries"><i class="fa fa-sitemap"></i>Industries</a></li>
              </div>
              
              <div class="col-lg-4 col-md-4 col-sm-12">
              <li><a href="<?=ROUTE?>/admin/requests"><i class="fa fa-bolt"></i>Talent Requests</a></li>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
              <li><a href="<?=ROUTE?>/admin/visits"><i class="fa fa-male" aria-hidden="true"></i>Visits</a></li>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
              <li><a href="<?=ROUTE?>/admin/aplications"><i class="fa fa-bolt"></i>Aplications</a></li>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-12">
              <li><a href="<?=ROUTE?>/admin/notifications"><i class="fa fa-phone"></i>Notifications</a></li>
              </div>
            </div>
            <!-- <li><a href="#!" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-wrench"></i>Delete Account</a></li> -->
          </ul>
        </div>
        <?php } ?>

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