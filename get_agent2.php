<?php

	include "db.php";

	

	class usr{}

    







    

    $dibaca = "-".$_POST['username']."-";

    $pss = md5($_POST['pss']);



    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");

    

  

	

    $row = mysqli_fetch_array($query);

    $row2 = mysqli_num_rows($query);

	

	if ($row >= 0){



?>



<?php

$fr = mysqli_query($koneksi,"select * from tb_agent where id_agent = '$_GET[id_agent]'");

$fr2 = mysqli_fetch_array($fr);



$wv = mysqli_query($koneksi,"select * from tb_demar2 where id_demar = '$fr2[id_kategori]'");

$wv2 = mysqli_fetch_array($wv);



$ep = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$wv2[id_kategori]'");

$ep2 = mysqli_fetch_array($ep);


$desk1 = str_replace('\n',"",$fr2['long_desc']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","-titik-",$desk6);


$des1 = str_replace('\n',"",$fr2['alamatagent']);
$des2 = str_replace("'","`",$des1);
$des3 = str_replace('"',"`",$des2);
$des4 = str_replace(str_split('\\/:*?"<>|'), ' ', $des3);
$des5 = trim(preg_replace('/\s\s+/', ' ', $des4));
$des6 = str_replace("<br>","",$des5);
$des7 = str_replace(".","-titik-",$des6);

$de1 = str_replace('\n',"",$fr2['namaagent']);
$de2 = str_replace("'","`",$de1);
$de3 = str_replace('"',"`",$de2);
$de4 = str_replace(str_split('\\/:*?"<>|'), ' ', $de3);
$de5 = trim(preg_replace('/\s\s+/', ' ', $de4));
$de6 = str_replace("<br>","",$de5);
$de7 = str_replace(".","-titik-",$de6);


?>
{
  "result": [
{
 
  "id": "<?php echo $row2 ?>",
  "nama_depan": "<?php echo $row['first_name'] ?>",
  "nama_belakang": "<?php echo $row['second_name'] ?>",
  "alamat": "<?php echo $row['alamat'] ?>",
  "phone": "<?php echo $row['phone'] ?>",
  "tempat_lahir": "<?php echo $row['tempat_lahir'] ?>",
  "tanggal_lahir": "<?php echo $row['tanggal_lahir'] ?>",
  "short_desc": "<?php echo str_replace("&petiksatu&","'",$fr2['short_desc']) ?>",
  "long_desc": "<?php echo $desk7; ?>",
    "gambar": "https://ufe-section-indonesie.org/ufeapp/images/agent/<?php echo $fr2['gambar'] ?>",
  <?php if(empty($fr2['gambar2'])){ ?>
  "gambar2": "https://ufe-section-indonesie.org/ufeapp/images/agent/<?php echo $fr2['gambar'] ?>",
  <?php }else{ ?>
    "gambar2": "https://ufe-section-indonesie.org/ufeapp/images/agent/<?php echo $fr2['gambar2'] ?>",
  <?php } ?>
    "namaagent": "<?php echo $de1; ?>",
    "bgagent": "https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $ep2['bg2'] ?>",
    "gmaps": "<?php echo $fr2['gmaps'] ?>",
    "alamatagent": "<?php echo $des7; ?>",
    "alamat2agent": "<?php echo $fr2['alamat2agent'] ?>",
    "kotaagent": "<?php echo $fr2['kotaagent'] ?>",
    "kodeposagent": "<?php echo $fr2['kodeposagent'] ?>",
    "telpagent": "<?php echo $fr2['telpagent'] ?>",
    "mobileagent": "<?php echo $fr2['mobileagent'] ?>",
    "emailagent": "<?php echo $fr2['emailagent'] ?>",
    "webagent": "<?php echo $fr2['webagent'] ?>",
    "fbagent": "<?php echo $fr2['fbagent'] ?>",
    "twiteragent": "<?php echo $fr2['twiteragent'] ?>",
    "igagent": "<?php echo $fr2['igagent'] ?>",
    "playstoreagent": "<?php echo $fr2['playstoreagent'] ?>",
    "demar2": "<?php echo $ep2['nama_menu'] ?>",
    "demar3": "<?php echo $wv2['judul'] ?>",
    "username": "<?php echo $row2 ?>"
}]}<?php		



	} else { 





?>
{
  "success": 0,

  "message": "<?php echo $row2 ?> <?php echo mysqli_error($koneksi); ?>",

  "id": "<?php echo $row2 ?>",

  "username": "<?php echo $row2 ?>"
}
<?php

    }

    $username = $_POST["username"];



?>