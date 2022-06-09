<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
  
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
 integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
 crossorigin="anonymous"></script>
 <script src="https://www.gstatic.com/firebasejs/8.2.3/firebase.js"></script>
 
  <?php 


// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
  
  date_default_timezone_set('Asia/Jakarta');
  $tanggal2 = date('Y-m-d H:i:s');
  
  ?>
<script>


 var nextkey =0;
 var config = {

    
      apiKey: "AIzaSyCLaApKgiVWIg3ylCHoM339-3zp_ilHDlQ",
  authDomain: "ufe-indonesie-f76c4.firebaseapp.com",
  databaseURL: "https://ufe-indonesie-f76c4-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "ufe-indonesie-f76c4",
  storageBucket: "ufe-indonesie-f76c4.appspot.com",
  messagingSenderId: "297827279494",
  appId: "1:297827279494:web:da1440b3e1fb07d752e707",
  measurementId: "G-8G1DDJS92V"

 
 };
 firebase.initializeApp(config);
 var database = firebase.database();
 
 
 function writeUserDataa(userId,nama_pelanggan, name,phone, email,password) {

    database.ref('jadwal').child(userId).set({
        id:userId,
        nama_pelanggan:nama_pelanggan,
      username: name,
      tikoruser: phone,
      tikorpt: email,
      phone: password
    });
 //   userId+=1;
}
 
 
 
 function writeUserData(id_user, id_jadwal,id_pelanggan, nama_user,nama_pelanggan, pesan, tanggal) {

if(id_jadwal != '' && id_jadwal >= 1){



<?php 
if($_GET['from'] == "member"){

?>

  database.ref('laporan').child("2").set({
       
        iii:tanggal,
        id_user:id_user,
      id_jadwal: id_jadwal,
      id_pelanggan: id_pelanggan,
      nama_user: nama_user,
    nama_pelanggan: nama_pelanggan,
    pesan: pesan,      
      tanggal: pesan,
      pesan2: pesan,
    tgl2: pesan
    });
<?php }else{ ?>

    database.ref('laporan').child("1").set({
       
        iii:tanggal,
        id_user:id_user,
      id_jadwal: id_jadwal,
      id_pelanggan: id_pelanggan,
      nama_user: nama_user,
    nama_pelanggan: nama_pelanggan,
    pesan: pesan,      
      tanggal: pesan,
      pesan2: pesan,
    tgl2: pesan
    });
    
    <?php } ?>

    
        database.ref('panggilan').set({
       
        iii:tanggal
    });
     userId+=1;
}    
   
}



<?php  
include('db.php');

$tanggal = date('Y-m-d');


$bg = mysqli_query($con,"select * from jadwal_teknisi where tanggal_berangkat >= '$tanggal' group by passkey");
while($bg2 = mysqli_fetch_array($bg)){
    
    $fer = mysqli_query($con,"select * from tb_user where id_user = '$bg2[id_teknisi]'");
    $fer2 = mysqli_fetch_assoc($fer);
    
    $gth = mysqli_query($con,"select * from pelanggan where id_pelanggan = '$bg2[id_pelanggan]'");
    $gth2 = mysqli_fetch_assoc($gth);

?>

writeUserDataa("<?php echo $bg2['id_pelanggan'] ?>","<?php echo $gth2['nama_pelanggan'] ?>", "<?php echo $fer2['nama'] ?>","<?php echo $fer2['update_lokasi'] ?>", "<?php echo $gth2['tikor'] ?>","<?php echo $tanggal2; ?>");

<?php } ?>


<?php 
include('db.php');

if(!empty($_GET['id'])){


$nb = mysqli_query($con,"select * from jadwal_teknisi where id_jadwal = '$_GET[id]'");
$nb2 = mysqli_fetch_assoc($nb);

$fr = mysqli_query($con,"select * from jadwal_teknisi where passkey = '$nb2[passkey]' and tanggal >= '$tanggal' and leader != '' and leader is not null");

$fry3 = mysqli_num_rows($fr);

if($fry3 >= 1){

$fr2 = mysqli_fetch_assoc($fr);





$tambahan = "";
$no = 1;
$ujo = mysqli_query($con,"select * from asset_jadwal where passkey = '$nb2[passkey]'");
while($ujo2 = mysqli_fetch_array($ujo)){
    
    $grj = mysqli_query($con,"select * from repair_action where id_as_jadwal = '$ujo2[id_as_jadwal]'");
    while($grj2 = mysqli_fetch_array($grj)){
         $ggn = str_replace(':','',$grj2['repair']);
    $ggn2 = str_replace('<br>','',$ggn);
    $ggn3 = str_replace('\n','',$ggn2);
        $ggn4 = trim(preg_replace('/\s+/', ' ', $ggn3));
    
    $tambahan = $no.". ".$ggn4;        
    $no++;}
 $tambahan = $tambahan;
 
}
$tambahan = $tambahan;

$or = mysqli_query($con,"select * from pelanggan where id_pelanggan = '$fr2[id_pelanggan]'");
$or2 = mysqli_fetch_assoc($or);

$gg = mysqli_query($con,"select * from tb_user where id_user = '$fr2[id_teknisi]'");
$gg2 = mysqli_fetch_assoc($gg);

if($_GET['keterangan'] == "terimajadwal"){
$pesan = $gg2['nama']." menerima jadwal ke ".$or2['nama_pelanggan'];

}else if($_GET['keterangan'] == "bersiapberangkat"){    
$pesan = $gg2['nama']." bersiap berangkat ke ".$or2['nama_pelanggan'];
}else if($_GET['keterangan'] == "mulaiperjalanan"){    
$pesan = $gg2['nama']." memulai perjalanan ke ".$or2['nama_pelanggan'];
}else if($_GET['keterangan'] == "tibadilokasi"){    
$pesan = $gg2['nama']." sudah tiba di pelanggan ".$or2['nama_pelanggan'];
}else if($_GET['keterangan'] == "mulaibekerja"){    
$pesan = $gg2['nama']." mulai bekerja di ".$or2['nama_pelanggan'];
}else if($_GET['keterangan'] == "mulaipulang"){    
$pesan = $gg2['nama']." mulai perjalanan pulang dari ".$or2['nama_pelanggan']." repair action ".$tambahan;
}else if($_GET['keterangan'] == "sampaikantor"){    
$pesan = $gg2['nama']." sudah sampai dari ".$or2['nama_pelanggan']." repair action ".$tambahan;

}else{
    $pesan = "kosong";
}


if(!empty($_GET['keterangan'])){

mysqli_query($con,"update panggilan set 
id_user = '$gg2[id_user]',
id_jadwal = '$_GET[id]',
id_pelanggan = '$or2[id_pelanggan]',
nama_user = '$gg2[nama]',
nama_pelanggan = '$or2[nama_pelanggan]',
pesan = '$pesan',
tanggal = '$tanggal2'
");



?>

writeUserData("<?php echo $gg2['id_user'] ?>", "<?php echo $_GET['id'] ?>","<?php echo $or2['id_pelanggan'] ?>", "<?php echo $gg2['nama'] ?>","<?php echo $or2['nama_pelanggan']; ?>","<?php echo $pesan ?>","<?php echo $tanggal2 ?>");

<?php 
} } }
?>


<?php

 date_default_timezone_set('Asia/Jakarta');
  $tanggal2 = date('Y-m-d H:i:s');

?>

writeUserData("2", "2","2", "tes 1","tes 2","<?php echo $tanggal2; ?>","tes 4");

 </script>