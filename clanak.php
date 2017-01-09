<?php
include 'includes/header.php';
/*$idClanka = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $idClanka) {
            $clanakIspis = $uni;
        }
    }*/

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
//if(!isset($clanakIspis)) header("Location: index.php");
?>
    <div class="gallery-show" id="gallery-show" onclick="sakrijGaleriju()">
        <div id="ih" class="image-holder"> <img id="image-holder" src="" alt=""> </div>
    </div>
    <div class="red">
        <div class="naslov">Članak</div>
    </div>
    <div class="red">
        <div class="naslovClanak">
            <?php echo(htmlspecialchars($clanakIspis["naslov"], ENT_QUOTES, 'UTF-8'));?>
        </div>
    </div>
    <div class="red">
        <div class="placeHolderClanakFotke">
            <?php echo('<img class="img clanak" src="uploads/slika'.$_GET["id"].'.jpg"alt="SlikaNedostaje">');?></div>
    </div>
    <div class="red">
        <div class="placeHolderTekstClanka">
            <?php echo(htmlspecialchars($clanakIspis["tekst"], ENT_QUOTES, 'UTF-8'));?>
                <!--
            <div class="red">
                <div class="kolona trecina"> <img class="thumbnail" id="img1" alt="slika" onclick="showImage(this.src)" src="../img/puppy.jpg"> </div>
                <div class="kolona trecina"> <img class="thumbnail" id="img2" alt="slika" onclick="showImage(this.src)" src="../img/puppy2.jpg"> </div>
                <div class="kolona trecina"><img class="thumbnail" id="img3" alt="slika" onclick="showImage(this.src)" src="../img/puppy3.jpg"> </div>
            </div>
            <div class="red">
                <div class="kolona trecina"> <img class="thumbnail" id="img4" alt="slika" onclick="showImage(this.src)" src="../img/puppy4.jpg"> </div>
            </div>
-->
   
   </div>
    </div>
    <div class="red">
        <div class="komentariSeparator">Komentari</div>
    </div>
    <?php
    $sviKomentari = $veza->query("select id, clanak_id, tekst from komentar where clanak_id = ".$idClanka);
     if (!$sviKomentari) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    echo('<div class="red">')    ;
    foreach ($sviKomentari as $komentar) {
        
          echo('<div class="placeHolderKomentara">');
          echo(htmlspecialchars($komentar['tekst']));
          echo('</div>');
     }
    echo('</div>');
    ?>
    <?php echo('<form action = "/includes/objavaKomentaraDB.php?id='.$idClanka.'" method = "post">') ?>
        <div class="red">
            <input id = "noviKomentar" name = "komentarZaObjaviti" class="tekstKomentara" size="5">
            <input type="submit" class="dugmeVeliko sakrij dugme" value="Komentiraj">
            <input type="submit" class="dugmeMalo prikazi dugme" value="Komentiraj">
        </div>
    </form>
    
    <?php if(isset($_SESSION["username"])) { ?>
        <div class="red">
            <div class="clanakOpcije">
                <?php echo("<a href = '/includes/obrisiClanakDB.php?id=".$idClanka."'>")?> Obrisi clanak</a> | <?php echo("<a href = 'urediPost.php?id=".$idClanka."'>")?>Izmjeni clanak</a> | <?php echo("<a href = '/includes/skiniPDF.php?id=".$_GET['id']."'>")?>Downloadaj clanak</a> </div>
        </div>
        <?php } ?>
            <?php
include 'includes/footer.php';
?>