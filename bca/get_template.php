<?php 
//mysqli_query('SET CHARACTER SET utf8');
mysqli_set_charset('utf8');
header('Content-type: text/html; charset=utf-8');
include("db.php");
echo "[";
$no = 1;
// $de = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '1' order by id_activites desc");

// while($de2 = mysqli_fetch_array($de)){

$noo = 1;
    $fe = mysqli_query($koneksi,"select * from tb_template where visibility = '1' group by id_member_vip");
    while ($fe2 = mysqli_fetch_array($fe)){ 

        if($noo == $_GET['urutan']){


    $sql_get_activities_artistiques = "select * from tb_template where id_member_vip = '$fe2[id_member_vip]' and visibility = '1' and keterangan = 'release' order by id_template desc limit 3";
    $koneksi->set_charset("utf8");
    $query = $koneksi->query($sql_get_activities_artistiques);
    
    
    while ($de2 = $query->fetch_assoc()) {

    $name = $de2['deskripsi'];
    $str = ['é','à','L'];
    $rplc =['e','a','L'];
    
    $hasil = str_replace("$str","$rplc",$name);
    $hasil2 = str_replace(['L','é','&',':','\n'],['L','é','&','=','<br>'],$de2['judul']);


if($no == 1){}else{echo ",";}



$judul1 = str_replace("&petiksatu&","\'",$de2['judul']);
$judul2 = str_replace("&petikdua&",'\"',$judul1);

$deskripsi1 = str_replace("&petiksatu&","\'",$de2['deskripsi']);
$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);


?>

  {

    "alt_description": "",
    "user":  {
    "name":"<?php echo $judul2 ?><?php //echo $de2['url'] ?>",
    "location":"tes",
    "url":"https://unilabperdana.com",
    "bio":"<?php echo $deskripsi2 ?>",
    "id_jenis":"<?php echo $de2['id_member_vip'] ?>",  
    "id_activites":"<?php echo $de2['id_template'] ?>", 
    "regular": "https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $de2['gambar'] ?>"
    
    }
    
    }
<?php $no++;} 
    } $noo++;}
?>
    ]
