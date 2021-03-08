<?php
class usercek
{
  private $username = "guest";
  public function get_user()
  {
    if(isset($_SESSION['un']))
    {
      include 'session.php';
      $this->username = $login;
    }
    return $this->username;
  }
}
