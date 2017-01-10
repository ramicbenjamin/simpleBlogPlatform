# simpleBlogPlatform
##Benjamin Ramić
##Broj indexa - 17119

Projekat na predmetu Web Tehnologije, Elektrotehnički fakultet Sarajevo

##Kratak opis teme

Jednostavna blog platforma za razmjenu tekstova, fotografija, linkova između korisnika bloga.

# Zadaća_1 last commit.

Urađeno je:

- Napravljene skice (Photoshop) za sve podstranice na stranici, oboje, i za standardne veličine ekrana kao i za mobilne uređaje.
- Sve napravljene stranice su responzivne i imaju grid-view.
- Pomoću media query-a je regulisan izgled za mobilne uređaje, meni se skalira za manje uređaje kako se veličina ekrana smanjuje, na početnoj stranici se izbacuju manje bitni članci i ostaju samo bitni. Sve ostale podstranice i komponente se skaliraju po procentima na manje ekrane.
- Implementirane su sljedeće HTML forme:
    - LogIn (Dolazi se do njega klikom na LOGIN u meniju na početnoj stranici)
    - noviPost (Dolazi se do njega klikom na NOVIPOST u meniju na početnoj stranici)
    - postavke (Dolazi se do njih klikom na POSTAVKE u meniju na početnoj stranici)
    - registracija (Dolazi se do nje klikom na NEMAM AKAUNT na LOGIN stranici u podnožju)
- Meni webstranice je implementiran i nalazi se na svim podstranicama, (osim na podstranicama LogIn i Registracija, jer nema smisla da se korisniku nudi meni sve dok nije registrovan).
- Izgled stranice je konzistentan, nema glitcheva, elementi na stranici su poravnati.


U testiranju nije primjećen nijedan bug.

Lista fajlova:
- css folder -> stil.css (Svi stilovi za web stranicu)
- img folder (prazan, u njega treba da se dodaju slike koje stranica bude koristila)
- simpleBlogPlatformPSDS (Nalaze se sve skice za stranicu, kao i PSD fajlovi istih)
- clanakKompletan.html (Prikazuje cijeli članak nakon što se otvori sa početne stranice)
- index.html (Početna stranica na kojoj su izlistani svi članci)
- logIn.html (Stranica za login)
- notifikacije.html (Prikazuje notifikacije logovanom korisniku)
- noviPost.html (Otvara polja za unos novog posta, što podrazumijeva, naslov, tekst i sliku)
- postavke.html (Nudi mogućnost za izmjenom ličnih podataka korisnika)
- profil.html (Prikazuje profil logovanog korisnika)
- registracija.html (Nudi mogućnost za unos podataka za registraciju korisnika)
 
# Zadaća_2 last commit.

Urađeno je:
- Sva polja formi imaju validaciju koja je implementirana pomoću JavaScript-a (ispunjeni svi zahtjevi traženi u zadaći)
- Koristeći JavaScript implementirane sljedeće dvije funckionalnosti
    - Dropdown meni, koji se otvara kada se klikne na upitnik u izborniku
    - Galerija slika sa opcijom da se na klik slika raširi preko cijelog ekrana, a na escape da se vrati pogled nazad na galeriju. Galerija se može pronaći kada se klikne sa početne stranice na "Naslov" bilo kojeg posta, gdje se otvori podstranica na kojoj se nalazi kompletan članak, a ispod njega galerija koja ispunjava sve zadane zahtjeve.
- Koristeći Ajax napravljeno da se podstranice učitavaju bez reload-a cijele stranice, već da se samo sadržaj podstranice mijenja. 
    - Da bi se ova funkcionalnost mogla ispravno pogledati, potrebno je pokrenuti local server (preko WAMP ili XAMP) 

U testiranju nije primjećen nijedan bug.

Lista fajlova:

- css folder -> stil.css (Svi stilovi za web stranicu)
- img folder (nalaze se slike poztrebne za stranicu)
- simpleBlogPlatformPSDS (Nalaze se sve skice za stranicu, kao i PSD fajlovi istih)
- clanakKompletan.html (Prikazuje cijeli članak nakon što se otvori sa početne stranice)
- views folder
    - logInView.html (Stranica za login)
    - notifikacijeView.html (Prikazuje notifikacije logovanom korisniku)
    - noviPostView.html (Otvara polja za unos novog posta, što podrazumijeva, naslov, tekst i sliku)
    - postavkeView.html (Nudi mogućnost za izmjenom ličnih podataka korisnika)
    - profilView.html (Prikazuje profil logovanog korisnika)
    - registracijaView.html (Nudi mogućnost za unos podataka za registraciju korisnika)
    - clanakKompletanView.html (prikazije kompletan članak sa galerijom slika)
    - pocetnaView.html (stranica na kojoj su izlistani svi članci)
