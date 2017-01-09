<?php

/*
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
readfile($_SERVER['DOCUMENT_ROOT'] . '/CSVs/clanci.csv'); */
$host = getenv('MYSQL_SERVICE_HOST');
$username = "bramic2";
$password = "oephaecoonee";
$dbname = "simpleblogplatformdb";

// open connection to mysql database
$connection = mysqli_connect($host, $username, $password, $dbname) or die("Connection Error " . mysqli_error($connection));

// fetch mysql table rows
$sql = "select * from clanak";
$result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/CSVs/clanci.csv', 'w');

while($row = mysqli_fetch_assoc($result))
{
    fputcsv($fp, $row);
}

fclose($fp);

//close the db connection
mysqli_close($connection);
header('Content-Disposition: attachment; filename="' . $_SERVER['DOCUMENT_ROOT'] . '/CSVs/clanci.csv";');
readfile($_SERVER['DOCUMENT_ROOT'] . '/CSVs/clanci.csv');
?>


