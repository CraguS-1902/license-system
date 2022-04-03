<?php

    require_once('db/functions.php');

    if(!CheckLogin()){
        header('Location: login');
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

    <section class="section_zombies">
        <div id="zombies" class="zombies">
        <?php
                global $bdd;

                $resp = $bdd->query('SELECT * FROM users');
                
                while ($user = $resp->fetch()) {
                    $expire = strtotime(str_replace('/', '-', $user["expire"].' 02:00:00'));
                    $now = time() + 7200;
                    if($now >= $expire){
                        ?>
                    <div class="zombie">
                        <span><?=$user["name"]?></span>
                        <span><?=$user["expire"]?> (Expired)</span>
                        <span><?=$user["rank"]?></span>
                        <a href="user?id=<?=$user['ID']?>">View All Infos</a>
                    </div>
                    <?php
                    } else {
            ?>
                <div class="zombie">
                    <span><?=$user["name"]?></span>
                    <span><?=$user["expire"]?></span>
                    <span><?=$user["rank"]?></span>
                    <a href="user?id=<?=$user['ID']?>">View All Infos</a>
                </div>

                <?php
                    }
                }
            ?>
        </div>
    </section>


    <script src="assets/js/filter.js"></script>

</body>
</html>