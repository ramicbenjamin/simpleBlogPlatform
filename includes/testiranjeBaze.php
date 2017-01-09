<?php
     $veza = new PDO("mysql:dbname=simpleBlogPlatformDB;host=localhost;charset=utf8", "admin", "12345678");
     $veza->exec("set names utf8");
     $sviClanci = $veza->query("select id, naslov, tekst, autor from clanak where autor = 1");
     if (!$sviClanci) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }


     foreach ($sviClanci as $vijest) {
          print $vijest['naslov']." ".$vijest['tekst']." ".$vijest['autor']." "."<br>";
     }

     $sviKorisnici = $veza->query("select id, ime, prezime, email, username, password from korisnik");
     if (!$sviKorisnici) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
        
    foreach ($sviKorisnici as $korisnik) {
          print $korisnik['id']." ".$korisnik['ime']." ".$korisnik['password']." "."<br>";
     }

    $sviKomentari = $veza->query("select id, clanak_id, tekst from komentar");
     if (!$sviKomentari) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
        
    foreach ($sviKomentari as $komentar) {
          print $komentar['id']." ".$komentar['clanak_id']." ".$komentar['tekst']." "."<br>";
     }
     
    ?>
