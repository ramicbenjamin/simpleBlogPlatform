<?php
include 'includes/header.php';

$veza = new PDO("mysql:dbname=simpleBlogPlatformDB;host=localhost;charset=utf8", "admin", "12345678");
$veza->exec("set names utf8");
$sviKorisnici = $veza->query("select * from korisnik where username = '".$_SESSION["username"]."'");
 if (!$sviKorisnici) {
      $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }
foreach ($sviKorisnici as $korisnik) {
      $ime = $korisnik['ime'];
      $prezime = $korisnik['prezime'];
      $email = $korisnik['email'];
      $datumRodjenja = $korisnik["rodjendan"];
      $username = $korisnik["username"];
 }
?> 
   <div class="red">
    <div class="naslov">Profil</div>
</div>

<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis">Ime:</div>
        <div class="kolona dva atributi"><?php echo($ime);?></div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis">Prezime:</div>
        <div class="kolona dva atributi"><?php echo($prezime);?></div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis">eMail:</div>
        <div class="kolona dva atributi"><?php echo($email);?></div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis">Datum rođenja:</div>
        <div class="kolona dva atributi"><?php echo($datumRodjenja);?></div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis">Username:</div>
        <div class="kolona dva atributi"><?php echo($username);?></div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>