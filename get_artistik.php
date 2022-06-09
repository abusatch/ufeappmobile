<?php

require_once('db.php');

$result = array();


$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");
$nj2 = mysqli_fetch_array($nj);

if($nj2['member_dari'] == ""){
$idmemberr = $_GET['idmember'];
}else{
  $idmemberr = $nj2['member_dari'];
}

if($_GET['filter'] == ""){
$sql_get_data = "SELECT * FROM tb_activites where id_jenis = '$_GET[id]'";
}else if($_GET['filter'] == "demarches"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'DEMARCHES' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu1"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU1' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu2"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU2' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu3"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU3' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu4"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU4' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu5"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU5' ORDER BY id_menu ASC";

}

$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){


//if($no <= 3){}else{

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}


$gt = mysqli_query($koneksi,"select * from tb_activites_jenis where id_jenis = '$row[id_jenis]'");
$gt2 = mysqli_fetch_array($gt);

?>
{
      "id_actualite": "<?php echo $row['id_activites'] ?>",
      "id_member": "<?php echo $row['id_jenis'] ?>",
      "judul": "<?php echo $row['judul'] ?>",
      "deskripsi": "<?php echo str_replace('"',"'",$row['deskripsi']) ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": "<?php echo $gt2['nama'] ?>",
      "tanggal2": "<?php echo $row['judul'] ?>",
      "url": "<?php echo $row['judul'] ?>",
      "email": "<?php echo $gt2['nama'] ?>",

      "hargaa1": "<?php echo $row['hargaa1'] ?>",
      "hargaa2": "<?php echo $row['hargaa2'] ?>",
      "hargaa3": "<?php echo $row['hargaa3'] ?>",
      "instruktur": "<?php echo $row['instruktur'] ?>",
      "ket_instruktur": "<?php echo $row['ket_instruktur'] ?>",
      "jadwal1": "<?php echo $row['jadwal1'] ?>",
      "jadwal2": "<?php echo $row['jadwal2'] ?>",
      "jadwal3": "<?php echo $row['jadwal3'] ?>",




      "keterangan": "<?php echo str_replace('"',"'",$row['deskripsi']) ?>"
    }
<?php
//}
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>