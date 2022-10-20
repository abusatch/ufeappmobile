<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingIklan();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
    case 'detil':
        $reading->detil();
        break;
    case 'tambah':
        $reading->tambah();
        break;
    case 'ubah':
        $reading->ubah();
        break;
    case 'listsetting':
        $reading->listSetting();
        break;
    case 'ubahsetting':
        $reading->ubahsetting();
        break;
    case 'myorder':
        $reading->myorder();
        break;
    case 'harga':
        $reading->harga();
        break;
    case 'bayar':
        $reading->bayar();
        break;
    case 'lihatbayar':
        $reading->lihatbayar();
        break;
    default:
        $reading->lihat();
        break;
}

class ReadingIklan
{

    private $arr_posisi = array(
        "ufemonde" => "Après Ufe Monde", 
        "concierge" => "Après Conciergerie", 
        "article" => "Après Article Ambassador", 
        "actualite" => "Après Actualités", 
        "espacemembre" => "Après Espace Membre Général",
        "espaceyoung" => "Après Espace Membre Les Jeunes",
        "charity" => "Après Charity", 
        "menu" => "Après Demarches"
    );

    private $arr_tinggi_layout = array(
        "full" => "220",
        "half" => "100",
    );

  function lihat() {
    $posisi = $_GET['posisi'];
    $subposisi = $_GET['subposisi'];

    date_default_timezone_set('Asia/Jakarta');
	$now = date('Y-m-d');

    $where = "";

    if(!empty($subposisi)) {
        $where .= "AND a.sub_posisi = '$subposisi'";
    } else if($subposisi == "0") {
        $where .= "AND a.sub_posisi = '0'";
    }

    $sql = "SELECT a.id_iklan, a.posisi, a.sub_posisi, a.jenis_layout, a.customer, a.tanggal, a.expired, a.gambar, a.url, a.visibility 
        FROM tb_iklan a
        WHERE a.visibility = '1' AND a.expired >= '$now' AND a.posisi = '$posisi' $where";
    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    foreach ($data as $row) {
        $gambar = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/iklan/".$row->gambar : '';
        $a = array(
            "id_iklan" => $row->id_iklan,
            "posisi" => $row->posisi,
            "sub_posisi" => $row->sub_posisi,
            "gambar" => $gambar,
            "url" => $row->url,
            "tinggi" => $this->arr_tinggi_layout[$row->jenis_layout],
            "lebar" => "340",
        );
        array_push($hasil, $a);
    }
    AFhelper::kirimJson($hasil);
  }

  function detil() {
    $id_iklan = $_GET['id_iklan'];

    $sql = "SELECT a.id_iklan, a.posisi, a.sub_posisi, a.jenis_layout, a.customer, a.tanggal, a.expired, a.gambar, a.url, a.visibility 
        FROM tb_iklan a
        WHERE a.id_iklan = '$id_iklan'";
    $row = AFhelper::dbSelectOne($sql);
    $hasil = array(
        "id_iklan" => $row->id_iklan,
        "posisi" => $row->posisi,
        "sub_posisi" => $row->sub_posisi,
        "gambar" => $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/iklan/".$row->gambar : '',
        "url" => $row->url,
        "tinggi" => $this->arr_tinggi_layout[$row->jenis_layout],
        "visibility" => $row->visibility,
    );
    AFhelper::kirimJson($hasil);
  }

