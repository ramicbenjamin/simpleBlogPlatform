/*Validacije*/
/*loginValidacija*/
function validirajLogIn() {
    var uname = document.getElementById("unameLogin").value;
    var pass = document.getElementById("passLogin").value;
    if (!usernameIsValid(uname) || uname.length == 0) {
        document.getElementById("greskaUname").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaUname").className = "hidden";
    }
    if (pass.length < 8 || pass.length == 0) {
        document.getElementById("greskaPass").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaPass").className = "hidden";
    }
}

function validirajUnameLogina() {
    var uname = document.getElementById("unameLogin").value;
    if (!usernameIsValid(uname) || uname.length == 0) {
        document.getElementById("greskaUname").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaUname").className = "hidden";
    }
    if(!daLiSuNaLogInuSviIspravni()) document.getElementById("loginButton").disabled = true;
    else document.getElementById("loginButton").disabled = false;
}

function validirajJedanPass(passCont) {
    var pass = document.getElementById(passCont).value;
    if (pass.length < 8 || pass.length == 0) {
        document.getElementById("greskaPass").className = "prikazGreske fontRoboto";        
    }
    else {
        document.getElementById("greskaPass").className = "hidden";
    }
    if(!daLiSuNaLogInuSviIspravni()) document.getElementById("loginButton").disabled = true;
    else document.getElementById("loginButton").disabled = false;
}

function daLiSuNaLogInuSviIspravni()
{
    if(document.getElementById("greskaUname").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaPass").className == "prikazGreske fontRoboto") return false;
    return true;
}

/*ValidacijaRegistracije*/
function validirajRegistraciju() {
    var ime = document.getElementById("imeReg").value;
    var prezime = document.getElementById("prezimeReg").value;
    var username = document.getElementById("unameReg").value;
    var pass1 = document.getElementById("passReg").value;
    var pass2 = document.getElementById("passPReg").value;
    var mail = document.getElementById("mailReg").value;
    var datRodj = document.getElementById("rodjendanReg").value;
    console.log(datRodj);
    if (!usernameIsValid(ime) || ime.length == 0) {
        document.getElementById("greskaImeReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaImeReg").className = "hidden";
    }
    if (!usernameIsValid(prezime) || prezime.length == 0) {
        document.getElementById("greskaPrezimeReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaPrezimeReg").className = "hidden";
    }
    if (!usernameIsValid(username) || username.length == 0) {
        document.getElementById("greskaUnameReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaUnameReg").className = "hidden";
    }
    if (!emailValidation(mail) || mail.length == 0) {
        document.getElementById("greskaMailReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaMailReg").className = "hidden";
    }
    if (pass1.length == 0 || pass1.length < 8) {
        document.getElementById("greskaPassReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaPassReg").className = "hidden";
    }
    if (pass1.length == 0 || pass1 != pass2) {
        document.getElementById("greskaPassPReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaPassPReg").className = "hidden";
    }
    if (datRodj.length == 0) {
        document.getElementById("greskaRodjReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaRodjReg").className = "hidden";
    }
}

function validirajImePrezime(validacija, greska) {
    var ime = document.getElementById(validacija).value;
    if (!usernameIsValid(ime) || ime.length == 0) {
        document.getElementById(greska).className = "prikazGreske fontRoboto";        
    }
    else {
        document.getElementById(greska).className = "hidden";        
    }
    if(!daLiSuSviIspravni()) document.getElementById("regButton").disabled = true;
     else document.getElementById("regButton").disabled = false;
}

function validirajPassove() {
    var pass1 = document.getElementById("passReg").value;
    var pass2 = document.getElementById("passPReg").value;
    if (pass1.length == 0 || pass1.length < 8) {
        document.getElementById("greskaPassReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaPassReg").className = "hidden";
    }
    if (pass1.length == 0 || pass1 != pass2) {
        document.getElementById("greskaPassPReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaPassPReg").className = "hidden";
        
    }
    if(!daLiSuSviIspravni()) document.getElementById("regButton").disabled = true;
     else document.getElementById("regButton").disabled = false;
}

function validirajDatum() {
    var datRodj = document.getElementById("rodjendanReg").value;
    var godina = datRodj.substring(0,4);
    if (datRodj.length == 0 || new Date().getFullYear() < godina) {
        document.getElementById("greskaRodjReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaRodjReg").className = "hidden";
    }
    if(!daLiSuSviIspravni()) document.getElementById("regButton").disabled = true;
     else document.getElementById("regButton").disabled = false;
}

function validirajMail(mail) {
    var isValidMail = document.getElementById(mail).value;
    if (!emailValidation(isValidMail) || isValidMail.length == 0) {
        document.getElementById("greskaMailReg").className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById("greskaMailReg").className = "hidden";;
    }
    if(!daLiSuSviIspravni()) document.getElementById("regButton").disabled = true;
     else document.getElementById("regButton").disabled = false;
}

/*pomocneFunkcijeValidacija*/
function usernameIsValid(username) {
    var re = /^\S*$/
    return re.test(username);
}

function emailValidation(mailForValid) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(mailForValid);
}

