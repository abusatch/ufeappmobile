<?php
	include "db.php";
	
	class usr{}
    




    

	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');








    
    $dibaca = "-".$_POST['username']."-";
    $pss = md5($_POST['pss']);

    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");
    
  
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($row2 >= 1){
// params["username"] = sharedPreference.getString("id_user", "")!!
    // params["pss"] = sharedPreference.getString("pss", "")!!
    // params["id_user"] = sharedPreference.getString("pss", "")!!
    // params["nama_depan"] = nama_depan.text.toString()
    // params["nama_belakang"] = nama_belakang.text.toString()
    // params["tempat_lahir"] = tempat_lahir2.text.toString()
    // params["tanggal_lahir"] = tanggal_lahir2.text.toString()
    // params["gender"] = mySpinner.selectedItem.toString()
    // params["harga"]

        if($_POST['nama_depan'] == ""){
            ?>
{
  "success": 0,
  "message": "Nama depan tidak boleh kosong",
  "id": "Nama depan tidak boleh kosong",
  "username": "Nama depan tidak boleh kosong"
}
            <?php
        }else if($_POST['nama_belakang'] == ""){

?>
{
  "success": 0,
  "message": "Nama belakang tidak boleh kosong",
  "id": "Nama depan tidak boleh kosong",
  "username": "Nama depan tidak boleh kosong"
}
    <?php
    }    else{  



        mysqli_query($koneksi,"update user set first_name = '$_POST[nama_depan]', second_name = '$_POST[nama_belakang]' where idUser = '$_POST[username]'");

        $fd = mysqli_query($koneksi,"select * from tb_order where id_activites = '123' and id_user = '$_POST[username]' and ket = 'belumdibayar' and hapus = '2'");
        $fd2 = mysqli_num_rows($fd);

        if($fd2 == 0){

            $daftur = strtoupper($_POST['harga_daftar']);

             if($daftur == "14 JOURS - IDR 5.000.000"){
	            $hargaa = "5000000";
	        }else if($daftur == "1 MOIS - IDR 10.000.000"){
	             $hargaa = "10000000";
	        }else if($daftur == "3 MOIS - IDR 20.000.000"){
	            $hargaa = "20000000";
	        }else if($daftur == "6 MOIS - IDR 35.000.000"){
	            $hargaa = "35000000";
	        }else if($daftur == "1 AN - IDR 50.000.000"){
	            $hargaa = "50000000";
	        }


        mysqli_query($koneksi,"insert into tb_order (
            id_order	,
            id_activites,
            jenis_order	,
            id_user	,
            nama_produk	,
            nama_depan	,
            nama_belakang	,
            tempat_lahir	,
            tanggal_lahir	,
            gender	,
            harga	,
            tanggal	,
            tanggal2	,
            ket	
        ) values (
            null,
            '123',
            'memberufe',
            '$_POST[username]',
            'Member UFE',
            '$_POST[nama_depan]',
            '$_POST[nama_belakang]',
            '',
            '',
            '',
            '$hargaa',
            '$tanggal',
            '$tanggal2',
            'belumdibayar'
            )");

        mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		values
		('Member UFE','Merci de vous ??tre inscrit en tant que membre de l'UFE, veuillez effectuer un paiement','$_POST[username]','-','-','$tanggal','$tanggal2')");


$pl = mysqli_query($koneksi,"select * from tb_order where id_user = '$_POST[username]' order by id_order desc");
	$pl2 = mysqli_fetch_array($pl);
	
	date_default_timezone_set('Asia/Jakarta');
		$stop_date = date('Y-m-d');
	$stop_date = date('ymd', strtotime($stop_date . ' +0 day'));
	
	$noin = "INV/".$_POST['username'].$pl2['id_order'].$stop_date;
	
	mysqli_query($koneksi,"update tb_order set no_invoice = '$noin' where id_order = '$pl2[id_order]'");






$to = "indonesie@ufe.org,abusatch@gmail.com";
$subject = "Order Baru";

$message = "
<html>
<head>
<title>UFE Indonesie</title>
</head>
<body>


<fieldset style='text-align:left;border:1px solid #707070;padding:10px;border-radius:3px;max-width:600px;'>

<table style='width:100%;'>
<tr>
<td style='font-size:20px;'>
Hello Admin,<br><br>Ada Member Company baru, berikut ini rincian ordernya.
</td>
</tr>
</table>

<table style='width:100%;'>
<tr>
<td style='font-size:20px;'>
No. Invoice
</td>
<td style='font-size:20px;'>
:
</td>
<td style='font-size:20px;'>
".$noin."
</td>
</tr>


<tr>
<td style='font-size:20px;'>
Email
</td>
<td style='font-size:20px;'>
:
</td>
<td style='font-size:20px;'>
".$row['username']."
</td>
</tr>
</table>

</fieldset>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <admin.ufe@ufe.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);









?>

{
  "success": 1,
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
  "nama_depan": "<?php echo $row['first_name'] ?>",
  "nama_belakang": "<?php echo $row['second_name'] ?>",
  "tempat_lahir": "<?php echo $row['tempat_lahir'] ?>",
  "tanggal_lahir": "<?php echo $row['tanggal_lahir'] ?>",
  "username": "<?php echo $row2 ?>"
}
	
<?php		
    }else{
        ?>
        {
  "success": 2,
  "message": "veuillez d'abord terminer votre transaction",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}
        
        <?php
    }
    }
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