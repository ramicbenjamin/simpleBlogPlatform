<?php
include 'includes/header.php';
$idClanka = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file('XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $idClanka) {
            $clanakIspis = $uni;
        }
    }
if(!isset($clanakIspis)) header("Location: index.php");
?>
    <div class="gallery-show" id="gallery-show" onclick="sakrijGaleriju()">
        <div id="ih" class="image-holder"> <img id="image-holder" src="" alt=""> </div>
    </div>
    <div class="red">
        <div class="naslov">Članak</div>
    </div>
    <div class="red">
        <div class="naslovClanak">
            <?php echo(htmlspecialchars($clanakIspis->naslov, ENT_QUOTES, 'UTF-8'));?>
        </div>
    </div>
    <div class="red">
        <div class="placeHolderClanakFotke">
            <?php echo('<img class="img clanak" src="uploads/slika'.$_GET["id"].'.jpg"alt="SlikaNedostaje">');?></div>
    </div>
    <div class="red">
        <div class="placeHolderTekstClanka">
            <?php echo(htmlspecialchars($clanakIspis->sadrzaj, ENT_QUOTES, 'UTF-8'));?>
                <!--
            <div class="red">
                <div class="kolona trecina"> <img class="thumbnail" id="img1" alt="slika" onclick="showImage(this.src)" src="../img/puppy.jpg"> </div>
                <div class="kolona trecina"> <img class="thumbnail" id="img2" alt="slika" onclick="showImage(this.src)" src="../img/puppy2.jpg"> </div>
                <div class="kolona trecina"><img class="thumbnail" id="img3" alt="slika" onclick="showImage(this.src)" src="../img/puppy3.jpg"> </div>
            </div>
            <div class="red">
                <div class="kolona trecina"> <img class="thumbnail" id="img4" alt="slika" onclick="showImage(this.src)" src="../img/puppy4.jpg"> </div>
            </div>
--></div>
    </div>
    <?php if(isset($_SESSION["admin"])) { ?>
        <div class="red">
            <div class="clanakOpcije">
                <?php echo("<a href = '/includes/obrisiClanak.php?id=".$_GET['id']."'>")?> Obrisi clanak</a> | <?php echo("<a href = 'urediPost.php?id=".$_GET['id']."'>")?>Izmjeni clanak</a> | <?php echo("<a href = '/includes/skiniPDF.php?id=".$_GET['id']."'>")?>Downloadaj clanak</a> </div>
        </div>
        <?php } ?>
            <?php
include 'includes/footer.php';
?>