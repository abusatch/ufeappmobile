<?php
	include "db.php";
	
	class usr{}
    



    
    $dibaca = "-".$_POST['username']."-";
    $pss = md5($_POST['pss']);

    $query = mysqli_query($koneksi,"SELECT * FROM user where username = '$_POST[username]' and password = '$pss'  ");
    
  
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($row >= 1){

?>

<?php
$fr = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_POST[id_rincian]'");
$fr2 = mysqli_fetch_array($fr);
?>


{
  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
  "long_desc": "<?php echo $fr2['long_desc'] ?>",
  "judul": "<?php echo $fr2['nama_menu'] ?>",
  "gambar1": "https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $fr2['gambar'] ?>",
  "gambar2": "https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $fr2['gambar2'] ?>",
  
  "username": "<?php echo $row2 ?>"
}
	
<?php		

	} else { 


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

?>