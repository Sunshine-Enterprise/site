<?php


    if (isset($_POST['submit'])) {
      $errors = [];
      
      if(empty($_POST['industries'])){
        $errors['industries'] = "Please select at least one";
      }
      if(empty($_FILES['pdfFile']) || empty($_POST['pdfFile'])){
        $errors['pdfFile'] = "Please provide your resume";
      }
    }
        

    $data = [];

    echo "<br>";
    if(isset($_POST['industries']) & isset($_FILES['pdfFile'])){
         $data = [];
     
       
           // echo $check;
            //app user var
            $user = user('id');
            
            $data['user'] = user('id');
           
            // $industries = $data['industries'];
            $data['date']= date("Y-m-d");
            $id = user('id'); 

            //here save the information about the requests on the folder
            //define which folder for requests
            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            define("SMARTY_DIR", SITE_ROOT."\candidates/");

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

              $data['filename'] = $filename;
              $data['file_path'] = $folder;
              $industries = $_POST['industries'];


               if ($industries > 1) {
                
                $num = count($industries);
              
              //  echo $num;
                //print_r($industries);

                for ($i=0; $i< $num; $i++) { 
                  
                  $industryID = $industries[$i];
                  echo $industryID;
                  $query = "INSERT INTO `candidates` (`user_id`, `file_path`, `industry_id`, `resume`, `date` ) 
                  VALUES (:user, :file_path, $industryID, :filename, :date )";
                  echo '<pre>';
                  print_r($query);
                  echo '</pre>';
                //die;
                query($query, $data);
                }

               }else{                 
                
                  $data['industries'] = $_POST['industries'];


                $query = "INSERT INTO `candidates` (`user_id`, `file_path`, `industry_id`, `resume`, `date` ) 
                 VALUES (:user, :file_path, :industries, :filename, :date )";
                 query($query, $data);
               } 
               


              $query1 = "UPDATE users SET `data` = '1' WHERE id = $id";
              query($query1);
              redirect('user');
               
            }
          }
            
            
             
    }

  ?>
<div class="container">
  <div class="row">
      <div class="col-12">

<div class="row row-cols-1 row-cols-md-1 g-6">
<form method="post" enctype="multipart/form-data" >
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
            <h2 class="card-title">Configure your profile:  <i class="fa fa-user float-right text-dark bg-warning rounded-circle px-2 py-1" aria-hidden="true"></i></h2>
            <?php echo user('fname').' '.user('lname');?>
        <p class="card-text">
        </p>
      </div>
    </div>
  </div>

  <div class="col mt-3">
    <div class="card h-100">
      <div class="card-body">
            <h2 class="card-title ">Your Resume:  <i class="fa fa-folder float-right text-dark bg-warning rounded-circle px-2 py-2" aria-hidden="true"></i></h2>
            </br>
              <div class="mb-3">
                <input class="form-control form-control-sm" name="pdfFile" id="pdfFile" type="file">
                <?php if(!empty($errors['pdfFile'])):?>
                        <div class="text-danger mb-3"><?='* '.$errors['pdfFile']?></div>
                    <?php endif; ?>
              </div>
    </br>
    
    <h2 class="card-title ">Your industries:  <i class="fa fa-industry float-right text-dark bg-warning rounded-circle px-2 py-2" aria-hidden="true"></i></h2>
                <?php
                    $query = "select * from industries where disabled = 1 order by IndustryId";
                    $rows = query($query);
                ?>

                <div class="card-body bg-white">
                    <div class="form-check">
                        
                <?php
                    if($rows):
                  foreach($rows as $row):
                ?>
                        <input name="industries[]" class="form-check-input" type="checkbox" value="<?=$row['IndustryId']?>" id="industries">
                        <label class="form-check-label h5 fw-bolder text-dark" for="industries">
                        <?=$row['Nameindustry']?>
                        </label>
                        
                    </br>
                    <?php 
                  endforeach; 
                  endif; 
                ?>                       
                    </div>
                    <?php if(!empty($errors['industries'])):?>
                        <div class="text-danger mb-3"><?='* '.$errors['industries']?></div>
                    <?php endif; ?>  
                </div>
                <button type="submit" name="submit" class="btn btn-warning font-weight-bold mt-1" data-toggle="modal" data-target="#CreateAccount">Create my profile</button><br> 

      </div>
    </div>
  </div>

</form>
</div>
<br>


<!--------------------------------------------------------------------------->
<div class="row row-cols-1 row-cols-md-2 g-6">

<br>

</div>
</div>
</div>