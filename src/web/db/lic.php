<?php
    require_once('functions.php');
    require_once('database.php');
    function generateRandomString($length = 5) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomStringa = '';
        $randomStringb = '';
        $randomStringc = '';
        $randomStringd = '';
        for ($i = 0; $i < $length; $i++) {
            $randomStringa .= $characters[rand(0, $charactersLength - 1)];
            $randomStringb .= $characters[rand(0, $charactersLength - 1)];
            $randomStringc .= $characters[rand(0, $charactersLength - 1)];
            $randomStringd .= $characters[rand(0, $charactersLength - 1)];
            $randomString = "$randomStringa-$randomStringb-$randomStringc-$randomStringd";
        }
        return $randomString;
    }
    if(isset($_GET["remove"]) && !empty($_GET["remove"])) {
        $query = "DELETE FROM `licenses` WHERE ID = ".$_GET['remove'];
        $req = $bdd->prepare($query);
        $req->execute();
        header('Location: ../licenses.php?error=rem_success'); die();
    }
    if(isset($_POST['genlic']) && !empty($_POST['genlic'])) {
        $query = "INSERT INTO `licenses` (`ID`, `license`, `days`, `claimed`) VALUES (NULL, '".generateRandomString()."', '".$_POST['genlic']."', '0')";
        $req = $bdd->prepare($query);
        $req->execute();
        header('Location: ../licenses.php?error=Success'); die();
    } else {
        header('Location: ../licenses.php?error=invalid'); die();
    }

?>