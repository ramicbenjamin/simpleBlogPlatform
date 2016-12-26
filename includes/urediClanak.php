<?php
if(isset($_POST["noviNaslov"]) && strlen(trim($_POST["noviNaslov"])) != 0) {
$zaIzmjeniti = $_GET["id"];
$noviNaslov = $_POST["noviNaslov"];
$noviSadrzaj = $_POST["noviSadrzaj"];
$noviAutor = $_POST["noviAutor"];
    $sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $zaIzmjeniti) {
            $uni->naslov = $noviNaslov;
            $uni->sadrzaj = $noviSadrzaj;
            $uni->autor = $noviAutor;
        }
    }

    $zaSnimiti = $sadrzajXMLa->asXML();
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml', $zaSnimiti);

    $sve = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml');
    if(strlen($sve) == 49)
    {
        $prazanString = "";
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml', $prazanString);
    }
   header("Location: ../clanak.php?slika=img/puppyNaslovna.jpg&id=".$zaIzmjeniti);   
}else{
    header("Location: ../index.php");
}

?>