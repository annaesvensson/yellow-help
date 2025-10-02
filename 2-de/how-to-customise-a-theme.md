---
Title: Wie man ein Theme anpasst
---
Wie man das Aussehen seiner Webseite anpasst.

## CSS anpassen

Du kannst das Aussehen deiner Webseite mit HTML und CSS anpassen. Alle HTML-Dateien befinden sich im `system/layouts`-Verzeichnis. Alle CSS-Dateien befinden sich im `system/themes`-Verzeichnis. Du kannst diese Dateien beliebig ändern und auch deine eigenen Dateien hinzufügen. Deine Änderungen werden bei der Aktualisierung der Webseite nicht überschrieben. Farben, Schriftarten, Blockelemente und andere CSS-Klassen werden in einem Theme definiert.

Hier ist der Abschnitt für Farben und Schriftarten aus der Datei `system/themes/stockholm.css`:

``` css
:root {
    --bg: #fff;
    --code-bg: #f7f7f7;
    --important-bg: #f0f8fe;
    --heading: #111;
    --text: #333;
    --code: #666;
    --link: #07d;
    --link-active: #29f;
    --blockquote-accent: #29f;
    --important-accent: #08e;
    --separator: #ddd;
    --border: #bbb;
    --font: "Open Sans", Helvetica, sans-serif;
    --monospace-font: Consolas, Menlo, Courier, monospace;
}
```

Hier ist ein Beispiel-CSS für ein eigenes Blockelement mit gelber Farbe:

``` css
.content .example {
    margin: 1em 0;
    padding: 0.5em 1em;
    background-color: #fffbf0;
    color: #333;
}
```

Hier ist ein Beispiel-CSS für ein eigenes Blockelement mit größerer Schriftart:

``` css
.content .superduper {
    margin: 2em 0;
    font-size: 1.3em;
}
```

Hier ist ein Beispiel-CSS für ein eigenes Layout mit zentriertem Text:

``` css
.layout-center .content {
    text-align: center;
}
.layout-center .content p {
    font-size: 1.1em;
    max-width: 48em;
    margin: 2em auto;
}
```

## Bilder anpassen

Ein Theme kann zusätzliche Bilder enthalten, die im Stylesheet verwendet werden. Du kannst diese Bilder beliebig ändern und auch deine eigene Bilder hinzufügen. Jede Webseite hat ein kleines Icon, auch Favicon genannt. Der Webbrowser zeigt dieses Icon in Lesezeichen und der Adressleiste an. Zum Beispiel ist das Icon für das Stockholm-Theme die Datei `system/themes/stockholm.png`.

## JavaScript anpassen

Ein Theme kann JavaScript für dynamische Funktionen enthalten, die mit CSS allein nicht möglich sind. Du kannst JavaScript in eine Datei speichern die einen ähnlichen Namen hat wie die CSS-Datei. Sie wird dann automatisch in die Webseite eingebunden. Zum Beispiel wäre die entsprechende Datei für das Stockholm-Theme die Datei `system/themes/stockholm.js`.

## Einstellungen anpassen

Das Standard-Theme wird in den [Systemeinstellungen](how-to-change-the-system#systemeinstellungen) in der Datei `system/extensions/yellow-system.ini` festgelegt. Ein anderes Theme lässt sich in den [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Theme: stockholm`.

Hast du Fragen? [Hilfe finden](.).
