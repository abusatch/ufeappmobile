<?php

require_once('db.php');

$result = array();




$fr = mysqli_query($koneksi,"select * from tb_demar2 where id_demar = '$_GET[id_kategori]'");
$fr2 = mysqli_fetch_array($fr);

$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");
$nj2 = mysqli_fetch_array($nj);

if($nj2['member_dari'] == ""){
$idmemberr = $_GET['idmember'];
}else{
  $idmemberr = $nj2['member_dari'];
}

if($_GET['filter'] == ""){
$sql_get_data = "select * from tb_demar2 where id_kategori = '$fr2[id_kategori]' and id_demar != '$_GET[id_kategori]' and visibility = '1' order by id_demar desc";
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
 $sql_get_data = "select * from tb_demar2 where id_kategori = '$_GET[id_kategori]' order by id_demar desc";   
}

$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){

$gf = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$fr2[id_kategori]'");
$gf2 = mysqli_fetch_array($gf);

// if($no <= 1){}else{

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{
      "id_actualite": "<?php echo $row['id_demar'] ?>",
      "id_member": "<?php echo $row['id_demar'] ?>",
      "judul": "<?php echo $row['judul'] ?>",
      "deskripsi": "<?php echo $row['short_desc'] ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": "<?php echo $row['judul'] ?>",
      "tanggal2": "<?php echo $row['judul'] ?>",
      "url": "<?php echo $row['long_desc'] ?>",
      "email": "<?php echo $row['judul2'] ?>",
      "keterangan": "<?php echo $gf2['nama_menu'] ?>"
    }
<?php
// }
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>