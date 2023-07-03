<?php
if($action == 'add'){
 //   print_r($_POST);

    if(!empty($_POST)){

        $errors = [];
    
      if(empty($_POST['name'])){
        $errors['name'] = "Please provide the team member name";
      }else
      if(!preg_match("/^[a-zA-Z0-9 \-\_\&]+$/", $_POST['name']))
      {
        $errors['name'] = "Team Member Name can only have letters";
      }

      if(empty($_POST['position'])){
        $errors['position'] = "Please provide the position";
      }
    
        if(empty($errors))
        {
      
          $data = [];
          $data['name'] = $_POST['name'];
          $data['position'] = $_POST['position'];
          $data['image'] = 'hola.jpg';
        //  $data['status'] = $_POST['status'];
    
          $query = "INSERT INTO `team` (`name`, `position`, `photo`, `status`) 
          VALUES (:name, :position, :image, 1)";
          query($query, $data);
            print_r($data);
          
          //redirect('admin/team'); 
    }
}
}

?>