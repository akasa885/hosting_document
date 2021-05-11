<?php

class resetPassword{
    protected $con;

    function __construct()
    {
        include 'db.php';
        $this->con = $con;
    }

    
    function check_auth_status($kode_user){
        $back = 0;
        $sql = "select * from reset_password where kode_user = '$kode_user'";
        $result = $this->proses($sql);
        while($row = mysqli_fetch_array($result)){
            $back = 1;
        }
        if($back === 0) return true;

        mysqli_data_seek( $result, 0 ); //mengembalikan data result sebelu ter-fetch

        return false;
    }

    function reset_password_auth($auth){
        $back = 0;
        $sql = "select kode_user from reset_password where reset_pin = '$auth'";
        $result = $this->proses($sql);
        while($row = mysqli_fetch_array($result)){
            $back = 1;
        }
        if($back === 0) return false;

        mysqli_data_seek( $result, 0 ); //mengembalikan data result sebelu ter-fetch

        return $result;
    }

    function reset_password($new_pass, $kode_user){
        $back = 0;
        $message = "success";
        $sql = "update users set password = '$new_pass' where kode_user = '$kode_user";
        $result = $this->proses($sql);
        while($row = mysqli_fetch_array($result)){
            $back = 1;
        }
        if($back === 0) return false;

        mysqli_data_seek( $result, 0 ); //mengembalikan data result sebelu ter-fetch

        return $message;
    }

    function proses ($sql) {
        return mysqli_query($this->con, $sql);
    }
    
}