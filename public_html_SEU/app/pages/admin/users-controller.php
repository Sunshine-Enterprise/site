<?php


//add new user
if($action == 'add'){
  
    if(!empty($_POST))
  {
    //validate
  $errors = [];

    // First Name---------------------------------------

  if(empty($_POST['fname'])){
    $errors['fname'] = "Please provide your first name";
  }else
    if(!preg_match("/^[a-zA-Z]+$/", $_POST['fname']))
    {
      $errors['fname'] = "First name can only have letters and no spaces";
    }

// Last Name---------------------------------------

    if(empty($_POST['lname'])){
      $errors['lname'] = "Please provide your last name";
    }else
      if(!preg_match("/^[a-zA-Z]+$/", $_POST['lname']))
      {
        $errors['lname'] = "Last Name can only have letters and no spaces";
      }

// Password 1 ---------------------------------------

    if(empty($_POST['password1'])){
      $errors['password1'] = "Password is required";
    }else

    if(strlen($_POST['password1']) < 8)
    {
      $errors['password1'] = "Password must to be 8 caracters or more";
    }else

    // validate 2 pass
    if(($_POST['password1']) !== $_POST['password2'])
    {
      $errors['password1'] = "Passwords do not match";
    }
    
// Phone ---------------------------------------

    if(empty($_POST['phone'])){
      $errors['phone'] = "Phone is required";
    }else

    if(strlen($_POST['phone']) < 10)
    {
      $errors['phone'] = "Phone must to have 10 caracters";
    }

    
// Email ---------------------------------------
    //here confirm if this email is already in use
  
    $query = "SELECT `id` from `users` WHERE `email` = :email limit 1";
    $email = query($query, ['email'=>$_POST['email']]);

    if(empty($_POST['email'])){
      $errors['email'] = "Email is required";
    }
    else
    if($email)
    {
      $errors['email'] = "That email is already in use";
    }else
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
      $errors['email'] = "Email not valid";
    } 
    

// State ---------------------------------------

    if(empty($_POST['state'])){
      $errors['state'] = "State is required";
    }else

// City ---------------------------------------

    if(empty($_POST['city'])){
      $errors['city'] = "City is required";
    }else


// Zipcode ---------------------------------------

    if(empty($_POST['zipcode'])){
      $errors['zipcode'] = "ZipCode is required";
    }else

    if(strlen($_POST['zipcode']) < 5)
    {
      $errors['zipcode'] = "ZipCode must to have 5 caracters";
    }
 
    if(empty($errors))
    {
      $date_current = date('Y-m-d');
  
      $data = [];
      $data['email'] = $_POST['email'];
      $data['password'] = password_hash($_POST['password1'], PASSWORD_DEFAULT); 
      $data['fname'] = $_POST['fname'];
      $data['lname'] = $_POST['lname'];
      $data['phone'] = $_POST['phone'];
      $data['state'] = $_POST['state'];
      $data['city'] = $_POST['city'];
      $data['zipcode'] = $_POST['zipcode'];
      $data['date'] = $date_current;
      $data['role'] = "user";
  
      
      $query = "INSERT INTO `users` (`email`, `password`, `fname`, `lname`, `phone`, `state`, `city`, `zipcode`, `date`, `role`) 
      VALUES (:email, :password, :fname, :lname, :phone, :state, :city, :zipcode, :date, :role)";
      query($query, $data);
      redirect('admin/users');
  }
  }
}else

//------------------!!!!!!!!!----------------------
//------------------ELSE EDIT----------------------
//------------------!!!!!!!!!----------------------

