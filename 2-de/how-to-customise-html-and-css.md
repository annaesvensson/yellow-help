---
Title: Wie man HTML und CSS anpasst
---
Erfahre wie man das Aussehen seiner Webseite anpasst.

## HTML anpassen

Du kannst das Aussehen deiner Webseite mit HTML anpassen. Alle HTML-Dateien befinden sich im `system/layouts`-Verzeichnis. Du kannst diese Dateien beliebig ändern und auch deine eigenen Dateien hinzufügen. Deine Änderungen werden bei der Aktualisierung der Webseite nicht überschrieben. Für anspruchsvolle Layouts gibt es eine [API für Entwickler](api-for-developers).

Das Standard-Layout wird in den [Systemeinstellungen](how-to-change-the-system#systemeinstellungen) in der Datei `system/extensions/yellow-system.ini` festgelegt. Ein anderes Layout lässt sich in den [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Layout: default`.

Hier ist eine Beispiel-Datei `system/layouts/default.html`:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um Seiteninhalt und das Änderungsdatum anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
<p>Zuletzt aktualisiert am <?php echo $this->yellow->page->getDateHtml("modified") ?></p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Hier ist ein Beispiel-Layout um Seiteninhalt und zusätzliche Blogseiten anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
<?php $pages = $this->yellow->content->index()->filter("layout", "blog")->sort("published", false)->limit(5) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<?php $this->yellow->page->setHeader("Cache-Control", "max-age=60") ?>
<table>
<?php foreach ($pages as $page): ?>
<tr>
<td><a href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("title") ?></a></td>
<td><?php echo $page->getHtml("author") ?></td>
<td><?php echo $page->getDateHtml("published") ?></td>
</tr>
<?php endforeach ?>
</table>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Beachte daß Themes ihre eigenen Layoutdateien haben können. Zum Beispiel wird die Datei `system/layouts/default.html` bei allen Themes verwendet, die Datei `system/layouts/stockholm-default.html` jedoch nur beim `Theme: stockholm`.

## CSS anpassen

Du kannst das Aussehen deiner Webseite mit CSS anpassen. Alle CSS-Dateien befinden sich im `system/themes`-Verzeichnis. Du kannst diese Dateien beliebig ändern und auch deine eigenen Dateien hinzufügen. Deine Änderungen werden bei der Aktualisierung der Webseite nicht überschrieben. Farben, Schriftarten und Blockelemente können mit CSS angepasst werden.

Das Standard-Theme wird in den [Systemeinstellungen](how-to-change-the-system#systemeinstellungen) in der Datei `system/extensions/yellow-system.ini` festgelegt. Ein anderes Theme lässt sich in den [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Theme: stockholm`.

Hier ist ein Beispiel-CSS für Farben und Schriftarten aus der Datei `system/themes/stockholm.css`:

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
    padding: 0.15em;
    background-color: #ffeeaa;
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

## Assets anpassen

Ein Theme kann HTML, CSS, JavaScript und weitere Dateien enthalten, die allgemein als Assets bezeichnet werden. Du kannst diese Dateien beliebig ändern oder löschen falls du sie nicht benötigst. Ein direkter Zugriff auf das `system`-Verzeichnis ist nicht erlaubt. Daher werden Assets über den virtuellen Standort `/assets/` verfügbar gemacht. Die Dateiformate CSS, GIF, ICO, JS, JPEG, JPG, JSON, MAP, PNG, SCSS, SVG, WEBMANIFEST, WOFF und WOFF2 werden unterstützt. Zum Beispiel wäre die CSS-Datei für das Stockholm-Theme die Datei `system/themes/stockholm.css`, vorhanden  auf deiner Webseite als `http://website/assets/stockholm.css`.

Eine JavaScript-Datei, deren Name dem der CSS-Datei ähnelt, wird automatisch in deine Webseite eingebunden. Zum Beispiel wäre die entsprechende JavaScript-Datei für das Stockholm-Theme die Datei `system/themes/stockholm.js`, vorhanden auf deiner Webseite als `http://website/assets/stockholm.js`.

Deine Webseite hat in der Regel ein kleines Icon, auch Favicon genannt, welches automatisch eingebunden wird. Dein Webbrowser zeigt dieses Icon in Lesezeichen und der Adressleiste an. Zum Beispiel wäre das Icon für das Stockholm-Theme die Datei `system/themes/stockholm.png`, vorhanden  auf deiner Webseite als `http://website/assets/stockholm.png`.

Hast du Fragen? [Hilfe finden](.).
