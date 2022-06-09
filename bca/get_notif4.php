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
    
    $hk = mysqli_query($koneksi,"select * from user where username = '$_POST[username]'");
    
    $hk2 = mysqli_num_rows($hk);
    $hk3 = mysqli_fetch_array($hk);
    

    
    
    
    $dibaca = "-".$hk3['idUser']."-";

    $query = mysqli_query($koneksi,"SELECT * FROM tb_notifikasi where dibaca not like '%$dibaca%' and (kepada = 'all' or kepada = '$hk3[idUser]')  ");
    // $query2 = mysqli_query($koneksi,"select * from tb_notifikasi");
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($hk2 >= 1){


$kj = mysqli_query($koneksi,"select * from user where username = '$_POST[username]'");
$kj2 = mysqli_fetch_array($kj);


	$bg = mysqli_query($koneksi,"select * from tb_template where visibility = '1' and keterangan = 'release' order by id_template desc limit 1");
			$bg2 = mysqli_fetch_array($bg);


    if($_POST['token_push'] == ""){
        
    }else if($_POST['token_push'] == null){
        
    }else if($_POST['token_push'] == "null"){
        
    }else{
        mysqli_query($koneksi,"update user set token_push = '$_POST[token_push]' where username = '$_POST[username]'");
    }    


?>

{
  "success": 1,
  
 "verifikasi_admin":"<?php echo $kj2['verifikasi_admin'] ?>",    
     
  
  
  
  
  <?php 
  $judul1 = str_replace("&petiksatu&","\'",$bg2['judul']);
$judul2 = str_replace("&petikdua&",'\"',$judul1);

$deskripsi1 = str_replace("&petiksatu&","\'",$bg2['deskripsi']);
$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);
  ?>
  
  
  	
			"judul": "<?php echo $judul2; ?>",
			"deskripsi": "<?php echo $deskripsi2; ?>",
			"gambar": "https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $bg2['gambar'] ?>",
			"link": "<?php echo $bg2['linkweb']; ?>",

  
  
  
  
  
  
  
  
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
  
    "tulisan1":"<?php echo $po2['tulisan1'] ?>",
  "tulisan2":"<?php echo $po2['tulisan2'] ?>",
"tulisan3":"<?php echo $po2['tulisan3'] ?>",
"tulisan4":"<?php echo $po2['tulisan4'] ?>",
"tulisan5":"<?php echo $po2['tulisan5'] ?>",
"tulisan6":"<?php echo $po2['tulisan6'] ?>",
"tulisan7":"<?php echo $po2['tulisan7'] ?>",
"tulisan8":"<?php echo $po2['tulisan8'] ?>",
"tulisan9":"<?php echo $po2['tulisan9'] ?>",
"tulisan10":"<?php echo $po2['tulisan10'] ?>",
"tulisan11":"<?php echo $po2['tulisan11'] ?>",

<?php

$ev = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_POST[id]'");
$ev2 = mysqli_fetch_array($ev);

$oh = mysqli_query($koneksi,"select * from tb_demar2 where id_demar = '$_POST[id]'");
$oh2 = mysqli_fetch_array($oh);

$wn = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$oh2[id_kategori]'");
$wn2 = mysqli_fetch_array($wn);

?>
"bg2":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $ev2['bg2'] ?>",
"bg22":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wn2['bg2'] ?>",

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