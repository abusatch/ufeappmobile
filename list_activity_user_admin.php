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
$limit = 5;

$hal = $_GET['halaman'] - 1;

$start = $hal*$limit;

$sql_get_data = "SELECT a.tanggal_awal as tanggal_awal,
a.tanggal_akhir as tanggal_akhir,
a.id_order as id_order,
a.id_activites as id_activites,
a.id_order_aktif as id_order_aktif,
a.id_user as id_user,
a.nama_kegiatan as nama_kegiatan

FROM tb_order_aktif a, user b where a.id_user = b.idUser and  a.tanggal_akhir >= '$tang22' and b.username like '%$_GET[cari]%'  ORDER BY a.id_order_aktif DESC limit $start,$limit";


// $sql_get_data = "SELECT a.tanggal_awal as tanggal_awal,
// a.tanggal_akhir as tanggal_akhir,
// a.id_order as id_order,
// a.id_activites as id_activites,
// a.id_order_aktif as id_order_aktif,
// a.id_user as id_user,
// a.nama_kegiatan as nama_kegiatan

// FROM tb_order_aktif a, tb_order b where  a.tanggal_akhir >= '$tang22'  ORDER BY a.id_order_aktif DESC";


// $sql_get_data = "SELECT * FROM tb_order_aktif where  tanggal_akhir >= '$tang22'  ORDER BY id_order_aktif DESC";
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

  $nh = mysqli_query($koneksi,"select * from user where idUser = '$idmemberr'");
  $nh2 = mysqli_fetch_array($nh);
  
   $nc = mysqli_query($koneksi,"select * from user where idUser = '$row[id_user]'");
  $nc2 = mysqli_fetch_array($nc);
  
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{


      "id_actualite": "<?php echo $row['id_order_aktif'] ?>",
      "id_member": "<?php echo $row['id_user'] ?>",
      "judul": "<?php echo $row['nama_kegiatan'] ?>",
              "no_invoice": "<?php echo $gt2['no_invoice'] ?>",
        "harga_asli": "<?php echo $gt2['jenis_order'] ?>",
      "deskripsi": "<?php echo $row['nama_kegiatan'] ?>",
      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/activites/<?php echo $sq2['gambar2'] ?>",
      "tanggal": "<?php echo $row['tanggal_awal'] ?>",
      "tanggal2": "<?php echo $row['tanggal_akhir'] ?>",
      "url": "<?php echo $row['tanggal_akhir'] ?>",
      "email": "<?php echo $nc2['username'] ?>",
      "emailuser": "<?php echo $nc2['username'] ?>",
            "urutan": "PERIODE: <?php echo $tangg.' - '.$tangg33 ?>",
      "keterangan": "<?php echo $row['nama_kegiatan'] ?>"
    }
<?php
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>