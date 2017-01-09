<?php
     $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
     $veza->exec("set names utf8");
     $veza->query("update clanak set naslov = '".$_POST["noviNaslov"]."', tekst = '".$_POST["noviSadrzaj"]."' where id = ".$_GET["id"]);
     header("Location: ../clanak.php?&id=".$_GET["id"]);  
?>