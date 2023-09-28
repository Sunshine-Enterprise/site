<?php

//Load Composer's autoloader
require '../vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
        //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();     
    
    $mail->SMTPDebug = 1;                                       //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //$mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->Host = 'smtp.office365.com';
    $mail->Username   = 'web@seu-usa.com';                     //SMTP username
    $mail->Password   = 'bjxkpsrhbxvgvbxm';                               //SMTP password
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port       = 587;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('web@seu-usa.com', 'SUNSHINE ENTERPRISE USA');
    $mail->addAddress('joselomanzano@hotmail.com', 'User');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "<h2>Welcome to Sunshine</h2>
    <h3>Dear user</h3><strong> thanks for register:</strong></br>
    <a href='https://seu-usa.com'>Verify you Account here !!</a> ";
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>