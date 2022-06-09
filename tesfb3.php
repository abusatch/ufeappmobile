
<?php if($_GET['from'] == "member"){ ?>


<img src="https://ufe-section-indonesie.org/ufeapp/tesfb.php" style="width:1px;height:1px;" />

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>


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
 
 
 
 
<script type="text/javascript">

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
 
 
 

 
        function writeUserData(id_user, id_jadwal,id_pelanggan, nama_user,nama_pelanggan, pesan, tanggal) {
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
    
        }
    
        
        <?php

 date_default_timezone_set('Asia/Jakarta');
  $tanggal2 = date('Y-m-d H:i:s');

?>

writeUserData("2", "2","2", "tes 1","tes 2","<?php echo $tanggal2; ?>","tes 4");


// setTimeout(alertFunc, 2000);

// function alertFunc(){
//     window.close();
// }
//window.close();
</script>

<?php }else{ ?>

<img src="https://ufe-section-indonesie.org/ufeapp/tesfb.php" style="width:1px;height:1px;" />

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>


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
 
 
 
 
<script type="text/javascript">

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
 
 
 <?php 
 $emmm1 = str_replace(".","&&titik&&",$_GET['email']);
 $emmm2 = str_replace("_","&&underscore&&",$emmm1);
 $emmm3 = strtolower(str_replace("@","&&at&&",$emmm2));

 ?>

 
        function writeUserData(id_user, id_jadwal,id_pelanggan, nama_user,nama_pelanggan, pesan, tanggal) {
            database.ref('user_baru').child("<?php echo $emmm3 ?>").set({
       
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
    
        }
    
        
        <?php

 date_default_timezone_set('Asia/Jakarta');
  $tanggal2 = date('Y-m-d H:i:s');

?>

writeUserData("2", "2","2", "tes 1","tes 2","<?php echo $tanggal2; ?>","tes 4");

// setTimeout(alertFunc, 2000);

// function alertFunc(){
//     window.close();
// }
</script>

<?php } ?>