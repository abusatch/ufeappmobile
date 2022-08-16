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

    public static function formatText(string $text)
    {
        $text = str_replace('\n',"-enter-",$text);
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
        $text = preg_replace("/\r\n|\r|\n/", '-enter-', $text);
        $text = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"-enter-",$text);

        return $text;
    }

    public static function formatTextHTML(string $text)
    {
        $text = str_replace('\n',"-enter-",$text);
        $text = str_replace("'","`",$text);
        $text = str_replace('"',"-petikdua-",$text);
        $text = str_replace(".","-titik-",$text);
        $text = str_replace("-","-",$text);
        $text = str_replace("!","-tandaseru-",$text);
        $text = str_replace("’"," ",$text);
        $text = str_replace("é","-ekanan-",$text);
        $text = str_replace("à","-akiri-",$text);
        $text = str_replace("è","-ekiri-",$text);
        $text = preg_replace("/\r\n|\r|\n/", '-enter-', $text);
        $text = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"-enter-",$text);

        return $text;
    }
}