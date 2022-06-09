<?php 
//mysqli_query('SET CHARACTER SET utf8');
mysqli_set_charset('utf8');
header('Content-type: text/html; charset=utf-8');
include("db.php");
echo "[";
$no = 1;
// $de = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '1' order by id_activites desc");

// while($de2 = mysqli_fetch_array($de)){

    $sql_get_activities_artistiques = "select * from tb_activites where id_jenis = '3' order by id_activites desc";
    $koneksi->set_charset("utf8");
    $query = $koneksi->query($sql_get_activities_artistiques);
    
    
    while ($de2 = $query->fetch_assoc()) {

    $name = $de2['deskripsi'];
    $str = ['é','à','L'];
    $rplc =['e','a','L'];
    
    $hasil = str_replace("$str","$rplc",$name);
    $hasil2 = str_replace(['L','é','&',':','\n'],['L','é','&','=','<br>'],$de2['judul']);


if($no == 1){}else{echo ",";}

$sd = mysqli_query($koneksi,"select * from tb_educatives limit 1");
$sd2 = mysqli_fetch_array($sd);
?>

  {

    "alt_description": "",
    "user":  {
    "name":"<?php echo $de2['judul'] ?><?php //echo $de2['url'] ?>",
    "location":"tes",
    "url":"https://unilabperdana.com",
    "bio":"<?php echo $hasil2 ?>",
    "id_jenis":"<?php echo $de2['id_jenis'] ?>",  
    "id_activites":"<?php echo $de2['id_activites'] ?>", 
    "regular": "https://ufe-section-indonesie.org/ufeapp/images/activites/<?php echo $de2['gambar'] ?>",
    "email": "",

    "id_educatives":"<?php echo $sd2['id_educatives'] ?>",
    "gambar1":"<?php echo $sd2['gambar1']; ?>",
    "judul1":"<?php echo $sd2['judul1']; ?>",
    "deskripsi1":"<?php echo $sd2['deskripsi1']; ?>",
    "gambar2":"<?php echo $sd2['gambar2']; ?>",
    "deskripsi2":"<?php echo $sd2['deskripsi2']; ?>",
    "judul2":"<?php echo $sd2['judul2']; ?>",
    "deskripsi3":"<?php echo $sd2['deskripsi3']; ?>",
    "judul3":"<?php echo $sd2['judul3']; ?>",
    "tanggal":"<?php echo $sd2['judul4']; ?>"
    }
    
    }
<?php $no++;} ?>
    ]
