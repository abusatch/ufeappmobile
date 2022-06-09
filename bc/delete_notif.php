<?php 
    include "db.php";
    $pss = md5($_GET['pss']);

$de = mysqli_query($koneksi,"select * from user where idUser = '$_GET[iduser]' and password = '$pss'");
$de2 = mysqli_num_rows($de);

$h1 = $_GET['idnotif']."-";


$dw = mysqli_query($koneksi,"select * from tb_notifikasi where id_notifikasi = '$_GET[idnotif]'");
$dw2 = mysqli_fetch_array($dw);
$dw3 = $dw2['dihapus'];
$dw4 = $dw3.$_GET['iduser']."-";

if($de2 == 0){}else{

    mysqli_query($koneksi,"update tb_notifikasi set dihapus = '$dw4' where id_notifikasi = '$_GET[idnotif]'");

}

    ?>