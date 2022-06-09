<?php


// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require_once('db.php');



$result = array();



if(!empty($_GET['email'])){
?>

<?php



$ow = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'");
$ow2 = mysqli_fetch_assoc($ow);

$kg = mysqli_query($koneksi,"select * from user where idUser = '$ow2[idUser]'");
$kg2 = mysqli_fetch_array($kg);



if($kg2['member_dari'] != ""){



    $kepada = $kg2['member_dari'];

}else{

    $kepada = $ow2['idUser'];

}
$dibaca = "-".$ow2['idUser']."-";














$nj = mysqli_query($koneksi,"select * from user where idUser = '$ow2[idUser]' ");

$nj2 = mysqli_fetch_array($nj);



if($nj2['member_dari'] == ""){

$idmemberr = $ow2['idUser'];

}else{

  $idmemberr = $nj2['member_dari'];

}







$nj3 = mysqli_num_rows($nj);



if($nj3 == 0){

?>







<?php

}else{

    $limit = 5;


if(empty($_GET['halaman'])){
  $hal = 0;
}else{
  $hal = $_GET['halaman'];
}




$start = $hal*$limit;



$sql_get_data = "SELECT * FROM tb_notifikasi where dihapus not like '%$dibaca%'
 and   (kepada = 'all' or kepada = '$kepada')
 order by id_notifikasi desc limit $limit offset $start";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);





$fr = mysqli_num_rows($query);



if($fr == 0){

?>



{

"result": [{

    "id_actualite": "",

      "id_member": "",

      "judul": "Tidak 1",

      "deskripsi": "Pas de données",

      "gambar": "Tidak 3",

      "tanggal": "tidak 4",

      "tanggal2": "tidak 5",

      "url": "",

      "email": "7",

      "keterangan": ""

}]

}

<?php

}else{







echo"{";

 echo  '"result": [';



$no = 1;

while($row = mysqli_fetch_assoc($query)){















    // $mixedStr = "hello world. This is john duvey";

    // $searchStr= "john";



    // if(strpos($mixedStr,$searchStr)) {

    //   echo "Your string here";

    // }else {

    //   echo "String not here";

    // }













//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");

//   $nh2 = mysqli_fetch_array($nh);

  //$result[] = $row;

  if($no == 1){}else{echo ",";}





  $start_date = $row['tanggal2'];

  $tg2 = date("H:i | D - M d, y", strtotime('+0 days', strtotime($start_date)));

?>

{

      "id_actualite": "<?php echo $row['id_notifikasi'] ?>",

      "id_member": "<?php echo $row['id_notifikasi'] ?>",

      "judul": "<?php echo str_replace("&petiksatu&","'",$row['judul']); ?>",

      "deskripsi": "<?php echo str_replace("&petiksatu&","'",$row['isi']); ?>",

      "gambar": "<?php echo $tg2 ?>",

      "tanggal": "<?php echo $tg2 ?>",

      "tanggal2": "<?php echo $tg2 ?>",

      "url": "<?php echo str_replace("&petiksatu&","'",$row['judul']); ?>",

      "email": "<?php echo $tg2 ?>",

      "keterangan": "<?php echo $tg2 ?>"

    }

<?php

$no++;}

echo "]}";

//echo json_encode(array('result'=>$result));

}}

?>


<?php
}else{

$pss = md5($_GET['pss']);

$dibaca = "-".$_GET['idmember']."-";

?>







<?php

$kg = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");

$kg2 = mysqli_fetch_array($kg);



if($kg2['member_dari'] != ""){



    $kepada = $_GET['idmember'];

}else{

    $kepada = $_GET['idmember'];

}















$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]' and password = '$pss'");

$nj2 = mysqli_fetch_array($nj);



if($nj2['member_dari'] == ""){

$idmemberr = $_GET['idmember'];

}else{

  $idmemberr = $nj2['member_dari'];

}







$nj3 = mysqli_num_rows($nj);



if($nj3 == 0){

?>







<?php

}else{

    $limit = 5;



$hal = $_GET['halaman'] - 1;



$start = $hal*$limit;



$sql_get_data = "SELECT * FROM tb_notifikasi where dihapus not like '%$dibaca%' and   (kepada = 'all' or kepada = '$kepada') order by id_notifikasi desc limit $start,$limit";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);





$fr = mysqli_num_rows($query);



if($fr == 0){

?>



{

"result": [{

    "id_actualite": "",

      "id_member": "",

      "judul": "",

      "deskripsi": "Pas de données",

      "gambar": "Tidak 3",

      "tanggal": "",

      "tanggal2": "tidak 5",

      "url": "",

      "email": "7",

      "keterangan": ""

}]

}

<?php

}else{







echo"{";

 echo  '"result": [';



$no = 1;

while($row = mysqli_fetch_assoc($query)){















    // $mixedStr = "hello world. This is john duvey";

    // $searchStr= "john";



    // if(strpos($mixedStr,$searchStr)) {

    //   echo "Your string here";

    // }else {

    //   echo "String not here";

    // }













//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");

//   $nh2 = mysqli_fetch_array($nh);

  //$result[] = $row;

  if($no == 1){}else{echo ",";}





  $start_date = $row['tanggal2'];

  $tg2 = date("H:i | D - M d, y", strtotime('+0 days', strtotime($start_date)));

?>

{

      "id_actualite": "<?php echo $row['id_notifikasi'] ?>",

      "id_member": "<?php echo $row['id_notifikasi'] ?>",

      "judul": "<?php echo str_replace("&petiksatu&","'",$row['judul']); ?>",

      "deskripsi": "<?php echo str_replace("&petiksatu&","'",$row['isi']); ?>",

      "gambar": "<?php echo $tg2 ?>",

      "tanggal": "<?php echo $tg2 ?>",

      "tanggal2": "<?php echo $tg2 ?>",

      "url": "<?php echo str_replace("&petiksatu&","'",$row['judul']); ?>",

      "email": "<?php echo $tg2 ?>",

      "keterangan": "<?php echo $tg2 ?>"

    }

<?php

$no++;}

echo "]}";

//echo json_encode(array('result'=>$result));

}}

?>

<?php
}
?>