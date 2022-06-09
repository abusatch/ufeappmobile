<?php
	include "db.php";
	
	class usr{}
    



    
    $dibaca = "-".$_POST['username']."-";
    $pss = md5($_POST['pss']);

    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");
    
  
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($row >= 1){

?>

<?php
// $fr = mysqli_query($koneksi,"select * from tb_agent where id_agent = '$_POST[id_agent]'");
// $fr2 = mysqli_fetch_array($fr);
?>


{
  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
  "nama_depan": "<?php echo $row['first_name'] ?>",
  "nama_belakang": "<?php echo $row['second_name'] ?>",
  "alamat": "<?php echo $row['alamat'] ?>",
  "propic": "http://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $row['propic'] ?>",
    "level": "<?php echo $row['level'] ?>",
    
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