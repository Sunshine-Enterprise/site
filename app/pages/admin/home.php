<?php

?> <div class="container"><?php
    if(isset($_SESSION['login'])){
      echo $_SESSION['login'];
      unset($_SESSION['login']);
  }        
 ?></div><?php

$query = "Select count(id) as num from jobs";
$jobs = query_row($query);

$query = "Select count(IndustryId) as num from industries";
$industry = query_row($query);

$query = "Select count(id) as num from jobs";
$aplication = query_row($query);

$query = "Select count(id) as num from requests";
$request = query_row($query);

$query = "Select count(id) as num from users";
$user = query_row($query);

$query = "Select Count(id) as num FROM users WHERE role = 'employeer'";
$employeer = query_row($query);

$id = user('id');

$query = "Select role FROM users where id = $id";
$permission = query_row($query);


if($permission['role'] == 'user'){
    include '../app/pages/includes/user-view.php';

}elseif($permission['role'] == 'employeer'){
    include '../app/pages/includes/employeers-view.php';
}
elseif($permission['role'] == 'admin'){
    include '../app/pages/includes/admin-view.php';
}
elseif($permission['role'] == 'developer'){
    include '../app/pages/includes/admin-view.php';   
}

?>






