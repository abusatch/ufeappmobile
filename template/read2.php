<?php

require_once('connection2.php');

$result = array();

$sql_get_data = "SELECT * FROM tb_artikel ORDER BY id DESC";
$CON2->set_charset("utf8");
$query = $CON2->query($sql_get_data);

//$query = mysqli_query($CON2,"SELECT * FROM tb_artikel ORDER BY id DESC");

while($row = mysqli_fetch_assoc($query)){
  $result[] = $row;
}

echo json_encode(array('result'=>$result));

?>
