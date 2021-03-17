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
    $exist = $this->usersExistence($username);
    $kode_user = $this->getUserCode();
    $success = 0;
    $test = 1;
    if ($kode_user === 0 || $kode_user === 1 || $exist === 1) {
      return 'error code';
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

  function usersExistence($un)
  {
    $code = 0;
    $sql = "select id from users where username like '$un'";
    $result = $this->proses($sql);

    while($id = mysqli_fetch_array($result)){
      $x = (int)$id;
    }

    if (isset($x)) {
      $code = 1;
    }

    return $code;

  }

  function getUserCode(){
    $sql = "select max(substr(kode_user, 3, 6)) from users";
    $result = $this->proses($sql);
    while($no = mysqli_fetch_array($result)){
      $x = (int)$no;
    }
    if (isset($x) && $x == 0) {
      $kode_usr = 'ADM001';
    }else if(isset($x)){
      if ($x < 10) {
        $x_up = $x + 1;
        $kode_usr = 'ADM00'.$x_up;
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
