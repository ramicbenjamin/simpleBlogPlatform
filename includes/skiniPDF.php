<?php

/*$clanakZaSkinuti = $_GET["id"];
$sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $clanakZaSkinuti) {
            $sadrzajSkin = $uni->sadrzaj;
        }
    }
*/


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

require('../fpdf.php');

class PDF extends FPDF  
{
// Page header
function Header()
{
    
   /* $clanakZaSkinuti = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $clanakZaSkinuti) {
            $naslovSkin = $uni->naslov;
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
    
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    if(isset($clanakIspis["naslov"])) $this->Cell(30,10, $clanakIspis["naslov"] ,0,1,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    /*$clanakZaSkinuti = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $clanakZaSkinuti) {
            $autorSkin = $uni->autor;
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
    
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $autorClankaID = $veza->query("select username from korisnik where id = ".$clanakIspis["autor"]);
        foreach($autorClankaID as $z)
        {
            $autorClanka = $z["username"]; 
        }
    if(isset($autorClanka)) $this->Cell(0,10,"Autor: ".$autorClanka,0,0,'C');
}
    
    
    
function ChapterBody($file)
{
    // Times 12
    $this->SetFont('Times','',12);
    // Output justified text
    $this->MultiCell(0,100,"");
    $this->MultiCell(0,5,$file);
    // Line break
    $this->Ln();
    // Mention in italics
    $this->SetFont('','I');
}

function PrintChapter($file)
{
    $this->ChapterBody($file);
}
    
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$targetImage = $_SERVER['DOCUMENT_ROOT'] . "/uploads/slika".$_GET['id'].".jpg";
if(file_exists($targetImage))
{
    try{
        $pdf->Image($targetImage,50,35,100);
    }
    catch(exception $e)
    {
        $noImage = $_SERVER['DOCUMENT_ROOT'] . "/img/noImage.jpg";
        $pdf->Image($noImage,50,35,100);
    }
}else
{
    $noImage = $_SERVER['DOCUMENT_ROOT'] . "/img/noImage.jpg";
    $pdf->Image($noImage,50,35,100);
}
if(isset($clanakIspis["tekst"])) $pdf->PrintChapter($clanakIspis["tekst"]);
else header("Location: ../index.php");
$pdf->Output();
?>