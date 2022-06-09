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

$sql_get_data = "SELECT * FROM tb_actualite where visibility = '1' ORDER BY id_actualite DESC";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){
  //$result[] = $row;
 
//  $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//  $nh2 = mysqli_fetch_array($nh);
 
  if($no == 1){}else{echo ",";}
?>
{
      "id_actualite": "<?php echo $row['id_actualite'] ?>",
      "id_member": "<?php echo $row['id_actualite'] ?>",
      "judul": "<?php echo $row['judul'] ?>",
      "deskripsi": "<?php echo str_replace('"',"'",$row['deskripsi']) ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": "<?php echo $row['judul'] ?>",
      "tanggal2": "<?php echo $row['judul'] ?>",
      "url": "<?php echo str_replace('"',"'",$row['url']) ?>",
      "email": "<?php echo $row['url'] ?>",
      "keterangan": "<?php echo $row['url'] ?>"
    }
<?php
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>