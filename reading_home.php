<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingHome();
switch ($mode) {
    case 'tulisan':
        $reading->tulisan();
        break;
    case 'text':
        $reading->text();
        break;
    case 'logo':
        $reading->logo();
        break;
    case 'artikelambasador':
        $reading->artikelAmbasador();
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

    function text() {
        $sql = "SELECT text_id, text_kode, text_nama, text_isi FROM tb_text";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $r) {
            $hasil[$r->text_kode] = $r->text_isi;
        }
        AFhelper::kirimJson($hasil);
    }

    function logo() {
        $sql = "SELECT logo_id, logo_kode, logo_nama, logo_isi FROM tb_logo";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $r) {
            $hasil[$r->logo_kode] = $r->logo_isi ? "https://ufe-section-indonesie.org/ufeapp/images/logo/".$r->logo_isi : "";
        }
        AFhelper::kirimJson($hasil);
    }

    function artikelAmbasador() {
        $hasil = array();

        $sql = "SELECT * from user where idUser = '56'";
        $user = AFhelper::dbSelectOne($sql);
        $a = array(
            "id_template" => $user->idUser,
            "id_member" => $user->idUser,
            "judul" => $user->first_name." ".$user->second_name,
            "deskripsi" => $user->deskripsi,
            "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/propic/".$user->propic,
            "tanggal" => $user->deskripsi,
        );
        array_push($hasil, $a);

        $sql_get_data = "SELECT a.*, b.username, b.first_name, b.second_name, b.propic
        FROM tb_template a
        JOIN user b ON(a.id_member_vip = b.idUser)
        WHERE a.visibility = '1' AND a.keterangan = 'release' AND a.id_member_vip = '56' ORDER BY a.id_template DESC limit 3";

        $data = AFhelper::dbSelectAll($sql_get_data);

        foreach ($data as $row) {
            $tgl = explode("-", $row->tanggal);
            $propic = $row->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic : '';
            $a = array(
                "id_template" => $row->id_template,
                "id_member" => $row->id_member_vip,
                "judul" => AFhelper::formatText($row->judul),
                "deskripsi" => AFhelper::formatText($row->deskripsi),
                "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/actualite/".$row->gambar,
                "tanggal" => $tgl[2]."/".$tgl[1]."/".$tgl[0],
                "tanggal2" => $row->tanggal2,
                "url" => $row->linkweb,
                "email" => $row->username,
                "keterangan" =>  AFhelper::formatText($row->keterangan),
                "first_name" => $row->first_name,
                "second_name" => $row->second_name,
                "propic" => $propic,
            );
            array_push($hasil, $a);
        }
        AFhelper::kirimJson($hasil);
    }

}

?>