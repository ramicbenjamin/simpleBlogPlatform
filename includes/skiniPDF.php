<?php

$clanakZaSkinuti = $_GET["id"];
$sadrzajXMLa = simplexml_load_file('../XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $clanakZaSkinuti) {
            $sadrzajSkin = $uni->sadrzaj;
        }
    }


require('../fpdf.php');

class PDF extends FPDF  
{
// Page header
function Header()
{
    
    $clanakZaSkinuti = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file('../XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $clanakZaSkinuti) {
            $naslovSkin = $uni->naslov;
        }
    }
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    if(isset($naslovSkin)) $this->Cell(30,10, $naslovSkin ,0,1,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    $clanakZaSkinuti = $_GET["id"];
    $sadrzajXMLa = simplexml_load_file('../XMLs/clanci.xml'); 
    foreach($sadrzajXMLa->objava as $uni)
    {
        if($uni->id == $clanakZaSkinuti) {
            $autorSkin = $uni->autor;
        }
    }
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    if(isset($autorSkin)) $this->Cell(0,10,"Autor: ".$autorSkin,0,0,'C');
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
$targetImage = "../uploads/slika".$_GET['id'].".jpg";
if(file_exists($targetImage))
{
    try{
        $pdf->Image($targetImage,50,35,100);
    }
    catch(exception $e)
    {
        $noImage = "../img/noImage.jpg";
        $pdf->Image($noImage,50,35,100);
    }
}else
{
    $noImage = "../img/noImage.jpg";
    $pdf->Image($noImage,50,35,100);
}
if(isset($sadrzajSkin)) $pdf->PrintChapter($sadrzajSkin);
else header("Location: ../index.php");
$pdf->Output();
?>