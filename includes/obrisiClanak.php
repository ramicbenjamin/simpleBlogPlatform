<?php      
    $zaIzbrisati = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $zaIzbrisati) {
            $dom=dom_import_simplexml($uni);
            $dom->parentNode->removeChild($dom);
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
    $fileForDelete = $_SERVER['DOCUMENT_ROOT'] . "/uploads/slika".$zaIzbrisati.".jpg";
    unlink($fileForDelete);
    header("Location: ../index.php");   
?>