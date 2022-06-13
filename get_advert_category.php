<?php

require_once "helper.php";

$sql = "SELECT ta_category_id AS id, ta_category_name AS name FROM tb_advert_category ORDER BY ta_category_id";
$data = AFhelper::dbSelectAll($sql);
AFhelper::kirimJson($data, 'Get Advert Category');

?>