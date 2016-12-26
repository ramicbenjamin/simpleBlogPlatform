<?php


$filexml = $_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml';
if (file_exists($filexml)) {
$xml = simplexml_load_file($filexml);

$f = fopen($_SERVER['DOCUMENT_ROOT'] . '/CSVs/clanci.csv', 'w');
foreach ($xml->objava as $objava) {
    fputcsv($f, get_object_vars($objava),',','"');
}
fclose($f);
}
header('Content-Disposition: attachment; filename="' . $_SERVER['DOCUMENT_ROOT'] . '/CSVs/clanci.csv";');
readfile($_SERVER['DOCUMENT_ROOT'] . '/CSVs/clanci.csv'); 
?>


