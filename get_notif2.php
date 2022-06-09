<?php
	include "db.php";

      date_default_timezone_set('Asia/Jakarta');
  $hariini = date('Y-m-d');
	
	class usr{}
    
    

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
    

$psww = md5($_POST['pss']);

    
    $dibaca = "-".$_POST['username']."-";

    $query = mysqli_query($koneksi,"SELECT * FROM user where username = '$_POST[username]' and password = '$psww' ");
    // $query2 = mysqli_query($koneksi,"select * from tb_notifikasi");
	
    $row = mysqli_fetch_array($query);
    
    
    
     if($row['member_dari'] == ""){
        $iduserr = $row['idUser'];
    }else if($row['member_dari'] == null){
        $iduserr = $row['idUser'];        
    }else if($row['member_dari'] == "null"){
        $iduserr = $row['idUser'];
    }else{
        $iduserr = $row['member_dari'];
    }
    
    
    
    $query2 = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$iduserr'  ");
    // $query2 = mysqli_query($koneksi,"select * from tb_notifikasi");
	
    $rew = mysqli_fetch_array($query2);
    
    
    
    $row2 = mysqli_num_rows($query);
	$msa1 = $rew['masa_aktif'];
	if ($row2 >= 1){

?>

{
  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
   <?php
  if($hariini >= $msa1){
  
  ?>

  "ket_aktif":"lewat",
  <?php }else{ ?>
   "ket_aktif":"belum",
  <?php } ?>
  
  
  <?php
  $vr = mysqli_query($koneksi,"select * from tb_order where id_user = '$row[idUser]' and jenis_order = 'memberufe' and ket != 'sudahdibayar'");
  $vr2 = mysqli_num_rows($vr);
  if($vr2 == 0){
  ?>
"kepembayaran":"iya",  

  <?php }else{ ?>
"kepembayaran":"tidak",      
<?php } ?>
  
  "username": "<?php echo $row2 ?>"
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
  "message": "<?php echo $row2 ?> <?php echo mysqli_error($koneksi); ?>",
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