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

if(empty($_GET['halaman']) || $_GET['halaman'] == ""){


if($_GET['jenis'] == "pending"){
  $sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr' and keterangan = 'pending' and visibility = '1'  ORDER BY id_template DESC limit 5";

}else{
  $sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr' and keterangan = 'release' and visibility = '1' ORDER BY id_template DESC
  limit 5
  ";

}

}else{
 
 $hall = $_GET['halaman'];
 $offset = $hall * 5;
 
 
 $off2 = 6 ;
    
 if($_GET['jenis'] == "pending"){
  $sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr' and keterangan = 'pending' and visibility = '1' ORDER BY id_template DESC
  limit 5 offset $offset
  ";

}else{
  $sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr' and keterangan = 'release' and visibility = '1' ORDER BY id_template DESC
  limit 5 offset $offset
  ";

}   
    
    
}

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);



echo"{";

 echo  '"result": [';



$no = 1;

if($_GET['halaman'] == "" || empty($_GET['halaman'])){
    $uritan = 1;
}else{
    $uritan = (5 * $_GET['halaman'] )+1;
}

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





//   $desk1 = str_replace('\n',"-enter-",$row['deskripsi']);
//   $desk2 = str_replace("'","`",$desk1);
//   $desk3 = str_replace('"',"-petikdua-",$desk2);
//   $desk4 = str_replace(str_split('\\/:*?"<>|'), '-enter-', $desk3);
//   $desk5 = trim(preg_replace('/\s\s+/', '-enter-', $desk4));
//   $desk6 = str_replace("<br>","-enter-",$desk5);
//   $desk7 = str_replace(".","-titik-",$desk6);
//   $desk8 = str_replace("-","-",$desk7);
//   $desk9 = str_replace("!","-tandaseru-",$desk8);
//   $desk10 = str_replace("’","-petiksatu-",$desk9);
//   $desk11 = str_replace("é","-ekanan-",$desk10);
//   $desk12 = str_replace("à","-akiri-",$desk11);
//   $desk13 = str_replace("è","-ekiri-",$desk12);
//   $desk14 = str_replace("
//   ","-enter-",$desk13);
//   $desk15 = preg_replace("/\r\n|\r|\n/", '-enter-', $desk14);
  
  
   $desk1 = str_replace('\n',"-enter-",$row['deskripsi']);
  $desk2 = str_replace("'","`",$desk1);
  $desk3 = str_replace('"',"-petikdua-",$desk2);
  $desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
  $desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
  $desk6 = str_replace("<br>","-enter-",$desk5);
  $desk7 = str_replace(".","-titik-",$desk6);
  $desk8 = nl2br($desk7);
  $desk9 = preg_replace("/\r\n|\r|\n/", '-enter-', $desk8);
  $desk10 = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"-enter-",$desk9);
  
  
  
  
   $deskx1 = str_replace('\n',"-enter-",$row['keterangan']);
  $deskx2 = str_replace("'","`",$deskx1);
  $deskx3 = str_replace('"',"-petikdua-",$deskx2);
  $deskx4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskx3);
  $deskx5 = trim(preg_replace('/\s\s+/', ' ', $deskx4));
  $deskx6 = str_replace("<br>","-enter-",$deskx5);
  $deskx7 = str_replace(".","-titik-",$deskx6);
  $deskx8 = str_replace("-","-",$deskx7);
  $deskx9 = str_replace("!","-tandaseru-",$deskx8);
  $deskx10 = str_replace("’"," ",$deskx9);
  $deskx11 = str_replace("é","-ekanan-",$deskx10);
$deskx12 = str_replace("à","-akiri-",$deskx11);
  $deskx13 = str_replace("è","-ekiri-",$deskx12);
  



     $deskk1 = str_replace('\n',"-enter-",$row['judul']);
  $deskk2 = str_replace("'","`",$deskk1);
  $deskk3 = str_replace('"',"-petikdua-",$deskk2);
  $deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
  $deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
  $deskk6 = str_replace("<br>","-enter-",$deskk5);
  $deskk7 = str_replace(".","-titik-",$deskk6);
  $deskk8 = str_replace("-","-",$deskk7);
  $deskk9 = str_replace("!","-tandaseru-",$deskk8);
  $deskk10 = str_replace("’"," ",$deskk9);
  $deskk11 = str_replace("é","-ekanan-",$deskk10);
  $deskk12 = str_replace("à","-akiri-",$deskk11);
  $deskk13 = str_replace("è","-ekiri-",$deskk12);
  
  
