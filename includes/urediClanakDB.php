<?php
     $veza = new PDO("mysql:dbname=simpleBlogPlatformDB;host=localhost;charset=utf8", "admin", "12345678");
     $veza->exec("set names utf8");
     $veza->query("update clanak set naslov = '".$_POST["noviNaslov"]."', tekst = '".$_POST["noviSadrzaj"]."' where id = ".$_GET["id"]);
     header("Location: ../clanak.php?&id=".$_GET["id"]);  
?>