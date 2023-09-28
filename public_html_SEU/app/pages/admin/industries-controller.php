<?php

//add new user
if($action == 'add'){
  
    if(!empty($_POST))
  {
    //validate
  $errors = [];

    // Industry Name---------------------------------------

  if(empty($_POST['Nameindustry'])){
    $errors['Nameindustry'] = "Please provide industry name";
  }else
  if(!preg_match("/^[a-zA-Z0-9 \-\_\&]+$/", $_POST['Nameindustry']))
  {
    $errors['Nameindustry'] = "Category can only have letters";
  }
  $slug = str_to_url($_POST['Nameindustry']);

  $query = "select IndustryId from industries where slug = :slug limit 1";
  $slug_row = query($query, ['slug'=>$slug]);

  if($slug_row)
    {
    $slug .= rand(1000,9999);
    }


    if(empty($errors))
    {
  
      $data = [];
      $data['Nameindustry'] = $_POST['Nameindustry'];
      $data['slug']     = $slug;
      $data['disabled'] = $_POST['disabled'];

      
      $query = "INSERT INTO `industries` (`Nameindustry`, `slug`, `disabled`) VALUES (:Nameindustry, :slug, :disabled)";
      query($query, $data);
      redirect('admin/industries');
    }
  }
}else

//------------------!!!!!!!!!----------------------
//------------------ELSE EDIT----------------------
//------------------!!!!!!!!!----------------------

if($action == 'edit')
{
  $query = "SELECT * FROM industries WHERE IndustryId = :IndustryId LIMIT 1";

  $row = query_row($query, ['IndustryId'=>$id]);

  if(!empty($_POST))
  {
  if($row){

  //validate
  $errors = [];

  if(empty($_POST['Nameindustry'])){
    $errors['Nameindustry'] = "Please provide industry name";
  }else
  if(!preg_match("/^[a-zA-Z0-9 \-\_\&]+$/", $_POST['Nameindustry']))
  {
    $errors['Nameindustry'] = "Category can only have letters";
  }
 
    if(empty($errors))
    {
  
      $data = [];
      $data['Nameindustry'] = $_POST['Nameindustry'];
      $data['disabled'] = $_POST['disabled'];
      $data['IndustryId'] = $id;
       
      
      $query = "UPDATE `industries` 
      SET `Nameindustry` = :Nameindustry,
      `disabled` = :disabled
      WHERE IndustryId = :IndustryId LIMIT 1";      

      query($query, $data);
      redirect('admin/industries');
    }    
  }
}  
}else
//------------------!!!!!!!!!----------------------
//------------------ELSE DELETE----------------------
//------------------!!!!!!!!!----------------------

if($action == 'delete')
{
  $query = "SELECT * FROM industries WHERE IndustryId = :id LIMIT 1";
  $row = query_row($query, ['id'=>$id]);
 if($_SERVER['REQUEST_METHOD'] == "POST")
  {
  if($row){
    $errors = [];
    
    if(empty($errors))
    {  
      $data = [];

      $data['id'] = $id;
  
      $query = "DELETE FROM `industries` WHERE `IndustryId` = :id LIMIT 1";
      query($query, $data);
      redirect('admin/industries');
    }    
  }
}  
}


?>