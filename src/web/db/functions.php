<?php
    require_once('database.php');
    $api_password = "password123";

    $logs_webhook = "LOGS WEBHOOK";
    $api_webhook = "API WEBHOOK";

    $base_url = "BASE URL/IP OF YOUR HOST";

    function CheckLogin(){
        if(isset($_SESSION['token'])) {
            return true;
        } else {
            return false;
        }
    }

    function licenseCount(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM licenses');
        $req->execute();
        return $req->rowCount();
    }
    function usedlicenseCount(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM licenses WHERE claimed = 1');
        $req->execute();
        return $req->rowCount();
    }
    function unusedlicenseCount(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM licenses WHERE claimed = 0');
        $req->execute();
        return $req->rowCount();
    }
    function userCount(){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM users ');
        $req->execute();
        return $req->rowCount();
    }
    function getInfo($setting){
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM settings');
        $req->execute();
        $value = $req->fetch();
        return $value["$setting"];
    }
    function SendToWebhook($webhook, $data) {
        $ch = curl_init($webhook);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_exec($ch);
        curl_close($ch);
    }

?>