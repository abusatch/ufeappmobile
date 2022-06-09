<?php 
include('db.php');

date_default_timezone_set('Asia/Jakarta');
$hariini = date('Y-m-d');
//$stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));


$bg = mysqli_query($koneksi,"select * from user where level = 'vip-admin'");
while($bg2 = mysqli_fetch_array($bg)){
	if($bg2['masa_aktif'] <= $hariini){
		mysqli_query($koneksi,"update tb_template set keterangan = 'pending' where id_member_vip = '$bg2[idUser]'");
	}
}


?>