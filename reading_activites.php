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
    case 'jadwal':
        $reading->jadwal();
        break;
    case 'harga':
        $reading->harga();
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

    function harga() {
        $id = $_POST['id_activites'];
        if($id) {
            $sql = "SELECT id_harga, id_activites, harga, keterangan, mata_uang 
                FROM tb_harga_program 
                WHERE id_activites = $id";
            $data = AFhelper::dbSelectAll($sql);
            AFhelper::kirimJson($data, 'Get List Price');
        } else {
            AFhelper::kirimJson(null, 'ID Aktifitas harus diisi', 0);
        }
        
    }

    function jadwal() {
        $id = $_POST['id_activites'];
        if($id) {
            $sql = "SELECT id_jadwal, id_activites, jadwal, keterangan 
                FROM tb_jadwal_program 
                WHERE id_activites = $id";
            $data = AFhelper::dbSelectAll($sql);
            AFhelper::kirimJson($data, 'Get List Schedule');
        } else {
            AFhelper::kirimJson(null, 'ID Aktifitas harus diisi', 0);
        }
        
    }
    
}

?>