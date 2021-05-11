<?php
/**
 *
 */
class package
{

  protected $con;

  function __construct()
  {
    include 'db.php';
    $this->con = $con;
  }

  function getCount()
  {
    $back = 0;
    $count = 0;
    $sql = "select count(id) from package";
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
    $sql = "select * from package order by created_at ASC limit 5";
    $result = $this->proses($sql);    
    //jangan melakukan fetch array dulu apabila ingin di fetch array pada view
    while ($row = mysqli_fetch_array($result)) {
       $back = 1;
    }      
    if($back === 0 )return false;
    mysqli_data_seek( $result, 0 ); //mengembalikan data result sebelu ter-fetch
    return $result;
  }

  function select($limit = 50)
  {
    $back = 0;
    $sql = "select * from package sort by created_at ASC limit ".$limit;
    $result = $this->proses($sql);
    while ($row = mysqli_fetch_array($result)) {
      $back = 1;
    }
    if ($back === 0) {
      return 0;
    }
    return $result;
  }

  function proses ($sql) {
      return mysqli_query($this->con, $sql);
  }
}
