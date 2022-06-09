<?php
	include "db.php";
	
	class usr{}
    



    
    $dibaca = "-".$_POST['username']."-";
    $pss = md5($_POST['pss']);

    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");
    
  
	
    $roww = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if (!empty($row)){

        $nd = mysqli_query($koneksi,"select * from tb_profile_ufe limit 1");
        $row = mysqli_fetch_array($nd);
?>

{
  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
  "nama_depan": "<?php echo $row['deskripsi'] ?>",
  "nama_belakang": "<?php echo $row['alamat'] ?>",
  "tempat_lahir": "<?php echo $row['telepon'] ?>",
  "tanggal_lahir": "<?php echo $row['mobile'] ?>",
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