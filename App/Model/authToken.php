<?php

/**
 *
 */
class authToken
{
  private $con;
  public function __construct()
  {
    include 'db.php';
    $this->con = $con;
  }

  function select($token)
  {
    $sql = "select roles_token from auth_token where auth_token = '$token'";
    $result = $this->proses($sql);
    $back = 0;
    while($row=mysqli_fetch_array($result)){
      $back = 1;
    }
    return $back;
  }

  function proses ($sql) {
      return mysqli_query($this->con, $sql);
  }

}


 ?>
