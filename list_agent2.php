<?php



require_once('db.php');



$result = array();





// $nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");

// $nj2 = mysqli_fetch_array($nj);



// if($nj2['member_dari'] == ""){

// $idmemberr = $_GET['idmember'];

// }else{

//   $idmemberr = $nj2['member_dari'];

// }



$sql_get_data = "SELECT * FROM tb_agent where id_kategori = '$_GET[idmember]' and visibility = '1' ORDER BY judul ASC";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);



echo"{";

 echo  '"result": [';



$no = 1;

while($row = mysqli_fetch_assoc($query)){



//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");

//   $nh2 = mysqli_fetch_array($nh);

  //$result[] = $row;

  if($no == 1){}else{echo ",";}


  $desk1 = str_replace('\n',"",$row['alamatagent']);
  $desk2 = str_replace("'","`",$desk1);
  $desk3 = str_replace('"',"`",$desk2);
  $desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
  $desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
  $desk6 = str_replace("<br>","",$desk5);
  $desk7 = str_replace(".","-titik-",$desk6);

  $des1 = str_replace('\n',"",$row['long_desc']);
  $des2 = str_replace("'","`",$des1);
  $des3 = str_replace('"',"`",$des2);
  $des4 = str_replace(str_split('\\/:*?"<>|'), ' ', $des3);
  $des5 = trim(preg_replace('/\s\s+/', ' ', $des4));
  $des6 = str_replace("<br>","",$des5);
  $des7 = str_replace(".","-titik-",$des6);

?>

{

 "id_agent":"<?php echo $row['id_agent'] ?>", 
 "id_kategori":"<?php echo $row['id_kategori'] ?>", 
 "judul2":"<?php echo $row['judul'] ?>", 
 "short_desc":"<?php echo $row['short_desc'] ?>", 
 "long_desc":"<?php echo $des7 ?>", 
 "gambar2":"<?php echo $row['gambar2'] ?>", 
 "namaagent":"<?php echo $row['namaagent'] ?>", 
 "gmaps":"<?php echo $row['gmaps'] ?>", 
 "alamatagent": "<?php echo $desk7; ?>",
"alamat2agent":"<?php echo $row['alamat2agent'] ?>",
"kotaagent":"<?php echo $row['kotaagent'] ?>",
"kodeposagent":"<?php echo $row['kodeposagent'] ?>",
"telpagent":"<?php echo $row['telpagent'] ?>",
"mobileagent":"<?php echo $row['mobileagent'] ?>",

"emailagent":"<?php echo $row['emailagent'] ?>",
"webagent":"<?php echo $row['webagent'] ?>",
"fbagent":"<?php echo $row['fbagent'] ?>",
"twiteragent":"<?php echo $row['twiteragent'] ?>",
"igagent":"<?php echo $row['igagent'] ?>",
"playstoreagent":"<?php echo $row['playstoreagent'] ?>",
"visibility":"<?php echo $row['visibility'] ?>",
      "id_actualite": "<?php echo $row['id_agent'] ?>",

      "id_member": "<?php echo $row['id_kategori'] ?>",

      "judul": "<?php echo $row['namaagent'] ?>",

      "deskripsi": "<?php echo $desk7 ?>",

      "gambar": "<?php echo $row['gambar'] ?>",

      "tanggal": "<?php echo $row['gambar'] ?>",

      "tanggal2": "<?php echo $row['gambar'] ?>",

      "url": "<?php echo $row['gambar'] ?>",

      "email": "<?php echo $nh2['judul'] ?>",

      "keterangan": "<?php echo $desk7 ?>"

    }

<?php

$no++;}

echo "]}";

//echo json_encode(array('result'=>$result));



?>