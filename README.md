# EKKE_Labor_Projekt
Rendszerszervezés, programozás- és a rendszerfejlesztés alkalmazása.

Wiki: [Visual Studio Code GIT Repo és Telepítés](https://github.com/LakatosMate/EKE_Labor_Projekt/wiki/Projekt-Instal%C3%A1l%C3%A1sa)

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
Modulonkénti manuális teszt, folyamatosan.

## Rendszerátadás és üzemeltetés, karbantartás
Az elkészült rendszer átadás-átvétele után megkezdődik a honlap publikálása az internetre, valamint folyamatos üzemeltetése. A tartalom karbantartásában részt vevő személy(ek)nek, a szükséges ismeretek megszerzéséhez oktatást tartunk illetve dokumentációt biztosítunk.

