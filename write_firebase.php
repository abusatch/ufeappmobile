<html>
<head>
</head>
<body>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous">
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin="">
</script>
  
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
 integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
 crossorigin="anonymous">
</script>
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
function writeUserData(id_user, tanggal) {
    database.ref('komentar').child("1").set({
        id_user:id_user,
        tanggal:tanggal
    });
}

<?php

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d H:i:s');

?>

$(document).ready(function(){
  writeUserData("2", "<?php echo $tanggal; ?>");
});

</script>
</body>
</html>