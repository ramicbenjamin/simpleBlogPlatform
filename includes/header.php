<?php session_start(); ?>
    <!DOCTYPE html>
    <html lang="">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/stil.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        <title>Simple Blog Platform</title>
    </head>

    <body>
        <div class="container">
            <div class="red">
                <div class="kolona dva logo"> <img src="../simpleBlogPlatformPSDS/logo_simpleBlogPlatform.png" alt="logo" width="50" height="50"> </div>
                <div class="kolona dva meni sakrij meni">
                    <?php if(isset($_SESSION["admin"])) { ?> <a href="index.php">Početna</a> | <a href="profil.php">Profil</a> | <a href="noviPost.php">Novi post</a> | <a href="notifikacije.php">Notifikacije</a> | <a href = "pretraga.php"> Pretraga </a> |
                        <?php } ?>
                            <div class="dropdown">
                                <button onclick="dropajMeni('dropDownVeliki')" class="dropbtn">?</button>
                                <div id="dropDownVeliki" class="dropdown-content">
                                    <?php if(!isset($_SESSION["admin"])) { ?><a href="logIn.php">Login</a>
                                        <?php } ?>
                                            <?php if(isset($_SESSION["admin"])) { ?> <a href="../includes/logout.php">Logout</a>
                                                <?php } ?>
                                </div>
                            </div>
                </div>
            </div>
            <div class="red prikazi">
                <?php if(isset($_SESSION["admin"])) { ?><a href="pocetna.php">Početna</a> | <a href="profil.php">Profil</a> | <a href="noviPost.php">Novi post</a>  | <a href="notifikacije.php">Notifikacije</a> | <a href = "pretraga.php"> Pretraga </a> |
                    <?php } ?>
                        <div class="dropdown">
                            <button onclick="dropajMeni('dropDownMali')" class="dropbtn">?</button>
                            <div id="dropDownMali" class="dropdown-content">
                                <?php if(!isset($_SESSION["admin"])) { ?><a href="logIn.php">Login</a>
                                    <?php } ?>
                                        <?php if(isset($_SESSION["admin"])) { ?><a href="../includes/logout.php">Logout</a>
                                            <?php } ?>
                            </div>
                        </div>
            </div>
            <div id="placeHolderSadrzajaStranice" class="containerSadrzaja"> </div> 