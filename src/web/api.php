<?php
require_once('db/database.php');

$type = $_GET["type"];
$id = $_GET["id"];
if($type == "resethwid"){
    $query = "UPDATE users SET hwid = 'N/A' WHERE ID = '".$id."'";
    $req = $bdd->prepare($query);
    $req->execute();
    header('Location: ./user.php?id='.$id.'&action=resethwid'); die();
}

if($type == "deleteuser"){
    $query = "DELETE FROM `users` WHERE ID = ".$id;
    $req = $bdd->prepare($query);
    $req->execute();
    header('Location: ./users.php?action=deleteuser'); die();
}