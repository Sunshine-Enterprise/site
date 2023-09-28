

<?php

include '../app/pages/includes/header_general.php';
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require '../vendor/autoload.php';

?>

<?php

function resend_verify($name, $email, $verify_token){
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
   $current_date = date("m/"."d/"."Y");

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Resend - Verification Token";
    $mail->Body    = "<h2>Welcome to Sunshine</h2>
                      <h3>Dear user</h3><strong> thanks for register, your new link is:</strong></br>
                      <a href='http://localhost/verify?token=$verify_token'>Verify you Account here !!</a> ";
    $mail->AltBody = $current_date;
  
    $mail->send();
    //echo 'Message has been sent';
  
  }

?>




<?php
if(isset($_POST['verify'])){
    if(!empty(trim($_POST['email']))){
        $email = $_POST['email'];
        
        //$email = query($query, ['email'=>$_POST['email']]);

        $query = "SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1";
        
        $query_run = coneccionMysql($query);
        
        if(mysqli_num_rows($query_run) > 0){
            
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
        }
    }

}else{
    $_SESSION['resend_bad'] ='Please enter the email';
    //exit(0);
}

?>

      <section class="login py-5 border-top-1">
        <div class="container">
      <?php 
           if(isset($_SESSION['resend'])){
            ?>
            <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
            <strong>Dear User: </strong><?= $_SESSION['resend'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            
            <?php
            unset($_SESSION['resend']);
          }
        ?>
          <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 align-item-center">
              <div class="border rounded rounded-3">
              <h3 class="p-4 text-center rounded rounded-3 bg-light text-dark">Resend your verification token <i class="fa fa-sun-o text-warning" aria-hidden="true"></i></h3>
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
                  <button type="submit" name="verify" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Submit</button>
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