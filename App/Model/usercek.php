<?php
class usercek
{
  private $username = "guest";

  protected $con;

  function __construct()
  {
    include 'db.php';
    $this->con = $con;
  }

  public function get_user()
  {
    if(isset($_SESSION['code_ses']))
    {
      $this->username = $this->getUname($_SESSION['code_ses']);
    }
    return $this->username;
  }

  function getUname($kode_usr)
  {
    $sql = "select username from users where kode_user = '$kode_usr' limit 1";
    $result = $this->proses($sql);
    $row = mysqli_fetch_array($result);
    $login = $row[0];
    return $login;
  }

  function proses ($sql) {
      return mysqli_query($this->con, $sql);
  }

}
