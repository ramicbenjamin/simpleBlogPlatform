<?php
include 'includes/header.php';
?> 
   <div class="red">
    <div class="naslov">Početna stranica</div>
</div>

<?php
    /*$sve = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml');
    if(strlen($sve) != 0)
    {
        $sviClanci = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml');
        $i = 0;
        foreach ($sviClanci as $x)
        {
            if ($i%2 == 0) echo('<div class="red clanci">');
            echo('<div class="kolona dva clanak">');
            echo("<div class='clanak skracen slika velika'><img class='img clanak' src='uploads/slika{$x->id}.jpg' alt='SlikaNedostaje'></div>");
            $linkClanka = rawurldecode("clanak.php?id=".$x->id);
            echo('<div class="clanak skracen tekst"> <a href ="'.$linkClanka.'">'.htmlspecialchars($x->naslov, ENT_QUOTES, 'UTF-8').'</a> </div>');
            echo('<div class="clanak skracen detaljno">'.htmlspecialchars($x->autor, ENT_QUOTES, 'UTF-8').'</div>');
            echo('</div>');
            if ($i%2 != 0) echo('</div>');
            $i++;
        }   
    } */

     $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
     $veza->exec("set names utf8");
     $sviClanci = $veza->query("select id, naslov, tekst, autor from clanak");
     if (!$sviClanci) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

     $i = 0;    
     foreach ($sviClanci as $x) {
        //print $vijest['naslov']." ".$vijest['tekst']." ".$vijest['autor']." "."<br>";
        if ($i%2 == 0) echo('<div class="red clanci">');
            echo('<div class="kolona dva clanak">');
            echo("<div class='clanak skracen slika velika'><img class='img clanak' src='uploads/slika{$x["id"]}.jpg' alt='SlikaNedostaje'></div>");
            $linkClanka = rawurldecode("clanak.php?id=".$x["id"]);
            echo('<div class="clanak skracen tekst"> <a href ="'.$linkClanka.'">'.htmlspecialchars($x["naslov"], ENT_QUOTES, 'UTF-8').'</a> </div>');
            $autorClankaID = $veza->query("select username from korisnik where id = ".$x["autor"]);
            foreach($autorClankaID as $z)
            {
                $autorClanka = $z["username"]; 
            }
            echo('<div class="clanak skracen detaljno">'.htmlspecialchars($autorClanka, ENT_QUOTES, 'UTF-8').'</div>');
            echo('</div>');
            if ($i%2 != 0) echo('</div>');
            $i++;
     }

    ?>
<?php if(isset($_SESSION["username"])) { ?>
    <div class="red">
        <div class="clanakOpcije"><a href = "includes/skiniCSV.php">Downloadaj sve clanake u obliku CSV-a</a> </div>
    </div>
    <?php } ?>
<?php
include 'includes/footer.php';
?>