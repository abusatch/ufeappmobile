<?php

require_once('koneksi.php');

$result = array();

$sql_get_data = "SELECT * FROM volley_upload ORDER BY id DESC";
$con->set_charset("utf8");
$query = $con->query($sql_get_data);

while($row = mysqli_fetch_assoc($query)){
  $result[] = $row;
}

echo json_encode(array('result'=>$result));

?>