<?php

    session_start();
    
    $host_name  = "localhost";
    $database   = "license";
    $user_name  = "root";
    $password   = "";

    try {
        $bdd = new PDO('mysql:host='.$host_name.';dbname='.$database, $user_name, $password);

    } catch (PDOException $e) {
        print "Error: " . $e->getMessage() . "<br/>"; die();
    }
    
    catch(Exception $e)
    {
        echo 'Error: '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
    }
?>