<?php

include "db.php";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



//$tes = mysqli_query($koneksi,"insert into user (idUser,username,password,nama) values (null,'aboe','ddddddd','tes')");

$tes = mysqli_query($koneksi,"update user set nama = 'tes333',password = '202cb962ac59075b964b07152d234b70', level = 'freeuser' where username = 'aboe'");


if(!$tes){

    echo "gagal";
}


?>