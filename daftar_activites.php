<?php
	include "db.php";
	

if(!empty($_POST['username2'])){
  echo "[";
}


	class usr{}
    




    

	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');






  $ejf = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]' and password = '$_POST[pss2]'");
  $ejf2 = mysqli_fetch_assoc($ejf);

    if(empty($_POST['username2'])){
    $dibaca = "-".$_POST['username']."-";
    }else{
      $ejf = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]' and password = '$_POST[pss2]'");
      $ejf2 = mysqli_fetch_assoc($ejf);
     $dibaca =  "-".$ejf2['idUser']."-";
    }

    if(empty($_POST['username2'])){
    $pss = md5($_POST['pss']);
    }else{
      $pss = $_POST['pss2']; 
    }

    if(empty($_POST['username2'])){
    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");
    }else{
    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$ejf2[idUser]' and password = '$_POST[pss2]'  ");  
    }
  
	
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
  "message": "Le nom avant ne peut pas être vierge",
  "id": "Le nom avant ne peut pas être vierge",
  "username": "Le nom avant ne peut pas être vierge"
}
            <?php
        }else if($_POST['nama_belakang'] == ""){

?>
{
  "success": 0,
  "message": "Le nom arrière ne peut pas être vierge",
  "id": "Le nom arrière ne peut pas être vierge",
  "username": "Le nom arrière ne peut pas être vierge"
}
<?php
        }else if($_POST['alamat'] == ""){
?>

{
  "success": 0,
  "message": "L’adresse ne peut pas être vide",
  "id": "L’adresse ne peut pas être vide",
  "username": "L’adresse ne peut pas être vide"
}
<?php
        }else if($_POST['telp'] == ""){
?>

{
  "success": 0,
  "message": "Le téléphone ne peut pas être vide",
  "id": "Le téléphone ne peut pas être vide",
  "username": "Le téléphone ne peut pas être vide"
}
<?php
        // }else if($_POST['gender'] == ""){
        //     ?>
            <!--
        //     {
        //       "success": 0,
        //       "message": "Gender tidak boleh kosong",
        //       "id": "Nama depan tidak boleh kosong",
        //       "username": "Nama depan tidak boleh kosong"
        //     }
        //     <?php
        // }else if($_POST['harga'] == ""){
        //                 ?>
                        
        //     {
        //     "success": 0,
        //     "message": "Harga tidak boleh kosong",
        //     "id": "Nama depan tidak boleh kosong",
        //     "username": "Nama depan tidak boleh kosong"
        //     }-->
    <?php
    }    else{  



$dw = mysqli_query($koneksi,"select * from tb_activites where id_activites = '$_POST[id]'");
$dw2 = mysqli_fetch_array($dw);

$harga212 = substr($_POST['harga'],5,100);
$harga213 = str_replace(".","",$harga212);

$pesun = "Merci d’avoir commander, s’il vous plaît effectuer le paiement";

if(empty($_POST['username2'])){
$fe = mysqli_query($koneksi,"select * from tb_order where id_activites = '$_POST[id]' and jenis_order = 'activites' and id_user = '$_POST[username]' and 
(ket = 'menunggu'
  or ket = 'belumdibayar') and hapus = '2'


");

mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('$_POST[id]', 'kiu1')");
}else{
$fe = mysqli_query($koneksi,"select * from tb_order where id_activites = '$_POST[id]' 
and jenis_order = 'activites' 
and id_user = '$ejf2[idUser]' and (ket = 'menunggu'
  or ket = 'belumdibayar') and hapus = '2'
  ");
mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('$_POST[id]', 'kiu2')");

}
$fe2 = mysqli_num_rows($fe);
if($fe2 >= 1){
    
	mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('$_POST[id]', 'ss1')");
	?>
    {
  "success": 0,
  "message": "Ce type de transaction existe déjà",
  "id": "Ce type de transaction existe déjà",
  "username": "Ce type de transaction existe déjà"
}
    <?php
}else{


$kett22 = "id_activites-".$_POST['id']."-jenis_order-activites-id_user-".$ejf2['idUser'];

mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('$_POST[id]', '$kett22')");

	    if($harga213 == 'it'){
        if(empty($_POST['username2'])){
        mysqli_query($koneksi,"insert into tb_order (
            id_activites	,
            jenis_order	,
            id_user	,
            nama_produk	,
            nama_depan	,
            nama_belakang	,
            alamat	,
            telepon	,
            harga	,
            tanggal	,
            tanggal2,
            ket
        ) values (
            '$_POST[id]','activites','$_POST[username]','$dw2[judul]',null,null,null
        ,null,'$_POST[harga]','$tanggal','$tanggal2','menunggu')");
        
        }else{
          mysqli_query($koneksi,"insert into tb_order (
            id_activites	,
            jenis_order	,
            id_user	,
            nama_produk	,
            nama_depan	,
            nama_belakang	,
            alamat	,
            telepon	,
            harga	,
            tanggal	,
            tanggal2,
            ket
        ) values (
            '$_POST[id]','activites','$ejf2[idUser]','$dw2[judul]',null,null,null
        ,null,'$_POST[harga]','$tanggal','$tanggal2','menunggu')");
        }

	    }else{
        if(empty($_POST['username2'])){
        mysqli_query($koneksi,"insert into tb_order (
            id_activites	,
            jenis_order	,
            id_user	,
            nama_produk	,
            nama_depan	,
            nama_belakang	,
            alamat	,
            telepon	,
            harga	,
            tanggal	,
            tanggal2
        ) values (
            '$_POST[id]','activites','$_POST[username]','$dw2[judul]',null,null,null
        ,null,'$_POST[harga]','$tanggal','$tanggal2')");
        }else{
          mysqli_query($koneksi,"insert into tb_order (
            id_activites	,
            jenis_order	,
            id_user	,
            nama_produk	,
            nama_depan	,
            nama_belakang	,
            alamat	,
            telepon	,
            harga	,
            tanggal	,
            tanggal2
        ) values (
            '$_POST[id]','activites','$ejf2[idUser]','$dw2[judul]',null,null,null
        ,null,'$_POST[harga]','$tanggal','$tanggal2')");
        }
	        
	    }

        if($harga213 == 'it'){

          if(empty($_POST['username2'])){
        mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		values
		('Ordre des activités','Merci, votre commande est en attente d`approbation par l`administrateur','$_POST[username]','-','-','$tanggal','$tanggal2')");
          }else{
            mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
            values
            ('Ordre des activités','Merci, votre commande est en attente d`approbation par l`administrateur','$ejf2[idUser]','-','-','$tanggal','$tanggal2')");
           
          }
		
		$to = $_GET['email'].",abusatch@gmail.com";
$subject = "Daftar Bridge";

$message = "
<html>
<head>
<title>UFE Indonésie</title>
</head>
<body>
<fieldset style='text-align:left;border:1px solid #D1D1D1;padding:10px;border-radius:3px;max-width:600px;'>

<br>
Admin ada yang daftar bridge, cek yu


<table style='width:100%;margin-top:5px;'>
<tr><th style='font-size:20px;text-align:left;'>
UFE Section Indonésie</th></tr></table>

<table style='width:100%;'>
<tr><td style='font-size:15px;'>
Jakarta - Indonésie<br>
e-mail: indonesie@ufe.org<br>
site internet: ufe-section-indonesie.org
</td></tr></table>
</fieldset>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: UFE Indonésie<indonesie@ufe.org>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
		
        }else{

          if(empty($_POST['username2'])){
        mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		values
		('Ordre des activités','$pesun','$_POST[username]','-','-','$tanggal','$tanggal2')");
        
          }else{
            mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
            values
            ('Ordre des activités','$pesun','$ejf2[idUser]','-','-','$tanggal','$tanggal2')");
                
          }
  
  }
	
	
	
	if(empty($_POST['username2'])){
	$pl = mysqli_query($koneksi,"select * from tb_order where id_user = '$_POST[username]' order by id_order desc");
  }else{
    $pl = mysqli_query($koneksi,"select * from tb_order where id_user = '$ejf2[idUser]' order by id_order desc");    
  }
	$pl2 = mysqli_fetch_array($pl);
	
	date_default_timezone_set('Asia/Jakarta');
		$stop_date = date('Y-m-d');
	$stop_date = date('ymd', strtotime($stop_date . ' +0 day'));
	
	if(empty($_POST['username2'])){
	$noin = "INV/".$_POST['username'].$pl2['id_order'].$stop_date;
  }else{
    $noin = "INV/".$ejf2['idUser'].$pl2['id_order'].$stop_date;
  }
	
	mysqli_query($koneksi,"update tb_order set no_invoice = '$noin' where id_order = '$pl2[id_order]'");
	

?>

{
  "success": 1,
  "message": "Données ont été ajoutées",
  "id": "<?php echo $row2 ?>",
  "nama_depan": "<?php echo $row['first_name'] ?>",
  "nama_belakang": "<?php echo $row['second_name'] ?>",
  "tempat_lahir": "<?php echo $row['tempat_lahir'] ?>",
  "tanggal_lahir": "<?php echo $row['tanggal_lahir'] ?>",
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

<?php  

if(!empty($_POST['username2'])){
  echo "]";
}
?>