  function tambah() {
    $id_order = $_POST['id_order'];
    $linkweb = $_POST['linkweb'];
    $email = $_POST['email'];
    $visibility = $_POST['visibility'];

    date_default_timezone_set('Asia/Jakarta');

    if (!$_FILES['image']['tmp_name']) {
        AFhelper::kirimJson(null, "photo ne peut pas être vide", 0);
    } else {
        $nama_image = $email.substr(date('YmdHis'),0,-1).$_FILES['image']['name'];
        $uploadimage = move_uploaded_file($_FILES['image']['tmp_name'], "images/iklan/".$nama_image);
        if($uploadimage) {
            $sql = "SELECT * from user where username = '$email'";
            $user = AFhelper::dbSelectOne($sql);
            $idUser = $user->idUser;

            $sql = "SELECT b.id_posisi, b.posisi, b.sub_posisi, b.status_1, b.status_2a, b.status_2b, c.jenis_layout, c.periode 
                FROM tb_iklan_order a
                JOIN tb_iklan_posisi b ON(a.id_posisi = b.id_posisi)
                JOIN tb_iklan_harga c ON(a.id_harga = c.id_harga)
                WHERE a.id_order = '$id_order'";
            $iklan = AFhelper::dbSelectOne($sql);

            $tanggal = date('Y-m-d');
            $expired = date('Y-m-d', strtotime("+".$iklan->periode." day"));

            $sql = "INSERT INTO tb_iklan(posisi, sub_posisi, jenis_layout, customer, tanggal, expired, gambar, url, visibility) 
                VALUES ('$iklan->posisi', '$iklan->sub_posisi', '$iklan->jenis_layout', '$idUser', '$tanggal', '$expired', '$nama_image', '$linkweb', '$visibility')";
            $hasil = AFhelper::dbSaveReturnID($sql);
            if ($hasil <> 0 && $hasil <> '') {
                $sql2 = "UPDATE tb_iklan_order SET id_iklan = '$hasil' WHERE id_order = '$id_order'; ";
                if($iklan->jenis_layout == "full") {
                    $sql2 .= "UPDATE tb_iklan_posisi SET status_1 = 'release' WHERE id_posisi = '$iklan->id_posisi'"; 
                } else if($iklan->jenis_layout == "half" && $iklan->status_2a == "order") {
                    $sql2 .= "UPDATE tb_iklan_posisi SET status_2a = 'release' WHERE id_posisi = '$iklan->id_posisi'";
                } else if($iklan->jenis_layout == "half" && $iklan->status_2b == "order") {
                    $sql2 .= "UPDATE tb_iklan_posisi SET status_2b = 'release' WHERE id_posisi = '$iklan->id_posisi'";
                }
                $data = array("tanggal" =>  date('Y-m-d H:i:s'), "judul" => "iklan", "gambar" => $nama_image, "url" => $linkweb);
		        AFhelper::setFirebase("laporan/4", $data);
                AFhelper::dbSaveMulti($sql2, null, "matériel téléchargé et publié avec succès");
            } else {
                AFhelper::kirimJson(null, "une erreur de connexion s'est produite", 0);
            }
        } else {
            AFhelper::kirimJson(null, "échec du téléchargement de l'image", 0);
        }
    }
  }

  function ubah() {
    $id_iklan = $_POST['id_iklan'];
    $linkweb = $_POST['linkweb'];
    $email = $_POST['email'];
    $visibility = $_POST['visibility'];

    $nama_image = "";
	$sql = "";
	if ($_FILES['image']['tmp_name']) {
		$nama_image = $email.substr(date('YmdHis'),0,-1).$_FILES['image']['name'];
		$uploadimage = move_uploaded_file($_FILES['image']['tmp_name'], "images/iklan/".$nama_image);
		if(!$uploadimage) {
			AFhelper::kirimJson(null, "échec du téléchargement de l'image", 0);
			exit();
		}
	}

    if($nama_image != "") {
        $sql = "UPDATE tb_iklan SET gambar = '$nama_image', url = '$linkweb', visibility = '$visibility' WHERE id_iklan = '$id_iklan'";	
    } else {
        $sql = "UPDATE tb_iklan SET url = '$linkweb', visibility = '$visibility' WHERE id_iklan = '$id_iklan'";
    }

    $hasil = AFhelper::dbSaveCek($sql);
	if($hasil[0]) {
		date_default_timezone_set('Asia/Jakarta');
		$data = array("tanggal" =>  date('Y-m-d H:i:s'), "judul" => "iklan", "id" => $id_iklan, "gambar" => $nama_image, "url" => $linkweb);
		AFhelper::setFirebase("laporan/4", $data);
		AFhelper::kirimJson($hasil, "matériel téléchargé et publié avec succès");
	} else {
		AFhelper::kirimJson($sql, $hasil[1], 0);	
	}
  }

