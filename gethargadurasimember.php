<?php

include('db.php');
echo "[";
$no = 1;
$fg = mysqli_query($koneksi,"select * from tb_harga_member order by id_harga asc");
while($fg2 = mysqli_fetch_array($fg)){
	
	if($no == 1){}else{echo ",";}
	?>
	{
		"harganya":"<?php echo $fg2['ket']; ?>"
	}
	
	<?php
$no++;}
echo "]";
?>