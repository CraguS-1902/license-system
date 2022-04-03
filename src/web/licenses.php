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

    <section class="section_stats">
        <div class="stats">
            <div class="stat">
                <span><?=licenseCount();?></span>
                <p>Total Licenses</p>
            </div>
            <div class="stat">
                <span><?=unusedlicenseCount();?></span>
                <p>unused Licenses</p>
            </div>
            <div class="stat">
                <span><?=usedlicenseCount();?></span>
                <p>used Licenses</p>
            </div>
    </section>
    <section class="section_zombies">
    <div id="zombies" class="zombies">
    <div class="zombie">
                    <span>Generate License</span>
                    
                    <form class="gen_form" action="db/lic.php" method="post">
                        <input type="number" name="genlic" placeholder="Generate Licenses in days">
                        <button type="submit">Generator</button>
                        <?php
                            if(isset($_GET['error']) && $_GET['error'] == "rem_success") {
                                echo "<p style='color: red;'>successfully removed 1 License</p>";
                            }
                            if(isset($_GET['error']) && $_GET['error'] == "invalid") {
                                echo "<p style='color: red;'>Invalid Number</p>";
                            }
                            if(isset($_GET['error']) && $_GET['error'] == "Success") {
                                echo "<p style='color: green;'>successfully created 1 License</p>";
                            }
                        ?>
                    </form>
        </div>
</div>
</section>
    <section class="section_zombies">
        <div id="zombies" class="zombies">
        <?php
                global $bdd;

                $resp = $bdd->query('SELECT * FROM licenses');
                
                while ($license = $resp->fetch()) {
                    if($license["claimed"] == 1){
                        ?>
                    <div class="zombie">
                        <span><?=$license["license"]?></span>
                        <span><?=$license["days"]?> Days</span>
                        <a style="width: 7%">USED</a>
                        <a style="background-color: rgba(238, 48, 48, 0.87);" href="db/lic?remove=<?=$license['ID']?>">Delete</a>
                    </div>
                    <?php
                    } else {
            ?>
                <div class="zombie">
                    <span><?=$license["license"]?></span>
                    <span><?=$license["days"]?> Days</span>
                    <a style="width: 7%">UNUSED</a>
                    <a style="background-color: rgba(238, 48, 48, 0.87);" href="db/lic?remove=<?=$license['ID']?>">Delete</a>
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