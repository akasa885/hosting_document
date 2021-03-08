<?php
 class home extends controller
 {
   public function index()
   {
     session_start();
     $test = 1;
     $data['judul']='Dashboard';
     $data['username']=$this->model('usercek')->get_user();
     if($data['username']==="guest" && $test == 0){
       header('Location:'.loginfirst);
     }else{
       //---------
       $this->view('templates/header',$data);
       //---------
       //---------
       $this->view('home/dashboard',$data);
       //---------
       $this->view('templates/footer');
     }
   }
 }
