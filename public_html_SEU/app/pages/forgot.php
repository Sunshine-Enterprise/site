<?php
    $mode = 'enter_email';

    if(isset($_GET['mode'])){
      $mode = $_GET['mode'];

      if(count($_POST) > 0){

        switch ($mode) {
          case 'enter_email':
           $email =  $_POST['email'];
           $_SESSION['email'] = $email;
            //send_email($email);
            header("Location: forgot?mode=enter_code");
            die;
            break;

          case 'enter_code':
            header("Location: forgot?mode=enter_password");
            die;
            break;

          case 'enter_password':
            header("Location: login");
            die();
            break;
          
          default:
            # code...
            break;
        
      }
    } 
  }



?>

<?php

include '../app/pages/includes/header_general.php';
?>

<?php
switch ($mode) {
  case 'enter_email':
    ?>
      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 align-item-center">
              <div class="border rounded rounded-3">
              <h3 class="p-4 text-center rounded rounded-3 bg-light text-dark">Recover your password <i class="fa fa-sun-o text-warning" aria-hidden="true"></i></h3>
                <form method="post" action="forgot?mode=enter_email">
                  <fieldset class="p-4">
                  <div class="row">
                      <div class="col">
                      <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-user" ></i></div>
                        <input value="" class="form-control" type="text" placeholder="Write your email*" name="email" />
                      </div>  
                      </div>  
                    </div>
                  <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Submit</button>
                        <a target="_blank" class="mt-3 d-block text-warning" href="login"></a>
                        <a class="mt-3 d-inline-block text-warning" href="signup">Register Here</a><br>
                        <a class="mt-3 d-inline-block text-warning" href="login">Sign In</a>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
  <?php
    break;

  case 'enter_code':
    ?>
    <section class="login py-5 border-top-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 col-md-10 align-item-center">
            <div class="border">
              <h3 class="bg-warning p-4">Recover your password</h3>
              <form method="post" action="forgot?mode=enter_code">
                <fieldset class="p-4">
                <div class="row">
                    <div class="col">
                      <input value="" class="form-control mb-3" type="text" placeholder="Write your temporaly code*" name="email" />
                    </div>  
                  </div>
                <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="">Submit</button>
                      <a target="_blank"  class="mt-3 d-block text-warning" href="forgot"></a>
                      <a class="mt-3 d-inline-block text-warning" href="login">Sign In</a>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
    break;

  case 'enter_password':
    ?>
    <section class="login py-5 border-top-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 col-md-10 align-item-center">
            <div class="border">
              <h3 class="bg-warning p-4">Recover your password</h3>
              <form method="post" action="forgot?mode=enter_password">
                <fieldset class="p-4">
                <div class="row">
                    <div class="col">
                      <input value="" class="form-control mb-3" type="text" placeholder="Write your new password*" name="email" />
                    </div>  
                  </div>
                <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Submit</button>
                      <a target="_blank" class="mt-3 d-block text-warning" href="forgot"></a>
                      <a class="mt-3 d-inline-block text-warning" href="login">Sign In</a>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
    break;
  
  default:
    # code...
    break;

}

?>
 

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

</body>

<style>
  .form-control:focus{
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(247, 228, 130, 0.84);

  }

  input,
input::placeholder {
    font: 0.80rem/2 sans-serif;
}
</style>

</html>