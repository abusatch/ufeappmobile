<?php 
	include 'db.php';
// 	$response = array();

	
// 		$response['result'] = "0";
// 		$response['msg'] = "tes".$_POST['emailtujuan'];
		  
$kodeverif = $_POST['t1'].$_POST['t2'].$_POST['t3'].$_POST['t4'];

$de = mysqli_query($koneksi,"select * from user where username = '$_POST[emailtujuan]' and kode_verif = '$kodeverif'");
$de2 = mysqli_num_rows($de);

if($de2 == 0){
 ?>
 {
 "result":"0",
 "msg":"Kode salah"
 }
 
 <?php 
}else{
 ?>
 {
 "result":"1",
 "msg":"Kode benar"
 }
 
 <?php } ?>