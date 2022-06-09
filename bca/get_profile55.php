<?php
	include "db.php";
	
	class usr{}
    
      date_default_timezone_set('Asia/Jakarta');
  $hariini = date('Y-m-d');

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
    


    $psd = md5($_POST['pss']);
    // $hk = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]' and password = '$psd'");
    
    $hk = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]'");
    
    $hk2 = mysqli_num_rows($hk);
    $hk3 = mysqli_fetch_array($hk);
    
    $dibaca = "-".$_POST['username']."-";

    $query = mysqli_query($koneksi,"SELECT * FROM tb_notifikasi where dibaca not like '%$dibaca%' and (kepada = 'all' or kepada = '$_POST[username]')  ");
    // $query2 = mysqli_query($koneksi,"select * from tb_notifikasi");
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($hk2 >= 1){


$kj = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]'");
$kj2 = mysqli_fetch_array($kj);




?>

{
  "success": 1,
"ket_levell":"<?php echo $kj2['level'] ?>",    
   
 "verifikasi_admin":"<?php echo $kj2['verifikasi_admin'] ?>",    
     
  
  
  
  
  
  
  
 <?php 
  $msa1 = $hk3['masa_aktif'];
  $msa2 = date('M d, Y', strtotime($msa1 . ' +0 day'));
  
  $po = mysqli_query($koneksi,"select * from tb_halaman_depan");
  $po2 = mysqli_fetch_array($po);
  
  
  
  
  
  $tu1 = str_replace("'"," ",$po2['tulisan1']);
$tu2 = str_replace("'"," ",$po2['tulisan2']);
$tu3 = str_replace("'"," ",$po2['tulisan3']);
$tu4 = str_replace("'"," ",$po2['tulisan4']);
$tu5 = str_replace("'"," ",$po2['tulisan5']);
$tu6 = str_replace("'"," ",$po2['tulisan6']);
$tu7 = str_replace("'"," ",$po2['tulisan7']);
$tu8 = str_replace("'"," ",$po2['tulisan8']);
$tu9 = str_replace("'"," ",$po2['tulisan9']);
$tu10 = str_replace("'"," ",$po2['tulisan10']);
$tu11 = str_replace("'"," ",$po2['tulisan11']);

       
$tuu1 = str_replace('"','-',$tu1);
$tuu2 = str_replace('"','-',$tu2);
$tuu3 = str_replace('"','-',$tu3);
$tuu4 = str_replace('"','-',$tu4);
$tuu5 = str_replace('"','-',$tu5);
$tuu6 = str_replace('"','-',$tu6);
$tuu7 = str_replace('"','-',$tu7);
$tuu8 = str_replace('"','-',$tu8);
$tuu9 = str_replace('"','-',$tu9);
$tuu10 = str_replace('"','-',$tu10);
$tuu11 = str_replace('"','-',$tu11);
       
       
                        
  ?>
  
    "tulisan1":"<?php echo $tuu1 ?>",
  "tulisan2":"<?php echo $tuu2 ?>",
"tulisan3":"<?php echo $tuu3 ?>",
"tulisan4":"<?php echo $tuu4 ?>",
"tulisan5":"<?php echo $tuu5 ?>",
"tulisan6":"<?php echo $tuu6 ?>",
"tulisan7":"<?php echo $tuu7 ?>",
"tulisan8":"<?php echo $tuu8 ?>",
"tulisan9":"<?php echo $tuu9 ?>",
"tulisan10":"<?php echo $tuu10 ?>",
"tulisan11":"<?php echo $tuu11 ?>",
  <?php
  if($hariini >= $msa1){
  
  ?>


  


  "ket_aktif":"lewat",
  <?php }else{ ?>
   "ket_aktif":"belum",
  <?php } ?>
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
    "level212": "<?php echo $kj2['level'] ?>",
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