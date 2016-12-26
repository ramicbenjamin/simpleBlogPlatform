<?php
include 'includes/header.php';
?>
    <div class="red">
        <div class="naslov">Pretraga</div>
    </div>
    <div class="red">
        <input id = "tekstPretrage" class="tekstPretrage" size="5" onkeyup="prikaziSugestije(this.value)">
        <input type="button" class="dugmeVeliko sakrij dugme" value="Pretraga" onclick="prikaziSvePretrage();">
        <input type="button" class="dugmeMalo prikazi dugme" value="Pretraga" onclick="prikaziSvePretrage();">
        <div id="livesearch"></div>
          <div class="naslovClanak">
            Rezultati pretrage:
        </div>
        <div id="prikazRezultata"></div>
    </div>
        <?php
include 'includes/footer.php';
?>