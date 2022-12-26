<?php

require_once("db.php");

$koneksi->set_charset("utf8mb4");

class AFhelper
{
    public static function kirimJson($data, string $msg = '', $status = 1)
    {
        $response = array(
            'status' => $status,
            'message' => $msg,
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public static function dbSelectAll(string $sql)
    {
        global $koneksi;
        $data = array();
        $result = $koneksi->query($sql);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function dbSelectOne(string $sql)
    {
        global $koneksi;
        $data = array();
        $result = $koneksi->query($sql);
        $data = mysqli_fetch_object($result);
        return $data;
    }

    public static function dbSave(string $sql, $data = null, string $message = 'Sukses')
    {
        global $koneksi;
        $result = $koneksi->query($sql);
        if ($result) {
            return AFhelper::kirimJson($data, $message, 1);
        } else {
            return AFhelper::kirimJson($sql, $koneksi->error, 0);
        }
    }

    public static function dbSaveCek(string $sql)
    {
        global $koneksi;
        $hasil = array();
        $result = $koneksi->query($sql);
        if ($result) {
            $hasil[0] = true;
        } else {
            $hasil[0] = false;
            $hasil[1] = $koneksi->error;
            $hasil[2] = $sql;
        }
        return $hasil;
    }

    public static function dbSaveReturnID(string $sql)
    {
        global $koneksi;
        $result = $koneksi->query($sql);
        if ($result) {
            $hasil = $koneksi->insert_id;
        } else {
            $hasil = 0;
        }
        return $hasil;
    }

    public static function dbSaveMulti(string $sql, $data = null, string $message = 'Sukses')
    {
        global $koneksi;
        $result = $koneksi->multi_query($sql);
        if ($result) {
            return AFhelper::kirimJson($data, $message, 1);
        } else {
            return AFhelper::kirimJson($sql, $koneksi->error, 0);
        }
    }

    public static function dbSaveCekMulti(string $sql)
    {
        global $koneksi;
        $hasil = array();
        $result = $koneksi->multi_query($sql);
        if ($result) {
            $hasil[0] = true;
        } else {
            $hasil[0] = false;
            $hasil[1] = $koneksi->error;
            $hasil[2] = $sql;
        }
        return $hasil;
    }

    public static function formatText(string $text)
    {
        // $text = str_replace('\n',"-enter-",$text);
        $text = str_replace("'","`",$text);
        $text = str_replace('"',"-petikdua-",$text);
        $text = str_replace(str_split('\\/:*?"<>|'), ' ', $text);
        $text = str_replace("<br>","-enter-",$text);
        $text = str_replace(".","-titik-",$text);
        $text = str_replace("-","-",$text);
        $text = str_replace("!","-tandaseru-",$text);
        $text = str_replace("’"," ",$text);
        $text = str_replace("é","-ekanan-",$text);
        $text = str_replace("à","-akiri-",$text);
        $text = str_replace("è","-ekiri-",$text);
        // $text = preg_replace("/\r\n|\r|\n/", '-enter-', $text);
        // $text = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"-enter-",$text);

        return $text;
    }

    public static function formatTextHTML(string $text)
    {
        // $text = str_replace('\n',"-enter-",$text);
        $text = str_replace("'","`",$text);
        $text = str_replace('"',"-petikdua-",$text);
        $text = str_replace(".","-titik-",$text);
        $text = str_replace("-","-",$text);
        $text = str_replace("!","-tandaseru-",$text);
        $text = str_replace("’"," ",$text);
        $text = str_replace("é","-ekanan-",$text);
        $text = str_replace("à","-akiri-",$text);
        $text = str_replace("è","-ekiri-",$text);
        // $text = preg_replace("/\r\n|\r|\n/", '-enter-', $text);
        // $text = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"-enter-",$text);

        return $text;
    }

    public static function generalText($text)
    {
        if($text == null) {
            return "";
        }
        $text = str_replace("-spasi-",' ',$text);
        $text = str_replace("-enter-",'\n',$text);
        $text = str_replace("`","'",$text);
        $text = str_replace("-petikdua-",'"',$text);
        $text = str_replace("-titik-",".",$text);
        $text = str_replace("-tandaseru-","!",$text);
        $text = str_replace("-ekanan-","é",$text);
        $text = str_replace("-akiri-","à",$text);
        $text = str_replace("-ekiri-","è",$text);
        $text = str_replace("&petiksatu&","'",$text);
        $text = str_replace("&amp;petiksatu&amp;","'",$text);
        return $text;
    }

    public static function YMDtoDMY(string $text)
    {
        $tanggal = explode(" ", $text);
        $tgl = explode("-", $tanggal[0]);
        $new_tgl = $tgl[2]."/".$tgl[1]."/".$tgl[0]; 
        return $new_tgl;
    }

    public static function sendNotification(string $judul, string $isi, string $gambar = "", string $halaman = "", string $nomor = "", $penerima = null) {
        $accesstoken = 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy';
        $header = array(
            'Content-type: application/json',
            'Authorization: key=' . $accesstoken
        );

        $qw = array();

        if($penerima == null) {
            $sql = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE token_push != '' ";
            $user = AFhelper::dbSelectAll($sql);
            foreach ($user as $r) {
                $qw[] = $r->token_push;
            }
        } else {
            $qw = $penerima;
        }

        $fcmMsg = array(
            'title' => $judul,
            'body' => $isi,
            'icon' => 'image/look24-logo-s.png',
            'sound' => 'default',
        );
        if($gambar != "") {
            $fcmMsg['image'] = $gambar;
        }

        $fcmFields = array(
            'registration_ids' => $qw,
            'priority' => 'high',
            'notification' => $fcmMsg
        );
        if($halaman != "") {
            $fcmFields['data'] = array(
                'halaman' => $halaman,
                'nomor' => $nomor,
            ); 
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($curl, CURLOPT_POST, true );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public static function setFirebase(string $rute, $data) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://ufe-indonesie-f76c4-default-rtdb.asia-southeast1.firebasedatabase.app/'.$rute.'.json');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data) );
        $response = curl_exec( $curl );
        curl_close( $curl );
        return $response;
    }

    public static function setMidtrans(string $payment_type, string $payment_agent, string $order_id, $harga, string $product_id = "", string $product_name = "", $customer = null) 
    {
        // Sandbox
        // Merchant ID : G769478283
        // Client Key  : SB-Mid-client-1La3o-bKzCq-oD2W
        // Server Key  : SB-Mid-server-Tawty3s8XDXcLjqDYWlbpPk0
        // Production
        // Merchant ID : G769478283
        // Client Key  : Mid-client-iw51ExEKVIlLdwgv
        // Server Key  : Mid-server-37Ayh2gHmUf_xu0i_sAGN2rz
        $header = array(
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Basic ' . base64_encode('Mid-server-2DDg_LyJp2SaCKVhoRb7lQPJ:')
        );
        $post_data = array(
            "payment_type" => $payment_type,
            "transaction_details" => array(
            "order_id" => $order_id,
            "gross_amount" => $harga
            ),
        );
        if($product_id != "") {
            $post_data["item_details"] = array(
                array(
                    "id" => $product_id,
                    "price" => $harga,
                    "quantity" => 1,
                    "name" => $product_name
                )
            );
        }
        if($customer != null) {
            $post_data["customer_details"] = array(
                "first_name" => $customer["first_name"],
                "last_name" => $customer["last_name"],
                "email" => $customer["email"],
                "phone" => $customer["phone"]
            );
        }

        if($payment_type == "credit_card") {
            $post_data["credit_card"] = array("token_id" => $payment_agent, "authentication" => true);
        } else if($payment_type == "bank_transfer") {
            $post_data["bank_transfer"] = array("bank" => $payment_agent);
        } else if($payment_type == "echannel") {
            $post_data["echannel"] = array("bill_info1" => "Payment", "bill_info2" => $payment_agent);
        } else if($payment_type == "cstore") {
            $post_data["cstore"] = array("store" => $payment_agent);
        } else if($payment_type == "gopay") {
            $post_data["gopay"] = array("enable_callback" => false);
        } else if($payment_type == "shopeepay") {
            $post_data["shopeepay"] = array("callback_url" => "https://ufe-section-indonesie.org/");
        }
        // sandox     : 'https://api.sandbox.midtrans.com/v2/charge'
        // production : 'https://api.midtrans.com/v2/charge'
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.midtrans.com/v2/charge');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close( $curl );
        return $response;  
    }

    public static function getTampilanMidtrans(string $payment_type, string $payment_agent, $jsresp) {
        if($payment_type == "bank_transfer") {
            if($payment_agent == "permata") {
              $datanya = array("key" => $jsresp->permata_va_number);
            } else {
              $datanya = array("key" => $jsresp->va_numbers[0]->va_number);
            }
          } else if($payment_type == "echannel") {
            $datanya = array("key" => $jsresp->bill_key, "biller_code" => $jsresp->biller_code);
          } else if($payment_type == "cstore") {
            $datanya = array("key" => $jsresp->payment_code);
          } else if($payment_type == "gopay" || $payment_type == "shopeepay") {
            for ($i=0; $i < count($jsresp->actions); $i++) { 
              if($jsresp->actions[$i]->name == "generate-qr-code") {
                $datanya["key"] = $jsresp->actions[$i]->url;
              }
              if($jsresp->actions[$i]->name == "deeplink-redirect") {
                $datanya["link"] = $jsresp->actions[$i]->url;
              }
            }
          }
          if($payment_type == "bank_transfer") {
            if($payment_agent == "permata") {
              $datanya["title"] = "Effectuez le paiement de la banque Permata au numéro de compte virtuel ci-dessous.";
              $datanya["howtopay"] = array(
                array("nama" => "ATM Permata/ALTO", "deskripsi" => "<ol><li>Sélectionnez d'autres transactions dans le menu principal.</li><li>Sélectionnez le paiement.</li><li>Sélectionnez d'autres paiements.</li><li>Sélectionnez un compte virtuel.</li><li>Insérez le numéro de compte virtuel, puis validez.</li><li>Paiement terminé.</li></ol>")               
              );
            } else if($payment_agent == "bca") {
              $datanya["title"] = "Effectuez le paiement de la banque BCA au numéro de compte virtuel ci-dessous.";
              $datanya["howtopay"] = array(
                array("nama" => "ATM BCA", "deskripsi" => "<ol><li>Sélectionnez d'autres transactions dans le menu principal.</li><li>Sélectionnez transfert.</li><li>Sélectionnez vers le compte virtuel BCA.</li><li>Insérez le numéro de compte virtuel BCA.</li><li>Insérez le montant à payer, puis validez.</li><li>Paiement terminé.</li></ol>"),
                array("nama" => "Klik BCA", "deskripsi" => "<ol><li>Sélectionnez transfert de fonds.</li><li>Sélectionnez le transfert vers le compte virtuel BCA.</li><li>Insérez le numéro de compte virtuel BCA.</li><li>Insérez le montant à payer, puis validez.</li><li>Paiement terminé.</li></ol>"),               
                array("nama" => "m-BCA", "deskripsi" => "<ol><li>Sélectionnez m-transfert.</li><li>Sélectionnez le compte virtuel BCA.</li><li>Insérez le numéro de compte virtuel BCA.</li><li>Insérez le montant à payer, puis validez.</li><li>Paiement terminé.</li></ol>")
              );
            } else if($payment_agent == "bni") {
              $datanya["title"] = "Effectuez le paiement de la banque BNI au numéro de compte virtuel ci-dessous.";
              $datanya["howtopay"] = array(
                array("nama" => "ATM BNI", "deskripsi" => "<ol><li>Sélectionnez les autres dans le menu principal.</li><li>Sélectionnez transfert.</li><li>Sélectionnez vers le compte BNI.</li><li>Insérez le numéro de compte de paiement.</li><li>Insérez le montant à payer, puis validez.</li><li>Paiement terminé.</li></ol>"),               
                array("nama" => "Internet Banking", "deskripsi" => "<ol><li>Sélectionnez la transaction, puis transférez les informations d'administration.</li><li>Sélectionnez définir le compte de destination.</li><li>Insérez les informations de compte, puis confirmez.</li><li>Sélectionnez le transfert, puis le transfert vers le compte BNI.</li><li>Insérez les détails du paiement, puis confirmez.</li><li>Paiement terminé.</li></ol>"),
                array("nama" => "Mobile Banking", "deskripsi" => "<ol><li>Sélectionnez transfert.</li><li>Sélectionnez la facturation du compte virtuel.</li><li>Sélectionnez le compte de débit que vous souhaitez utiliser.</li><li>Insérez le numéro de compte virtuel, puis validez.</li><li>Paiement terminé.</li></ol>")
              );
            } else if($payment_agent == "bri") {
              $datanya["title"] = "Effectuez le paiement de la banque BRI au numéro de compte virtuel ci-dessous.";
              $datanya["howtopay"] = array(
                array("nama" => "ATM BRI", "deskripsi" => "<ol><li>Sélectionnez d'autres transactions dans le menu principal.</li><li>Sélectionnez le paiement.</li><li>Sélectionnez autre.</li><li>Sélectionnez BRIVA.</li><li>Insérez le numéro BRIVA, puis validez.</li><li>Paiement terminé.</li></ol>"),
                array("nama" => "IB BRI", "deskripsi" => "<ol><li>Sélectionnez paiement et achat.</li><li>Sélectionnez BRIVA.</li><li>Insérez le numéro BRIVA, puis validez.</li><li>Paiement terminé.</li></ol>"),
                array("nama" => "BRImo", "deskripsi" => "<ol><li>Sélectionnez le paiement.</li><li>Sélectionnez BRIVA.</li><li>Insérez le numéro BRIVA, puis validez.</li><li>Paiement terminé.</li></ol>")               
              );
            }
            $datanya["label_key"] = "Numéro de compte virtuel";
            $datanya["label_howtopay"] = "comment payer";
          } else if($payment_type == "echannel") {
            $datanya["title"] = "Effectuez le paiement de la banque Mandiri au numéro de compte virtuel ci-dessous.";
            $datanya["label_key"] = "Numéro de compte virtuel";
            $datanya["label_biller_code"] = "Code de l'entreprise";
            $datanya["label_howtopay"] = "comment payer";
            $datanya["howtopay"] = array(
              array("nama" => "ATM Mandiri", "deskripsi" => "<ol><li>Sélectionnez Payer/Acheter dans le menu principal.</li><li>Sélectionnez Autres.</li><li>Sélectionnez Paiement multiple.</li><li>Insérez le code d'entreprise 70012.</li><li>Insérez le numéro de compte virtuel, puis validez.</li><li>Paiement terminé.</li></ol>"),
              array("nama" => "Internet Banking", "deskripsi" => "<ol><li>Sélectionnez Paiement dans le menu principal.</li><li>Sélectionnez Paiement multiple.</li><li>Sélectionnez Du compte.</li><li>Sélectionnez Midtrans dans le champ Fournisseur de services.</li><li>Insérez le numéro de compte virtuel, puis validez.</li><li>Paiement terminé.</li></ol>")
            );
          } else if($payment_type == "cstore") {
            if($payment_agent == "indomaret") {
              $datanya["title"] = "Veuillez vous rendre au magasin Indomaret le plus proche et montrer le code-barres/code de paiement au caissier.";
              $datanya["howtopay"] = array(
                array("nama" => "Indomaret", "deskripsi" => "Appuyez sur Télécharger les informations de paiement pour obtenir une copie de vos informations de paiement uniques.
                  <br/>Si vous allez payer au comptoir, rendez-vous dans le magasin Indomaret le plus proche et montrez votre code de paiement/code-barres au caissier.
                  <br/>Le caissier confirmera les détails de votre transaction. Une fois votre transaction réussie, vous recevrez l'e-mail de confirmation de paiement.
                  <br/>Si vous allez payer via i.saku, ouvrez l'application et appuyez sur Bayar.
                  <br/>Choisissez le marchand auquel vous souhaitez payer et entrez votre code de paiement.
                  <br/>Appuyez sur Selanjutnya et vérifiez les détails de votre transaction.
                  <br/>Appuyez sur Bayar sekarang pour confirmer votre paiement.
                  <br/>Veuillez conserver votre reçu de paiement Indomaret au cas où vous auriez besoin d'aide supplémentaire via le support."
                )               
              );
            } else if($payment_agent == "alfamart") {
              $datanya["title"] = "Veuillez vous rendre au magasin Alfa Group le plus proche et montrer le code-barres/code de paiement au caissier.";
              $datanya["howtopay"] = array(
                array("nama" => "Alfa Group", "deskripsi" => "Appuyez sur Télécharger les informations de paiement pour obtenir une copie de vos informations de paiement uniques.
                  <br/>Rendez-vous dans le magasin Alfamart/Alfamidi/Dan+Dan le plus proche de chez vous et montrez votre code-barres/code de paiement à la caisse.
                  <br/>Le caissier confirmera les détails de votre transaction.
                  <br/>Confirmez votre paiement avec le caissier.
                  <br/>Une fois votre transaction réussie, vous recevrez l'e-mail de confirmation de paiement.
                  <br/>Veuillez conserver votre reçu de paiement Alfamart au cas où vous auriez besoin d'aide supplémentaire via le support."
                )               
              );
            }
            $datanya["label_key"] = "Code de paiement";
            $datanya["label_howtopay"] = "comment payer";
          } else if($payment_type == "gopay") {
            $datanya["label_howtopay"] = "comment payer";
            $datanya["howtopay"] = array(
              array("nama" => "Gojek", "deskripsi" => "<ol><li>Ouvrez votre Gojek ou une autre application de portefeuille électronique.</li><li>Scannez le code QR sur votre moniteur.</li><li>Confirmez le paiement dans l'application.</li><li>Paiement terminé.</li></ol>"),               
            );
          } else if($payment_type == "shopeepay") {
            $datanya["label_howtopay"] = "comment payer";
            $datanya["howtopay"] = array(
              array("nama" => "Shopee", "deskripsi" => "<ol><li>Ouvrez votre Shopee ou une autre application de portefeuille électronique.</li><li>Scannez le code QR sur votre moniteur.</li><li>Confirmez le paiement dans l'application.</li><li>Paiement terminé.</li></ol>"),               
            );
          } else if($payment_type == "credit_card") {
            $datanya = $jsresp;
          }
      return $datanya;
    }
}