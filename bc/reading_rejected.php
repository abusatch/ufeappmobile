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

$sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr' and keterangan = 'rejected' and visibility = '1'  ORDER BY id_template DESC";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){

  $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
  $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{
      "id_actualite": "<?php echo $row['id_template'] ?>",
      "id_member": "<?php echo $row['id_member_vip'] ?>",
      "judul": "<?php echo $row['judul'] ?>",
      "deskripsi": "<?php echo $row['deskripsi'] ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": "<?php echo $row['tanggal'] ?>",
      "tanggal2": "<?php echo $row['tanggal2'] ?>",
      "url": "<?php echo $row['linkweb'] ?>",
      "email": "<?php echo $nh2['username'] ?>",
          "urutan": "<?php echo $no ?>",
      "keterangan": "<?php echo $row['keterangan'] ?>"
    }
<?php
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>