<?php

if(isset($_GET['file_id'])){
  $id = $_GET['file_id'];
  $sql = 'select * from requests where id = '.$id.'';
  $file = query($sql);
  
  include('call_download.php');

 }

?>





