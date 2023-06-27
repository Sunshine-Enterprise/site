<?php


if(!empty($_POST))
{
  $errors = [];
  $_SESSION['login'] ='<div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
  <strong>Welcome Again</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>';
  $query = "SELECT * FROM users where email = :email && status = 1 limit 1";

  
$row = query($query, ['email'=>$_POST['email']]);

  if($row)
  {
    $data = [];
    if(password_verify($_POST['password'], $row[0]['password']))
    {
       authenticate($row[0]);

      if($row[0]['role'] == 'admin'){
        redirect("admin");
      }
       else if($row[0]['role'] == 'user'){
        redirect("user");
  
      }else if($row[0]['role'] == 'employeer'){
        redirect("employeer");
      }
      //   header('Location: /admin/' );

      }else{
        $errors['password'] = "Please verify your email";
      }

  }else{
    $errors['email'] =  "Please verify your password";
  }
}
?>

<?php

include '../app/pages/includes/header_general.php';
?>

<div class="container">


<section class="login py-5 border-top-1">
    <div class="row justify-content-center">   
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border rounded rounded-3">
        <?php 
           if(isset($_SESSION['verify'])){
            echo $_SESSION['verify'];
            unset($_SESSION['verify']);
          }
        ?>
          <h3 class="p-4 text-center rounded rounded-3 bg-light text-dark">SUNSHINE ENTERPRISE USA <i class="fa fa-sun-o text-warning" aria-hidden="true"></i></h3>
          <!---------------------------->
          <!-------ALERT SECTION-------->
          <!---------------------------->
         <?php if(!empty($errors)):?>
          <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
          <strong>Please:</strong> Review your credentials
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
          
          <!---------------------------->
          <!------ALERT SECTION--------->
          <!---------------------------->
          <form action="" method="post">
            <fieldset class="p-4">
              <div class="row mb-3">
                <div class="col"> 
                  <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-user" ></i></div>
                  <input value="<?=old_value('email')?>" class="form-control" type="text" placeholder="Email" name="email" >
                </div>
                </div>
              </div>
              <!--------------------------------------------->
              <div class="row mb-3">
                <div class="col">
                <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-lock" ></i></div>                  
              <input value="<?=old_value('password')?>" class="form-control" type="password" placeholder="Password" name="password">
            </div>
              </div>
              </div>
              <button type="submit" class="btn btn-warning font-weight-bold mt-3">Log in</button>
              <a class="mt-3 d-block text-warning" href="forgot">Forget Password?</a>
              <a class="mt-3 d-inline-block text-warning" href="signup">Register Now</a>
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

</body>

<style>
  .form-control:focus{
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(247, 228, 130, 0.84);

  }

  h3{
    font-family: 'Open Sans', sans-serif;
    
  }
</style>

</html>