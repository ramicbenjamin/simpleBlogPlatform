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
var brojNeispravnih = 0; //da znam kad skloniti zabranu sa buttona
function validirajImePrezime(validacija, greska) {
    var ime = document.getElementById(validacija).value;
    if (!usernameIsValid(ime) || ime.length == 0) {
        document.getElementById(greska).className = "prikazGreske fontRoboto";
        document.getElementById("regButton").disabled = true;
        if (document.getElementById(greska).className != "prikazGreske fontRoboto") {
            brojNeispravnih++;
        }
    }
    else {
        document.getElementById(greska).className = "hidden";
        if (document.getElementById(greska).className != "hidden") {
            brojNeispravnih--;
        }
        if (brojNeispravnih == 0) document.getElementById("regButton").disabled = false;
    }
}
/*ValidacijeLogina*/
function validirajUnameLogina() {
    var uname = document.getElementById("unameLogin").value;
    if (!usernameIsValid(uname) || uname.length == 0) {
        document.getElementById("greskaUname").className = "prikazGreske fontRoboto";
        document.getElementById("loginButton").disabled = true;
    }
    else {
        document.getElementById("greskaUname").className = "hidden";
        document.getElementById("loginButton").disabled = false;
    }
}

function validirajJedanPass(passCont) {
    var pass = document.getElementById(passCont).value;
    if (pass.length < 8 || pass.length == 0) {
        document.getElementById("greskaPass").className = "prikazGreske fontRoboto";
        document.getElementById("loginButton").disabled = true;
    }
    else {
        document.getElementById("greskaPass").className = "hidden";
        document.getElementById("loginButton").disabled = false;
    }
}

function validirajPassove() {
    var pass1 = document.getElementById("passReg").value;
    var pass2 = document.getElementById("passPReg").value;
    if (pass1.length == 0 || pass1.length < 8) {
        document.getElementById("greskaPassReg").className = "prikazGreske fontRoboto";
        document.getElementById("regButton").disabled = true;
        if (document.getElementById("greskaPassReg").className != "prikazGreske fontRoboto") {
            brojNeispravnih++;
        }
    }
    else {
        document.getElementById("greskaPassReg").className = "hidden";
        if (document.getElementById("greskaPassReg").className != "hidden") {
            brojNeispravnih--;
        }
        if (brojNeispravnih <= 0) document.getElementById("regButton").disabled = false;
    }
    if (pass1.length == 0 || pass1 != pass2) {
        document.getElementById("greskaPassPReg").className = "prikazGreske fontRoboto";
        document.getElementById("regButton").disabled = true;
        if (document.getElementById("greskaPassPReg").className != "prikazGreske fontRoboto") {
            brojNeispravnih++;
        }
    }
    else {
        document.getElementById("greskaPassPReg").className = "hidden";
        if (document.getElementById("greskaPassPReg").className != "hidden") {
            brojNeispravnih--;
        }
        if (brojNeispravnih <= 0) document.getElementById("regButton").disabled = false;
    }
}

function validirajDatum() {
    var datRodj = document.getElementById("rodjendanReg").value;
    if (datRodj.length == 0) {
        document.getElementById("greskaRodjReg").className = "prikazGreske fontRoboto";
        document.getElementById("regButton").disabled = true;
        if (document.getElementById("greskaRodjReg").className != "prikazGreske fontRoboto") {
            brojNeispravnih++;
        }
    }
    else {
        document.getElementById("greskaRodjReg").className = "hidden";
        if (document.getElementById("greskaRodjReg").className != "hidden") {
            brojNeispravnih--;
        }
        if (brojNeispravnih <= 0) document.getElementById("regButton").disabled = false;
    }
}

function validirajMail(mail) {
    var isValidMail = document.getElementById(mail).value;
    if (!emailValidation(isValidMail) || isValidMail.length == 0) {
        document.getElementById("greskaMailReg").className = "prikazGreske fontRoboto";
        document.getElementById("regButton").disabled = true;
        if (document.getElementById("greskaMailReg").className != "prikazGreske fontRoboto") {
            brojNeispravnih++;
        }
    }
    else {
        document.getElementById("greskaMailReg").className = "hidden";
        if (document.getElementById("greskaMailReg").className != "hidden") {
            brojNeispravnih--;
        }
        if (brojNeispravnih <= 0) document.getElementById("regButton").disabled = false;
    }
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
/*validacijaPostavki*/
function validirajPostavke(validacija, greska) {
    var ime = document.getElementById(validacija).value;
    if (!usernameIsValid(ime) || ime.length == 0) {
        document.getElementById(greska).className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById(greska).className = "hidden";
    }
}

function mailPostavki(mail, greska) {
    var isValidMail = document.getElementById(mail).value;
    if (!emailValidation(isValidMail) || isValidMail.length == 0) {
        document.getElementById(greska).className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById(greska).className = "hidden";
    }
}

function datumValidacijaPostavke(datum, greska) {
    var datRodj = document.getElementById(datum).value;
    if (datRodj.length == 0) {
        document.getElementById(greska).className = "prikazGreske fontRoboto";
    }
    else {
        document.getElementById(greska).className = "hidden";
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