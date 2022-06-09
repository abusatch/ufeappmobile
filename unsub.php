<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. Fratekindo | Log in</title>

</head>
<?php 

include('db.php');
mysqli_query($koneksi,"update user set kirim_email = 'tidak' where username='$_GET[e]'");
?>

<body style="background:black;">
<table style="width:100%;">
<tr>
<td style="text-align:center;">
<img src="check.gif" style="width:100%;max-width:500px;" />
</td>
</tr>

<tr>
<td style="text-align:center;">
<span style="color:#fff;font-family:arial;">
UNSUBSCRIBE A RÉUSSI
</span>
</td>
</tr>
</table>

<script type="text/javascript">
        window.onload = function () { Clear(); }
        function Clear() {          
            var Backlen=history.length;
            if (Backlen > 0) history.go(-Backlen);
        }
</script>
<script type="text/javascript">
       if(window.history.forward(1) != null)
           window.history.forward(1);
</script>
<script>
setTimeout(function(){ location = "https://ufe-section-indonesie.org/ufeapp/prtr.php"; }, 2500);
</script>

</body>
</html>