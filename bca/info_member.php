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
    $fe = mysqli_query($koneksi,"select * from tb_template where visibility = '1'  group by id_member_vip order by id_template asc");
    while ($fe2 = mysqli_fetch_array($fe)){ 

        if($noo == $_GET['urutan']){

            $jh = mysqli_query($koneksi,"select * from tb_template where id_member_vip = '$fe2[id_member_vip]' order by id_template desc");
            $jh2 = mysqli_fetch_array($jh);


    $sql_get_activities_artistiques = "select * from user where idUser = '$fe2[id_member_vip]'  order by idUser asc limit 1";
    $koneksi->set_charset("utf8");
    $query = $koneksi->query($sql_get_activities_artistiques);
    
    
    while ($de2 = $query->fetch_assoc()) {

    $name = $de2['deskripsi'];
    $str = ['é','à','L'];
    $rplc =['e','a','L'];
    
    $hasil = str_replace("$str","$rplc",$name);
    $hasil2 = str_replace(['L','é','&',':','\n'],['L','é','&','=','<br>'],$de2['judul']);



$judul1 = str_replace("&petiksatu&","\'",$jh2['judul']);
$judul2 = str_replace("&petikdua&",'\"',$judul1);

$deskripsi1 = str_replace("&petiksatu&","\'",$jh2['deskripsi']);
$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);


$deskripso1 = str_replace("&petiksatu&","\'",$de2['deskripsi']);
$deskripso2 = str_replace("&petikdua&",'\"',$deskripso1);


//if($no == 1){}else{echo ",";}
?>

  "success": 1,
  "first_name": "<?php echo $de2['first_name'] ?>",
  "second_name": "<?php echo $de2['second_name'] ?>",
  "nama": "<?php echo $de2['first_name'] ?> <?php echo $de2['second_name'] ?>",
  "ket": "<?php echo $deskripso2 ?>",
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
  "judul1": "<?php echo $judul2 ?>",
  "deskripsi1": "<?php echo $deskripsi2 ?>",
  "gambar": "<?php echo $de2['logo'] ?>"
<?php $no++;} 
    } $noo++;}
?>
}
