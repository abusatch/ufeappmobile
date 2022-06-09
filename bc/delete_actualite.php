<?php 

include('db.php');

$pss = md5($_POST['pss']);

$kj = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]' and password = '$pss' and level = 'admin-ufe'");
$kj2 = mysqli_num_rows($kj);
$kj3 = mysqli_fetch_array($kj);


if($kj2 == 0){
    ?>
 {
    "success":0,
    "message":"gagal"
  }  
<?php
}else{
    
    mysqli_query($koneksi,"delete from tb_actualite where id_actualite = '$_POST[id_artikel]'");
    
?>
   {
    "success":1,
    "message":"berhasil",
    "username":"berhasil"
    
  } 
    <?php
}


?>