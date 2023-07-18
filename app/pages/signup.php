<?php
use PHPMailer\PHPMailer\PHPMailer;


//Load Composer's autoloader
require '../vendor/autoload.php';

function send_email($name, $email, $verify_token){
  $mail = new PHPMailer(true);

 // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'jose2002sebas@gmail.com';                     //SMTP username
  $mail->Password   = 'jtxrfnkainowjfzd';                               //SMTP password
  $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('jose2002sebas@gmail.com', $name);
  $mail->addAddress($email);     //Add a recipient
 
  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Email Verification Token';
  $mail->Body    = "<h2>Welcome to Sunshine</h2>
                    <h3>Dear user</h3><strong> thanks for register:</strong></br>
                    <a href='https://seu-usa.com/verify?token=$verify_token'>Verify you Account here !!</a> ";
  $mail->AltBody = 'Year 2023';

  $mail->send();
  //echo 'Message has been sent';

}

?>



<?php
if(!empty($_POST)){
  $errors = [];

// First Name---------------------------------------

  if(empty($_POST['fname'])){
    $errors['fname'] = "Please provide your first name";
  }else
    if(!preg_match("/^[a-zA-Z]+$/", $_POST['fname']))
    {
      $errors['fname'] = "First name can only have letters and no spaces";
    }

// Last Name---------------------------------------

    if(empty($_POST['lname'])){
      $errors['lname'] = "Please provide your last name";
    }else
      if(!preg_match("/^[a-zA-Z]+$/", $_POST['lname']))
      {
        $errors['lname'] = "Last Name can only have letters and no spaces";
      }

// Password 1 ---------------------------------------

    if(empty($_POST['password1'])){
      $errors['password1'] = "Password is required";
    }else

    if(strlen($_POST['password1']) < 8)
    {
      $errors['password1'] = "Password must to be 8 caracters or more";
    }else

    // validate 2 pass
    if(($_POST['password1']) !== $_POST['password2'])
    {
      $errors['password1'] = "Passwords do not match";
    }
    
// Phone ---------------------------------------

    if(empty($_POST['phone'])){
      $errors['phone'] = "Phone is required";
    }else

    if(strlen($_POST['phone']) < 10)
    {
      $errors['phone'] = "Phone must to have 10 caracters";
    }

    
// Email ---------------------------------------
    //here confirm if this email is already in use
  
    $query = "SELECT `id` from `users` WHERE `email` = :email limit 1";
    $email = query($query, ['email'=>$_POST['email']]);

    if(empty($_POST['email'])){
      $errors['email'] = "Email is required";
    }
    else
    if($email)
    {
      $errors['email'] = "That email is already in use";
    }else
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
      $errors['email'] = "Email not valid";
    } 
    

// State ---------------------------------------

    if(empty($_POST['state'])){
      $errors['state'] = "State is required";
    }else

// City ---------------------------------------

    if(empty($_POST['city'])){
      $errors['city'] = "City is required";
    }else


// Zipcode ---------------------------------------

    if(empty($_POST['zipcode'])){
      $errors['zipcode'] = "ZipCode is required";
    }else

    if(strlen($_POST['zipcode']) < 5)
    {
      $errors['zipcode'] = "ZipCode must to have 5 caracters";
    }


// Terms ---------------------------------------

if(empty($_POST['terms'])){
  $errors['terms'] = "Please accept the terms ";
}
  
  if(empty($errors))
  {
    $date_current = date('Y-m-d');

    $data = [];
    $data['email'] = $_POST['email'];
    $data['password'] = password_hash($_POST['password1'], PASSWORD_DEFAULT); 
    $data['fname'] = $_POST['fname'];
    $data['lname'] = $_POST['lname'];
    $data['phone'] = $_POST['phone'];
    $data['state'] = $_POST['state'];
    $data['city'] = $_POST['city'];
    $data['zipcode'] = $_POST['zipcode'];
    $data['date'] = $date_current;
    $data['role'] = "user";

    $verify_token = md5(rand(11111,99999));
    $data['token'] = $verify_token;

    
    $query = "INSERT INTO `users` (`email`, `password`, `fname`, `lname`, `phone`, `state`, `city`, `zipcode`, `date`, `role`, `token`) 
    VALUES (:email, :password, :fname, :lname, :phone, :state, :city, :zipcode, :date, :role, :token)";

query($query, $data);

//function Send Email Token
send_email($data['fname'], $data['email'], $data['token']);


$_SESSION['verify'] ='<div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
<strong>Welcome: </strong>'.$data['fname'].' '.$data['lname'].' check your email for continue
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';

redirect('login');
  }

}

?>

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
					<a class="navbar-brand" href="<?=ROUTE?>/home?>">
						<img src="<?=ROUTE?>/assets/image/logos/logo1.png" alt="">
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

								<li><a class="dropdown-item @@dashboardPage" href="<?=ROUTE?>/visit">For Visitors</a></li>
									<li><a class="dropdown-item @@dashboardMyAds" href="<?=ROUTE?>/request">Make a request</a></li>

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
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>

