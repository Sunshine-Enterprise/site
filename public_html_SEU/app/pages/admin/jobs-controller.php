<?php

//add new user
if($action == 'add'){
  
    if(!empty($_POST))
  {
    //validate
  $errors = [];

    // Industry Name---------------------------------------

  if(empty($_POST['jobname'])){
    $errors['jobname'] = "Please provide Name for the Job";
  }
  if(empty($_POST['industry'])){
    $errors['industry'] = "Please provide an Industry";
  }

  if(empty($_POST['time'])){
    $errors['time'] = "Please provide Time shift";
  }
  if(empty($_POST['state'])){
    $errors['state'] = "Please provide The state";
  }
  if(empty($_POST['city'])){
    $errors['city'] = "Please provide the city";
  }
  if(empty($_POST['zipcode'])){
    $errors['zipcode'] = "Please provide the zipcode";
  }
  if(empty($_POST['salary'])){
    $errors['salary'] = "Please provide the salary";
  }
  if(empty($_POST['company'])){
    $errors['company'] = "Please provide the company name";
  }else
  if(empty($_POST['positions'])){
    $errors['positions'] = "Please provide the positions number";
  }else
  if(empty($_POST['status'])){
    $errors['status'] = "Please provide status";
  }
  
  $slug = str_to_url($_POST['jobname']);

  $query = "select id from jobs where slug = :slug limit 1";
  $slug_row = query($query, ['slug'=>$slug]);

  if($slug_row)
  {
    $slug .= rand(1000,9999);
  }
    if(empty($errors))
    {
        $data = [];
        $date_current = date('Y-m-d');
        //$data['industry_id'] = $_POST['industry'];
        $data['job_name'] = $_POST['jobname'];
        $data['industry_id'] = $_POST['industry'];
        $data['description'] = $_POST['description'];
        $data['content'] = $_POST['content'];
        $data['time'] = $_POST['time'];
        $data['state'] = $_POST['state'];
        $data['city'] = $_POST['city'];
        $data['zipcode'] = $_POST['zipcode'];
        $data['salary'] = $_POST['salary'];
        $data['company_name'] = $_POST['company'];
        $data['positions']     = $_POST['positions'];
        $data['date'] = $date_current;
        $data['status'] = $_POST['status'];
        $data['slug'] = $slug;
        $data['user_id'] = user('id');

      
      $query = "INSERT INTO `jobs` (`user_id`, `industry_id`, `job_name`, `description`, `content`,
       `time`, `state`, `city`, `zipcode`, `salary`, `company_name`, `positions`, `date`, `status`, `slug`)
      VALUES (:user_id, :industry_id, :job_name, :description, :content, :time, :state, :city,
       :zipcode, :salary, :company_name, :positions, :date, :status, :slug );";
      
      print_r($data);
      query($query, $data);
      print_r($data);
      
      redirect('admin/jobs');
    }
  }
}else

//------------------!!!!!!!!!----------------------
//------------------ELSE EDIT----------------------
//------------------!!!!!!!!!----------------------

