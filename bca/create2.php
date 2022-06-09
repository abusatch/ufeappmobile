<?php

require_once('connection2.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$website = $_POST['website'];

if(!$id || !$nama || !$alamat || !$website){
  echo json_encode(array('message'=>'required field is empty.'));
}else{

  $query = mysqli_query($CON2, "INSERT INTO tb_artikel VALUES ('$id','$nama','$alamat','$website')");

  if($query){
    echo json_encode(array('message'=>'data successfully added.'));
  }else{
    echo json_encode(array('message'=>'data failed to add.'));
  }

}

?>
