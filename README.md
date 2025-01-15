# EKKE_Labor_Projekt
Rendszerszervezés, programozás- és a rendszerfejlesztés alkalmazása.

Wiki:

[Visual Studio Code GIT Repo és Telepítés](https://github.com/LakatosMate/EKE_Labor_Projekt/wiki/Projekt-Instal%C3%A1l%C3%A1sa)

# Projekt labor - Hírportál
Egyszerű hírportál.

## Igény
Olyan hírportál, digitális faliújság elkészítése ahol gyorsan lehet egy új hírt publikálni. 

## Célok, követelmények
A hírportál, digitális faliújság legyen reszponzív a mai igényeknek megfelelően. A rendszerben legyen lehetőség a felhasználói regisztrációra, illetve a már így regisztrált felhasználóknak bővített megjelenést, funkcionalitást kell biztosítani a webportálon. A rendszerben különböző felhasználói jogköröket kell elhelyezni így biztosítva a felhasználók dinamikus kezelését. A felhasználók jogkörének adminisztrációját karbantartását csak az adminisztrátor jogkörrel rendelkező felhasználó végezheti el. 
Az oldalon lévő bejegyzések szerkeszthetőek legyenek a megfelelő jogkörrel. Biztosítani kell, hogy a bejegyzés megjelenését lehessen időzíteni egy megadott időpontra, illetve, hogy az adott cikk elérhető, megjeleníthető e.

## Rendszerjavaslat
Keretrendszer: PHP (Laravel)
Megjelenés: HTML, CSS (Boostrap)
Adatbázis: SQLite

## Rendszerspecifikáció
A bejegyzések a főoldalon egymás alatt időrendi sorrendben jelennek meg. Legfrissebb bejegyzések lesznek legfelül. Az oldalon elérhető lesz a lapozás funkció biztosítva azt, hogy a felhasználó hány bejegyzést szeretne egyszerre látni (10, 20, 50). A bejegyzéseknél meg kell jeleníteni a szerzőt, dátumot is.

A rendszer használói a következő jogkörrel rendelkezhetnek:

- Anonymous – az oldalt megnyitó felhasználó 
- Regisztrált felhasználó - hozzáfér, láthat olyan bejegyzéseket, amit az anonymous felhasználó nem. 
- Szerkesztő felhasználó – Új bejegyzéseket tud létrehozni, illetve szerkeszteni a saját bejegyzéseit.
- Adminisztrátor felhasználó – Felhasználókat, illetve a bejegyzéseket is karbantartó jogkör.

Bejegyzés létrehozása csak szerkesztő, illetve adminisztrátori jogkörrel hozható létre. A bejegyzések felépítése:

- Cím
- Rövid leírás
-	Tartalom
-	Dátum
-	Szerző

A bejegyzéshez tartozik egy kapcsoló, amivel szabályozni lehet, hogy a bejegyzés megjelenjen e vagy nem az oldalon ezzel biztosítva a szerkesztő felé a piszkozat funkciót. 
•	Megjelenik az oldalon (publikus vagy piszkozat)

## Tervezés
-	Weboldal képernyőterveinek az elkészítése, UX/UI
-	Adatbázis tervezése, illetve adatmodellek felépítése, UDM

## Implementáció
-	Alap keretrendszer felépítése
-	Regisztráció
-	Szerepkörök szerinti működés beépítése
-	Karbantartó felület a felhasználókhoz
-	Hírfelület kialakítása (Publikus, nem publikus megjelenítés)
-	Karbantartó felület kialakítása a bejegyzésekhez

## Teszt
Eseti manuális teszt, folyamatosan. Hiba esetnén rögzíteni a hibaanalízis táblában.
| Eset | Teszt leírása | Elvárás | Státusz | Tesztelő |
| --- | --- | --- | --- | --- |
| Regisztráció | Regisztráció a honlapról | Felhasználó regisztrálása az adatbázisba. Minden kötelező adat ellenőrzése a regisztrációs ürlapon. Sikeres vagy sikertelen regisztráció után a felhasználó kapjon értesítést. |  | |
| Bejelentkezés | Bejelentkezés a honlapról | A regisztrált felhasználó autentikálása és beléptetése a honlapra. Sikeres autentikálás után átírányítás az inrányítópult-ra. (Dashboard) | | |
| Authorizáció | Kijelentkezés | Kijelentkezés menü csak a bejelentkezett felhasználóknak érhető el. | OK | SF |
| Authorizáció | Profilom | Profilom menü csak a bejelentkezett felhasználóknak érhető el. | OK | SF |
| Authorizáció | Profilom | Oldal csak a bejelentkezett felhasználó érheti el. | OK | SF |
| Profilom | Profilkép szerkesztése | Kép, avatar feltőltése a felhasználó profiljához. Felhasználó kiválaszt egy képet és azt feltölti a rendszerben, ha sikeres a profil alatt látható a képe és kap értesítést. | OK | SF |
| Profilom | Jelszó megváltoztatása | A felhasználó meg tudja változtatni a jelszavát. Régi jelszó illetve az új jelszó megadásával. Amennyiben sikeres a jelszó megváltoztatás azt jelezzük a felhasználónak. | OK| SF |
| Admin | Felhasználó kezelés | Az admin kilistázva látja a felhasználókat és tudja módosítani a felhasználók nevét, emailjét, szerepkörét illetve tudja törölni is a felhasználókat. | OK | MM |
| Profilom | Profilkép törlése | felhasználó álltal beállított kép törlése | OK | SF |
| Profilom | Teljes név beállítás | A felhasználó a profiljában megadhatja a teljes nevét| OK | MM |
| Bejegyzés | Kép megjelenítés | Bejegyzések képei látszódjanak a push után| NOK| FÁ |
| Bejegyzés | Publikát | Publikát státusz megjelenítése bejegyzés oldalon| NOK| FÁ |
| Vizualitás | egységes kinézet | Egyforma kinézet lista, címsor méret | NOK| FÁ |

## Rendszerátadás és üzemeltetés, karbantartás
Az elkészült rendszer átadás-átvétele után megkezdődik a honlap publikálása az internetre, valamint folyamatos üzemeltetése. A tartalom karbantartásában részt vevő személy(ek)nek, a szükséges ismeretek megszerzéséhez oktatást tartunk illetve dokumentációt biztosítunk.

# Egyéb

## Review-k
- Code Review (alkalmanként)
- Sprint Review (péntekenként Discord csatorna, feladatok átbeszélése, eseti igények átbeszélése)

## Hibaanalizis
Esetleges hibák feltárása és ezeknek a jelzése. (Feladat rögzítése a Backlogban felelős megállapítása)
| - | Eset | Hiba leírása | Felelős | Státusz |
| --- | --- | --- | --- | --- |
| 1 | Bejegyzés | Bejegyzés képei rossz mappába kerületek így gitnore lett |  FÁ | Done  |
| 2 | Bejegyzés | Csak a publikált bejegyzéseket engedte hozzáadni (backend részhez) |  FÁ | Done  |
| 3 | Vizualitás | Különböző méretű címsor, eltérés az elemek számának megjelenítésénél |  FÁ | in progress  |
