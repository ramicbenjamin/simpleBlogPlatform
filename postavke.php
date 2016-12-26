<?php
include 'includes/header.php';
?> 
   <div class="red">
    <div class="naslov">Postavke</div>
</div>
<div class="red">
    <div class="placeHolderProfilFotke">Profilna fotka treba</div>
</div>
<div class="red">
    <div class="okvirInfomacije">
        <div class="kolona dva opis marginTop4"> Odaberi novu fotografiju </div>
        <div class="kolona dva atributi">
            <input type="file" name="pic" accept="image/*"> </div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis marginTop4">Ime:</div>
        <div class="kolona dva atributi">
            <input id = "imeProm" type="text" placeholder="Unesi novo ime" name="imeProm" onfocusout="validirajPostavke('imeProm','greskaImePost')"> 
            <div class="hidden" id="greskaImePost">Morate unijeti ime.</div></div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis marginTop4">Prezime:</div>
        <div class="kolona dva atributi">
            <input id = "prezimeProm" type="text" placeholder="Unesi novo prezime" name="prezimeProm" onfocusout="validirajPostavke('prezimeProm','greskaPrezimePost')">
            <div class="hidden" id="greskaPrezimePost">Morate unijeti prezime.</div> 
            </div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis marginTop4">eMail:</div>
        <div class="kolona dva atributi">
            <input id = "mailProm" type="email" placeholder="Unesi novi mail" name="mailProm" onfocusout = "mailPostavki('mailProm','greskaMailPost')">
            <div class="hidden" id="greskaMailPost">Morate unijeti mail ispravno, u ispravnoj formi.</div>  </div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis marginTop4">Datum rođenja:</div>
        <div class="kolona dva atributi">
            <input id = "rodjProm" type="date" name="rodjendanProm" onfocusout="datumValidacijaPostavke('rodjProm','greskaRodjPost')"> 
            <div class="hidden" id="greskaRodjPost">Morate unijeti datum rođenja koji je u ispravnoj formi.</div> </div>
    </div>
</div>
<div class="red">
    <div class="okvirInformacije">
        <div class="kolona dva opis marginTop4">Username:</div>
        <div class="kolona dva atributi">
            <input id = "unameProm" type="text" placeholder="Unesi novi username" name="usernameProm" onfocusout="validirajPostavke('unameProm','greskaUnamePost')"> 
            <div class="hidden" id="greskaUnamePost">Morate unijeti Username.</div> 
            </div>
    </div>
</div>
<div class="red"><button type="button" id="spremiPostavkeButton" onclick="" disabled>Spremi</button></div>
<?php
include 'includes/footer.php';
?>