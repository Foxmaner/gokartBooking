# Gokart bokningssystem

Ett bokningssystem för en gokartbana
* Förenklar kommunikation mellan depo och kassa
* Lättöverskådlig statistik på analyssidan

## Hårdvarukrav

Sidan är tänkt att användas av 2 datorer samtidigt.
* Kassan: En Laptop, eller Desktop med tillgång till mus och ett vanligt tangentbord
* Depo: En mindre dator, helst ett enhetskort likt Raspberry pi. Datorn kopplas till en skärm och tangentbord.
Tangentbordet behöver enbart ha vänster och högerpil.
* Internet: Båda datorerna behöver tillgång till snabbt och stabilt internet eftersom att hemsidan hämtar data från internet flera gånger per minut

## Användning

##### Kassasidan
* Byta race: "Höger piltangent", "Vänster piltangent"
* **("Nästa race", "Föregående race")**



* Lägg till kart: "W","S","X"
* Ta bort kart: "Q","A","Z"
* **("Stor", "Liten", "Dubbel")**

##### Deposidan
* Byta race: "Höger piltangent", "Vänster piltangent"
* **("Nästa race", "Föregående race")**

##### Analyssidan
* Byta race: "Höger piltangent", "Vänster piltangent"
* **("Nästa race", "Föregående race")**

## Framtida arbete
* Snyggare style (CSS)
* Bättre responsivitet. Desktop, tablet, mobil.
* Lägga till "Glömt lösenord" system
* Implementera pickadate
* Ta bort onödig kod
* Göra koden kompatibel för att hostas

## Biblotek
Sidan använder sig av ett flertal "open source projects" för att fungera:
* **Apexcharts** | För alla grafer | [Hemsida](https://apexcharts.com/), [Github](https://apexcharts.com/)
* **AlertifyJS** | För dialoger och notifikationer | [Hemsida](https://alertifyjs.com/), [Github](https://github.com/MohammadYounes/AlertifyJS)
* **JQuery** | Javascript biblotek | [Hemsida](https://jquery.com/), [Github](https://github.com/jquery/jquery)
* **pickadate.js** | För date inputs (Ej inplementerad) | [Hemsida](https://amsul.ca/pickadate.js/), [Github](https://github.com/amsul/pickadate.js)