  function listSetting() {
    $sql = "SELECT id_posisi, posisi, sub_posisi, gambar, is_tampil, layout_1, layout_2a, layout_2b, status_1, status_2a, status_2b, keterangan_1, keterangan_2a, keterangan_2b 
        FROM tb_iklan_posisi";
    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    foreach ($data as $row) {
        $gambar = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/iklan/menu/".$row->gambar : '';
        $a = array(
            "id_posisi" => $row->id_posisi,
            "posisi" => $row->posisi,
            "sub_posisi" => $row->sub_posisi,
            "gambar" => $gambar,
            "is_tampil" => $row->is_tampil,
            "layout_1" => $row->layout_1,
            "layout_2a" => $row->layout_2a,
            "layout_2b" => $row->layout_2b,
            "status_1" => $row->status_1,
            "status_2a" => $row->status_2a,
            "status_2b" => $row->status_2b,
            "keterangan_1" => $row->keterangan_1,
            "keterangan_2a" => $row->keterangan_2a,
            "keterangan_2b" => $row->keterangan_2b,
        );
        array_push($hasil, $a);
    }
    AFhelper::kirimJson($hasil);
  }

  function ubahsetting() {
    $arr_id = $_POST['id'];
    $arr_istampil = $_POST['istampil'];
    $arr_layout1 = $_POST['layout1'];
    $arr_layout2a = $_POST['layout2a'];
    $arr_layout2b = $_POST['layout2b'];

    $i = 0;
    $sql = "";
    foreach ($arr_id as $id) {
        $istampil = $arr_istampil[$i];
        $layout1 = $arr_layout1[$i];
        $layout2a = $arr_layout2a[$i];
        $layout2b = $arr_layout2b[$i];
        $sql .= "UPDATE tb_iklan_posisi SET is_tampil = '$istampil', layout_1 = '$layout1', layout_2a = '$layout2a', layout_2b = '$layout2b' WHERE id_posisi = '$id'; "; 
        $i++;
    }
    AFhelper::dbSaveMulti($sql, null, "Changes saved successfully");
  }

  function myorder() {
    $email = $_GET['email'];
    $halaman = $_GET['halaman'];
    
    $sql = "SELECT * from user where username = '$email'";
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;

    if(empty($halaman)) {
        $halaman = 0;  
    }
    $offset = " offset $halaman";

    $sql = "SELECT a.id_order, a.id_user, a.id_posisi, a.id_harga, a.harga, a.payment_status, a.payment_type, a.payment_agent, 
        a.payment_key, a.payment_notif, a.payment_notif_date, a.order_date, a.email, a.id_iklan, b.posisi, c.mata_uang, c.jenis_layout, c.keterangan, d.expired, d.gambar, d.visibility 
        FROM tb_iklan_order a
        JOIN tb_iklan_posisi b ON(a.id_posisi = b.id_posisi)
        JOIN tb_iklan_harga c ON(a.id_harga = c.id_harga)
        LEFT JOIN tb_iklan d ON(a.id_iklan = d.id_iklan)
        WHERE a.id_user = '$idUser'
        ORDER BY a.id_order DESC";
    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    foreach ($data as $row) {
        $expired = "";
        if($row->expired) {
            $tgl = explode("-", $row->expired);
            $expired = $tgl[2]."/".$tgl[1]."/".$tgl[0];
        }
        $a = array(
            "id_registration" => $row->id_order,
            "id_user" => "Dimension : 340x".$this->arr_tinggi_layout[$row->jenis_layout],
            "id_activites" => "Advertisement ".$row->id_posisi.($row->jenis_layout == "full" ? "A" : "B"),
            "id_harga" => "Date d'expiration : ".$expired,
            "harga" => "Forfait : ".$row->keterangan,
            "payment_status" => $row->payment_status,
            "payment_type" => $row->payment_type,
            "payment_agent" => $row->payment_agent,
            "payment_key" => $row->payment_key,
            "registration_date" => $row->order_date,
            "email" => $this->arr_tinggi_layout[$row->jenis_layout],
            "id_hasil" => $row->id_iklan,
            "gambar" => $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/iklan/".$row->gambar : '',
            "keterangan" => $row->visibility,
        );
        array_push($hasil, $a);
    }
    AFhelper::kirimJson($hasil);
  }

