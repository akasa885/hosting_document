<?php
class ajax extends controller
{
  protected $data;
  public function __construct()
  {
    header('Content-Type: application/json');
    $this->data = new \stdClass();
  }

  public function index()
  {
     if(!empty($_POST['kvcArray'])){
       $absen = json_decode($_POST['kvcArray']);
       $cek = $this->model('proses')->absen($absen);
       if($cek === "sukses"){
         return true;
       }
     }elseif (!empty($_REQUEST['mhs'])) {
       $temp = $_REQUEST['mhs'];
       $cek = $this->model('proses')->add();
       if($cek === $temp){
         echo "true";;
       }else if($cek === "ada"){
         echo "false";
       }
     }elseif (!empty($_REQUEST['pengajar'])) {
       // echo "hello";
       $cek = $this->model('proses')->entry();
       if($cek === "Success bro!"){
         $this->model('proses')->Rekap();
         echo "true";
       }else if($cek === "Already Inserted!"){
         $this->model('proses')->Rekap();
         echo "false";
       }
     }
  }

  function auth()
  {
    $r_test = 'gagal';
    $path = getcwd();
    $result;
    if (isset($_POST['role'])) {

      // Register Auth Token
      if ($_POST['role'] == 'reg') {

        $result = $this->model('authToken')->select($_POST['token']);
        if ($result != 0) {
          $this->data->success = 1;
          // $data->dom = file_get_contents('App/View/login/register.php');
          $this->data->dom = '../App/View/login/register.php';
        }

      }
      // Reset Password Auth Token
      else{


        $result = $this->model('resetPass')->select($_POST['token']);
        if ($result != 0) {
          $this->data->success = 1;
          $this->data->dom = '../App/View/login/resetPass.php';
        }
      }
    }else{
      $this->data->success = 0;
    }
    echo json_encode($this->data);
  }

  function registrasi()
  {

    if (isset($_POST['un'])) {
      $result = $this->model('users')->add($_POST['un'],$_POST['m_pass']);
      if ($result == 1) {
        $this->data->success = 'Register Success!';
      }else{
        $this->data->success = 2;
      }
    }else{
      $this->data->success = 0;
    }

    echo json_encode($this->data);
    // echo $_POST['un'];

  }

}

?>
