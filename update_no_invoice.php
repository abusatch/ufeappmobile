<?php 
include('db.php');


$gh = mysqli_query($koneksi,"select * from tb_order");
while($gh2 = mysqli_fetch_array($gh)){
	$stop_date = $gh2['tanggal'];
	$stop_date = date('ymd', strtotime($stop_date . ' +0 day'));
	
	$noin = "INV/".$gh2['id_user'].$gh2['id_order'].$stop_date;
	
	if($gh2['no_invoice'] == null){
		mysqli_query($koneksi,"update tb_order set no_invoice = '$noin' where id_order = '$gh2[id_order]'");
		
	}
	
	
}

?>