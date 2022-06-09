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
$sql_get_data = "select * from tb_menu where jenis = 'DEMARCHES' and id_menu != '$_GET[filter]' order by id_menu asc";
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

}else{
 $sql_get_data = "select * from tb_menu where jenis = 'DEMARCHES' and id_menu != '$_GET[filter]' order by id_menu asc";   
}

$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){


// if($no <= 1){}else{

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
  
  $nama_menu1 = str_replace("&petiksatu&","'",$row['nama_menu']);
$nama_menu11 = str_replace("&petiksatu&","'",$nh2['nama_menu']);
  $short_desc1 = str_replace("&petiksatu&","'",$row['short_desc']);  
  $long_desc1 = str_replace("&petiksatu&","'",$row['long_desc']);  
?>
{
      "id_actualite": "<?php echo $row['id_menu'] ?>",
      "id_member": "<?php echo $row['id_menu'] ?>",
      "judul": "<?php echo $nama_menu1 ?>",
      "deskripsi": "<?php echo $short_desc1 ?>",
      "gambar": "<?php echo $row['gambar2'] ?>",
      "tanggal": "<?php echo $nama_menu1 ?>",
      "tanggal2": "<?php echo $nama_menu1 ?>",
      "url": "<?php echo $long_desc1 ?>",
      "email": "<?php echo $nama_menu11 ?>",
      "keterangan": "<?php echo $short_desc1 ?>"
    }
<?php
// }
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>