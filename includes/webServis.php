<?php

function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}


function rest_get($request, $data) 
{
        $idvijesti = $_GET['id'];
        $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
        $veza->exec("set names utf8");
        $upit = $veza->prepare("SELECT * FROM komentar WHERE clanak_id=?");
        $upit->bindValue(1, $idvijesti, PDO::PARAM_INT);
        $upit->execute();
        $brojVracenih = $upit->rowCount();
        print "{ \"komentari\":[ ";
        $i = 1;
        foreach ($upit->fetchAll() as $komentar)
        {
            if($i < $brojVracenih)
                print '"'.$komentar["tekst"] . '",';
            else
                print '"'.$komentar["tekst"] . '"';
            $i++;
        }
        print "]}";
    
}
function rest_post($request, $data) 
{
    print "Servis za POST nije implementiran.";
}
function rest_delete($request) 
{
    print "Servis za DELETE nije implementiran.";
}
function rest_put($request, $data) 
{ 
    print "Servis za PUT nije implementiran.";
}
function rest_error($request) 
{ 
    print "Servis za ERROR nije implementiran.";
}

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>
