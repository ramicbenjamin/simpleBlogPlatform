
<?php 
session_start();
    if(!isset($_POST["uname"]) || !isset($_POST["psw"]))
    {
        echo("<script>alert('Polja nisu unesena.')</script>");
        header('Location: ../index.php');
        session_destroy();
    }
    
    if(!usernameIsValid($_POST["uname"]) || !passwordIsValid($_POST["psw"]))
    {
        echo("<script>alert('Nisu ispravni parametri.')</script>");
        header('Location: ../index.php');
        session_destroy();
    }
    
    $podaciAdmina = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/XMLs/adminKorisnici.xml');
    if($_POST["uname"] == $podaciAdmina->username && md5($_POST["psw"]) == $podaciAdmina->password)
    {
        echo("<script>alert('Password i username se ne podudaraju.');</script>");
        $_SESSION["admin"] = $_POST["uname"];
        header("Location: ../index.php");   
    }
    else
    {
        session_destroy();
        header("Location: ../index.php"); 
        echo("<script>alert('Password i username se ne podudaraju.')</script>");
    }


function usernameIsValid ($username) 
{
    if(preg_match('/^[a-zA-Z0-9]{1,}$/', $username)) { 
        return true;
}
    return false;
}

function passwordIsValid ($password)
{
    if(strlen($password) < 8) return false;
    return true;
}
?>
