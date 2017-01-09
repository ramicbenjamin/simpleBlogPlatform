<?php
//sve iz baze prebacimo u XML 


//database configuration
$config['mysql_host'] = "localhost";
$config['mysql_user'] = "admin";
$config['mysql_pass'] = "12345678";
$config['db_name']    = "simpleblogplatformdb";
$config['table_name'] = "clanak";
 
//connect to host
mysql_connect($config['mysql_host'],$config['mysql_user'],$config['mysql_pass']);
//select database
@mysql_select_db($config['db_name']) or die( "Unable to select database");


$xml          = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$root_element = $config['table_name']."s"; //fruits
$xml         .= "<$root_element>";


//select all items in table
$sql = "SELECT * FROM ".$config['table_name'];
 
$result = mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
 
if(mysql_num_rows($result)>0)
{
   while($result_array = mysql_fetch_assoc($result))
   {
      $xml .= "<".$config['table_name'].">";
 
      //loop through each key,value pair in row
      foreach($result_array as $key => $value)
      {
         //$key holds the table column name
         $xml .= "<$key>";
 
         //embed the SQL data in a CDATA element to avoid XML entity issues
         $xml .= "<![CDATA[$value]]>";
 
         //and close the element
         $xml .= "</$key>";
      }
 
      $xml.="</".$config['table_name'].">";
   }
}

//close the root element
$xml .= "</$root_element>";
 
//send the xml header to the browser
header ("Content-Type:text/xml");
 
//output the XML data
echo $xml;
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