- js folder -> skripta.js (skripta u kojoj su opisane sve JS funkcionalnosti ove web stranice)
- index.html (Početna stranica, u koju se loadaj svi view-si)

# Zadaća_3 last commit.

Urađeno je:
- Serijalizacija svih podataka u XML (upisivanje u XML)
- Izmjena podataka u XML 
- Brisanje podataka iz XML
- Prikazivanje podataka iz XML
- Svi podaci su validirani i kroz PHP, ne samo kroz JS
- XSS je spriječen na svim poljima
- Admin korisnik može da radi sve manipulacije nad podacima (Username: admin; Password: 12345678) Login ide preko upitnik buttona
- Admin može downloadati sve podatke iz XML-a u CSV formatu, na dnu početne stranice ispod svih članaka stoji link na download
- Admin može downloadati PDF svakog pojedinačnog članka, to se nalazi kada Admin otvori članak, pa ispod teksta i slike članka, zajedno sa menijem za izmjenu i brisanje članka
- Pretraživanje iz XML-a u dva polja ide kroz pretraživanje naslov polja i imeAutora polja, prikazuju se suggestions, a može se dobiti i kompletan spisak pretraživanih fajlova kada se pritisne na dugme pretraga
- Deployano je na OpenShift (http://phpwt-simpleblogplatform.44fs.preview.openshiftapps.com/)
U testiranju nije primjećen nijedan bug.

Lista fajlova:

- css folder -> stil.css (Svi stilovi za web stranicu)
- CSVs -> folder u kojem se kreira CSV fajl za download
- font -> fontovi za fpdf biblioteku
- includes -> svi .php fajlovi koji rade sve gore navedene funkcionalnosti, a koji se includeaju u ostale .php fajlove
- uploads -> slike koje se uploadaju sa člankom
- XMLs -> folder sa XMLovima, za članke i za korisničke podatke
- img folder (nalaze se slike poztrebne za stranicu)
- simpleBlogPlatformPSDS (Nalaze se sve skice za stranicu, kao i PSD fajlovi istih)
- js folder -> skripta.js (skripta u kojoj su opisane sve JS funkcionalnosti ove web stranice)
- Svi ostali .php fajlovi su fajlovi koji se pokreću na stranici i nema potrebe da se objašnjavaju pojedinačno, jer su prilično intuitivni


# Zadaća_3 last commit.
Urađeno je:
- Napravljena je MySQL baza podataka sa tri povezane tabele. Baza podataka se zove simpleblogplatformdb. Tabele unutar baze su: clanak, komentar, korisnik. ERD i backup baze se nalaze unutar projekta.
- Dodata je registracija novih korisnika, tako da je sada moguće napraviti registraciju, sa jedinstvenim username-om.
- Dodata mogućnost komentarisanja svakog posta, od strane svakoga. (Nema nikakve provjere ko je i kad komentarisao koji post, i svi mogu da komentiraju, uključujući i neregistrovane korisnike. Znam da je ovo loš pristup, al' je ovo samo proof of concept).
- Napravljena skripta koja iz XML-a prebaci u bezu sve podatke koji se već ne nalaze u bazi. Link za to je omogućen samo administratorima (logovanim korisnicima), i nalazi se u meniju na klik XMLtoDB.
- Svi podaci se sada čuvaju, i kupe iz baze podataka umjesto iz XML-a sa prošle zadaće.
- Stranica i baza podataka su deplpyane na openshift na ovaj link: http://phpwt-simpleblogplatform.44fs.preview.openshiftapps.com/index.php
- Napravljena jedna REST metoda web servisa koja vraća sve komentare na članak sa zadatim ID-om formatirana u JSON objekat. Da bi se testirao web servis možete pristupiti linku: http://phpwt-simpleblogplatform.44fs.preview.openshiftapps.com/includes/webServis.php?id=86; 
ID se može mijenjati, on predstavlja ID članka koji je objavljen.
- Web servis je testiran pomoću POSTMAN-a i screenshotovi su priloženi u folderu POSTMANScreenshoots
U testiranju nije primjećen nijedan bug.

Lista fajlova:

Svi fajlovi su kao i u prošloj zadaći, i sadrže iste stvari kao i u prethodnoj zadaći, osim što su kreirane gore navedene skripte koje rade sa bazom podataka i one se nalaze u includes folderu. Sve skripte koje rade sa bazom podataka imaju na kraju imena DB, tako da su lahko prepoznatljive. Ostale su i skripte koje rade sa XML-ovima, ali one se trenutno na stranici ne koriste ni za šta.

Od novih fajlova tu su:

-  databaseBackup&ERD (Backup baze i njen dijagram)
-  pma (phpmyadmin za deploy na openshift)
-  POSTMANScreenshots (Screenshotovi POSTMAN analize web servisa)
