<?php

  $host='localhost';

  $user=database_user;

  $pass=database_pass;

  $db=database_name;

  $con = mysqli_connect($host,$user,$pass,$db) or die(mysqli_error());  

?>
