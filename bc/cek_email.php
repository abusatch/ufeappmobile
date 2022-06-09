<?php
	include "db.php";
	
    $de = mysqli_query($koneksi,"select * from user where username = '$_POST[username]'");
    $de2 = mysqli_num_rows($de);
    
    if($de2 == 0){
        ?>
        {
        "success":0,
        "message":"<?php echo $_POST['username'] ?> not exist"
        }
        <?php
    }else{
?>
{
"success":1,
"message":"<?php echo $_POST['username'] ?>"
}

<?php } ?>