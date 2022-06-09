<?php
	include "db.php";
	
	class usr{}
  date_default_timezone_set('Asia/Jakarta');
  $hariini = date('Y-m-d');
  
  
   // $stop_date = '2009-09-30 20:24:00';
    // echo 'date before day adding: ' . $stop_date; 
    // $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));
    // echo 'date after adding 1 day: ' . $stop_date;    


    // $kg = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]'");
    // $kg2 = mysqli_fetch_array($kg);

    // if($kg2['member_dari'] != ""){

    //     $kepada = $_POST['username'];
    // }else{
    //     $kepada = $_POST['username'];
    // }

	// $username = $_POST["username"];
	// $password = $_POST["password"];
	
	// if ((empty($username)) || (empty($password))) { 
	// 	$response = new usr();
	// 	$response->success = 0;
	// 	$response->message = "Kolom tidak boleh kosong"; 
	// 	die(json_encode($response));
    // }
    



    $pss = md5($_POST['pss']);

    $dibaca = "-".$_POST['username']."-";
    $koneksi->set_charset("utf8");
    
    
    
    
    $lkm = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");
    $lkm2 = mysqli_fetch_array($lkm);
    
    if($lkm2['member_dari'] == ""){
        $iduserr = $lkm2['idUser'];
    }else if($lkm2['member_dari'] == null){
        $iduserr = $lkm2['idUser'];        
    }else if($lkm2['member_dari'] == "null"){
        $iduserr = $lkm2['idUser'];
    }else{
        $iduserr = $lkm2['member_dari'];
    }
    
    
    
    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$iduserr'  ");
    // $query2 = mysqli_query($koneksi,"select * from tb_notifikasi");
	
    

    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($row2 >= 1){

?>

{
  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?>>",
  "id": "<?php echo $row['idUser'] ?>",
  "username": "<?php echo $row['username'] ?>",
  <?php 
  $msa1 = $row['masa_aktif'];
  $msa2 = date('M d, Y', strtotime($msa1 . ' +0 day'));
  
  if($hariini >= $_POST['tanggul']){
  
  ?>
  "ket_aktif":"lewat",
  <?php }else{ ?>
   "ket_aktif":"belum",
  <?php } ?>
  "masa_aktif2": "<?php echo $msa2; ?>",
  "masa_aktif": "<?php echo $row['masa_aktif'] ?>",
  
   <?php
   $first_name1 = str_replace("&petiksatu&","'",$row['first_name']);
   $second_name1 = str_replace("&petiksatu&","'",$row['second_name']);
   $deskripsi1 = str_replace("&petiksatu&","'",$row['deskripsi']);
   $alamat_company1 = str_replace("&petiksatu&","'",$row['alamat_company']);
   $kota_company1 = str_replace("&petiksatu&","'",$row['kota_company']);
   $alamat1 = str_replace("&petiksatu&","'",$row['alamat']);
   $kota1 = str_replace("&petiksatu&","'",$row['kota']);
   $company1 = str_replace("&petiksatu&","'",$row['company']);
   
   ?>
  "first_name": "<?php echo $first_name1 ?>",
  "second_name": "<?php echo $second_name1 ?>",
  "deskripsi": "<?php echo $deskripsi1 ?>",
  "email_company": "<?php echo $row['email_company'] ?>",
  "alamat_company": "<?php echo $alamat_company1 ?>",
  "kota_company": "<?php echo $kota_company1 ?>",
  "kodepos_company": "<?php echo $row['kodepos_company'] ?>",
   "phone_company": "<?php echo $row['telp_company'] ?>",
    "fax_company": "<?php echo $row['fax_company'] ?>",
     "mobile_company": "<?php echo $row['mobile_company'] ?>",
  "tempat_lahir": "<?php echo $row['tempat_lahir'] ?>",
  "tanggal_lahir": "<?php echo $row['tanggal_lahir'] ?>",
  "phone": "<?php echo $row['phone'] ?>",
  "propic": "https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $row['propic'] ?>",
  "logo": "https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $row['logo'] ?>",
  "cover": "https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $row['cover'] ?>",
  "level": "<?php echo $row['level'] ?>",
  "member_dari": "<?php echo $row['member_dari'] ?>",
  
  "alamat": "<?php echo $alamat1 ?>",
    "link_alamat": "<?php echo $row['link_alamat'] ?>",
  "kota": "<?php echo $kota1 ?>",
  "kodepos": "<?php echo $row['kodepos'] ?>",
  "ket2": "<?php echo $row['ket2'] ?>",
  "mobile": "<?php echo $row['mobile'] ?>",
  "email": "<?php echo $row['username'] ?>",
  "fax": "<?php echo $row['fax'] ?>",
  "website": "<?php echo $row['website'] ?>",
  "company": "<?php echo $company1 ?>",
  "facebook": "<?php echo $row['facebook'] ?>",
  "twitter": "<?php echo $row['twitter'] ?>",
  "instagram": "<?php echo $row['instagram'] ?>",
  "employement": "<?php echo $row['employement'] ?>"
}
	
<?php		
	// $response = new usr();
		// $response->success = 1;
		// $response->message = '"'.$row2.'"';
		// $response->id = '"'.$row2.'"';
		// $response->username = '"'.$row2.'"';
		// die(json_encode($response));
	} else { 

		// $response = new usr();
		// $response->success = 0;
		// $response->message = '"'.$row2.'"';
		// die(json_encode($response));
?>
{
  "success": 0,
  "message": "<?php echo $_POST['username']." - ".$pss." - ".$row2 ?> <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}

<?php
    }
    $username = $_POST["username"];
	// $password = $_POST["password"];
	
	// if ((empty($username)) || (empty($password))) { 
	// 	$response = new usr();
	// 	$response->success = 0;
	// 	$response->message = "Kolom tidak boleh kosong"; 
	// 	die(json_encode($response));
	// }
    
    // $dibaca = "-".$_POST['username']."-";

    // $u1 = $_POST['username']."-";
    // $u2 = $_POST['username']."-";

    // $qu = mysqli_query($koneksi,"SELECT * FROM tb_notifikasi where dibaca not like '%$dibaca%' and kepada = 'all' or kepada = '$_POST[username]' ");
    // while($qu2 = mysqli_fetch_array($qu)){

    //     $gh1 = $qu2['dibaca'];
    //     $gh2 = $gh1.$u1;

    //     if($qu2['dibaca'] == ""){
    //         mysqli_query($koneksi, "update tb_notifikasi set dibaca = '$gh2' where id_notifikasi = '$qu2[id_notifikasi]'" );
    //     }else{
    //     mysqli_query($koneksi, "update tb_notifikasi set dibaca = '$gh2' where id_notifikasi = '$qu2[id_notifikasi]'" );
    //     }
    // }


    // $mixedStr = "hello world. This is john duvey";
    // $searchStr= "john";

    // if(strpos($mixedStr,$searchStr)) {
    //   echo "Your string here";
    // }else {
    //   echo "String not here";
    // }

?>