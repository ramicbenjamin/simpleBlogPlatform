var idPokazanog;
var prikazanaFotka = "";
var prikazi = function (imeVar) {
    idPokazanog = imeVar;
    if (document.getElementById(idPokazanog+"_full").className == "shown" && prikazanaFotka != "") {
        document.getElementById(idPokazanog+"_full").className = "hidden";
        window.scrollTo(0, document.body.scrollHeight);
    }
    else if (document.getElementById(idPokazanog+"_full").className == "hidden" && prikazanaFotka == "") {
        document.getElementById(idPokazanog+"_full").className = "shown";
        document.body.scrollTop = document.documentElement.scrollTop = 0;
        prikazanaFotka = imeVar;
    }
}
var sakrij = function(id)
{
    document.getElementById(id).className = "hidden";
    prikazanaFotka = "";
}
var eskejp = function (event) {
    if (event.keyCode == 27) {
        if (document.getElementById(idPokazanog+"_full").className == "shown") {
            document.getElementById(idPokazanog+"_full").className = "hidden";
        }
    }
}
window.onkeydown = eskejp;