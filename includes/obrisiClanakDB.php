<?php
     $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
     $veza->exec("set names utf8");
     $veza->query("delete from komentar where clanak_id = ".$_GET["id"]);
     $veza->query("delete from clanak where id = ".$_GET["id"]);
     $fileForDelete = $_SERVER['DOCUMENT_ROOT'] . "/uploads/slika".$_GET["id"].".jpg";
     unlink($fileForDelete);
     header("Location: ../index.php");
?>