if($action == 'edit')
{
  $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
  $row = query_row($query, ['id'=>$id]);

  if(!empty($_POST))
  {
  if($row){

  //validate
  $errors = [];

  if(empty($_POST['fname'])){
    $errors['fname'] = "Please provide your first name";
  }else
    if(!preg_match("/^[a-zA-Z]+$/", $_POST['fname']))
    {
      $errors['fname'] = "First name can only have letters and no spaces";
    }

// Last Name---------------------------------------

    if(empty($_POST['lname'])){
      $errors['lname'] = "Please provide your last name";
    }else
      if(!preg_match("/^[a-zA-Z]+$/", $_POST['lname']))
      {
        $errors['lname'] = "Last Name can only have letters and no spaces";
      }

// Password 1 ---------------------------------------

    if(empty($_POST['password1'])){

    }else

    if(strlen($_POST['password1']) < 8)
    {
      $errors['password1'] = "Password must to be 8 caracters or more";
    }else

    // validate 2 pass
    if(($_POST['password1']) !== $_POST['password2'])
    {
      $errors['password1'] = "Passwords do not match";
    }
    
// Phone ---------------------------------------

    if(empty($_POST['phone'])){
      $errors['phone'] = "Phone is required";
    }else

    if(strlen($_POST['phone']) < 10)
    {
      $errors['phone'] = "Phone must to have 10 caracters";
    }

    
// Email ---------------------------------------
    //here confirm if this email is already in use
  
    $query = "SELECT `id` from `users` WHERE `email` = :email && id != :id limit 1";
    $email = query($query, ['email'=>$_POST['email'], 'id'=> $id]);

    if(empty($_POST['email'])){
      $errors['email'] = "Email is required";
    }
    else
    if($email)
    {
      $errors['email'] = "That email is already in use";
    }else
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
      $errors['email'] = "Email not valid";
    } 
    

// State ---------------------------------------

    if(empty($_POST['state'])){
      $errors['state'] = "State is required";
    }else

// City ---------------------------------------

    if(empty($_POST['city'])){
      $errors['city'] = "City is required";
    }else


// Zipcode ---------------------------------------

    if(empty($_POST['zipcode'])){
      $errors['zipcode'] = "ZipCode is required";
    }else

    if(strlen($_POST['zipcode']) < 5)
    {
      $errors['zipcode'] = "ZipCode must to have 5 caracters";
    }
 
    if(empty($errors))
    {
      $date_current = date('Y-m-d');
  
      $data = [];
      $data['email'] = $_POST['email'];
      $data['fname'] = $_POST['fname'];
      $data['lname'] = $_POST['lname'];
      $data['phone'] = $_POST['phone'];
      $data['state'] = $_POST['state'];
      $data['city'] = $_POST['city'];
      $data['zipcode'] = $_POST['zipcode'];
      $data['role'] = $_POST['role'];
      $data['id'] = $id;

      $password_str     = "";

    
       
      if(!empty($_POST['password1'])){
      $data['password1'] = password_hash($_POST['password1'], PASSWORD_DEFAULT); 
      $password_str = "password = :password1, ";
      }

      $query = "UPDATE `users` SET `email` = :email,
      $password_str
      `fname` = :fname,
      `lname` = :lname,
      `phone` = :phone,
      `state` = :state,
      `city` = :city,
      `zipcode` = :zipcode,
      `role` = :role 
      WHERE id = :id LIMIT 1";

      }
      if($data['role'] == 'employeer'){
       echo 'hola';
        /* $data = [];
        $data['id'] = $id;  
        $data['shift'] = "full-time";
        $data['department'] = "recluitment";
        //----------------OJO-----------------
        $query = "SELECT `userID` from `employeers` WHERE `employeer_id` = :employeer_id limit 1";
        $verify = query($query, ['email'=>$_POST['email']]);
        if($email)
        {
          $errors['email'] = "That email is already in use";
        }*/
        //----------------OJO--------------------
       // $query = "INSERT INTO `employeers` (`employeer_id`, `userID`, `shift`, `department`) VALUES (:id, :id, :shift, :department) LIMIT 1";
    }

      query($query, $data);
      redirect('admin/users');
    }    
  }  
}else
//------------------!!!!!!!!!----------------------
//------------------ELSE DELETE----------------------
//------------------!!!!!!!!!----------------------

if($action == 'delete')
{
  $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
  $row = query_row($query, ['id'=>$id]);
 if($_SERVER['REQUEST_METHOD'] == "POST")
  {
  if($row){
    $errors = [];
    
    if(empty($errors))
    {  
      $data = [];

      $data['id'] = $id;
  
      $query = "DELETE FROM `users` WHERE `id` = :id LIMIT 1";
      query($query, $data);
      redirect('admin/users');
    }    
  }
}  
}
//------------------!!!!!!!!!----------------------
//------------------create Employeer----------------------
//------------------!!!!!!!!!----------------------
  

?>