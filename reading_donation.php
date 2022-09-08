<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingDonation();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
    case 'tambah':
        $reading->tambah();
        break;
    case 'detil':
        $reading->detil();
        break;
    case 'getstatus':
        $reading->getStatus();
        break;
    default:
        echo "Mode Not Found";
        break;
}

class ReadingDonation
{

    function lihat() {
        $sql = "SELECT a.id_donation, a.id_user, a.harga, a.payment_status, a.payment_type, a.payment_agent, a.donation_date, a.email,
                CONCAT(b.first_name,' ',b.second_name) AS username 
            FROM tb_donation a
            JOIN user b ON(a.id_user = b.idUser)
            WHERE a.payment_status IN('settlement', 'capture')";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get List Donation');
    }
  
    function detil() {
        $id = $_POST['id'];
        if($id) {
            $sql = "SELECT id_donation, id_user, harga, payment_status, payment_type, payment_agent, donation_date, email 
                FROM tb_donation 
                WHERE id_donation = $id";
            $data = AFhelper::dbSelectOne($sql);
            AFhelper::kirimJson($data, 'Get Donation');
        } else {
            AFhelper::kirimJson(null, 'ID cannot be empty', 0);
        }  
    }

    function getStatus() {
        $order_id = "DON".$_GET['id'];
        $header = array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Basic ' . base64_encode('SB-Mid-server-mMfDlH9AGc8QGwK6DtK0ggVK:')
        );
        $crl = curl_init();
        curl_setopt($crl, CURLOPT_URL, 'https://api.sandbox.midtrans.com/v2/'.$order_id.'/status');
        curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $respon = curl_exec($crl);
        $jsresp = json_decode($respon);
        AFhelper::kirimJson($jsresp, 'Get status from Midtrans -- '.$_GET['id']);
    }

    function tambah() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $payment_type = $_POST['payment_type'];
        $payment_agent = $_POST['payment_agent'];
        $donation_date = $_POST['donation_date'];
        $harga = $_POST['harga'];

        $sql = "SELECT * from user where username = '$username'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;

        // $expired_date = date("Y-m-d H:i:s", strtotime("+".$harga->periode));
        
        $sql = "INSERT INTO tb_donation(id_user, harga, payment_type, payment_agent, donation_date, email) 
        VALUES ('$idUser', '$harga', '$payment_type', '$payment_agent', '$donation_date', '$email')";
        $hasil = AFhelper::dbSaveReturnID($sql);
        if ($hasil <> 0 && $hasil <> '') {
            $header = array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Basic ' . base64_encode('SB-Mid-server-mMfDlH9AGc8QGwK6DtK0ggVK:')
            );
            $post_data = array(
                "payment_type" => $payment_type,
                "transaction_details" => array(
                "order_id" => "DON".$hasil,
                "gross_amount" => $harga
                ),
                "item_details" => array(
                array(
                    "id" => "DONATION",
                    "price" => $harga,
                    "quantity" => 1,
                    "name" => "Donation"
                )
                ),
                "customer_details" => array(
                "first_name" => $user->first_name,
                "last_name" => $user->second_name,
                "email" => $email,
                "phone" => $user->phone
                )
            );
            if($payment_type == "credit_card") {
                $post_data["credit_card"] = array("token_id" => $payment_agent, "authentication" => true);
            } else if($payment_type == "bank_transfer") {
                $post_data["bank_transfer"] = array("bank" => $payment_agent);
            } else if($payment_type == "echannel") {
                $post_data["echannel"] = array("bill_info1" => "Payment", "bill_info2" => "Donation");
            } else if($payment_type == "cstore") {
                $post_data["cstore"] = array("store" => $payment_agent);
            } else if($payment_type == "gopay") {
                $post_data["gopay"] = array("enable_callback" => false);
            } else if($payment_type == "shopeepay") {
                $post_data["shopeepay"] = array("callback_url" => "https://ufe-section-indonesie.org/");
            }
            $crl = curl_init();
            curl_setopt($crl, CURLOPT_URL, 'https://api.sandbox.midtrans.com/v2/charge');
            curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($crl, CURLOPT_POST, true);
            curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode($post_data));
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
            $respon = curl_exec($crl);
            $jsresp = json_decode($respon);
            if($jsresp->status_code == "200" || $jsresp->status_code == "201" || $jsresp->status_code == "202") {
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
                $sql = "UPDATE tb_donation SET 
                    payment_status = '{$jsresp->transaction_status}',
                    payment_key = '$respon'
                    WHERE id_donation = '$hasil'";
                AFhelper::dbSave($sql, $datanya, 'Donation Success');
            } else {
                AFhelper::kirimJson($jsresp, $jsresp->status_message, 0);
            }
        }  else {
            AFhelper::kirimJson($sql, 'Donation failed', 0); 
        }
    }
  
}

?>