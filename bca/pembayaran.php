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

$sql_get_data = "SELECT * FROM tb_order where id_user = '$idmemberr' and (ket = 'belumdibayar' or ket = 'menunggu') and hapus = '2' and no_invoice like '%$_GET[cari]%' ORDER BY id_order DESC";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){


$tangg = date('d-m-y', strtotime($row['tanggal_lahir'] . ' +0 day'));


$sq = mysqli_query($koneksi,"select * from tb_activites where id_activites = '$row[id_activites]'");
$sq2 = mysqli_fetch_array($sq);

$gf = mysqli_query($koneksi,"select * from tb_creche where ket1 = '$row[harga]'");
$gf2 = mysqli_fetch_array($gf);

  $nh = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");
  $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{


      "id_actualite": "<?php echo $row['id_order'] ?>",
      "id_member": "<?php echo $row['id_user'] ?>",
      "harga_asli": "<?php echo $row['harga'] ?>",
      "judul": "<?php echo $row['nama_depan'].' '.$row['nama_belakang'] ?>",
      "deskripsi": "<?php echo $row['nama_produk'] ?>",
      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/activites/<?php echo $sq2['gambar2'] ?>",
      "tanggal": "<?php echo $row['tanggal'] ?>",
           "no_invoice": "<?php echo $row['no_invoice'] ?>",
      "tanggal2": "<?php echo $row['tanggal2'] ?>",
      
      <?php if($row['jenis_order'] == "memberufe"){ ?>
      <?php if($row['harga'] == "5000000"){ ?>
      "url": "IDR <?php echo number_format($row['harga'],0,',','.'); ?> / 2 semaines",
      <?php }else if($row['harga'] == "10000000"){ ?>
      "url": "IDR <?php echo number_format($row['harga'],0,',','.'); ?> / 1 mois",
      
      <?php }else if($row['harga'] == "20000000"){ ?>
      "url": "IDR <?php echo number_format($row['harga'],0,',','.'); ?> / 3 mois",
      <?php }else if($row['harga'] == "35000000"){ ?>
      "url": "IDR <?php echo number_format($row['harga'],0,',','.'); ?> / 6 mois",
      <?php }else if($row['harga'] == "50000000"){ ?>
      "url": "IDR <?php echo number_format($row['harga'],0,',','.'); ?> / 1 an",
      
      <?php } ?>
      <?php }else{ ?>
      <?php if($row['harga'] >= 10000000){ ?>
      "url": "IDR <?php echo number_format($row['harga'],0,',','.'); ?> par an",
      <?php }else{ ?>
      "url": "IDR <?php echo number_format($row['harga'],0,',','.'); ?> par mois",
      <?php } ?>
      <?php } ?>
      "email": "<?php echo $row['gender'] ?>",
      "emailuser": "<?php echo $row['gender'] ?>",
    "urutan": "<?php echo $row['tempat_lahir'].', '.$tangg ?>",
      "keterangan": "<?php echo $row['ket'] ?>"
    }
<?php
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>