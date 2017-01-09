<?php
include 'includes/header.php';
/*$idClanka = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $idClanka) {
            $clanakIspis = $uni;
        }
    }
if(!isset($clanakIspis)) header("Location: index.php");*/

     $idClanka = $_GET["id"];    
     $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
     $veza->exec("set names utf8");
     $sviClanci = $veza->query("select id, naslov, tekst, autor from clanak where id = ". $idClanka);
     if (!$sviClanci) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }


     foreach ($sviClanci as $vijest) {
         $clanakIspis = $vijest;
     }


?>
    <div class="red">
        <div class="naslov">Uredi članak</div>
    </div>
    <form action="/includes/urediClanakDB.php?id=<?php echo($idClanka);?>" method="post">
        <div class="red">
            <input type="text" id="naslovPosta" placeholder="Naslov posta" value="<?php echo($clanakIspis["naslov"])?>" name="noviNaslov" onfocusout="validirajNoviPost()" required> </div>
        <div class="hidden" id="greskaNaslovPostaPost">Morate unijeti barem naziv posta.</div>
        <div class="red">
        <textarea placeholder="Sadržaj posta" name="noviSadrzaj"><?php echo($clanakIspis["tekst"])?></textarea>
        </div>
        <div class="red">
            <input type="submit" value="Ažuriraj"> 
            </div>
    </form>
    <?php
include 'includes/footer.php';
?>