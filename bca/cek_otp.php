<?php
	include "db.php";
	
    $de = mysqli_query($koneksi,"select * from user where username = '$_POST[username]' and otp_lupa = '$_POST[kode_otp]'");
    $de2 = mysqli_num_rows($de);
    
    if($de2 == 0){
        ?>
        {
        "success":0,
        "message":"CODE OTP not correct"
        }
        <?php
    }else{
?>
{
"success":1,
        "message":"Reset Password"
}

<?php } ?>