<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-10 align-item-center">
        <div class="border rounded rounded-3">
        <h3 class="p-4 text-center rounded rounded-3 bg-light text-dark">Register Here <i class="fa fa-sun-o text-warning" aria-hidden="true"></i></h3>

          <!---------------------------->
          <!-------ALERT SECTION-------->
          <!---------------------------->
         <?php if(!empty($errors)):?>
          <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
          <strong>Please:</strong> Review your information
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
          <!---------------------------->
          <!------ALERT SECTION--------->
          <!---------------------------->


          <form method="post">
            <fieldset class="p-4">
            <div class="row mb-3">
          <!---First Name---------------------------->

                <div class="col">
                  <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-user-circle" ></i></div>
                  <input name="fname" value="<?=old_value('fname')?>" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="First Name*" />
                  <?php if(!empty($errors['fname'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['fname']?></div>
                  <?php endif; ?>
                </div>

                </div>

          <!---Last Name--------------------------->
                      
                <div class="col">
                <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-user-circle" ></i></div>
                <input value="<?=old_value('lname')?>" type="text" class="form-control" placeholder="Last Name*" name="lname" >
                <?php if(!empty($errors['lname'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['lname']?></div>
                <?php endif; ?>  
              </div>
            </div>
            </div>

                <div class="row mb-3">
          <!---Password--------------------------->

                <div class="col">
                <div class="input-group">
                      <input value="<?=old_value('password1')?>" class="form-control" type="password" placeholder="Password*" name="password1" id='password1'>
                      <div class="input-group-text border rounded-0 border-left-0" >
                        <i class="fa fa-eye-slash" onclick="pass()" id="icon1" class=''></i>
                      </div>
                      <?php if(!empty($errors['password1'])):?>
                      <div class="text-danger mb-3"><?='* '.$errors['password1']?></div>
                      <?php endif; ?>
                      </div> 
                      
                  </div> 
                <div class="col">
                <div class="input-group">
                    <input value="<?=old_value('password2')?>" class="form-control" type="password" placeholder="Confirm your Password*" name="password2" id='password2'>
                    <div class="input-group-text border rounded-0 border-left-0" >
                      <i class="fa fa-eye" onclick="pass()" id="icon2"></i>
                    </div>
                  </div>

                  <?php if(!empty($errors['password2'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['password2']?></div>
                  <?php endif; ?>
                  </div>

              </div>

              <div class="row  mb-3">
          <!---Phone--------------------------->
                <div class="col">
                <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-phone-square" ></i></div>
                  <input onkeydown="phoneNumberFormatter()" id="phone-number" value="<?=old_value('phone')?>" 
                  class="form-control" placeholder="Phone Number*" name="phone"/>
                </div>  
                <?php if(!empty($errors['phone'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['phone']?></div>
                <?php endif; ?>
                </div>  
              </div>
            
              <div class="row mb-3">
          <!---Email--------------------------->
              <div class="col"> 
              <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-envelope" ></i></div>
                  <input value="<?=old_value('email')?>" class="form-control" type="text" placeholder="Email*" name="email">  
                </div>  
                <?php if(!empty($errors['email'])):?>
                <div class="text-danger mb-3">
                    <?='* '.$errors['email']?>
                </div>
                <?php endif; ?> 
              </div>       
              </div>       
            
                 <div class="row">
          <!---State--------------------------->
                <div class="col pr-2">
                    <input value="<?=old_value('state')?>" class="form-control mb" type="text" placeholder="State*" name="state">
                    <?php if(!empty($errors['state'])):?>
                      <div class="text-danger mb-3"><?='* '.$errors['state']?></div>
                    <?php endif; ?>
                </div> 
          <!---City--------------------------->                    
                <div class="col px-0">
                <input value="<?=old_value('city')?>" class="form-control" type="text" placeholder="City*" name="city">
                      <?php if(!empty($errors['city'])):?>
                        <div class="text-danger mb-3">
                          <?='* '.$errors['city']?>
                        </div>
                      <?php endif; ?> 
                </div> 
          <!---ZipCode--------------------------->                  
                <div class="col pl-2">
                    <input value="<?=old_value('zipcode')?>" class="form-control" type="text" placeholder="ZipCode*" name="zipcode">
                      <?php if(!empty($errors['zipcode'])):?>
                          <div class="text-danger mb-3">
                            <?='* '.$errors['zipcode']?>
                          </div>
                        <?php endif; ?> 
                </div>  
            </div>

            <div class="row">
          <!---Terms--------------------------->                  
              <div class="col">
                  <div class="loggedin-forgot d-inline-flex my-3">
                    <input <?=old_checked('terms')?> name="terms" type="checkbox" id="registering" class="mt-1">
                    <label for="registering" class="px-2 pt-3">By registering, you accept our <a class="text-information font-weight-bold" href="terms">Terms & Conditions</a>                   
                  </div>
                  <?php if(!empty($errors['terms'])):?>
                    <div class="text-danger mb-3">
                      <?='* '.$errors['terms']?>
                    </div>
                  <?php endif; ?>                  
              </div>
            </div>

              <button type="submit" class="btn btn-warning font-weight-bold mt-1" data-toggle="modal" data-target="#CreateAccount">Register</button><br> 
                  <a class="mt-3 d-inline-block text-warning" href="login">Sign In</a>
                  <a class="mt-3 d-block text-warning " href="resend">Resend Verification</a></label>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
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
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
        <div class="block">
          <h4>Our Services</h4>
          <ul>
            <li><a href="explore">Jobs</a></li>
            <li><a href="blog">Blog</a></li>
            <li><a href="request">Request Talent</a></li>

          </ul>
        </div>
      </div>
    
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
      <div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0 ">
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
<script src="<?=ROUTE?>/assets/js/javascript.js"></script>


<script>

var x;
function pass(){

  if(x == 1){
    document.getElementById('password1').type='password';


    x=0;
  }else{
    document.getElementById('password1').type='text';

    x=1;
  }
}


</script>


</body>

<style>
  .form-control:focus{
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(247, 228, 130, 0.84);

  }

  input,
input::placeholder {
    font: 0.70rem/2 sans-serif;
}
</style>

</html>