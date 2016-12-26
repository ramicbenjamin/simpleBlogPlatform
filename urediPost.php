<?php
include 'includes/header.php';
$idClanka = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $idClanka) {
            $clanakIspis = $uni;
        }
    }
if(!isset($clanakIspis)) header("Location: index.php");
?>
  
   
    <div class="red">
        <div class="naslov">Uredi članak</div>
    </div>
    <form action="/includes/urediClanak.php?id=<?php echo($idClanka);?>" method="post">
        <div class="red">
            <input type="text" id="naslovPosta" placeholder="Naslov posta" value="<?php echo($clanakIspis->naslov)?>" name="noviNaslov" onfocusout="validirajNoviPost()" required> </div>
        <div class="hidden" id="greskaNaslovPostaPost">Morate unijeti barem naziv posta.</div>
        <div class="red">
        <textarea placeholder="Sadržaj posta" name="noviSadrzaj"><?php echo($clanakIspis->sadrzaj)?></textarea>
        </div>
        <div class="red">
            <input type="text" placeholder="Autor"  value="<?php echo($clanakIspis->autor)?>" name="noviAutor" required> 
            </div>
        <div class="red">
            <input type="submit" value="Ažuriraj"> 
            </div>
    </form>
    <?php
include 'includes/footer.php';
?>