function daLiSuSviIspravni()
{
    if(document.getElementById("greskaImeReg").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaPrezimeReg").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaUnameReg").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaPassReg").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaPassPReg").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaRodjReg").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaMailReg").className == "prikazGreske fontRoboto") return false;
    return true;
}
/*validacijaPostavki*/

function validirajPostavke(validacija, greska) {
    var ime = document.getElementById(validacija).value;
    if (!usernameIsValid(ime) || ime.length == 0) {
        document.getElementById(greska).className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById(greska).className = "hidden";
    }
    if(!daLiSuSviNaPostavkamaValidni()) document.getElementById("spremiPostavkeButton").disabled = true;
    else document.getElementById("spremiPostavkeButton").disabled = false;
}

function mailPostavki(mail, greska) {
    var isValidMail = document.getElementById(mail).value;
    if (!emailValidation(isValidMail) || isValidMail.length == 0) {
        document.getElementById(greska).className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById(greska).className = "hidden";
    }
    if(!daLiSuSviNaPostavkamaValidni()) document.getElementById("spremiPostavkeButton").disabled = true;
    else document.getElementById("spremiPostavkeButton").disabled = false;
}

function datumValidacijaPostavke(datum, greska) {
    var datRodj = document.getElementById(datum).value;
    var godina = datRodj.substring(0,4);
    if (datRodj.length == 0 || new Date().getFullYear() < godina) {
        document.getElementById(greska).className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById(greska).className = "hidden";
    }
    if(!daLiSuSviNaPostavkamaValidni()) document.getElementById("spremiPostavkeButton").disabled = true;
    else document.getElementById("spremiPostavkeButton").disabled = false;
}

function daLiSuSviNaPostavkamaValidni()
{
    if(document.getElementById("greskaImePost").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaPrezimePost").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaMailPost").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaRodjPost").className == "prikazGreske fontRoboto") return false;
    if(document.getElementById("greskaUnamePost").className == "prikazGreske fontRoboto") return false;
    return true;
}
/*Validacija Novog Posta*/
function validirajNoviPost()
{
    var naslov = document.getElementById("naslovPosta").value;
    if (naslov <= 0) {
        document.getElementById("greskaNaslovPostaPost").className = "prikazGreske fontRoboto";
        document.getElementById("objaviPostButton").disabled = true;
    }
    else {
        document.getElementById("greskaNaslovPostaPost").className = "hidden";
        document.getElementById("objaviPostButton").disabled = false;
    }
}
/*Galerija*/
function showImage(passSource) {
    var slika = document.getElementById("image-holder");
    var holder = document.getElementById("ih");
    slika.src = passSource;
    console.log("dajem blok");
    document.getElementById("gallery-show").style.display = 'block';
    var sirina = holder.offsetWidth / 2 + 5;
    holder.style.marginLeft = "-" + sirina + "px";
}

function sakrijGaleriju() {
    document.getElementById("gallery-show").style.display = 'none';
}
var eskejp = function (event) {
    if (event.keyCode == 27) {
        sakrijGaleriju();
    }
}
window.onkeydown = eskejp;
/*dropDownMenu*/
function dropajMeni(idMenija) {
    document.getElementById(idMenija).classList.toggle("show");
}
// zatvara dropDown kada se klikne van njega
window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

/*AjaxLoadStranica*/
window.onload = loadStranica('views/pocetnaView.html');

function loadStranica(stranicaZaLoad) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("placeHolderSadrzajaStranice").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", stranicaZaLoad, true);
    xhttp.send();
}