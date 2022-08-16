<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingHome();
switch ($mode) {
    case 'tulisan':
        $reading->tulisan();
        break;
    default:
        echo "Mode tidak sesuai";
        break;
}

class ReadingHome
{
    function tulisan() {
        $sql = "SELECT * FROM tb_halaman_depan";
        $data = AFhelper::dbSelectOne($sql);
        AFhelper::kirimJson($data, 'Get tulisan halaman depan');
    }

}

?>