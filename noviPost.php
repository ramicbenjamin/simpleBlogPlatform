<?php
include 'includes/header.php';
?>
   
    <div class="red">
        <div class="naslov">Novi članak</div>
    </div>
<form action="/includes/objaviClanakDB.php" method="post" enctype="multipart/form-data">
        <div class="red">
            <input type="text" id="naslovPosta" placeholder="Naslov posta" name="naslovClanka" onfocusout="validirajNoviPost()" required> </div>
        <div class="hidden" id="greskaNaslovPostaPost">Morate unijeti barem naziv posta.</div>
        <div class="red"> <a>Odaberi fotografiju</a>
            <input type="file" id = 'pic' name="pic"> </div>
        <div class="red">
        <textarea placeholder="Sadržaj posta" name="sadrzajClanka"></textarea>
        </div>
        <div class="red">
            <input type="submit" value="Objavi"> 
            </div>
    </form>
    <?php
include 'includes/footer.php';
?>