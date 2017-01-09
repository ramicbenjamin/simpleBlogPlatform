<?php
include 'includes/header.php';
?> 
   <div class="red">
    <div class="naslov">Registracija</div>
</div>
<form class="formaLogIn" method="post" action="includes/registrujKorisnikaDB.php">
    <div class="containerRegistracija">
        <input type="text" id="imeReg" placeholder="Unesi ime" name="imeReg" onfocusout="validirajImePrezime('imeReg','greskaImeReg')" required>
        <div class="hidden" id="greskaImeReg">Morate unijeti ime.</div>
        <input type="text" id="prezimeReg" placeholder="Unesi prezime" name="prezimeReg" onfocusout="validirajImePrezime('prezimeReg','greskaPrezimeReg')" required>
        <div class="hidden" id="greskaPrezimeReg">Morate unijeti prezime.</div>
        <input type="text" id="unameReg" placeholder="Unesi korisnicko ime" name="korisnickoImeReg" onfocusout="validirajImePrezime('unameReg','greskaUnameReg')" required>
        <div class="hidden" id="greskaUnameReg">Morate unijeti korisničko ime, koje će sadržati samo slova bez razmaka.</div>
        <input type="password" id="passReg" placeholder="Unesi password" name="passwordReg" onfocusout="validirajPassove()" required>
        <div class="hidden" id="greskaPassReg">Morate unijeti password koji ima više od 8 karaktera.</div>
        <input type="password" id="passPReg" placeholder="Unesi ponovno password" name="passwordRegPonovo" onfocusout="validirajPassove()" required>
        <div class="hidden" id="greskaPassPReg">Passwordi se ne poklapaju.</div> <a>Unesi datum rođenja:  </a>
        <input type="date" id="rodjendanReg" name="rodjendanReg" onfocusout="validirajDatum()">
        <div class="hidden" id="greskaRodjReg">Datum nije unesen ili nije u ispravnoj formi.</div>
        <input type="email" id="mailReg" placeholder="Unesi mail" name="mailReg" onfocusout="validirajMail(this.id)" required>
        <div class="hidden" id="greskaMailReg">Mail nije u ispravnoj formi.</div> <a>Odaberi fotografiju</a>
        <input type="file" name="pic" accept="image/*">
        <br>
        <br>
        <br>
        <input type="submit">
    </div>
</form>
<?php
include 'includes/footer.php';
?>