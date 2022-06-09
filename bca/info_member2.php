<?php 
//mysqli_query('SET CHARACTER SET utf8');
mysqli_set_charset('utf8');
header('Content-type: text/html; charset=utf-8');
include("db.php");
echo "{";
$no = 1;
// $de = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '1' order by id_activites desc");

// while($de2 = mysqli_fetch_array($de)){

$noo = 1;
    $fe = mysqli_query($koneksi,"select * from info_member limit 1");
    $fe2 = mysqli_fetch_array($fe);
    
?>

  "success": 1,
  "first_name": "<?php echo $de2['first_name'] ?>",
  "second_name": "<?php echo $de2['second_name'] ?>",
  "nama": "<?php echo $de2['first_name'] ?> <?php echo $de2['second_name'] ?>",
  "ket": "<?php echo $de2['deskripsi'] ?>",
  "alamat": "<?php echo $de2['alamat'] ?>",
  "kota": "<?php echo $de2['kota'] ?>",
  "kodepos": "<?php echo $de2['kodepos'] ?>",
  "ket2": "<?php echo $de2['ket2'] ?>",
  "phone": "<?php echo $de2['phone'] ?>",     
  "fax": "<?php echo $de2['fax'] ?>",
  "email": "<?php echo $de2['username'] ?>",
  "website": "<?php echo $de2['website'] ?>",
  "cover": "<?php echo $de2['cover'] ?>",
  "gambar1": "http://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $jh2['gambar'] ?>",
  "judul1": "<?php echo $fe2['judul'] ?>",
  "deskripsi1": "<?php echo $fe2['deskripsi'] ?>",
  "gambar": "<?php echo $de2['logo'] ?>"
<?php 
?>
}
