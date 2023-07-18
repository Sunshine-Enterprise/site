<?php

include '../app/pages/includes/header_general.php';
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require '../vendor/autoload.php';

?>

<?php
if(isset($_GET['token'])){
  
  if(!empty($_POST)){
    $errors = [];
    if(empty($_POST['password1'])){
      $errors['password1'] = "Password is required";
    }else

    if(empty($_POST['password2'])){
      $errors['password1'] = "Confirm your password is required";
    }else

    if(strlen($_POST['password1']) < 8)
    {
      $errors['password1'] = "Password must to be 8 caracters or more";
    }else
    
    if(strlen($_POST['password2']) < 8)
    {
      $errors['password2'] = "Confirm your password must to be 8 caracters or more";
    }else

    // validate 2 pass
    if(($_POST['password1']) !== $_POST['password2'])
    {
      $errors['password1'] = "Passwords do not match";
    }else
   
    if(($_POST['password2']) !== $_POST['password1'])
    {
      $errors['password2'] = "Passwords do not match";
    }

    if(empty($errors) ){
    
      //string
      $password1 = $_POST['password1'];
      $token =  $_GET['token'];
    
      //array
      $data = [];
      $data['password1'] = password_hash($_POST['password1'], PASSWORD_DEFAULT);
      $data['validate'] = $_POST['validate'];
    
      $query = "UPDATE users SET password = :password1 WHERE token = :validate";
      
      query($query, $data);

      $_SESSION['newpass'] = 
      '
      <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
          <strong>Dear user: </strong> your password hav been changed.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      ';
      redirect('login');

  }
  }

}else{
    $_SESSION['status'] = "Not allow";
        print "<script> window.location = 'http://localhost/login'; </script>" ;
}

?>


<section class="login py-5 border-top-1">
          <div class="container">
              <?php 
           if(isset($_SESSION['validate_pass'])){
            ?>
            <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
            <strong>Dear User: 1</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            
            <?php
          }
        ?>
          <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 align-item-center">
              <div class="border rounded rounded-3">
              <h3 class="p-4 text-center rounded rounded-3 bg-light text-dark">Recover your password: <i class="fa fa-sun-o text-warning" aria-hidden="true"></i></h3>
                <form method="post">
                  <fieldset class="p-4">
                    <div class="row my-3">
                      <div class="col">
                        <input type="hidden" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>" class="form-control" name="validate" />
                      <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-lock" ></i></div>
                        <input value="" class="form-control" type="password" placeholder="Enter your new password*" name="password1" />
                      </div>  
                      <?php if(!empty($errors['password1'])):?>
                         <div class="text-danger mb-3"><?='* '.$errors['password1']?></div>
                      <?php endif; ?>
                    </div>  
                  </div>
                  <div class="row">
                      <div class="col">
                      <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-lock" ></i></div>
                        <input value="" class="form-control" type="password" placeholder="Confirm your password*" name="password2" />
                      </div>  
                      <?php if(!empty($errors['password2'])):?>
                         <div class="text-danger mb-3"><?='* '.$errors['password2']?></div>
                      <?php endif; ?>
                      </div>  
                    </div>
                  <button type="submit" name="update_pass" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal">Update</button>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php

include '../app/pages/includes/footer.php';

?>