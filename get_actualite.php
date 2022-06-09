<?php 
//mysqli_query('SET CHARACTER SET utf8');
mysqli_set_charset('utf8');
header('Content-type: text/html; charset=utf-8');
include("db.php");
echo "[";
$no = 1;

//$de = mysqli_query($koneksi,"select * from tb_actualite order by id_actualite //desc");

//while($de2 = mysqli_fetch_array($de)){
   
   
$sql_get_actualite = "select * from tb_actualite where visibility = '1' order by id_actualite desc limit 3";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_actualite);


while ($de2 = $query->fetch_assoc()) {
   
   
   
   
    $name = $de2['deskripsi'];
    $str = ['é','à','L'];
    $rplc =['e','a','L'];
    
    $hasil = str_replace("$str","$rplc",$name);
    $hasil2 = str_replace(['L','é','&'],['L','é','&'],$de2['deskripsi']);


if($no == 1){}else{echo ",";}
?>

  {

    "alt_description": "",
    "user":  {
    "name":"<?php echo $de2['judul'] ?><?php //echo $de2['url'] ?>",
    "location":"tes",
    "url":"<?php echo $de2['url'] ?>",
    "bio":"<?php echo $hasil2 ?>",
      "raw": "https://images.unsplash.com/photo-1606787947728-4a59e916088d?ixid=MXwxNTEyMnwxfDF8YWxsfDF8fHx8fHwyfA&ixlib=rb-1.2.1",
      "full": "https://images.unsplash.com/photo-1606787947728-4a59e916088d?crop=entropy&cs=srgb&fm=jpg&ixid=MXwxNTEyMnwxfDF8YWxsfDF8fHx8fHwyfA&ixlib=rb-1.2.1&q=85",
      "regular": "https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $de2['gambar'] ?>",
      "small": "https://images.unsplash.com/photo-1606787947728-4a59e916088d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxNTEyMnwxfDF8YWxsfDF8fHx8fHwyfA&ixlib=rb-1.2.1&q=80&w=400",
      "thumb": "https://images.unsplash.com/photo-1606787947728-4a59e916088d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxNTEyMnwxfDF8YWxsfDF8fHx8fHwyfA&ixlib=rb-1.2.1&q=80&w=200"
    }
    
    }
<?php $no++;} ?>
    ]
