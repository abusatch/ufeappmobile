<?php

require_once('connection2.php');

$id = $_POST['id'];
$foto = $_POST['foto'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$telp1 = $_POST['telp1'];
$telp2 = $_POST['telp2'];
$hp = $_POST['hp'];
$deskripsi = $_POST['deskripsi'];
$email = $_POST['email'];
$website = $_POST['website'];

if(!$id || !$nama || !$alamat || !$website){
  echo json_encode(array('message'=>'required field is empty.'));
}else{

  $query = mysqli_query($CON2, "INSERT INTO tb_artikel VALUES ('$id', '$foto', '$nama', '$alamat', '$kota', '$telp1', '$telp2', '$hp', '$deskripsi', '$email', '$website')");

  if($query){
    echo json_encode(array('message'=>'data successfully added.'));
  }else{
    echo json_encode(array('message'=>'data failed to add.'));
  }

}

?>
