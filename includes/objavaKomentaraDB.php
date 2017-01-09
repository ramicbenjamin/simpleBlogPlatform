<?php
     $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
     $veza->exec("set names utf8");
     $veza->query("insert into komentar set tekst = '".$_POST['komentarZaObjaviti']."', clanak_id = ".$_GET["id"]);
     echo ("insert into komentar set tekst = '".$_POST['komentarZaObjaviti']."', clanak_id = ".$_GET["id"]);
     header('Location: ../clanak.php?id='.$_GET["id"]);
?>