<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingActivites();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
    case 'detil':
        $reading->detil();
        break;
    default:
        echo "Mode Not Found";
        break;
}

class ReadingActivites
{
    function lihat() {
        $sql = "SELECT id_activites, judul, deskripsi, id_jenis, CONCAT('https://ufe-section-indonesie.org/ufeapp/images/activites/',gambar) AS gambar, gambar2, 
                harga1, harga2, harga3, tanggal, tanggal2, keterangan, hargaa1, hargaa2, hargaa3, instruktur, ket_instruktur, jadwal1, jadwal2, jadwal3 
            FROM tb_activites 
            WHERE id_jenis IN(1,2)
            ORDER BY id_activites DESC";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get List Activites');
    }

    function detil() {
        $id = $_POST['id'];
        if($id) {
            $sql = "SELECT id_activites, judul, deskripsi, id_jenis, CONCAT('https://ufe-section-indonesie.org/ufeapp/images/activites/',gambar) AS gambar, gambar2, 
                harga1, harga2, harga3, tanggal, tanggal2, keterangan, hargaa1, hargaa2, hargaa3, instruktur, ket_instruktur, jadwal1, jadwal2, jadwal3 
            FROM tb_activites 
            WHERE id_activites = $id";
            $data = AFhelper::dbSelectOne($sql);
            AFhelper::kirimJson($data, 'Get Activites');
        } else {
            AFhelper::kirimJson(null, 'ID harus diisi', 0);
        }
        
    }
    
}

?>