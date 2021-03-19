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
     $this->data->judul="Dashboard";
     $this->data->username=$this->model('usercek')->get_user();
     if($this->data->username === "guest" && $test == 0){
       header('Location:'.loginfirst);
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
     session_unset('code_ses');
     session_destroy();
     session_write_close();
     setcookie(session_name(),'',0,'/');
     session_regenerate_id(true);
     header('Location:'.loginfirst);
   }

 }