if($action == 'edit')
{
  $query = "SELECT * FROM jobs WHERE id = :id LIMIT 1";

  $row = query_row($query, ['id'=>$id]);


  if(!empty($_POST))
  {
  if($row){

  //validate
  $errors = [];

  if(empty($_POST['job_name'])){
    $errors['jobname'] = "Please provide Name for the Job";
  }
  if(empty($_POST['industry'])){
    $errors['industry'] = "Please provide an Industry";
  }

 if(empty($_POST['time'])){
    $errors['time'] = "Please provide Time shift";
  }
  if(empty($_POST['state'])){
    $errors['state'] = "Please provide The state";
  }
  if(empty($_POST['city'])){
    $errors['city'] = "Please provide the city";
  }
  if(empty($_POST['zipcode'])){
    $errors['zipcode'] = "Please provide the zipcode";
  }
  if(empty($_POST['salary'])){
    $errors['salary'] = "Please provide the salary";
  }
  if(empty($_POST['company'])){
    $errors['company'] = "Please provide the company name";
  }else
  if(empty($_POST['positions'])){
    $errors['positions'] = "Please provide the positions number";
  }
      if(empty($errors))
    {
  
        $data = [];
        $data['job_name'] = $_POST['job_name'];
        $data['industry_id'] = $_POST['industry'];
        $data['description'] = $_POST['description'];
        $data['content'] = $_POST['content'];
        $data['time'] = $_POST['time'];
        $data['state'] = $_POST['state'];
        $data['city'] = $_POST['city'];
        $data['zipcode'] = $_POST['zipcode'];
        $data['salary'] = $_POST['salary'];
        $data['company_name'] = $_POST['company'];
        $data['positions']     = $_POST['positions'];
        $data['status'] = $_POST['status'];
        $data['id'] = $id;
      
      $query = "UPDATE `jobs` 
      SET `job_name` = :job_name,
      `industry_id` = :industry_id,
      `description` = :description,
      `content` = :content,
      `time` = :time,
      `state` = :state,
      `city` = :city,
      `zipcode` = :zipcode,
      `salary` = :salary,
      `company_name` = :company_name,
      `positions` = :positions,
      `status` = :status

      WHERE id = :id LIMIT 1";      

      query($query, $data);
      redirect('admin/jobs');
    }    
  }
}  

}else
  if($action == 'duplicate')
  {
    $query = "SELECT * FROM jobs WHERE id = :id LIMIT 1";

    $row = query_row($query, ['id'=>$id]);


    if(!empty($_POST))
    {
    if($row){

    //validate
    $errors = [];

    if(empty($_POST['job_name'])){
      $errors['jobname'] = "Please provide Name for the Job";
    }
    if(empty($_POST['industry'])){
      $errors['industry'] = "Please provide an Industry";
    }

  if(empty($_POST['time'])){
      $errors['time'] = "Please provide Time shift";
    }
    if(empty($_POST['state'])){
      $errors['state'] = "Please provide The state";
    }
    if(empty($_POST['city'])){
      $errors['city'] = "Please provide the city";
    }
    if(empty($_POST['zipcode'])){
      $errors['zipcode'] = "Please provide the zipcode";
    }
    if(empty($_POST['salary'])){
      $errors['salary'] = "Please provide the salary";
    }
    if(empty($_POST['company'])){
      $errors['company'] = "Please provide the company name";
    }else
    if(empty($_POST['positions'])){
      $errors['positions'] = "Please provide the positions number";
    }

    $slug = str_to_url($_POST['job_name']);

    $query = "select id from jobs where slug = :slug limit 1";
    $slug_row = query($query, ['slug'=>$slug]);
  
    if($slug_row)
    {
      $slug .= rand(1000,9999);
    }
  
      if(empty($errors))
      {

        $date_current = date('Y-m-d');
    
          $data = [];
          $data['user_id'] = user('id');
          $data['job_name'] = $_POST['job_name'];
          $data['industry_id'] = $_POST['industry'];
          $data['description'] = $_POST['description'];
          $data['content'] = $_POST['content'];
          $data['time'] = $_POST['time'];
          $data['state'] = $_POST['state'];
          $data['city'] = $_POST['city'];
          $data['zipcode'] = $_POST['zipcode'];
          $data['salary'] = $_POST['salary'];
          $data['company_name'] = $_POST['company'];
          $data['date'] = $date_current;
          $data['positions']     = $_POST['positions'];
          $data['status'] = $_POST['status'];
          $data['slug'] = $slug;

        
          $query = "INSERT INTO `jobs` (`user_id`, `industry_id`, `job_name`, `description`, `content`,
          `time`, `state`, `city`, `zipcode`, `salary`, `company_name`, `positions`, `date`, `status`, `slug`)
         VALUES (:user_id, :industry_id, :job_name, :description, :content, :time, :state, :city,
          :zipcode, :salary, :company_name, :positions, :date, :status, :slug );";
         
         print_r($data);
         query($query, $data);
         print_r($data);

        redirect('admin/jobs');
      }    
    }
  }  
}else
//------------------!!!!!!!!!----------------------
//------------------ELSE DELETE----------------------
//------------------!!!!!!!!!----------------------

if($action == 'delete')
{
  $query = "SELECT * FROM jobs WHERE id = :id LIMIT 1";
  $row = query_row($query, ['id'=>$id]);
 if($_SERVER['REQUEST_METHOD'] == "POST")
  {
  if($row){
    $errors = [];
    
    if(empty($errors))
    {  
      $data = [];

      $data['id'] = $id;
  
      $query = "DELETE FROM `jobs` WHERE `id` = :id LIMIT 1";
      query($query, $data);
      redirect('admin/jobs');
    }    
  }
}  
}


?>