<?php



require_once('db.php');



$result = array();



if(!empty($_GET['email'])){
?>


<?php

$nk = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'");
$nk2 = mysqli_fetch_assoc($nk);


$nj = mysqli_query($koneksi,"select * from user where idUser = '$nk2[idUser]'");
$nj2 = mysqli_fetch_array($nj);



if($nj2['member_dari'] == ""){

$idmemberr = $nk2['idUser'];

}else{

  $idmemberr = $nj2['member_dari'];

}



$sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr' and keterangan = 'release' and visibility = '1' ORDER BY id_template DESC";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);



echo"{";

 echo  '"result": [';



$no = 1;



$q2 = mysqli_num_rows($query);

if($q2 == 0){

 ?>

 {

      "id_actualite": "empty",

      "id_member": "empty",

      "judul": "empty",

      "deskripsi": "empty",

      "gambar": "empty",

      "tanggal": "empty",

      "tanggal2": "empty",

      "url": "empty",

      "email": "empty",

            "urutan": "empty",

      "keterangan": "empty"

    }

 <?php

}else{





while($row = mysqli_fetch_assoc($query)){



  $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");

  $nh2 = mysqli_fetch_array($nh);

  //$result[] = $row;

  

  $judul1 = str_replace("&petiksatu&","\'",$row['judul']);

$judul2 = str_replace("&petikdua&",'\"',$judul1);



$deskripsi1 = str_replace("&petiksatu&","\'",$row['deskripsi']);

$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);

  

  if($no == 1){}else{echo ",";}





  $desk1 = str_replace('\n'," ",$row['deskripsi']);
  $desk2 = str_replace("'","`",$desk1);
  $desk3 = str_replace('"',"`",$desk2);
  $desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
  $desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
  $desk6 = str_replace("<br>","",$desk5);
  $desk7 = str_replace(".","",$desk6);
  $desk8 = str_replace("-"," ",$desk7);
  $desk9 = str_replace("!"," ",$desk8);
  $desk10 = str_replace("’"," ",$desk9);
  $desk11 = str_replace("é","e",$desk10);
  




  $deskk1 = str_replace('\n',"",$row['judul']);
  $deskk2 = str_replace("'","`",$deskk1);
  $deskk3 = str_replace('"',"`",$deskk2);
  $deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
  $deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
  $deskk6 = str_replace("<br>","",$deskk5);
  $deskk7 = str_replace(".","",$deskk6);
?>

{

      "id_actualite": "<?php echo $row['id_template'] ?>",

      "id_member": "<?php echo $row['id_member_vip'] ?>",

      "judul": "<?php echo $deskk7 ?>",

      "deskripsi": "<?php echo substr($desk11,0,120)."" ?>",

      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $row['gambar'] ?>",

      "tanggal": "<?php echo $row['tanggal'] ?>",

      "tanggal2": "<?php echo $row['tanggal2'] ?>",

      "url": "<?php echo $row['linkweb'] ?>",

      "email": "<?php echo $nh2['username'] ?>",

            "urutan": "<?php echo $no ?>",

      "keterangan": "<?php echo $row['keterangan'] ?>"

    }

<?php

$no++;}



}

echo "]}";

//echo json_encode(array('result'=>$result));
?>

<?php
}else{
?>


<?php
$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");

$nj2 = mysqli_fetch_array($nj);



if($nj2['member_dari'] == ""){

$idmemberr = $_GET['idmember'];

}else{

  $idmemberr = $nj2['member_dari'];

}



$sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr' and keterangan = 'release' and visibility = '1' ORDER BY id_template DESC";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);



echo"{";

 echo  '"result": [';



$no = 1;



$q2 = mysqli_num_rows($query);

if($q2 == 0){

 ?>

 {

      "id_actualite": "empty",

      "id_member": "empty",

      "judul": "empty",

      "deskripsi": "empty",

      "gambar": "empty",

      "tanggal": "empty",

      "tanggal2": "empty",

      "url": "empty",

      "email": "empty",

            "urutan": "empty",

      "keterangan": "empty"

    }

 <?php

}else{





while($row = mysqli_fetch_assoc($query)){



  $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");

  $nh2 = mysqli_fetch_array($nh);

  //$result[] = $row;

  

  $judul1 = str_replace("&petiksatu&","\'",$row['judul']);

$judul2 = str_replace("&petikdua&",'\"',$judul1);



$deskripsi1 = str_replace("&petiksatu&","\'",$row['deskripsi']);

$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);

  

  if($no == 1){}else{echo ",";}

?>

{

      "id_actualite": "<?php echo $row['id_template'] ?>",

      "id_member": "<?php echo $row['id_member_vip'] ?>",

      "judul": "<?php echo $judul2 ?>",

      "deskripsi": "<?php echo $deskripsi2 ?>",

      "gambar": "<?php echo $row['gambar'] ?>",

      "tanggal": "<?php echo $row['tanggal'] ?>",

      "tanggal2": "<?php echo $row['tanggal2'] ?>",

      "url": "<?php echo $row['linkweb'] ?>",

      "email": "<?php echo $nh2['username'] ?>",

            "urutan": "<?php echo $no ?>",

      "keterangan": "<?php echo $row['keterangan'] ?>"

    }

<?php

$no++;}



}

echo "]}";

//echo json_encode(array('result'=>$result));
?>



<?php
}

?>