<?php
  class akses extends controller
  {
    public function index()
    {
      session_start();
      if(!empty($_REQUEST['usern'])){
        if($_REQUEST['login'] == "learn")
        {
          $cek = $this->model('proses')->login();
          if($cek == "deny"){
            echo "deny";
          }elseif ($cek == "oke"){
            $_SESSION['un'] = $_POST['usern'];
            $_SESSION['pswd'] = $_POST['ps'];
            echo "cocok";
          }elseif ($cek == "salah") {
            echo "wrong";
          }
        }else if ($_REQUEST['login'] == "datacenter")
        {
          echo "underconstruct";
        }
      }
    }
  }


 ?>
