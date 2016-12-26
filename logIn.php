<?php
include 'includes/header.php';
?> 
   <div class="red">
    <div class="naslov">Prijavi se</div>
</div>
<form class="formaLogIn" action="includes/validirajLogIn.php" method="post">
    <div class="containerLogIn">
        <input type="text" id="unameLogin" placeholder="Unesi korisnicko ime" name="uname" onfocusout="validirajUnameLogina('unameLogin', 'greskaUname')" required>
        <div class="hidden" id="greskaUname">Username mora sadrzavati iskljucivo slova i brojeve, bez razmaka.</div>
        <input type="password" id="passLogin" placeholder="Unesi password" name="psw" onfocusout="validirajJedanPass(this.id)" required>
        <div class="hidden" id="greskaPass">Password mora biti dulji od osam karaktera.</div>
     <input type="submit" value="LogIn">
    </div>
    <div class="red"> <a href = "registracija.php">Nemam akaunt</a> </div>
</form>
<?php
include 'includes/footer.php';
?>