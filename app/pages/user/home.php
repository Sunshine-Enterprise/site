<?php

?> <div class="container"><?php
    if(isset($_SESSION['login'])){
      echo $_SESSION['login'];
      unset($_SESSION['login']);
  }        
 ?></div><?php

$query = "Select count(id) as num from users";
$user = query_row($query);

$id = user('id');

$query = "Select role, data FROM users where id = $id";
$permission = query_row($query);


if($permission['role'] == 'user' & $permission['data'] == 1){
  include '../app/pages/includes/user-view.php';
}elseif($permission['role'] == 'user' & $permission['data'] == 0){
    include '../app/pages/includes/survey.php'; 
}

?>