?>

{

      "id_actualite": "<?php echo $row['id_template'] ?>",

      "id_member": "<?php echo $row['id_member_vip'] ?>",

      "judul": "<?php echo $deskk13 ?>",

      "deskripsi": "<?php echo substr($desk10,0,100); ?>",
        
      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $row['gambar'] ?>",

      "tanggal": "<?php echo $row['tanggal'] ?>",

      "tanggal2": "<?php echo $row['tanggal2'] ?>",

      "url": "<?php echo $row['linkweb'] ?>",

      "email": "<?php echo $nh2['username'] ?>",

            "urutan": "<?php echo $uritan ?>",

      "keterangan": "<?php echo $deskx13; ?>"

    }

<?php
$uritan++;
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

  



  $desk1 = str_replace('\n',"-enter-",$row['deskripsi']);
  $desk2 = str_replace("'","`",$desk1);
  $desk3 = str_replace('"',"-petikdua-",$desk2);
  $desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
  $desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
  $desk6 = str_replace("<br>","-enter-",$desk5);
  $desk7 = str_replace(".","-titik-",$desk6);
  $desk8 = str_replace("-","-",$desk7);
  $desk9 = str_replace("!","-tandaseru-",$desk8);
  $desk10 = str_replace("’"," ",$desk9);
  $desk11 = str_replace("é","-ekanan-",$desk10);
  
   $deskx1 = str_replace('\n',"-enter-",$row['keterangan']);
  $deskx2 = str_replace("'","`",$deskx1);
  $deskx3 = str_replace('"',"-petikdua-",$deskx2);
  $deskx4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskx3);
  $deskx5 = trim(preg_replace('/\s\s+/', ' ', $deskx4));
  $deskx6 = str_replace("<br>","-enter-",$deskx5);
  $deskx7 = str_replace(".","-titik-",$deskx6);
  $deskx8 = str_replace("-","-",$deskx7);
  $deskx9 = str_replace("!","-tandaseru-",$deskx8);
  $deskx10 = str_replace("’"," ",$deskx9);
  $deskx11 = str_replace("é","-ekanan-",$deskx10);




     $deskk1 = str_replace('\n',"-enter-",$row['judul']);
  $deskk2 = str_replace("'","`",$deskk1);
  $deskk3 = str_replace('"',"-petikdua-",$deskk2);
  $deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
  $deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
  $deskk6 = str_replace("<br>","-enter-",$deskk5);
  $deskk7 = str_replace(".","-titik-",$deskk6);
  $deskk8 = str_replace("-","-",$deskk7);
  $deskk9 = str_replace("!","-tandaseru-",$deskk8);
  $deskk10 = str_replace("’"," ",$deskk9);
  $deskk11 = str_replace("é","-ekanan-",$deskk10);





  if($no == 1){}else{echo ",";}

?>

{

      "id_actualite": "<?php echo $row['id_template'] ?>",

      "id_member": "<?php echo $row['id_member_vip'] ?>",

      "judul": "<?php echo $deskk11 ?>",

      "deskripsi": "<?php echo $desk11 ?>",

      "gambar": "<?php echo $row['gambar'] ?>",

      "tanggal": "<?php echo $row['tanggal'] ?>",

      "tanggal2": "<?php echo $row['tanggal2'] ?>",

      "url": "<?php echo $row['linkweb'] ?>",

      "email": "<?php echo $nh2['username'] ?>",

            "urutan": "<?php echo $uritan ?>",

      "keterangan": "<?php echo $deskx11; ?>"

    }

<?php
$uritan++;
$no++;}



}

echo "]}";

//echo json_encode(array('result'=>$result));
?>



<?php
}

?>