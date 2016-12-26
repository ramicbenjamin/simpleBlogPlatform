<?php
if(isset($_POST['naslovClanka']) && strlen(trim($_POST['naslovClanka'])) != 0) {
        $sve = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml');
        if($sve[strlen($sve)-2] == '>') $sve = substr($sve,0,strlen($sve)-1);
        if(strlen($sve)==0)
        {
            $sve ="<?xml version='1.0' encoding='utf-8'?><clanci></clanci>";
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml', $sve);
        }
        $brojPostova = 1;
        $sadrzajXMLa = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml');
        foreach($sadrzajXMLa as $x)
        {
            $brojPostova = $x->id+1;
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
    
        $novaObjava = "<objava><id>".$brojPostova."</id><naslov>" . htmlspecialchars($_POST['naslovClanka']) . "</naslov><slika>".$target_file."</slika><sadrzaj>" . htmlspecialchars($_POST['sadrzajClanka']) . "</sadrzaj><autor>".htmlspecialchars($_POST['autorClanka'])."</autor></objava>";
        $sve = substr($sve,0,strlen($sve)-9).$novaObjava."</clanci> ";
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/XMLs/clanci.xml', $sve);
       header("Location: ../index.php");
    }
header("Location: ../index.php");
?>