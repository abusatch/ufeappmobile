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

$sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr' and keterangan = 'pending' and visibility = '1' ORDER BY id_template DESC";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;


$q2 = mysqli_num_rows($query);
if($q2 == 0){
 ?>
 {
      "id_actualite": "empty",
      "id_member": "empty",
      "judul": "empty",
      "deskripsi": "empty",
      "gambar": "empty",
      "tanggal": "empty",
      "tanggal2": "empty",
      "url": "empty",
      "email": "empty",
            "urutan": "empty",
      "keterangan": "empty"
    }
 <?php
}else{

while($row = mysqli_fetch_assoc($query)){

  $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
  $nh2 = mysqli_fetch_array($nh);
  
  $judul1 = str_replace("&petiksatu&","\'",$row['judul']);
$judul2 = str_replace("&petikdua&",'\"',$judul1);

$deskripsi1 = str_replace("&petiksatu&","\'",$row['deskripsi']);
$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);
  
  
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{
      "id_actualite": "<?php echo $row['id_template'] ?>",
      "id_member": "<?php echo $row['id_member_vip'] ?>",
      "judul": "<?php echo $judul2 ?>",
      "deskripsi": "<?php echo $deskripsi2 ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": "<?php echo $row['tanggal'] ?>",
      "tanggal2": "<?php echo $row['tanggal2'] ?>",
      "url": "<?php echo $row['linkweb'] ?>",
          "urutan": "<?php echo $no ?>",
      "email": "<?php echo $nh2['username'] ?>",
      "keterangan": "<?php echo $row['keterangan'] ?>"
    }
<?php
$no++;}
}
echo "]}";
//echo json_encode(array('result'=>$result));

?>