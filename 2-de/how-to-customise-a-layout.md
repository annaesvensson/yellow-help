---
Title: Wie man ein Layout anpasst
---
Erfahre wie man das Aussehen seiner Webseite anpasst.

## HTML anpassen

Du kannst das Aussehen deiner Webseite mit HTML und CSS anpassen. Alle HTML-Dateien befinden sich im `system/layouts`-Verzeichnis. Alle CSS-Dateien befinden sich im `system/themes`-Verzeichnis. Du kannst diese Dateien beliebig ändern und auch deine eigenen Dateien hinzufügen. Deine Änderungen werden bei der Aktualisierung der Webseite nicht überschrieben. Für anspruchsvolle Layouts gibt es eine [API für Entwickler](api-for-developers).

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

## Einstellungen anpassen

Das Standard-Layout wird in den [Systemeinstellungen](how-to-change-the-system#systemeinstellungen) in der Datei `system/extensions/yellow-system.ini` festgelegt. Ein anderes Layout lässt sich in den [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Layout: default`.

Hast du Fragen? [Hilfe finden](.).
