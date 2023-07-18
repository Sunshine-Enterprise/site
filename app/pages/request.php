<?php
if(!empty($_POST)){
  $errors = [];

// First Name---------------------------------------

  if(empty($_POST['name'])){
    $errors['name'] = "Please provide your company name";
  }

    // Phone ---------------------------------------
    
    if(empty($_POST['phone'])){
        $errors['phone'] = "Phone is required";
    }else
    
    if(strlen($_POST['phone']) < 10)
    {
        $errors['phone'] = "Phone must to have 10 caracters";
    }
    

    // Soliciting---------------------------------------
    
    if(empty($_POST['soliciting'])){
        $errors['soliciting'] = "Please provide your solicitings";
    }
    
// Email ---------------------------------------
  
    $query = "SELECT `id` from `users` WHERE `email` = :email limit 1";
    $email = query($query, ['email'=>$_POST['email']]);

    if(empty($_POST['email'])){
      $errors['email'] = "Email is required";
    }
    else
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
      $errors['email'] = "Email not valid";
    } 

 // Terms ---------------------------------------
   
    if(empty($_POST['terms'])){
        $errors['terms'] = "Please accept the terms ";
      }
  
// ! ---------------------------------------
// ! HERE ERRORS FINISH (VALIDATION) --------
// ! ---------------------------------------

  if(empty($errors))
  {

    $data = [];
    $data['name'] = $_POST['name'];
    $data['phone'] = $_POST['phone'];
    $data['soliciting'] = $_POST['soliciting'];
    $data['email'] = $_POST['email'];
    
    //here save the information about the requests on the folder
    //define which folder for requests
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    define("SMARTY_DIR", SITE_ROOT."/requests/");

    $targetFile = SMARTY_DIR.basename($_FILES['pdfFile']['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    
    //PDF size
    if($fileType != 'pdf' || $_FILES["pdfFile"]["size"] > 900000){
      echo 'is too much size 2MB';
    }
     else{

     if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {

      //insert into database
      $filename = $_FILES["pdfFile"]["name"];
      $folder = $targetFile;
      $date = date("Y-m-d");

      $data['filename'] = $filename;
      $data['folder'] = $folder;
      $data['date'] = $date;

      
      $query = "INSERT INTO `requests` (`name`, `phone`, `soliciting`, `email`, `filename`, `folder_path`, `date`) 
      VALUES (:name, :phone, :soliciting, :email, :filename, :folder, :date)";

      query($query, $data);
      $_SESSION['request'] ='<div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
      <strong>Dear '. $data['name'].':</strong> your request has been sent successfully.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      
      redirect('home');
      //SELECT * FROM `candidates` INNER JOIN industries on candidates.industry_id LIKE industries.IndustryId;
      }
    }

  }

}

?>
<?php

include '../app/pages/includes/header_general.php';

?>



<section class="advt-post bg-gray py-5">
  <div class="container">
    <form method="POST" enctype="multipart/form-data">
      

      <!-- seller-information start -->
      <fieldset class="border px-3 px-md-4 py-4 my-5 seller-information bg-gray">
        <div class="row">
          <div class="col-lg-12">
            <h3>How Can We Help Improve Your Company?</h3>
          </div>
          <div class="col-lg-6">
            <h6 class="font-weight-bold pt-4 pb-1">Company Name:</h6>
            <input value="<?=old_value('name')?>" type="text" placeholder="Company Name" class="form-control bg-white" name="name">
            <?php if(!empty($errors['name'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['name']?></div>
            <?php endif; ?>  

            <h6 class="font-weight-bold pt-4 pb-1">Phone Number:</h6>
            <input value="<?=old_value('phone')?>" type="text" placeholder="Phone Number" class="form-control bg-white" name="phone" >
            <?php if(!empty($errors['phone'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['phone']?></div>
            <?php endif; ?>
          </div>
          <div class="col-lg-6">
            <h6 class="font-weight-bold pt-4 pb-1">Company Email</h6>
            <input value="<?=old_value('email')?>" type="email" placeholder="Company Email" class="form-control bg-white" name="email">
            <?php if(!empty($errors['email'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['email']?></div>
            <?php endif; ?>
            <h6 class="font-weight-bold pt-4 pb-1">What do you need?</h6>
            <textarea cols="1" rows="3"  type="text"  class="form-control bg-white" name="soliciting">
            <?php
            if(isset($_POST['soliciting'])){
              old_value('soliciting');
            }
            ?>
            </textarea>
            <?php if(!empty($errors['soliciting'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['soliciting']?></div>
            <?php endif; ?>
          </div>
        </div>
      </fieldset>
      <!-- seller-information end-->

      <!-- ad-feature start -->
      <fieldset class="border border-gary px-3 px-md-4 py-4 mb-5">
        <div class="row">
          <div class="col-lg-12">
            <h3>Submit your request (Optional)</h3>

            <div class="choose-file text-center my-4 py-4 rounded bg-white">
              <label for="file-upload">
                <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                <span class="d-block">or</span>
                <span class="d-block btn bg-warning text-white my-3 select-files">Select files</span>
                <span class="d-block"><?php if (isset($fileType)){ echo $fileType;} else{ echo 'Select pdf file';}?>
              </span>
                <input type="file" class="form-control-file d-none" id="file-upload" id="pdfFile" name="pdfFile">
              </label>
            </div>
          </div>
        </div>
      </fieldset>
      <!-- ad-feature start -->

      <!-- submit button -->
      <div class="checkbox d-inline-flex">
        <input name="terms" type="checkbox" id="terms-&-condition" class="mt-1">
        <label for="terms-&-condition" class="ml-2 pt-3">Accept
          <span> <a class="text-warning" href="terms-condition.html">Terms & Condition </a></span>
        </label>
      </div>
      <?php if(!empty($errors['terms'])):?>
                <div class="text-danger mb-3"><?='* '.$errors['terms']?></div>
          <?php endif; ?>
      <button type="submit" class="btn btn-warning d-block mt-2">Request Staff</button>
    </form>
  </div>
</section>


<?php

include '../app/pages/includes/footer.php';

?>
