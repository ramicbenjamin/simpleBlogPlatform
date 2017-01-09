<?php
session_start();
$veza = new PDO("mysql:dbname=simpleBlogPlatformDB;host=localhost;charset=utf8", "admin", "12345678");
// new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=simpleblogplatformdb', 'bramic2', 'oephaecoonee');
$veza->exec("set names utf8");
$sviKorisnici = $veza->query("select id from korisnik where username = '".$_SESSION["username"]."'");
 if (!$sviKorisnici) {
      $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }
foreach ($sviKorisnici as $korisnik) {
      $korisnikKojiObjavljujeID = $korisnik['id'];
 }

if(isset($_POST['naslovClanka']) && strlen(trim($_POST['naslovClanka'])) != 0){
     $veza->query("insert into clanak set naslov = '".$_POST['naslovClanka']."', tekst = '".$_POST['sadrzajClanka']."', autor = ".$korisnikKojiObjavljujeID);

     $sviPostovi = $veza->query("select id from clanak order by id desc limit 1");
     foreach($sviPostovi as $post)
     {
            $brojPostova = $post["id"];
     }
        /*img upload*/
    
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
        $target_ime_slike = "slika".$brojPostova.".jpg";
        $target_file = $target_dir . $target_ime_slike;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["naslovClanka"])) {
            $check = getimagesize($_FILES["pic"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    
    
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    
        // Check file size
        if ($_FILES["pic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                
                echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    $veza->query("update clanak set slika = '".$target_ime_slike."' where id = ".$brojPostova);
    header("Location: ../index.php");
    }
header("Location: ../index.php");
?>