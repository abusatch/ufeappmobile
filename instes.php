<?php


	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');
	$tanggal3 = substr(date('YmdHis',0,-1));
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
	include "db.php";
$in = mysqli_query($koneksi,"insert into tb_pembayaran (id_order, date, tanggal2, id_user, nilai
,ket
,keterangan
) 
values ('321', '$tanggal', '$tanggal2', '1','2',
'belumdikonfirmasi',
'belum'
)");

if($in){
	echo "berhasil";
}else{
	echo mysqli_error($koneksi);
}
?>