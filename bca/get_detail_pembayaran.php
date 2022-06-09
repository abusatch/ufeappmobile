<?php
	include "db.php";
	
	class usr{}
    



    
    $dibaca = "-".$_POST['username']."-";
    $pss = md5($_POST['pss']);

    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");
    
  
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($row >= 1){

?>

<?php
$fr = mysqli_query($koneksi,"select * from tb_pembayaran where id_order = '$_POST[id_order]' order by id_pembayaran desc");
$fr2 = mysqli_fetch_array($fr);


$tanggal_awal = $fr2['tanggal2'];
//echo 'date before day adding: ' . $stop_date; 
$tanggal_akhir = date('H:i, D, d m Y', strtotime($tanggal_awal . ' +0 day'));



$gt = mysqli_query($koneksi,"select * from user where idUser = '$fr2[id_user]'");
$gt2 = mysqli_fetch_array($gt);

$wd = mysqli_query($koneksi,"select * from tb_order where id_order = '$_POST[id_order]'");
$wd2 = mysqli_fetch_array($wd);

?>



{
  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $fr2['id_user'] ?>",
  "bank": "<?php echo $fr2['bank'] ?>",
  "norek": "<?php echo $fr2['norek'] ?>",
  "tgl_upload": "<?php echo $tanggal_akhir ?>",
  "jenis_order": "<?php echo $wd2['jenis_order'] ?>",
  "nilai": "IDR <?php echo number_format($fr2['nilai'],0,',','.') ?>",
    "namalengkap": "<?php echo $gt2['first_name'] ?> <?php echo $gt2['second_name'] ?>",
  "nama_depan": "<?php echo $gt2['first_name'] ?>",
  "nama_belakang": "<?php echo $row['second_name'] ?>",
  "alamat": "<?php echo $row['alamat'] ?>",
  "phone": "<?php echo $row['phone'] ?>",
  "tempat_lahir": "<?php echo $row['tempat_lahir'] ?>",
  "tanggal_lahir": "<?php echo $row['tanggal_lahir'] ?>",
  "short_desc": "<?php echo $fr2['short_desc'] ?>",
  "long_desc": "<?php echo $fr2['long_desc'] ?>",
  "gambar": "https://ufe-section-indonesie.org/ufeapp/images/buktipembayaran/<?php echo $fr2['gambar'] ?>",
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