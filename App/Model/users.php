<?php

/**
 *
 */
class users
{

  protected $con;

  function __construct()
  {
    include 'db.php';
    $this->con = $con;
  }

  function select($username, $pass)
  {
    $sql = "select * from users where username = ".$username;

    if (password_verify($pass,$data['password'])) {
      // code...
    }else{

    }
  }

  function add($username, $pas)
  {
    $encryp = password_hash($pas,PASSWORD_BCRYPT);
    $kode_user = $this->getUserCode();
    $success = 0;
    if ($kode_user == 0 || $kode_user == 1) {
      return 0;
    }
    $sql = "insert into users (kode_user,username,password) values ('$kode_user','$username','$encryp')";
    $result = $this->proses($sql);
    if(!$result){
          die("error!!".mysqli_error());
    }else{
      $success = 1;
    }
    return $success;
  }

  function getUserCode(){
    $sql = "select max(substr(kode_user, 3, 6)) from users";
    $result = $this->proses($sql);
    while($no = mysqli_fetch_array($result)){
      $x = (int)$noS;
    }
    if (isset($x) && $x == 0) {
      $kode_usr = 'USR001';
    }else if(isset($x)){
      if ($x < 10) {
        $x_up = $x + 1;
        $kode_usr = 'USR00'.$x_up;
      }else{
        $kode_usr = 1;
      }
    }else{
      $kode_usr = 0;
    }

    return $kode_usr;
  }

  function proses ($sql) {
      return mysqli_query($this->con, $sql);
  }

}


 ?>
