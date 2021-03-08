<?php
class login extends controller
{
  public function index($error='')
  {
    $acc="";
    session_start();
    $data['judul']=APP_NAME.' | Users Authentication';
    $data['error'] = $error;
    //---------
    $this->view('templates/header',$data);
    //---------
    if($data['error']=='2Lojw'){
      $this->model('proses')->logot();
    }
    //---------
    $this->view('login/indexlogin');
    //---------
    $this->view('templates/footer');
  }
}
