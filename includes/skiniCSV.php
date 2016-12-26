<?php
$filexml='../XMLs/clanci.xml';
if (file_exists($filexml)) {
$xml = simplexml_load_file($filexml);

$f = fopen('../CSVs/clanci.csv', 'w');
foreach ($xml->objava as $objava) {
    fputcsv($f, get_object_vars($objava),',','"');
}
fclose($f);
}
header('Content-Disposition: attachment; filename="../CSVs/clanci.csv";');
readfile('../CSVs/clanci.csv'); 
?>


