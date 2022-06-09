<?php

require_once('db.php');

$result = array();

date_default_timezone_set('Asia/Jakarta');
$tang22 = date('Y-m-d');


$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");
$nj2 = mysqli_fetch_array($nj);

if($nj2['member_dari'] == ""){
$idmemberr = $_GET['idmember'];
}else{
  $idmemberr = $nj2['member_dari'];
}

$sql_get_data = "SELECT * FROM tb_order_aktif where id_user = '$idmemberr' and tanggal_akhir >= '$tang22'  ORDER BY id_order_aktif DESC";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){


$gt = mysqli_query($koneksi,"select * from tb_order where id_order = '$row[id_order]'");
$gt2 = mysqli_fetch_array($gt);



$tangg = date('M Y', strtotime($row['tanggal_awal'] . ' +0 day'));
$tangg33 = date('M Y', strtotime($row['tanggal_akhir'] . ' +0 day'));


$sq = mysqli_query($koneksi,"select * from tb_activites where id_activites = '$row[id_activites]'");
$sq2 = mysqli_fetch_array($sq);

// $gf = mysqli_query($koneksi,"select * from tb_creche where ket1 = '$row[harga]'");
// $gf2 = mysqli_fetch_array($gf);

  $nh = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");
  $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{


      "id_actualite": "<?php echo $row['id_order_aktif'] ?>",
      "id_member": "<?php echo $row['id_user'] ?>",
      "judul": "<?php echo $row['nama_kegiatan'] ?>",
       "emailuser": "<?php echo $row['nama_kegiatan'] ?>",
        "harga_asli": "<?php echo $gt2['jenis_order'] ?>",
                   "no_invoice": "<?php echo $gt2['no_invoice'] ?>",
      "deskripsi": "<?php echo $row['nama_kegiatan'] ?>",
      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/activites/<?php echo $sq2['gambar2'] ?>",
      "tanggal": "<?php echo $row['tanggal_awal'] ?>",
      "tanggal2": "<?php echo $row['tanggal_akhir'] ?>",
      "url": "<?php echo $row['tanggal_akhir'] ?>",
      "email": "<?php echo $row['nama_kegiatan'] ?>",
            "urutan": "PERIODE: <?php echo $tangg.' - '.$tangg33 ?>",
      "keterangan": "<?php echo $row['nama_kegiatan'] ?>"
    }
<?php
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>