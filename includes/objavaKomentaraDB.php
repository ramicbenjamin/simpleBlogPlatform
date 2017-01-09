<?php
     $veza = new PDO("mysql:dbname=simpleBlogPlatformDB;host=localhost;charset=utf8", "admin", "12345678");
     $veza->exec("set names utf8");
     $veza->query("insert into komentar set tekst = '".$_POST['komentarZaObjaviti']."', clanak_id = ".$_GET["id"]);
     echo ("insert into komentar set tekst = '".$_POST['komentarZaObjaviti']."', clanak_id = ".$_GET["id"]);
     header('Location: ../clanak.php?id='.$_GET["id"]);
?>