<?php
	include "db.php";
	
	class usr{}
    
      date_default_timezone_set('Asia/Jakarta');
  $hariini = date('Y-m-d');

   


    $psd = md5($_POST['pss']);
    // $hk = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]' and password = '$psd'");
    
    $hk = mysqli_query($koneksi,"select * from user where username = '$_POST[username]' and password = '$psd'");
    
    $hk2 = mysqli_num_rows($hk);
    $hk3 = mysqli_fetch_array($hk);
    
    $dibaca = "-".$_POST['username']."-";

    $query = mysqli_query($koneksi,"SELECT * FROM tb_notifikasi where dibaca not like '%$dibaca%' and (kepada = 'all' or kepada = '$_POST[username]')  ");
    // $query2 = mysqli_query($koneksi,"select * from tb_notifikasi");
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($hk2 >= 1){


$kj = mysqli_query($koneksi,"select * from user where username = '$_POST[username]'");
$kj2 = mysqli_fetch_array($kj);

$fs = mysqli_query($koneksi,"select * from tb_order where id_user = '$hk3[idUser]' and jenis_order = 'memberufe' and keterangan = 'belumdibayar' order by id_order desc");
$fs2 = mysqli_fetch_array($fs);
$fs3 = mysqli_num_rows($fs);

$dr = mysqli_query($koneksi,"select * from tb_no_rek ");
$dr2 = mysqli_fetch_array($dr);


$rg = mysqli_query($koneksi,"select * from tb_version_code");
$rg2 = mysqli_fetch_array($rg);


?>

{
  "success": 1,
  
  
  "verif_admin":"<?php echo $kj2['verifikasi_admin'] ?>",
   "link_download":"<?php echo $rg2['download'] ?>",
  "version_code":"<?php echo $rg2['version_code'] ?>",
  
    <?php if($fs3 == 0){
    if($kj2['verifikasi'] == "belum"){
    ?>
"larike": "verif"    
    <?php }else{ ?>

<?php if($kj2['warning_member'] == "tidak"){ ?>    
"larike": "home"
<?php }else{ ?>
"larike": "warning"
<?php } ?>
<?php } ?>
<?php }else{ 
if($kj2['verifikasi'] == "belum"){
?>
"larike": "verif"    
<?php }else{ ?>
"larike": "pembayaran"

<?php } } ?>

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