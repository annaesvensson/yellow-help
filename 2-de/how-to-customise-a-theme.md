---
Title: Wie man ein Theme anpasst
---
Wie man ein Aussehen seiner Webseite anpasst.

## CSS anpassen

Um das [CSS](https://www.w3schools.com/css/) deiner Webseite anzupassen, ändere das Theme. Das Standardtheme wird in den [Systemeinstellungen](how-to-change-the-system#systemeinstellungen) festgelegt. Ein anderes Theme lässt sich in den [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Theme: custom`. 

Hier ist eine Beispiel-Datei `system/themes/custom.css`:

``` css
.page {
    background-color: #fc4;
    color: #fff;
    text-align: center; 
}
```

## JavaScript anpassen

Um deine Webseiten noch weiter anzupassen, kannst du [JavaScript](https://www.w3schools.com/js/) benutzen. Damit kannst du dynamische Funktionen für Webseiten erstellen. Du kannst JavaScript in eine Datei speichern die einen ähnlichen Namen hat wie die CSS-Datei. Sie wird dann automatisch eingebunden.

Hier ist eine Beispiel-Datei `system/themes/custom.js`:

``` javascript
var ready = function() {
	console.log("Hello world");
	// Add more JavaScript code here
}
window.addEventListener("DOMContentLoaded", ready, false);
```

## Bilder und Dateien anpassen

Im `system/themes`-Verzeichnis befinden sich alle Themedateien. Hier speichert man Bilder und Schriftarten, die in Themes verwendet werden. Jede Webseite hat ein kleines Icon, auch Favicon genannt. Der Webbrowser zeigt dieses Icon beispielsweise in der Adresszeile an.

Hast du Fragen? [Hilfe finden](.).
