<?php
//sve iz baze prebacimo u XML 
 $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
 $veza->exec("set names utf8");
 $sviClanci = $veza->query("select id, naslov, tekst, autor from clanak");
 if (!$sviClanci) {
      $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }

$xml = '<?xml version="1.0" encoding="UTF-8"?><clanaks>';
 foreach ($sviClanci as $vijest) {
     $xml.='<clanak><id>';
     $xml.=$vijest["id"];
     $xml.='</id><naslov>';
     $xml.=$vijest["naslov"];
     $xml.='</naslov><autor>';
     $autor = $veza->query("select username from korisnik where id = ".$vijest["autor"]);
     foreach($autor as $kreator)
     {
         $xml.=$kreator["username"];
     }
     $xml.='</autor></clanak>';
 }
$xml.='</clanaks>';

file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/XMLs/clanciPretrage.xml", $xml);

$xmlDoc=new DOMDocument();
$xmlDoc->load($_SERVER['DOCUMENT_ROOT'] . "/XMLs/clanciPretrage.xml");

$x=$xmlDoc->getElementsByTagName('clanak');

//get the q parameter from URL
$q=$_GET["q"];
$hint = "";
//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('naslov');
    $alternat = $x->item($i)->getElementsByTagName('autor');
    $z=$x->item($i)->getElementsByTagName('id');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='clanak.php?id=" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";

        } else {
          $hint=$hint . "<br /><a href='clanak.php?id=" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
          
        }
      }else if (stristr($alternat->item(0)->childNodes->item(0)->nodeValue,$q))
      {
          if ($hint=="") {
          $hint=$hint . "<a href='clanak.php?id=" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $alternat->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {          
          $hint=$hint . "<br /><a href='clanak.php?id=" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $alternat->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="<a>Nema nista slicno.</a>";
} else {
  $response=$hint;
}
//output the response
echo $response;
?>