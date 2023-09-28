
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<?php
//require_once('/app/core/functions.php');
function old_value($key, $default = '')
{
    if(!empty($_POST[$key])){
        return trim($_POST[$key]);
    }else{
        return $default;
    }

}

 if(!empty($_POST)){
  
 // print_r($_POST);

  $errors = [];
  
  if(empty($_POST['position'])){
    $errors['position'] = "* Position is required";
  }
  
  if(empty($_POST['subtitle'])){
    $errors['subtitle'] = "* Provide the briew version website";
  }

  if(empty($_POST['salary'])){
    $errors['salary'] = "* Salary is required";
  }

  if(($_POST['category'] == 'Choose...')){
    $errors['category'] = "* Category is required";
  }

  if($_POST['time']  == 'Choose...'){
    $errors['time'] = "* Time is required";
  }

  if(empty($_POST['city'])){
    $errors['city'] = "* City is required";
  }

  if($_POST['state']  == 'Choose...'){
    $errors['state'] = "* State is required";
  }

  if(empty($_POST['zipcode'])){
    $errors['zipcode'] = "* Zip-code is required";
  }

  if(empty($_POST['description'])){
    $errors['description'] = "* Description is required";
  }

  if(empty($_POST['shared'])){
    $errors['shared'] = "* Provide the website";
  }

  $slug = strtolower(($_POST['position'].rand(1000,9999)));
  //echo $slug;

  if(empty($errors))
  {
      $data = [];
      $date_current = date('Y-m-d');
      //$data['industry_id'] = $_POST['industry'];
      $data['position'] = $_POST['position'];
      $data['industry_id'] = 'construction';
      $data['description'] = $_POST['description'];
      $data['subtitle'] = $_POST['subtitle'];
      $data['time'] = $_POST['time'];
      $data['state'] = $_POST['state'];
      $data['city'] = $_POST['city'];
      $data['zipcode'] = $_POST['zipcode'];
      $data['salary'] = $_POST['salary'];
      $data['company_name'] = 'Sunshine Project Management';
      $data['positions']     = '';
      $data['date'] = $date_current;
      $data['status'] = 'active';
      $data['slug'] = $slug;
      $data['user_id'] = '';

    
    $query = "INSERT INTO `jobs` (`user_id`, `industry_id`, `job_name`, `description`, `content`,
     `time`, `state`, `city`, `zipcode`, `salary`, `company_name`, `positions`, `date`, `status`, `slug`)
    VALUES (:user_id, :industry_id, :position, :description, :subtitle, :time, :state, :city,
     :zipcode, :salary, :company_name, :positions, :date, :status, :slug );";
    
   // print_r($data);
    query($query, $data);
   // print_r($data);
      $_SESSION["success"] = 
       '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>'.$_POST['position'].'</strong> has been added successfully
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>';

  }


 }
?>





<div class="container">
    <div class="row">
       <div class="col-12 justify-content-center">
        <?php if(isset($query)){
              print($_SESSION['success']);}
        ?>
<form class="row g-3" method="post">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label fw-bold">Position: </label>
    <input type="text" value="<?=old_value('position')?>" class="form-control" name='position' id="inputEmail4">
    <?php if(!empty($errors['position'])):?>
    <div class="text-danger mb-3"><?=$errors['position']?></div>
    <?php endif ?>
  </div>
 
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label fw-bold">Salary:</label>
    <input type="text" value="<?=old_value('salary')?>" class="form-control" name='salary' id="inputEmail4">
    <?php if(!empty($errors['salary'])):?>
    <div class="text-danger mb-3"><?=$errors['salary']?></div>
    <?php endif ?>
  </div>
  
  <div class="col-12">
    <label for="inputAddress2" class="form-label fw-bold">Subtitle:</label>
    <textarea class="form-control" value="<?=old_value('subtitle')?>" name="subtitle" id="form6Example7" rows="4"></textarea>
    <?php if(!empty($errors['subtitle'])):?>
    <div class="text-danger mb-3"><?=$errors['subtitle']?></div>
    <?php endif ?>  </div>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label fw-bold">Category: </label>
    <select id="inputState" value="<?=old_value('category')?>" class="form-select" name='category'>
      <option selected>Choose...</option>
      <option>Concrete</option>
      <option>Masonry</option>
      <option>Demolition</option>
      <option>OutDoor Design</option>
      <option>Landscaping</option>
    </select>
    <?php if(!empty($errors['category'])):?>
    <div class="text-danger mb-3"><?=$errors['category']?></div>
    <?php endif ?>
  </div>


  <div class="col-md-6">
    <label for="inputPassword4" class="form-label fw-bold">Time: </label>
    <select value="<?=old_value('time')?>" id="inputState" class="form-select" name="time">
      <option selected>Choose...</option>
      <option>Full-time</option>
      <option>Part-time</option>
      <option>Contract</option>
      <option>Temporal</option>
    </select>
    <?php if(!empty($errors['time'])):?>
    <div class="text-danger mb-3"><?=$errors['time']?></div>
    <?php endif ?>
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label fw-bold">City:</label>
    <input value="<?=old_value('city')?>" type="text" class="form-control" id="inputCity" name="city">
    <?php if(!empty($errors['city'])):?>
    <div class="text-danger mb-3"><?=$errors['city']?></div>
    <?php endif ?>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label fw-bold">State:</label>
    <select value="<?=old_value('state')?>" id="inputState" class="form-select" name="state">
      <option selected>Choose...</option>
      <option>FL</option>
      <option>CA</option>
      <option>SC</option>
      <option>NC</option>
    </select>
    <?php if(!empty($errors['state'])):?>
    <div class="text-danger mb-3"><?=$errors['state']?></div>
    <?php endif ?>

    
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label fw-bold">Zip: </label>
    <input value="<?=old_value('zipcode')?>" type="text" class="form-control" name="zipcode" id="inputZip">
    <?php if(!empty($errors['zipcode'])):?>
    <div class="text-danger mb-3"><?=$errors['zipcode']?></div>
    <?php endif ?>    
  </div>

  <div class="col-12">
    <label for="inputAddress2" class="form-label fw-bold">Full Description:</label>
    <textarea value="<?=old_value('description')?>" class="form-control" name="description" id="form6Example7" rows="4"></textarea>
    <?php if(!empty($errors['description'])):?>
    <div class="text-danger mb-3"><?=$errors['description']?></div>
    <?php endif ?>  
    </div>
  
    <div class="col-12">
    <label for="inputAddress2" class="form-label fw-bold">Shared Information:</label>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="seu" id="defaultCheck1" name="shared">
      <label class="form-check-label" for="defaultCheck1">seu-usa.com</label>
    </div>

    
    <div class="form-check pt-2">
      <input class="form-check-input" type="checkbox" value="spm" id="defaultCheck1" name="shared">
      <label class="form-check-label" for="defaultCheck1">spmconstructions.com</label>
    </div>

    <?php if(!empty($errors['shared'])):?>
    <div class="text-danger mb-3"><?=$errors['shared']?></div>
    <?php endif ?>

  </div>

  <div class="col-6">
    <button type="submit" class="btn btn-warning fw-bold">Create</button>
    <button type="button" class="btn btn-secondary fw-bold"><a href="admin-jobs" class="text-light p-3">Go Back</a></button>
  </div>

</form>

</div>
</div>
</div>