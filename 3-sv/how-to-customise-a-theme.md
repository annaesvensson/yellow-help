---
Title: Hur man anpassar ett tema
---
Så här anpassar du utseendet på din webbplats.

## Anpassa CSS

För att anpassa [CSS](https://www.w3schools.com/css/) på din webbplats ändrar man temat. Låt oss se hur teman fungerar. Standardtemat definieras i [systeminställningarna](how-to-change-the-system#systeminställningar). Ett annat tema kan definieras i [sidinställningarna](how-to-change-the-system#sidinställningar) högst upp på varje sida, till exempel `Theme: custom`. 

Här är en exempelfil `system/themes/custom.css`:

``` css
.page {
    background-color: #fc4;
    color: #fff;
    text-align: center; 
}
```

## Anpassa JavaScript

För att anpassa din webbplats ännu mer kan du använda [JavaScript](https://www.w3schools.com/js/). Detta gör att du kan skapa dynamiska funktioner för webbplatser. Du kan spara JavaScript i en fil som har ett liknande namn som CSS-filen. Då ingår det automatiskt. 

Här är en exempelfil `system/themes/custom.js`:

``` javascript
var ready = function() {
	console.log("Hello world");
	// Add more JavaScript code here
}
window.addEventListener("DOMContentLoaded", ready, false);
```

## Anpassa bilder och filer

Mappen `system/themes` innehåller alla temafiler. Du kan lagra dina bilder och teckensnittsfiler här, som används i teman. Varje webbplats har en liten ikon, ibland kallad en favicon. Webbläsaren visar denna ikon till exempel i adressfältet. 

Har du några frågor? [Få hjälp](.).
