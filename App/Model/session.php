<?php
  include 'config.php';
  $cek1=$_SESSION['un'];
  $cek2=$_SESSION['pswd'];
  $sqlses=mysqli_query($cd,"select iduser from user where username='$cek1' and pass='$cek2'");
  $row = mysqli_fetch_array($sqlses);
  $login = $row[0];
?>
