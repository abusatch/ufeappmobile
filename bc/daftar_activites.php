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

        mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		values
		('Ordre des activités','Merci d’avoir commander, s’il vous plaît effectuer le paiement','$_POST[username]','-','-','$tanggal','$tanggal2')");
		
	
	
	
	
	$pl = mysqli_query($koneksi,"select * from tb_order where id_user = '$_POST[username]' order by id_order desc");
	$pl2 = mysqli_fetch_array($pl);
	
	date_default_timezone_set('Asia/Jakarta');
		$stop_date = date('Y-m-d');
	$stop_date = date('ymd', strtotime($stop_date . ' +0 day'));
	
	$noin = "INV/".$_POST['username'].$pl2['id_order'].$stop_date;
	
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