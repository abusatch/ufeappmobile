<?php
	include "db.php";
	
	class usr{}
    
?>


<?php


    
    $dibaca = "-".$_POST['username']."-";
    $pss = md5($_POST['pss']);
	
	
	if(!empty($_POST['username2'])){
	$query = mysqli_query($koneksi,"SELECT * FROM user where username = '$_POST[username2]' and password = '$_POST[pss2]'  ");
    }else{
	$query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");
    }
  
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
    
    
//     $date1 = $row['masa_aktif'];
  $masa_ak = date('D M d, Y ',strtotime($row['masa_aktif'] . "+0 days"));
//   $masa_ak2 = date('d',strtotime($date1 . "+0 days"));
//   date_default_timezone_set('Asia/Jakarta');
//   $t1 = date('d');
   
   
   date_default_timezone_set('Asia/Jakarta');
   $hariini = date('Y-m-d');
   
   	$date1 = date_create($hariini);
	$date2 = date_create($row['masa_aktif']);
				
	$diff = date_diff($date1, $date2);
	$selisih = $diff->format('%R%a');
   
   
//   $masa_ak3 =  $masa_ak2 - $t1;
	
 	if ($row2 >= 1){


        // mysqli_query($koneksi,"update user set warning_member = 'tidak' where  idUser = '$_POST[username]' and password = '$pss'");
        
        
        
        $ki = mysqli_query($koneksi,"select * from tb_order where jenis_order = 'memberufe' and id_user = '$row[idUser]' and ket = 'menunggu'");
        $ki2 = mysqli_fetch_array($ki);
        $ki3 = mysqli_num_rows($ki);
?>

<?php
$fr = mysqli_query($koneksi,"select * from tb_harga_member ");
$fr2 = mysqli_fetch_array($fr);


?>
{


  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "1",
  <?php if($ki3 == 0){ ?>
  "ket_member":"tidak",
  <?php }else{ ?>
  "ket_member":"iya",
  <?php } ?>
  "nama_depan": "<?php echo $row['first_name'] ?>",
  "nama_belakang": "<?php echo $row['second_name'] ?>",
  "alamat": "<?php echo $row['alamat'] ?>",
  "phone": "<?php echo $row['phone'] ?>",
    "masa_aktif": "<?php echo $masa_ak ?> (<?php echo 'dans '.$selisih.' jour' ?>)",
  "harga1": "<?php echo $fr2['harga'] ?>",
  "harga2": "Rp. <?php echo number_format($fr2['harga'],0,',','.') ?>",  
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
    "fbagent": "<?php echo $fr2['fbagent'] ?>",
    "twiteragent": "<?php echo $fr2['twiteragent'] ?>",
    "igagent": "<?php echo $fr2['igagent'] ?>",
    "playstoreagent": "<?php echo $fr2['playstoreagent'] ?>",
  "username": "<?php echo $row2 ?>"

	}
<?php		

	} else { 

?>

<!--}-->

<!--}-->
<?php
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