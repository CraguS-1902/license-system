<?php

    require_once('db/functions.php');

    if(!CheckLogin()){
        header('Location: login');
    }

    $title = "Project";
    require('db/dashboard.php');

?>

    <!-- Main -->
    <section class="section_main">
        <div class="main">
            
            <h1>License System</h1>
            <p>The Best Most powerfull license system with user interface.</p>
            <a href="users">View Users</a>
        </div>
    </section>

    <section class="section_stats">
        <div class="stats">
            <div class="stat">
                <span><?=licenseCount();?></span>
                <p>Licenses</p>
            </div>

            <div class="stat">
                <span><?=userCount();?></span>
                <p>Users</p>
            </div>
        </div>
    </section>
</body>
</html>