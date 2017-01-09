<?php
     $veza = new PDO("mysql:dbname=simpleBlogPlatformDB;host=localhost;charset=utf8", "admin", "12345678");
     $veza->exec("set names utf8");
     $veza->query("delete from komentar where clanak_id = ".$_GET["id"]);
     $veza->query("delete from clanak where id = ".$_GET["id"]);
     $fileForDelete = $_SERVER['DOCUMENT_ROOT'] . "/uploads/slika".$_GET["id"].".jpg";
     unlink($fileForDelete);
     header("Location: ../index.php");
?>