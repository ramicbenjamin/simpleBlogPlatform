<?php
if(isset($_POST['imeReg']) && strlen(trim($_POST['imeReg'])) != 0){
     $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
     $veza->exec("set names utf8");
     $sviUsername = $veza->query("select username from korisnik");
     $imaUname = false;
     foreach($sviUsername as $takenUnames)
     {
         if($_POST['korisnickoImeReg'] == $takenUnames["username"])
         {
             $imaUname = true;
         }
     }
  if($imaUname)
  {
      header("Location: ../registracija.php");
  }else
  {
    $veza->query("insert into korisnik set ime = '".$_POST['imeReg']."', prezime = '".$_POST['prezimeReg']."', email = '".$_POST['mailReg']."', rodjendan = '".$_POST['rodjendanReg']."', username = '".$_POST['korisnickoImeReg']."', password = '".md5($_POST['passwordReg'])."'");
    header("Location: ../logIn.php");
  }
}
?>