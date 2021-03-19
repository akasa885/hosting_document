<?php
class login extends controller
{
  protected $data;
  public function __construct()
  {
    $this->data = new \stdClass();
  }

  public function index($res='', $old='')
  {
    session_start();
    $acc="";
    $this->data->judul='Selamat Datang di Aplikasi | '.APP_NAME;
    if (!empty($res)) {
      //==========================
      $this->data->error ="Username or Password Wrong !";
      $this->data->old =$old;
      //==========================
    }
    $checked=$this->model('usercek')->get_user();
    if ($checked !== "guest") {
      header('Location:'.baseurl);
    }else{
      //---------
      $this->view('templates/header',$this->data);
      //---------
      //---------
      $this->view('login/indexlogin',$this->data);
      //---------
      $this->view('templates/footer');
    }
  }

  public function auth()
  {
    $un;
    $pass;
    if (isset($_POST['username']) && isset($_POST['password'])) {

      $un = $_POST['username'];
      $pass = $_POST['password'];
      //==========================
      $response = $this->model('users')->select($un, $pass);
      //==========================
      if ($response !== 0) {

        session_start();
        //==========================
        $_SESSION['code_ses'] = $response;
        header('Location:'.baseurl);
        //==========================
      }else{
        header('Location:'.loginfirst.'/auth=false/'.$un);
      }
    }
  }

}
