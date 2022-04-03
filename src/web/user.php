<?php

    require_once('db/functions.php');
    global $api_password;

    if(!CheckLogin()){
        header('Location: login');
    }

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        global $bdd;

        $req = $bdd->prepare('SELECT * FROM users WHERE `ID` = ?');
        $req->execute(array(htmlspecialchars($_GET['id'])));
        $user = $req->fetch();

        if($req->rowCount() == 0){
            echo "1"; die();
        }
    } else {
        echo "3"; die();
    }

    $title = getInfo("title");;
    require('db/dashboard.php');

?>

    <!-- Main -->
    <section class="section_main">
        <div class="main">
        <h1>License System</h1>
            <p>The Best Most powerfull license system with user interface.</p>
        </div>
    </section>

    <section class="section_zombie">
        <div id="zombie" class="zombie">
            <div class="user_infos">
                <div class="user_text_infos">
                    <span><?=$user['name']?> (<?=$user['ID']?>)</span>
                </div>
            </div>
            <div class="personnals_infos">
                <div class="custom-input token-input">
                    <label>EXPIRE</label>
                    <?php
                    $expire = strtotime(str_replace('/', '-', $user["expire"].' 02:00:00'));
                    $now = time() + 7200;
                    if($now >= $expire){
                        echo '<input id="user_token" disabled type="text" value="'.$user['expire'].' (EXPIRED)" class="select-input">';
                    } else {
                        echo '<input id="user_token" disabled type="text" value="'.$user['expire'].'" class="select-input">';
                    }
                    ?>
                    <label>RANK</label>
                    <input id="user_token" disabled type="text" value="<?=strtoupper($user['rank'])?>" class="select-input">
                    <label>IP</label>
                    <input id="user_token" disabled type="text" value="<?=$user['ip']?>" class="select-input">
                    <label>HWID</label>
                    <input id="user_token" disabled type="text" value="<?=$user['hwid']?>" class="select-input">
                    <?php
                            if(isset($_GET['action']) && $_GET['action'] == "resethwid") {
                                echo "<p style='color: green;'>successfully reset hwid</p>";
                            }
                    ?>
                    <div class="btn">
                        <a class="delete_zombie" href="api?type=resethwid&id=<?=$user['ID']?>&password=password123">Reset HWID</a>
                    </div>
                    <div class="btn">
                        <a class="delete_zombie" href="api?type=deleteuser&id=<?=$user['ID']?>&password=password123">Delete User</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>