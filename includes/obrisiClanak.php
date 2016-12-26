<?php      
    $zaIzbrisati = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file('../XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $zaIzbrisati) {
            $dom=dom_import_simplexml($uni);
            $dom->parentNode->removeChild($dom);
        }
    }
    $zaSnimiti = $sadrzajXMLa->asXML();
    file_put_contents('../XMLs/clanci.xml', $zaSnimiti);

    $sve = file_get_contents('../XMLs/clanci.xml');
    if(strlen($sve) == 49)
    {
        $prazanString = "";
        file_put_contents('../XMLs/clanci.xml', $prazanString);
    }
    $fileForDelete = "../uploads/slika".$zaIzbrisati.".jpg";
    unlink($fileForDelete);
    header("Location: ../index.php");   
?>