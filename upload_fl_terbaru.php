<?php


include('db.php');
//	$db = mysqli_connect('localhost','root','','userdata');
	//if (!$db) {
	//	echo "Database connection faild";
	//}

	$nj = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]'
	and password = '$_POST[pss2]'
	");

	if(mysqli_num_rows($nj) >= 1){

		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('YmdHis');
		$tanggal = substr($tgl,0,-1);

		if($_POST['jenis'] == "cover"){
	$image = $_FILES['image']['name'];
	$namafile = $_POST['username2'].$tanggal.".png";

	$imagePath = 'images/propic/'.$namafile;
	$tmp_name = $_FILES['image']['tmp_name'];

	$upp = move_uploaded_file($tmp_name, $imagePath);
	if($upp){
		mysqli_query($koneksi,"update user set cover = '$namafile' where username = '$_POST[username2]' and password = '$_POST[pss2]'");
	}

//	$db->query("INSERT INTO person(name,image)VALUES('".$name."','".$image."')");
	}else if($_POST['jenis'] == "logo"){
		$image = $_FILES['image']['name'];
	$namafile = $_POST['username2'].$tanggal.".png";

	$imagePath = 'images/propic/'.$namafile;
	$tmp_name = $_FILES['image']['tmp_name'];

	$upp = move_uploaded_file($tmp_name, $imagePath);
	if($upp){
		mysqli_query($koneksi,"update user set logo = '$namafile' where username = '$_POST[username2]' and password = '$_POST[pss2]'");
	}

}else if($_POST['jenis'] == "propic"){
	$image = $_FILES['image']['name'];
$namafile = $_POST['username2'].$tanggal.".png";

$imagePath = 'images/propic/'.$namafile;
$tmp_name = $_FILES['image']['tmp_name'];

$upp = move_uploaded_file($tmp_name, $imagePath);
if($upp){
	mysqli_query($koneksi,"update user set propic = '$namafile' where username = '$_POST[username2]' and password = '$_POST[pss2]'");
}
	}

}

?>