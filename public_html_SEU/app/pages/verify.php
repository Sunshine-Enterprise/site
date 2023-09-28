<?php

include '../app/pages/includes/header_general.php';
//print_r($_GET);
?>


<?php
if(isset($_GET['token'])){
$token = $_GET['token'];
$query = "SELECT token, status FROM users WHERE token='$token' LIMIT 1";
$numcol = coneccionMysql($query);

//just define result token

$query2 = "SELECT token, status FROM users WHERE token='$token' LIMIT 1";
$result = query($query2);

if(mysqli_num_rows($numcol) > 0){
 
$column = mysqli_fetch_array($numcol);
if($column['status'] == '0'){
    $clicked_token = $column['token'];
    $query = "UPDATE users SET status = 1 WHERE token = '$clicked_token' LIMIT 1"; 
    coneccionMysql($query);
$change = coneccionMysql($query);
    if($change){
       // echo 'Your account is verified';
        //redirect();
    }else{
      //  echo 'Verification failed';
    }
}else{
   // echo'no es 0';
}
}else{
  //  echo 'adios';
}




}else{
    $_SESSION['status'] = "Not allow";
        print "<script> window.location = 'http://localhost/login'; </script>" ;
}

?>




<section class="login py-5 border-top-1">
<div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
          <div class="border">
              <h3 class="bg-gray p-4 bg-warning h5">Welcome to Sunshine Enterprise</h3>
              <form action="" method="post">
                  <fieldset class="p-4">

                  <div class="alert alert-success" role="alert">
                  <strong>Congratulations:</strong> your account has been verified. <a href="login" class="alert-link"></a>
</div>

              <a class="mt-3 d-block text-warning" href="login">Login</a>
              <a class="mt-3 d-inline-block text-warning" href="register">Register Now</a>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
</section>





<?php

include '../app/pages/includes/footer.php';

?>