<?php
    require_once('functions.php');
    require_once('database.php');
    $req = $bdd->prepare('SELECT * FROM settings');
    $req->execute();
    $value = $req->fetch();
    $login_password = $value["login_key"];
    global $login_password, $logs_webhook;

    if(isset($_POST['password']) && !empty($_POST['password'])) {
        if($_POST['password'] == $login_password) {
            
            $_SESSION['token'] = "n4wh0bhflr5z0v5s5l5q5lk1u1u3jm6eg3162atmey"; // Just for check if you are logged
            header('Location: ../'); die();

        } else {
            
            header('Location: ../login.php?error=invalid'); die();
        }
        
    } else {
        header('Location: ../login.php?error=invalid'); die();
    }

?>