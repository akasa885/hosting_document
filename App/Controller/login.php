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
    $this->data->judul=APP_NAME.' | Users Authentication';
    if (!empty($res)) {
      $this->data->error ="Username or Password Wrong !";
      $this->data->old =$old;
    }
    $checked=$this->model('usercek')->get_user();
    if ($checked !== "guest") {
      header('Location:'.baseurl);
    }else{
      //---------
      $this->view('templates/header',$this->data);
      //---------
      // if($this->data['error']=='2Lojw'){
      //   $this->model('proses')->logot();
      // }
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
      $response = $this->model('users')->select($un, $pass);
      if ($response !== 0) {
        session_start();
        $_SESSION['code_ses'] = $response;
        header('Location:'.baseurl);
      }else{
        header('Location:'.loginfirst.'/auth=false/'.$un);
      }
    }
  }

}
