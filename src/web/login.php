<?php
    require_once('db/functions.php');
    
    if(CheckLogin()){
        header('Location: ');
    }

    $title = "Login";
    require('db/dashboard.php');
?>

    <section class="section_main">
        <div class="main">
            
            <h1>License System</h1>
            <p>The Best Most powerfull license system with user interface.</p>
            <form class="login_form" action="db/login.php" method="post">
                <input type="password" name="password" placeholder="Enter Access Password ...">
                <button type="submit">Login</button>
                <?php
                    if(isset($_GET['error']) && $_GET['error'] == "invalid") {
                        echo "<p style='color: red;'>Invalid Password</p>";
                    }
                ?>
            </form>
        </div>
    </section>

</body>
</html>