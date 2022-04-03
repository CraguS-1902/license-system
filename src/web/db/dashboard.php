<?php
    require_once('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" type="image/jpg" href="assets/images/logo.jpg"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(!empty($title)) {echo $title;}?></title>

    <link rel="stylesheet" href="assets/css/style.css">

    <script src="assets/js/d3.v3.min.js" charset="utf-8"></script>
</head>
<body>

    <header>
        <nav>
            <a target="_blank"class="header_logo">
                <span><?=getInfo("title")?></span>
            </a>
            <div class="header_links">
                <ul class="nav_links">
                    <li class="nav_link"><a href="index">Home</a></li>
                    <li class="nav_link"><a href="users">Users</a></li>
                    <li class="nav_link"><a href="licenses">Licenses</a></li>
                </ul>
            </div>
        </nav>
    </header>