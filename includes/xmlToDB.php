<?php
session_start();
$veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
$veza->exec("set names utf8");
$sviKorisnici = $veza->query("select id from korisnik where username = '".$_SESSION["username"]."'");
 if (!$sviKorisnici) {
      $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }
foreach ($sviKorisnici as $korisnik) {
      $korisnikKojiObjavljujeID = $korisnik['id'];
 }
$sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
foreach($sadrzajXMLa->objava as $uni)
{
    $veza->query("insert into clanak set naslov = '".$uni->naslov."', tekst = '".$uni->sadrzaj."', autor = ".$korisnikKojiObjavljujeID);
}
$prepisaniClanci = '<?xml version="1.0" encoding="utf-8"?><clanci>  </clanci>';
file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml', $prepisaniClanci);
header("Location: ../index.php");
?>