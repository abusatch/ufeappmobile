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
    case 'mylist':
        $reading->mylist();
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

    function mylist() {
        $email = $_GET['email'];

        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;

        $sql = "SELECT a.id_activites, a.id_user, a.status, a.registration_date, a.expired_date, b.judul, b.deskripsi, b.id_jenis, CONCAT('https://ufe-section-indonesie.org/ufeapp/images/activites/',b.gambar) AS gambar, b.gambar2, 
            b.harga1, b.harga2, b.harga3, b.tanggal, b.tanggal2, b.keterangan, b.hargaa1, b.hargaa2, b.hargaa3, b.instruktur, b.ket_instruktur, b.jadwal1, b.jadwal2, b.jadwal3 
            FROM tb_user_activites a
            JOIN tb_activites b ON(a.id_activites = b.id_activites)
            WHERE a.id_user = '$idUser'
            ORDER BY a.registration_date DESC";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $row) {
            $tgl = explode("-", substr($row->registration_date,0,10));
            $row->registration_date = $tgl[2]."/".$tgl[1]."/".$tgl[0];

            $tgl_exp = explode("-", substr($row->expired_date,0,10));
            $row->expired_date = $tgl_exp[2]."/".$tgl_exp[1]."/".$tgl_exp[0];

            array_push($hasil, $row);
        }
        AFhelper::kirimJson($hasil, 'Get My List Activites');
    }
    
}

?>