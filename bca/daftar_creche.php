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
	
	if (!empty($row)){
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
        }else if($_POST['tempat_lahir'] == ""){
?>

{
  "success": 0,
  "message": "Tempat lahir tidak boleh kosong",
  "id": "Nama depan tidak boleh kosong",
  "username": "Nama depan tidak boleh kosong"
}
<?php
        }else if($_POST['tanggal_lahir'] == ""){
?>

{
  "success": 0,
  "message": "Tanggal lahir tidak boleh kosong",
  "id": "Nama depan tidak boleh kosong",
  "username": "Nama depan tidak boleh kosong"
}
<?php
        }else if($_POST['gender'] == ""){
            ?>
            
            {
              "success": 0,
              "message": "Gender tidak boleh kosong",
              "id": "Nama depan tidak boleh kosong",
              "username": "Nama depan tidak boleh kosong"
            }
            <?php
        }else if($_POST['harga'] == ""){
                        ?>
                        
            {
            "success": 0,
            "message": "Harga tidak boleh kosong",
            "id": "Nama depan tidak boleh kosong",
            "username": "Nama depan tidak boleh kosong"
            }
    <?php
    }    else{  



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
            null,'3','creche','$_POST[username]','$_POST[nama_produk]','$_POST[nama_depan]','$_POST[nama_belakang]','$_POST[tempat_lahir]'
        ,'$_POST[tanggal_lahir]','$_POST[gender]','$_POST[harga]','$tanggal','$tanggal2','belumdibayar'
            )");

        mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		values
		('Ordre créche','Merci d’avoir commander, s’il vous plaît effectuer le paiement','$_POST[username]','-','-','$tanggal','$tanggal2')");

		
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
  "message": "ini ya - <?php echo $row2.' - '.$_POST['username'] ?> - dan ini <?php echo $dibaca ?> ket <?php echo mysqli_error($koneksi); ?>",
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