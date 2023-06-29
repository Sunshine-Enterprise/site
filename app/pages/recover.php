

<?php

include '../app/pages/includes/header_general.php';
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require '../vendor/autoload.php';

?>

<?php

function recover_password($email, $verify_token){
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
    $mail->setFrom('jose2002sebas@gmail.com');
    $mail->addAddress($email);     //Add a recipient
   $current_date = date("m/"."d/"."Y");

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Reset Password Notification";
    $mail->Body    = "<h2>Welcome to Sunshine</h2>
                      <h3>Dear user</h3><strong> your link is:</strong></br>
                      <a href='http://localhost/newpass?token=$verify_token&email=$email'>Update your password, here !!</a> ";
    $mail->AltBody = $current_date;
  
    $mail->send();
    //echo 'Message has been sent';
  
  }

?>


<?php
if(isset($_POST['resend'])){
    if(!empty(trim($_POST['email']))){
       // $email = $_POST['email'];

        $token = rand(11111,99999);

        $query = "SELECT `id` from `users` WHERE `email` = :email limit 1";
       
        $email = query($query, ['email'=>$_POST['email']]);
        
        if($email)
        {
            $get_email = $_POST['email'];
            $update_token = "UPDATE users set token = '$token' WHERE email = '$get_email' LIMIT 1";
            query($update_token);
            $_SESSION['recover'] = 'Your recover password has been send to your email'; 
            recover_password($get_email, $update_token);

        }else{
            $_SESSION['recover_bad'] ="The email doesn't exist";

        }

        /*if(mysqli_num_rows($query_run) > 0){
            
            $row = mysqli_fetch_array($query_run);
            
           // print_r($row);

            if($row['status'] == '0'){
                $name = $row['fname'];
                $email = $row['email'];
                $token = $row['token'];

                    resend_verify($name, $email, $token);
                    $_SESSION['resend'] = 'Your new verification has been sended'; 

            }else{
                $_SESSION['resend_bad'] = "You're already verify";
            }

        }else{
            $_SESSION['resend_bad'] = 'Register now';
        }*/
    }

}
    if(isset($_POST['resend']) && $_POST['email'] == '' ){

        $_SESSION['recover_bad'] ='Please enter the email';
    }
    //exit(0);


?>

      <section class="login py-5 border-top-1">
          <div class="container">
              <?php 
           if(isset($_SESSION['recover'])){
            ?>
            <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
            <strong>Dear User: </strong><?= $_SESSION['recover'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            
            <?php
            unset($_SESSION['recover']);
          }
          if(isset($_SESSION['recover_bad'])){
            ?>
            <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
            <strong>Dear User: </strong><?= $_SESSION['recover_bad'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            
            <?php
            unset($_SESSION['recover_bad']);

          }
        ?>
          <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 align-item-center">
              <div class="border rounded rounded-3">
              <h3 class="p-4 text-center rounded rounded-3 bg-light text-dark">Recover your password: <i class="fa fa-sun-o text-warning" aria-hidden="true"></i></h3>
                <form method="post">
                  <fieldset class="p-4">
                  <div class="row">
                      <div class="col">
                      <div class="input-group">
                  <div class="input-group-text border rounded-0 border-right-0"> <i class="fa fa-user" ></i></div>
                        <input value="" class="form-control" type="text" placeholder="Write your email*" name="email" />
                      </div>  
                      </div>  
                    </div>
                  <button type="submit" name="resend" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Submit</button>
                        <a target="_blank" class="mt-3 d-block text-warning" href="login"></a>
                        <a class="mt-3 d-inline-block text-warning" href="signup">Register Here</a><br>
                        <a class="mt-3 d-inline-block text-warning" href="login">Sign In</a><br>
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