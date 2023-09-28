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

?>

<!DOCTYPE html>

<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Sunshine</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

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
					<a class="navbar-brand" href="<?=ROUTE?>/admin/home">
						<img src="<?=ROUTE?>/assets/image/logos/logo1.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php 
              $user = user('id');
             // echo $user;
              $query = "SELECT * FROM users WHERE id = $user && data = 1";

              $profile = query($query);
                if($profile){ 
          ?>
						<ul class="navbar-nav ml-auto main-nav ">
            				<li class="nav-item dropdown">
								<a class="nav-link" href="about">Jobs</a>
							</li>
							<li class="nav-item dropdown dropdown-slide @@dashboard">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#!">Industries<span><i class="fa fa-angle-down"></i></span></a>
								<?php
									$query = "select * from industries where disabled = 1 order by IndustryId desc";
									$rows = query($query);
								?>
						<ul class="dropdown-menu">
                <?php
				if($rows):
				foreach($rows as $row):
                ?>
					<li><a class="dropdown-item @@dashboardPage" href="#"><i class="fa fa-industry"></i>  <?=$row['Nameindustry']?> </a></li>
                <?php 
				endforeach; 
				endif; 
                ?>
								</ul>
        
							</li>
							
              
              <li class="nav-item dropdown">
								<a class="nav-link" href="about">Aplications</a>
							</li>

              
              <li class="nav-item dropdown">
								<a class="nav-link" href="about">Profile</a>
							</li>
						</ul>
            <?php  }else{
             // echo 'no data';
            } ?>

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

