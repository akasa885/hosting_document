<?php
 class home extends controller
 {

   protected $data;
   public function __construct()
   {
     $this->data = new \stdClass();
   }

   public function index()
   {
     session_start();
     $test = 0;
     $this->data->judul=APP_NAME." | Dashboard";
     $this->data->username=$this->model('usercek')->get_user();
     $this->data->pack_count = '0';
     $this->data->client_count = '0';
     //------------------------------------------
     if ($pack_count = $this->model('package')->getCount())
     {$this->data->pack_count = $pack_count;}
     //------------------------------------------
     //------------------------------------------
     if($client_count = $this->model('client')->getCount())
     {$this->data->client_count = $client_count;}
     //------------------------------------------
     //------------------------------------------     
     if($package = $this->model('package')->selectDash())
     {$this->data->package = $package;}          
     //------------------------------------------
     //------------------------------------------
     if($client = $this->model('client')->selectDash())
     {$this->data->client = $client;}           
     //------------------------------------------
     //------------------------------------------
     if($reset_pin = $this->model('resetPassword')->check_auth_status($_SESSION['code_ses']))
     {$this->data->set_pin = "! set reset pin !";}
     //------------------------------------------
     if($this->data->username === "guest" && $test == 0){
       header('Location:'.baseurl.'/login');
     }else{
       //---------
       $this->view('templates/header',$this->data);
       //---------
       //---------
       $this->view('home/dashboard',$this->data);
       //---------
       $this->view('templates/footer');
     }
   }

   function logout()
   {
    //  session_unset('code_ses'); //coba di php 8 error!
     session_unset();
     session_destroy();
     session_write_close();
     setcookie(session_name(),'',0,'/');
     session_regenerate_id(true);
     header('Location:'.baseurl);
   }

 }