    function harga() {
        $id_posisi = $_POST['id_posisi'];
        $jenis_layout = $_POST['jenis_layout'];
        $sql = "SELECT id_harga, mata_uang, id_posisi, jenis_layout, harga, keterangan, periode 
            FROM tb_iklan_harga 
            WHERE id_posisi = '$id_posisi' AND jenis_layout = '$jenis_layout'
            ORDER by mata_uang, harga";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data);
    }

    function bayar() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $payment_type = $_POST['payment_type'];
        $payment_agent = $_POST['payment_agent'];
        $order_date = $_POST['order_date'];
        $id_posisi = $_POST['id_posisi'];
        $id_harga = $_POST['id_harga'];
        $layout = $_POST['layout'];
        $keterangan = $_POST['keterangan'];

        $sql = "SELECT * from user where username = '$username'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;

        $sql = "SELECT * from tb_iklan_harga where id_harga = '$id_harga'";
        $harga = AFhelper::dbSelectOne($sql);

        $sql = "INSERT INTO tb_iklan_order(id_user, id_posisi, id_harga, harga, payment_type, payment_agent, order_date, email, layout) 
            VALUES ('$idUser', '$id_posisi', '$id_harga', '$harga->harga', '$payment_type', '$payment_agent', '$order_date', '$email', '$layout')";
        $hasil = AFhelper::dbSaveReturnID($sql);
        if ($hasil <> 0 && $hasil <> '') {
            $customer = array('first_name' => $user->first_name, 'last_name' => $user->second_name, 'email' => $email, 'phone' => $user->phone);
            $midtran = AFhelper::setMidtrans($payment_type, $payment_agent, "ADV".$hasil, $harga->harga, $id_posisi, "Advertisement", $customer);
            $jsresp = json_decode($midtran);
            if($jsresp->status_code == "200" || $jsresp->status_code == "201" || $jsresp->status_code == "202") {
                $data = AFhelper::getTampilanMidtrans($payment_type, $payment_agent, $jsresp);
                $sql = "UPDATE tb_iklan_order SET 
                    payment_status = '{$jsresp->transaction_status}',
                    payment_key = '$midtran'
                    WHERE id_order = '$hasil';
                    UPDATE tb_iklan_posisi SET 
                    status_$layout = 'order', 
                    keterangan_$layout = '$keterangan'
                    WHERE id_posisi = '$id_posisi';";
                AFhelper::dbSaveCekMulti($sql);
                AFhelper::kirimJson($data);
            } else {
                AFhelper::kirimJson($jsresp, $jsresp->status_message, 0);
            }
        } else {
            AFhelper::kirimJson($sql, 'Registration failed', 0);
        }
    }

    function lihatbayar() {
        $payment_type = $_POST['payment_type'];
        $payment_agent = $_POST['payment_agent'];
        $payment_key = $_POST['payment_key'];
        $jsresp = json_decode($payment_key);
        $data = AFhelper::getTampilanMidtrans($payment_type, $payment_agent, $jsresp);
        AFhelper::kirimJson($data);
    }

}


?>