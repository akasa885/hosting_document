<?php

class client
{
    protected $con;

    function __construct()
    {
        include 'db.php';
        $this->con = $con;
    }

    function getCount(){
        $back = 0;
        $count = 0;
        $sql = "select count(id) from client";
        $result = $this->proses($sql);
        while ($row = mysqli_fetch_array($result)) {
          $back = 1;
          $count = $row[0];
        }
        if($back === 0 )return false;
        return $count;
    }

    function selectDash()
  {
    $back = 0;
    $sql = "select * from client order by created_at ASC limit 5";
    $result = $this->proses($sql);   
    //jangan melakukan fetch array dulu apabila ingin di fetch array pada view
    while ($row = mysqli_fetch_array($result)) {
       $back = 1;
    }      
    if($back === 0 )return false;
    mysqli_data_seek( $result, 0 );  //mengembalikan data result sebelu ter-fetch
    return $result;
  }

    function proses ($sql) {
        return mysqli_query($this->con, $sql);
    }
}