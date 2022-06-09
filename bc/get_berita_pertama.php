<?php
	include "db.php";
	
	class usr{}
    



    
    $dibaca = "-".$_POST['email']."-";
    $pss = md5($_POST['pss']);

    $query = mysqli_query($koneksi,"SELECT * FROM user where username = '$_POST[email]' ");
    $row = mysqli_fetch_array($query);
    
 
if($row['member_dari'] == ""){
$idmemberr = $row['idUser'];
}else{
  $idmemberr = $row['member_dari'];
} 
	
    $row2 = mysqli_num_rows($query);
	
	if ($row2 >= 1){

?>

<?php
$fr = mysqli_query($koneksi,"select * from tb_template where id_member_vip = '$idmemberr' and keterangan = 'release' order by id_template desc limit 1");
$fr2 = mysqli_fetch_array($fr);




$judul1 = str_replace("&petiksatu&","\'",$fr2['judul']);
$judul2 = str_replace("&petikdua&",'\"',$judul1);

$deskripsi1 = str_replace("&petiksatu&","\'",$fr2['deskripsi']);
$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);

$row_deskripsi1 = str_replace("&petiksatu&","\'",$row['deskripsi']);
$row_deskripsi2 = str_replace("&petikdua&",'\"',$row_deskripsi1);


$company1 = str_replace("&petiksatu&","\'",$row['company']);
$alamat_company1 = str_replace("&petiksatu&","\'",$row['alamat_company']);
$kota_company1 = str_replace("&petiksatu&","\'",$row['kota_company']);
$alamat1 = str_replace("&petiksatu&","\'",$row['alamat']);


?>


{
  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
  
"gbr_berita": "https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $fr2['gambar'] ?>",
 "judul_berita": "<?php echo $judul2 ?>",
 "deskripsi_berita": "<?php echo $deskripsi2 ?>",
  
  "nama_depan": "<?php echo $row['first_name'] ?>",
  "nama_belakang": "<?php echo $row['second_name'] ?>",
    "company": "<?php echo $company1 ?>",
    "deskripsi": "<?php echo $row_deskripsi2 ?>",
     "email_company": "<?php echo $row['email_company'] ?>",
     "alamat_company": "<?php echo $alamat_company1 ?>",
     "kota_company": "<?php echo $kota_company1 ?>",
     "kodepos_company": "<?php echo $row['kodepos_company'] ?>",
        "phone_company": "<?php echo $row['telp_company'] ?>",
           "fax_company": "<?php echo $row['fax_company'] ?>",
              "mobile_company": "<?php echo $row['mobile_company'] ?>",
     
     
  "alamat": "<?php echo $alamat1 ?>",
  "phone": "<?php echo $row['phone'] ?>",
   "mobile": "<?php echo $row['mobile'] ?>",
    "facebook": "<?php echo $row['facebook'] ?>",
    "twitter": "<?php echo $row['twitter'] ?>",
    "instagram": "<?php echo $row['instagram'] ?>",
  "tempat_lahir": "<?php echo $row['tempat_lahir'] ?>",
  "tanggal_lahir": "<?php echo $row['tanggal_lahir'] ?>",
  "short_desc": "<?php echo $fr2['short_desc'] ?>",
  "long_desc": "<?php echo $fr2['long_desc'] ?>",
  "gambar": "https://ufe-section-indonesie.org/ufeapp/images/agent/<?php echo $fr2['gambar'] ?>",
    "namaagent": "<?php echo $fr2['namaagent'] ?>",
    "gmaps": "<?php echo $fr2['gmaps'] ?>",
    "alamatagent": "<?php echo $fr2['alamatagent'] ?>",
    "alamat2agent": "<?php echo $fr2['alamat2agent'] ?>",
    "kotaagent": "<?php echo $fr2['kotaagent'] ?>",
    "kodeposagent": "<?php echo $fr2['kodeposagent'] ?>",
    "telpagent": "<?php echo $fr2['telpagent'] ?>",
    "mobileagent": "<?php echo $fr2['mobileagent'] ?>",
    "emailagent": "<?php echo $fr2['emailagent'] ?>",
    "webagent": "<?php echo $fr2['webagent'] ?>",
    "link_alamat": "<?php echo $row['link_alamat'] ?>",
    "linkweb": "<?php echo $fr2['linkweb'] ?>",
    
    "fbagent": "<?php echo $fr2['fbagent'] ?>",
    "twiteragent": "<?php echo $fr2['twiteragent'] ?>",
    "igagent": "<?php echo $fr2['igagent'] ?>",
    "playstoreagent": "<?php echo $fr2['playstoreagent'] ?>",
  "username": "<?php echo $row2 ?>"
}
	
<?php		

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