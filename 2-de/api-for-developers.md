---
Title: API für Entwickler
---
Wir <3 Menschen die programmieren.

[toc]

## Verzeichnisstruktur

Du kannst deine Webseite im Texteditor bearbeiten. Das `content`-Verzeichnis enthält die [Inhaltsdateien](how-to-change-the-content) der Webseite. Hier bearbeitet man seine Webseite. Das `media`-Verzeichnis enthält die [Mediendateien](how-to-change-the-media) der Webseite. Hier speichert man seine Bilder und Dateien. Das `system`-Verzeichnis enthält die [Systemdateien](how-to-change-the-system) der Webseite. Hier findet man Konfigurationsdateien.

``` box-drawing {aria-hidden=true}
├── content               = Inhaltsdateien
│   ├── 1-home            = Startseite
│   ├── 9-about           = Informationsseite
│   └── shared            = geteilte Dateien
├── media                 = Mediendateien
│   ├── downloads         = Dateien zum Herunterladen
│   ├── images            = Bilder für den Inhalt
│   └── thumbnails        = Miniaturbilder für den Inhalt
└── system                = Systemdateien
    ├── extensions        = konfigurierbare Erweiterungsdateien, beispielsweise INI
    ├── layouts           = konfigurierbare Layoutdateien, beispielsweise HTML
    ├── themes            = konfigurierbare Themedateien, beispielsweise CSS
    └── workers           = Dateien für Entwickler, Designer und Übersetzer
```

Die folgenden Dateien sind wichtig, schaue sie dir am besten genauer an:

`system/extensions/yellow-system.ini` = [Datei mit Systemeinstellungen](how-to-change-the-system#systemeinstellungen)  
`system/extensions/yellow-language.ini` = [Datei mit Spracheinstellungen](how-to-change-the-system#spracheinstellungen)  
`system/extensions/yellow-user.ini` = [Datei mit Benutzereinstellungen](how-to-change-the-system#benutzereinstellungen)  
`system/extensions/yellow-website.log` = [Logdatei der Webseite](how-to-change-the-system#logdatei)  

## Werkzeuge

### Kleiner Webeditor

Du kannst deine Webseite im Webbrowser bearbeiten. Die Anmeldeseite ist auf deiner Webseite vorhanden als `http://website/edit/`. Melde dich mit deinem Benutzerkonto an. Du kannst die normale Navigation benutzen, Änderungen machen und das Ergebnis sofort sehen. Der kleine Webeditor gibt dir die Möglichkeit Inhaltsdateien zu bearbeiten und Mediendateien hochzuladen. Es ist eine großartige Art Webseiten zu aktualisieren. Textformatierung mit Markdown wird unterstützt. HTML wird auch unterstützt. [Weitere Informationen zum kleinen Webeditor](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md).

### Eingebauter Webserver

Du kannst einen Webserver in der Befehlszeile starten. Der eingebaute Webserver ist praktisch für Entwickler, Designer und Übersetzer. Das gibt dir die Möglichkeit deine Webseite auf deinem Computer zu ändern und sie später auf den deinen Webserver hochzuladen. Öffne ein Terminalfenster. Gehe ins Installations-Verzeichnis, dort wo sich die Datei `yellow.php` befindet. Gib ein `php yellow.php serve`, du kannst wahlweise eine URL angeben. Öffne einen Webbrowser und gehe zur angezeigten URL. [Weitere Informationen zum eingebauten Webserver](https://github.com/annaesvensson/yellow-serve/tree/main/README-de.md).

### Statischer Generator

Du kannst eine statische Webseite in der Befehlszeile generieren. Der statische Generator macht die gesamte Webseite im Voraus, anstatt darauf zu warten dass eine Datei angefordert wird. Öffne ein Terminalfenster. Gehe ins Installations-Verzeichnis, dort wo sich die Datei `yellow.php` befindet. Gib ein `php yellow.php generate`, du kannst wahlweise ein Verzeichnis und einen Ort angeben. Das generiert eine statische Webseite im `public`-Verzeichnis. Lade die statische Webseite auf deinen Webserver hoch und generiere bei Bedarf eine neue. [Weitere Informationen zum statischen Generator](https://github.com/annaesvensson/yellow-generate/tree/main/README-de.md).

### Layout-System

Du kannst das Aussehen deiner Webseite mit HTML und CSS anpassen. Glücklicherweise musst du kein weiteres Web-Framework lernen, sondern kannst normales PHP verwenden. Das gibt dir die Möglichkeit auf die API zuzugreifen, Kontrollstrukturen zu erstellen und das meiste wird dir wahrscheinlich ziemlich vertraut vorkommen. Wir verwenden überall die gleiche API, von Layoutdateien bis zu Erweiterungen. Es ist ziemlich mächtig und lohnt sich früher oder später einen genaueren Blick auf das Layout-System zu werfen. [Weitere Informationen zu Layouts](how-to-customise-a-layout) und [Themes](how-to-customise-a-theme).

## Objekte

Mit Hilfe der API hast du Zugriff auf das Dateisystem, Einstellungen und Erweiterungen. Die API ist in mehrere Objekte aufgeteilt und spiegelt das Dateisystem wieder. Es gibt `$this->yellow->content` um auf Inhaltsdateien zuzugreifen, `$this->yellow->media` um auf Mediendateien zuzugreifen und `$this->yellow->system` um auf Systemeinstellungen zuzugreifen.


``` box-drawing {aria-hidden=true}
┌────────────────────┐     ┌───────────────────────┐
│ Webbrowser         │     │ Befehlszeile          │
└────────────────────┘     └───────────────────────┘
         │                            │
         ▼                            ▼
┌────────────────────────────────────────────────────────────────────────────┐
│ API                                                                        │
│                                                                            │
│ $this->yellow            $this->yellow->system    $this->yellow->extension │
│ $this->yellow->content   $this->yellow->language  $this->yellow->lookup    │ 
│ $this->yellow->media     $this->yellow->user      $this->yellow->toolbox   │
│                          $this->yellow->page                               │
└────────────────────────────────────────────────────────────────────────────┘
          │                           │                           │  
          ▼                           ▼                           ▼ 
┌────────────────────┐     ┌───────────────────────┐    ┌────────────────────┐
│ Dateisystem        │     │ Einstellungen         │    │ Erweiterungen      │
└────────────────────┘     └───────────────────────┘    └────────────────────┘
```

Die folgenden Objekte sind verfügbar:

`$this->yellow` = [Zugang zur API](#yellow)  
`$this->yellow->content` = [Zugang zu Inhaltsdateien](#yellow-content)  
`$this->yellow->media` = [Zugang zu Mediendateien](#yellow-media)  
`$this->yellow->system` = [Zugang zu Systemeinstellungen](#yellow-system)  
`$this->yellow->language` = [Zugang zu Spracheinstellungen](#yellow-language)  
`$this->yellow->user` = [Zugang zu Benutzereinstellungen](#yellow-user)  
`$this->yellow->extension` = [Zugang zu Erweiterungen](#yellow-extension)  
`$this->yellow->lookup` = [Zugang zu Nachschlags- und Normalisierungsmethoden](#yellow-lookup)  
`$this->yellow->toolbox` = [Zugang zur Werkzeugkiste mit Hilfsmethoden](#yellow-toolbox)  
`$this->yellow->page` = [Zugang zur aktuellen Seite](#yellow-page)  

### Yellow

Die Klasse `Yellow` gibt Zugang zur API. Die folgenden Methoden sind verfügbar:

`command` `getLayoutArguments` `layout` `load` `request`

---

Beschreibung der Methoden und Argumente:

`yellow->load(): void`  
Verarbeite die Initialisierung

`yellow->request(): int`  
Verarbeite eine Anfrage vom Webbrowser

`yellow->command($line = ""): int`  
Verarbeite einen Befehl von der Befehlszeile

`yellow->layout($name, $arguments = null): void`  
Binde ein Layout ein

`yellow->getLayoutArguments($sizeMin = 9): array`  
Hole die Layout-Argumente

---

Layoutdatei mit Header und Footer:

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

### Yellow-Content

Die Klasse `YellowContent` gibt Zugang zu [Inhaltsdateien](how-to-change-the-content). Die folgenden Methoden sind verfügbar:

`clean` `find` `index` `multi` `path` `top`

---

Beschreibung der Methoden und Argumente:

`content->find($location, $absoluteLocation = false): YellowPage|null`  
Hole eine [Seite](#yellow-page), null falls nicht vorhanden

`content->index($showInvisible = false): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit Seiten der Webseite

`content->top($showInvisible = false): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit Hauptseiten der Navigation

`content->path($location, $absoluteLocation = false): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit Pfad in der Navigation

`content->multi($location, $absoluteLocation = false, $showInvisible = false): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit mehreren Sprachen im Mehrsprachen-Modus

`content->clean(): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) die leer ist

---

Layoutdatei um Seiten anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um Seiten unterhalb eines bestimmten Orts anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->find("/help/")->getChildren() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um die Hauptseiten der Navigation anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->top() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("titleNavigation") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Media

Die Klasse `YellowMedia` gibt Zugang zu [Mediendateien](how-to-change-the-media). Die folgenden Methoden sind verfügbar:

`clean` `index` `find`

---

Beschreibung der Methoden und Argumente:

`media->find($location, $absoluteLocation = false): YellowPage|null`  
Hole eine [Seite](#yellow-page) mit Informationen über Mediendatei, null falls nicht vorhanden

`media->index($showInvisible = false): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit Mediendateien

`media->clean(): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) die leer ist

---

Layoutdatei um Mediendateien anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index() ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um die neusten Mediendateien anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index()->sort("modified", false) ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um Mediendateien eines bestimmten Typen anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index()->filter("type", "pdf") ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-System

Die Klasse `YellowSystem` gibt Zugang zu [Systemeinstellungen](how-to-change-the-system#systemeinstellungen). Die folgenden Methoden sind verfügbar:

`get` `getAvailable` `getDifferent` `getHtml` `getModified` `getSettings` `isExisting` `save` `set` `setDefault`

---

Beschreibung der Methoden und Argumente:

`system->save($fileName, $settings): bool`  
Speichere Systemeinstellungen in Datei

`system->setDefault($key, $value): void`  
Setze Standard-Systemeinstellung

`system->set($key, $value): void`  
Setze eine Systemeinstellung

`system->get($key): string`  
Hole eine Systemeinstellung

`system->getHtml($key): string`  
Hole eine Systemeinstellung, HTML-kodiert

`system->getDifferent($key): string`  
Hole einen anderen Wert für eine Systemeinstellung

`system->getAvailable($key): array`  
Hole die vorhandenen Werte einer Systemeinstellung

`system->getSettings($filterStart = "", $filterEnd = ""): array`  
Hole Systemeinstellungen

`system->getModified($httpFormat = false): int|string`  
Hole das Änderungsdatum von Systemeinstellungen, Unix-Zeit oder HTTP-Format

`system->isExisting($key): bool`  
Überprüfe ob die Systemeinstellung existiert

---

Layoutdatei um den Webmaster anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php echo "Name: ".$this->yellow->system->getHtml("author")."<br />" ?>
<?php echo "Email: ".$this->yellow->system->getHtml("email")."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um zu überprüfen ob eine bestimmte Einstellung aktiviert ist:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php $debugMode = $this->yellow->system->get("coreDebugMode") ?>
Debug mode is <?php echo htmlspecialchars($debugMode ? "on" : "off") ?>.
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um die Core-Einstellungen anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getSettings("core") as $key=>$value): ?>
<?php echo htmlspecialchars("$key: $value") ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Language

Die Klasse `YellowLanguage` gibt Zugang zu [Spracheinstellungen](how-to-change-the-system#spracheinstellungen). Die folgenden Methoden sind verfügbar:

`getDateFormatted` `getDateRelative` `getDateStandard` `getModified` `getSettings` `getText` `getTextHtml` `isExisting` `isText` `setDefaults` `setText`

---

Beschreibung der Methoden und Argumente:

`language->setDefaults($lines): void`  
Setze Standard-Spracheinstellungen

`language->setText($key, $value, $language): void`  
Setze eine Spracheinstellung

`language->getText($key, $language = ""): string`  
Hole eine Spracheinstellung

`language->getTextHtml($key, $language = ""): string`  
Hole eine Spracheinstellung, HTML-kodiert

`language->getDateStandard($text, $language = ""): string`  
Hole einen Text als [sprachspezifisches Datum](how-to-change-the-system#spracheinstellungen), in eines der Standardformate konvertieren

`language->getDateRelative($timestamp, $format, $daysLimit, $language = ""): string`  
Hole eine Unix-Zeit als [Datum](https://www.php.net/manual/de/function.date.php), relativ zu heute

`language->getDateFormatted($timestamp, $format, $language = ""): string`  
Hole eine Unix-Zeit als [Datum](https://www.php.net/manual/de/function.date.php)

`language->getSettings($filterStart = "", $filterEnd = "", $language = ""): array`  
Hole Spracheinstellungen

`language->getModified($httpFormat = false): int|string`  
Hole das Änderungsdatum von Spracheinstellungen, Unix-Zeit oder HTTP-Format

`language->isText($key, $language = ""): bool`  
Überprüfe ob die Spracheinstellung existiert

`language->isExisting($language): bool`  
Überprüfe ob die Sprache existiert

---

Layoutdatei um eine Spracheinstellung anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->language->getTextHtml("wikiModified") ?> 
<?php echo $this->yellow->page->getDateHtml("modified") ?></p>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um zu überprüfen ob eine bestimmte Sprache existiert:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->language->isExisting("sv") ?>
<p>Swedish language <?php echo htmlspecialchars($found ? "" : "not") ?> installed.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um Sprachen und Übersetzer anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getAvailable("language") as $language): ?>
<?php echo $this->yellow->language->getTextHtml("languageDescription", $language) ?> - 
<?php echo $this->yellow->language->getTextHtml("languageTranslator", $language) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-User

Die Klasse `YellowUser` gibt Zugang zu [Benutzereinstellungen](how-to-change-the-system#benutzereinstellungen). Die folgenden Methoden sind verfügbar:

`getModified` `getSettings` `getUser` `getUserHtml` `isExisting` `isUser` `remove` `save` `setUser`

---

Beschreibung der Methoden und Argumente:

`user->save($fileName, $email, $settings): bool`  
Speichere Benutzereinstellungen in Datei

`user->remove($fileName, $email): bool`  
Entferne Benutzereinstellungen von Datei

`user->setUser($key, $value, $email): void`  
Setze eine Benutzereinstellung

`user->getUser($key, $email = ""): string`  
Hole eine Benutzereinstellung

`user->getUserHtml($key, $email = ""): string`  
Hole eine Benutzereinstellung, HTML-kodiert

`user->getSettings($email = ""): array`  
Hole Benutzereinstellungen

`user->getModified($httpFormat = false): int|string`  
Hole das Änderungsdatum von Benutzereinstellungen, Unix-Zeit oder HTTP-Format

`user->isUser($key, $email = ""): bool`  
Überprüfe ob die Benutzereinstellung existiert

`user->isExisting($email): bool`  
Überprüfe ob der Benutzer existiert

---

Layoutdatei um den aktuellen Benutzer anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php echo "Name: ".$this->yellow->user->getUserHtml("name")."<br />" ?>
<?php echo "Email: ".$this->yellow->user->getUserHtml("email")."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um zu überprüfen ob ein Benutzer angemeldet ist:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->user->isUser("name") ?>
<p>You are <?php echo htmlspecialchars($found? "" : "not") ?> logged in.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um Benutzer und ihren Status anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getAvailable("email") as $email): ?>
<?php echo $this->yellow->user->getUserHtml("name", $email) ?> - 
<?php echo $this->yellow->user->getUserHtml("status", $email) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Extension

Die Klasse `YellowExtension` gibt Zugang zu [Erweiterungen](#erweiterungen). Die folgenden Methoden sind verfügbar:

`get` `getModified` `isExisting`

---

Beschreibung der Methoden und Argumente:

`extension->get($key): object`  
Hole eine Erweiterung

`extension->getModified($httpFormat = false): int|string`  
Hole das Änderungsdatum von Erweiterungen, Unix-Zeit oder HTTP-Format

`extension->isExisting($key): bool`  
Überprüfe ob die Erweiterung existiert

---

Layoutdatei um Erweiterungen anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach($this->yellow->extension->data as $key=>$value): ?>
<?php echo htmlspecialchars($key." ".$value["version"]) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um zu überprüfen ob eine bestimmte Erweiterung existiert:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->extension->isExisting("search") ?>
<p>Search extension <?php echo htmlspecialchars($found ? "" : "not") ?> installed.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Code um eine Funktion aus einer anderen Erweiterung aufzurufen:

``` php
if ($this->yellow->extension->isExisting("image")) {
    $fileName = "media/images/photo.jpg";
    list($src, $width, $height) = $this->yellow->extension->get("image")->getImageInformation($fileName, "100%", "100%");
    echo "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\" />";
}
```

### Yellow-Lookup

Die Klasse `YellowLookup` gibt Zugang zu Nachschlags- und Normalisierungsmethoden. Die folgenden Methoden sind verfügbar:

`findContentLocationFromFile` `findFileFromContentLocation` `findFileFromMediaLocation` `findFileFromSystemLocation` `findMediaDirectory` `findMediaLocationFromFile` `findSystemLocationFromFile` `getHtmlAttributes` `getUrlInformation` `isCommandLine` `isContentFile` `isFileLocation` `isMediaFile` `isSystemFile` `isValidFile` `normaliseAddress` `normaliseArguments` `normaliseClass` `normaliseData` `normaliseHeaders` `normaliseLocation` `normaliseName` `normalisePath` `normaliseUrl`

---

Beschreibung der Methoden und Argumente:

`lookup->findContentLocationFromFile($fileName): string`  
Hole Inhaltsort aus dem Dateipfad

`lookup->findFileFromContentLocation($location, $directory = false): string`  
Hole Dateipfad aus dem Inhaltsort

`lookup->findMediaLocationFromFile($fileName): string`  
Hole Medienort aus dem Dateipfad

`lookup->findFileFromMediaLocation($location): string`  
Hole Dateipfad aus dem Medienort

`lookup->findMediaDirectory($key): string`  
Hole Medienpfad für eine Systemeinstellung

`lookup->findSystemLocationFromFile($fileName): string`  
Hole Systemort aus dem Dateipfad, für virtuell zugeordnete Systemdateien

`lookup->findFileFromSystemLocation($location): string`  
Hole Dateipfad aus dem Systemnort, für virtuell zugeordnete Systemdateien

`lookup->normaliseName($text, $removePrefix = false, $removeExtension = false, $filterStrict = false): string`  
Normalisiere einen Namen

`lookup->normaliseData($text, $type = "html", $filterStrict = true): string`  
Normalisiere Elemente und Attribute in HTML/SVG-Daten

`lookup->normaliseAddress($input, $type = "mail", $filterStrict = true): string`  
Normalisiere Name und E-Mail für eine einzelne Adresse

`lookup->normaliseHeaders($input, $type = "mime", $filterStrict = true): string`  
Normalisiere Felder in MIME-Headers

`lookup->normaliseClass($text): string`  
Normalisiere CSS-Klasse

`lookup->normalisePath($text): string`  
Normalisiere relative Pfadanteile

`lookup->normaliseLocation($location, $pageLocation, $filterStrict = true): string`  
Normalisiere einen Ort, mache absoluten Ort

`lookup->normaliseArguments($text, $filterStrict = true): string`  
Normalisiere Ortargumente

`lookup->normaliseUrl($scheme, $address, $base, $location, $filterStrict = true): string`  
Normalisiere eine URL, mache absolute URL

`lookup->getUrlInformation($url): string`  
Hole URL-Informationen

`lookup->getHtmlAttributes($text) : string`  
Hole HTML-Attribute aus generischen Markdown-Attributen

`lookup->isFileLocation($location): bool`  
Überprüfe ob der Ort eine Datei oder ein Verzeichnis angibt

`lookup->isValidFile($fileName): bool`  
Überprüfe ob die Datei gültig ist

`lookup->isContentFile($fileName): bool`  
Überprüfe ob Inhaltsdatei

`lookup->isMediaFile($fileName): bool`  
Überprüfe ob Mediendatei

`lookup->isSystemFile($fileName): bool`  
Überprüfe ob Systemdatei

`lookup->isCommandLine(): bool`  
Überprüfe ob Befehlszeile ausgeführt wird

---

Layoutdatei um Bildpfade anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php $pathInstall = $this->yellow->system->get("coreServerInstallDirectory") ?>
<?php $pathImages = $this->yellow->lookup->findMediaDirectory("coreImageLocation") ?>
<?php $pathThumbs = $this->yellow->lookup->findMediaDirectory("coreThumbnailLocation") ?>
<?php echo "Image files: ".htmlspecialchars($pathInstall.$pathImages)."<br />" ?>
<?php echo "Image thumbnails: ".htmlspecialchars($pathInstall.$pathThumbs)."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um den Seitentyp anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $fileLocation = $this->yellow->lookup->isFileLocation($this->yellow->page->location) ?>
<p>Page is <?php echo htmlspecialchars($fileLocation? "file" : "directory") ?>.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Code um eine URL in Bestandteile zu zerlegen:

``` php
if (!is_string_empty($url)) {
    list($scheme, $address, $base) = $this->yellow->lookup->getUrlInformation($url);
    echo "Found scheme:$scheme address:$address base:$base\n";
}
```

### Yellow-Toolbox

Die Klasse `YellowToolbox` gibt Zugang zur Werkzeugkiste mit Hilfsmethoden. Die folgenden Methoden sind verfügbar:

`appendFile` `copyFile` `createTextDescription` `deleteDirectory` `deleteFile` `getCookie` `getDirectoryEntries` `getDirectoryEntriesRecursive` `getDirectoryInformation` `getDirectoryInformationRecursive` `getFileModified` `getFileSize` `getFileType` `getLocationArguments` `getServer` `getTextArguments` `getTextLines` `getTextList` `log` `mail` `modifyFile` `readFile` `renameDirectory` `renameFile` `writeFile`

---

Beschreibung der Methoden und Argumente:

`toolbox->getCookie($key): string`   
Hole das Browsercookie der aktuellen HTTP-Anfrage

`toolbox->getServer($key): string`   
Hole das Serverargument der aktuellen HTTP-Anfrage

`toolbox->getLocationArguments(): string`  
Hole die Ortargumente der aktuellen HTTP-Anfrage

`toolbox->getDirectoryEntries($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true): array`  
Hole Dateien und Verzeichnisse

`toolbox->getDirectoryEntriesRecursive($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true, $levelMax = 0): array`  
Hole Dateien und Verzeichnisse rekursiv

`toolbox->getDirectoryInformation($path): array`  
Hole Verzeichnisinformationen, Änderungsdatum und Anzahl Dateien

`toolbox->getDirectoryInformationRecursive($path, $levelMax = 0): array`  
Hole Verzeichnisinformationen rekursive, Änderungsdatum und Anzahl Dateien

`toolbox->readFile($fileName, $sizeMax = 0): string`  
Lese eine Datei, leerer String falls nicht vorhanden

`toolbox->writeFile($fileName, $fileData, $mkdir = false): bool`  
Schreibe eine Datei

`toolbox->appendFile($fileName, $fileData, $mkdir = false): bool`  
Hänge an eine Datei an

`toolbox->copyFile($fileNameSource, $fileNameDestination, $mkdir = false): bool`  
Kopiere eine Datei  

`toolbox->renameFile($fileNameSource, $fileNameDestination, $mkdir = false): bool`  
Benenne eine Datei um

`toolbox->renameDirectory($pathSource, $pathDestination, $mkdir = false): bool`  
Benenne ein Verzeichnis um  

`toolbox->deleteFile($fileName, $pathTrash = ""): bool`  
Lösche eine Datei

`toolbox->deleteDirectory($path, $pathTrash = ""): bool`  
Lösche ein Verzeichnis  

`toolbox->modifyFile($fileName, $modified): bool`  
Setze das Änderungsdatum von Datei/Verzeichnis, Unix-Zeit

`toolbox->getFileModified($fileName): int`  
Hole das Änderungsdatum von Datei/Verzeichnis, Unix-Zeit

`toolbox->getFileSize($fileName): int`  
Hole die Grösse der Datei

`toolbox->getFileType($fileName): string`  
Hole den Typ der Datei

`toolbox->getTextLines($text): array`  
Hole die Zeilen eines Texts, einschließlich Zeilenumbruch  

`toolbox->getTextList($text, $separator, $size): array`  
Hole ein Array mit bestimmter Grösse aus dem Text  

`toolbox->getTextArguments($text, $optional = "-", $sizeMin = 9): array`  
Hole ein Array mit variabler Grösse aus dem Text, durch Leerzeichen getrennt  

`toolbox->createTextDescription($text, $lengthMax = 0, $removeHtml = true, $endMarker = "", $endMarkerText = ""): string`  
Erstelle eine Textbeschreibung, mit oder ohne HTML

`toolbox->mail($action, $headers, $message): bool`  
Sende E-Mail-Nachricht

`toolbox->log($action, $message): void`  
Schreibe Informationen in die Logdatei

---

Code um Textzeilen von einer Datei zu lesen:

``` php
$fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
$fileData = $this->yellow->toolbox->readFile($fileName);
foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
    echo $line;
}
```

Code um Dateien in einem Verzeichnis anzuzeigen:

``` php
$path = $this->yellow->system->get("coreExtensionDirectory");
foreach ($this->yellow->toolbox->getDirectoryEntries($path, "/.*/", true, false) as $entry) {
    echo "Found file $entry\n";
}
```

Code um Text in mehreren Dateien zu ändern:

``` php
$path = $this->yellow->system->get("coreContentDirectory");
foreach ($this->yellow->toolbox->getDirectoryEntriesRecursive($path, "/^.*\.md$/", true, false) as $entry) {
    $fileData = $fileDataNew = $this->yellow->toolbox->readFile($entry);
    $fileDataNew = str_replace("I drink a lot of water", "I drink a lot of coffee", $fileDataNew);
    if ($fileData!=$fileDataNew && !$this->yellow->toolbox->writeFile($entry, $fileDataNew)) {
        $this->yellow->toolbox->log("error", "Can't write file '$entry'!");
    }
}
```

### Yellow-Page

Die Klasse `YellowPage` gibt Zugang zur einer Seite und ihren [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen). Die folgenden Methoden sind verfügbar:

`error` `get` `getBase` `getChildren` `getChildrenRecursive` `getContentHtml` `getContentRaw` `getDate` `getDateFormatted` `getDateFormattedHtml` `getDateHtml` `getDateRelative` `getDateRelativeHtml` `getExtraHtml` `getHeader` `getHtml` `getLastModified` `getLocation` `getModified` `getPage` `getPages` `getParent` `getParentTop` `getRequest` `getRequestHtml` `getSiblings` `getStatusCode` `getUrl` `isActive` `isAvailable` `isCacheable` `isError` `isExisting` `isHeader` `isPage` `isRequest` `isVisible` `set` `status`

---

Beschreibung der Methoden und Argumente:

`page->set($key, $value): void`  
Setze eine Seiteneinstellung

`page->get($key): string`  
Hole eine Seiteneinstellung

`page->getHtml($key): string`  
Hole eine Seiteneinstellung, HTML-kodiert  

`page->getDate($key, $format = ""): string`  
Hole eine Seiteneinstellung als [sprachspezifisches Datum](how-to-change-the-system#spracheinstellungen)

`page->getDateHtml($key, $format = ""): string`  
Hole eine Seiteneinstellung als [sprachspezifisches Datum](how-to-change-the-system#spracheinstellungen), HTML-kodiert

`page->getDateRelative($key, $format = "", $daysLimit = 30): string`  
Hole eine Seiteneinstellung als [sprachspezifisches Datum](how-to-change-the-system#spracheinstellungen), relativ zu heute

`page->getDateRelativeHtml($key, $format = "", $daysLimit = 30): string`  
Hole eine Seiteneinstellung als [sprachspezifisches Datum](how-to-change-the-system#spracheinstellungen), relativ zu heute, HTML-kodiert

`page->getDateFormatted($key, $format): string`  
Hole eine Seiteneinstellung als [Datum](https://www.php.net/manual/de/function.date.php)

`page->getDateFormattedHtml($key, $format): string`  
Hole eine Seiteneinstellung als [Datum](https://www.php.net/manual/de/function.date.php), HTML-kodiert

`page->getContentRaw(): string`  
Hole Seiteninhaltsdaten, Rohformat

`page->getContentHtml(): string`  
Hole Seiteninhaltsdaten, HTML-kodiert

`page->getExtraHtml($name): string`  
Hole Seitenextradaten, HTML-kodiert

`page->getParent(): YellowPage|null`  
Hole die übergeordnete Seite, null falls nicht vorhanden

`page->getParentTop($homeFallback = false): YellowPage|null`  
Hole die oberste übergeordnete Seite, null falls nicht vorhanden

`page->getSiblings($showInvisible = false): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit Seiten auf dem selben Level

`page->getChildren($showInvisible = false): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit untergeordneten Seiten

`page->getChildrenRecursive($showInvisible = false, $levelMax = 0): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit untergeordneten Seiten rekursiv

`page->getPages($key): YellowPageCollection`  
Hole eine [Seitenkollektion](#yellow-page-collection) mit zusätzlichen Seiten

`page->getPage($key): YellowPage`  
Hole eine geteilte Seite

`page->getUrl($canonicalUrl = false): string`  
Hole die URL der Seite 

`page->getBase($multiLanguage = false): string`  
Hole die Basis der Seite

`page->getLocation($absoluteLocation = false): string`  
Hole den Ort der Seite

`page->getRequest($key): string`  
Hole das angefragte Argument der Seite

`page->getRequestHtml($key): string`  
Hole das angefragte Argument der Seite, HTML-kodiert

`page->getHeader($key): string`  
Hole den Antwort-Header der Seite

`page->getModified($httpFormat = false): int|string`  
Hole das Änderungsdatum der Seite, Unix-Zeit oder HTTP-Format

`page->getLastModified($httpFormat = false): int|string`  
Hole das letzte Änderungsdatum der Seite, Unix-Zeit oder HTTP-Format

`page->getStatusCode($httpFormat = false): int|string`  
Hole den Statuscode der Seite, Zahl oder HTTP-Format

`page->status($statusCode, $location = ""): void`  
Antworte mit Statuscode, ohne Seiteninhalt

`page->error($statusCode, $errorMessage = ""): void`  
Antworte mit Fehlerseite

`page->isAvailable(): bool`  
Überprüfe ob die Seite vorhanden ist

`page->isVisible(): bool`  
Überprüfe ob die Seite sichtbar ist

`page->isActive(): bool`  
Überprüfe ob die Seite innerhalb der aktuellen HTTP-Anfrage ist

`page->isCacheable(): bool`  
Überprüfe ob die Seite zwischengespeichert werden kann

`page->isError(): bool`  
Überprüfe ob die Seite einen Fehler hat

`page->isExisting($key): bool`  
Überprüfe ob die Seiteneinstellung existiert  

`page->isRequest($key): bool`  
Überprüfe ob das Anfrage-Argument existiert

`page->isHeader($key): bool`  
Überprüfe ob der Antwort-Header existiert

`page->isPage($key): bool`  
Überprüfe ob die geteilte Seite existiert

---

Layoutdatei um den Seiteninhalt anzuzeigen:

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

Layoutdatei um den Seiteninhalt und den Autor anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->page->getHtml("author") ?></p>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um den Seiteninhalt und das Änderungsdatum anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->page->getDateHtml("modified") ?></p>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-Page-Collection

Die Klasse `YellowPageCollection` gibt Zugang zu mehreren Seiten. Die folgenden Methoden sind verfügbar:

`append` `diff` `filter` `getFilter` `getModified` `getPageNext` `getPagePrevious` `getPaginationCount` `getPaginationLocation` `getPaginationNext` `getPaginationNumber` `getPaginationPrevious` `group` `intersect` `isEmpty` `isPagination` `limit` `match` `merge` `paginate` `prepend` `remove` `reverse` `shuffle` `similar` `sort`

---

Beschreibung der Methoden und Argumente:

`pages->append($page): void`  
Hänge Seite an das Ende der Seitenkollektion

`pages->prepend($page): void`  
Stelle Seite an den Anfang der Seitenkollektion

`pages->remove($page): YellowPageCollection`  
Entferne Seite aus der Seitenkollektion

`pages->filter($key, $value, $exactMatch = true): YellowPageCollection`  
Filtere eine Seitenkollektion nach Seiteneinstellung

`pages->match($regex = "/.*/", $filterByLocation = true): YellowPageCollection`  
Filtere eine Seitenkollektion nach Ort oder Datei

`pages->similar($page): YellowPageCollection`  
Sortiere eine Seitenkollektion nach Einstellungsähnlichkeit

`pages->sort($key, $ascendingOrder = true): YellowPageCollection`  
Sortiere eine Seitenkollektion nach Seiteneinstellung

`pages->group($key, $ascendingOrder = true, $format = ""): array`  
Gruppiere eine Seitenkollektion nach Seiteneinstellung, gebe Array mit mehreren Kollektionen zurück

`pages->merge($input): YellowPageCollection`  
Berechne Vereinigungsmenge, füge eine Seitenkollektion hinzu

`pages->intersect($input): YellowPageCollection`  
Berechne Schnittmenge, entferne Seiten die nicht in einer anderen Seitenkollektion sind

`pages->diff($input): YellowPageCollection`  
Berechne Restmenge, entferne Seiten die in einer anderen Seitenkollektion sind

`pages->limit($pagesMax): YellowPageCollection`  
Begrenze die Anzahl der Seiten in der Seitenkollektion

`pages->reverse(): YellowPageCollection`  
Drehe die Seitenkollektion um

`pages->shuffle(): YellowPageCollection`  
Mach die Seitenkollektion zufällig

`pages->paginate($limit): YellowPageCollection`  
Erstelle eine Paginierung für die Seitenkollektion

`pages->getPaginationNumber(): int`  
Hole die aktuelle Seitennummer

`pages->getPaginationCount(): int`  
Hole die höchste Seitennummer

`pages->getPaginationLocation($absoluteLocation = true, $pageNumber = 1): string`  
Hole den Ort einer Seite in der Paginierung

`pages->getPaginationPrevious($absoluteLocation = true): string`  
Hole den Ort der vorherigen Seite in der Paginierung

`pages->getPaginationNext($absoluteLocation = true): string`  
Hole den Ort der nächsten Seite in der Paginierung

`pages->getPagePrevious($page): YellowPage|null`  
Hole die vorherige Seite in der Seitenkollektion, null falls nicht vorhanden

`pages->getPageNext($page): YellowPage|null`  
Hole die nächste Seite in der Seitenkollektion, null falls nicht vorhanden

`pages->getFilter(): string`  
Hole den aktuellen Seitenfilter

`pages->getModified($httpFormat = false): int|string`  
Hole das Änderungsdatum der Seitenkollektion, Unix-Zeit oder HTTP-Format

`pages->isPagination(): bool`  
Überprüfe ob eine Paginierung vorhanden ist

`pages->isEmpty(): bool`  
Überprüfe ob Seitenkollektion leer ist

---

Layoutdatei um drei zufällige Seiten anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->shuffle()->limit(3) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um die neusten Seiten anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->sort("modified", false) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutdatei um die neusten Seiten mit Paginierung anzuzeigen:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->sort("modified", false)->paginate(10) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
<?php $this->yellow->layout("pagination", $pages) ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow-String

Die folgenden Funktionen erweitern PHP-Stringfunktionen und Arrayfunktionen:

`is_array_empty` `is_string_empty` `strlenu` `strposu` `strrposu` `strtoloweru` `strtoupperu` `substru`

---

Beschreibung der Funktionen und Argumente:

`strtoloweru($string): string`  
Wandle String in Kleinschrift um, UTF-8 kompatibel

`strtoupperu($string): string`  
Wandle String in Großschrift um, UTF-8 kompatibel

`strlenu($string): int` + `strlenb($string): int`  
Hole Stringlänge, UTF-8-Zeichen oder Bytes

`strposu($string, $search): int|false` + `strposb($string, $search): int|false`  
Hole Stringposition des ersten Treffers, UTF-8-Zeichen oder Bytes

`strrposu($string, $search): int|false` + `strrposb($string, $search): int|false`  
Hole Stringposition des letzten Treffers, UTF-8-Zeichen oder Bytes

`substru($string, $start, $length): string` + `substrb($string, $start, $length): string`  
Hole Teilstring, UTF-8-Zeichen oder Bytes

`is_string_empty($string): bool`  
Überprüfe ob der String leer ist

`is_array_empty($array): bool`  
Überprüfe ob das Array leer ist

---

Code um Strings zu konvertieren:

``` php
$string = "Für Menschen und Maschinen";
echo strtoloweru($string);                   // für menschen und maschinen
echo strtoupperu($string);                   // FÜR MENSCHEN UND MASCHINEN
```

Code um auf Strings zuzugerifen:

``` php
$string = "Text mit UTF-8-Zeichen åäö";
echo strlenu($string);                       // 26
echo strposu($string, "UTF");                // 9
echo substru($string, -3, 3);                // åäö
```

Code um zu überprüfen ob Strings leer sind:

``` php
var_dump(is_string_empty(""));               // bool(true)
var_dump(is_string_empty("text"));           // bool(false)
var_dump(is_string_empty("0"));              // bool(false)
```

Code um zu überprüfen ob Arrays leer sind:

``` php
var_dump(is_array_empty(array()));           // bool(true)
var_dump(is_array_empty(new ArrayObject())); // bool(true)
var_dump(is_array_empty(array("entry")));    // bool(false)
```

## Erweiterungen

Deine Webseite besteht aus dem Core und anderen Erweiterungen. Am Anfang werden alle Erweiterungen geladen und `onLoad` wird aufgerufen. Es gibt verschiedene Ereignisse die dich informieren wenn eine Anfrage vom Webbrowser empfangen wird, ein Befehl ausgeführt wird oder Informationen verfügbar sind. In den meisten Fällen wird eine Seite erzeugt. 

``` box-drawing {aria-hidden=true}
onLoad
    │
    ▼
onStartup ───────────────────────────────────────────┐            Informationen
    │                                                │            sind verfügbar
    ▼                                                │                  │
onRequest ───────────────────┐                       │                  │
    │                        │                       │                  │
    ▼                        ▼                       ▼                  ▼
onParseMetaData          onEditContentFile       onCommand          onUpdate
onParseContentRaw        onEditMediaFile         onCommandHelp      onMail
onParseContentElement    onEditSystemFile            │              onLog
onParseContentHtml       onEditUserAccount           │
onParsePageLayout            │                       │
onParsePageExtra             │                       │
onParsePageOutput            │                       │
    │                        │                       │
    ▼                        │                       │
onShutdown ◀─────────────────┴───────────────────────┘
```

Die folgenden Arten von Ereignissen sind verfügbar:

`Yellow-Core-Ereignisse` = [unterrichten wenn sich ein Zustand ändert](#yellow-core-ereignisse)  
`Yellow-Parse-Ereignisse` = [unterrichten wenn eine Seite erzeugt wird](#yellow-parse-ereignisse)  
`Yellow-Edit-Ereignisse` = [unterrichten wenn eine Datei bearbeitet wird](#yellow-edit-ereignisse)  
`Yellow-Info-Ereignisse` = [unterrichten wenn Informationen verfügbar sind](#yellow-info-ereignisse)  

### Yellow-Core-Ereignisse

Yellow-Core-Ereignisse unterrichten wenn sich ein Zustand ändert. Die folgenden Ereignisse sind verfügbar:

`onCommand` `onCommandHelp` `onLoad` `onRequest` `onShutdown` `onStartup`

---

Beschreibung der Ereignisse und Argumente:

`public function onLoad($yellow)`  
Verarbeite die Initialisierung

`public function onStartup()`  
Verarbeite das Hochfahren

`public function onRequest($scheme, $address, $base, $location, $fileName)`  
Verarbeite die Anfrage

`public function onCommand($command, $text)`  
Verarbeite Befehle

`public function onCommandHelp()`  
Verarbeite Hilfe für Befehle

`public function onShutdown()`  
Verarbeite das Runterfahren

---

Erweiterung um die Initialisierung zu verarbeiten:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.1";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
}
```

Erweiterung um einen Befehl zu verarbeiten:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.2";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle command
    public function onCommand($command, $text) {
        $statusCode = 0;
        if ($command=="example") {
            echo "Yellow $command: Add more text here\n";
            $statusCode = 200;
        }
        return $statusCode;
    }

    // Handle command help
    public function onCommandHelp() {
        return "example";
    }
}
```

### Yellow-Parse-Ereignisse

Yellow-Parse-Ereignisse unterrichten wenn eine Seite erzeugt wird. Die folgenden Ereignisse sind verfügbar:

`onParseContentElement` `onParseContentHtml` `onParseContentRaw` `onParseMetaData` `onParsePageExtra` `onParsePageLayout` `onParsePageOutput`

Die folgenden Element-Typen sind verfügbar:

`symbol` = Symbol für Textelement  
`inline` = Abkürzung für Textelement  
`block` = Abkürzung für Blockelement, kann mehrere Textzeilen enthalten  
`code` = Code-Blockelement, kann mehrere Textzeilen enthalten  
`notice` = allgemeines Blockelement, kann mehrere Textzeilen enthalten  

---

Beschreibung der Ereignisse und Argumente:


`public function onParseMetaData($page)`  
Verarbeite die Metadaten einer Seite

`public function onParseContentRaw($page, $text)`  
Verarbeite den Seiteninhalt im Rohformat

`public function onParseContentElement($page, $name, $text, $attributes, $type)`  
Verarbeite den Seiteninhalt eines Elements

`public function onParseContentHtml($page, $text)`  
Verarbeite den Seiteninhalt im HTML-Format

`public function onParsePageLayout($page, $name)`  
Verarbeite das Layout einer Seite

`public function onParsePageExtra($page, $name)`  
Verarbeite die Extradaten einer Seite

`public function onParsePageOutput($page, $text)`  
Verarbeite die Ausgabedaten einer Seite

---

Erweiterung um eine eigene Abkürzung zu erstellen:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.3";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content element
    public function onParseContentElement($page, $name, $text, $attributes, $type) {
        $output = null;
        if ($name=="example" && ($type=="block" || $type=="inline")) {
            $output = "<div class=\"".htmlspecialchars($name)."\">";
            $output .= "Add more HTML code here";
            $output .= "</div>";
        }
        return $output;
    }
}
```

Erweiterung um einen HTML-Header zu erstellen:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.4";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $assetLocation = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("coreAssetLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$assetLocation}example.css\" />\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$assetLocation}example.js\"></script>\n";
        }
        return $output;
    }
}
```

### Yellow-Edit-Ereignisse

Yellow-Edit-Ereignisse unterrichten wenn eine Datei bearbeitet wird. Die folgenden Ereignisse sind verfügbar:

`onEditContentFile` `onEditMediaFile` `onEditSystemFile` `onEditUserAccount`

Die folgenden Inhalts-Aktionen sind verfügbar:

`precreate` = Seite wird erstellt, Metadaten sind noch nicht bereit  
`preedit` = Seite wird bearbeitet, Metadaten sind noch nicht bereit  
`create` = Seite wird erstellt  
`edit` = Seite wird bearbeitet  
`delete` = Seite wird gelöscht  
`restore` = Seite wird wiederhergestellt  

---

Beschreibung der Ereignisse und Argumente:


`public function onEditContentFile($page, $action, $email)`  
Verarbeite Änderungen an Inhaltsdatei

`public function onEditMediaFile($file, $action, $email)`  
Verarbeite Änderungen an Mediendatei

`public function onEditSystemFile($file, $action, $email)`  
Verarbeite Änderungen an Systemdatei

`public function onEditUserAccount($action, $email, $password)`  
Verarbeite Änderungen am Benutzerkonto

---

Erweiterung um Änderungen an Inhaltsdatei zu verarbeiten:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.5";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle content file changes
    public function onEditContentFile($page, $action, $email) {
        if ($action=="edit" && !$page->isError()) {
            $title = $page->get("title");
            $name = $this->yellow->user->getUser("name", $email);
            $this->yellow->toolbox->log("info", "Edit page by user '".strtok($name, " ")."'");
        }
    }
}
```

Erweiterung um Änderungen an Mediendatei zu verarbeiten:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.6";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle media file changes
    public function onEditMediaFile($file, $action, $email) {
        if ($action=="upload" && !$file->isError()) {
            $fileType = $file->get("type");
            $name = $this->yellow->user->getUser("name", $email);
            $this->yellow->toolbox->log("info", "Upload file by user '".strtok($name, " ")."'");
        }
    }
}
```

### Yellow-Info-Ereignisse

Yellow-Info-Ereignisse unterrichten wenn Informationen verfügbar sind. Die folgenden Ereignisse sind verfügbar:

`onLog` `onMail` `onUpdate`

Die folgenden Aktualisierungs-Aktionen sind verfügbar:

`clean` = Dateien für statische Webseite aufräumen  
`daily` = tägliches Ereignis für alle Erweiterungen  
`install` = Erweiterung wird installiert  
`uninstall` = Erweiterung wird deinstalliert  
`update` = Erweiterung wird aktualisiert  

---

Beschreibung der Ereignisse und Argumente:

`public function onUpdate($action)`  
Verarbeite Aktualisierung

`public function onMail($action, $headers, $message)`  
Verarbeite E-Mail

`public function onLog($action, $message)`  
Verarbeite Logging

---

Erweiterung um ein Aktualisierung-Ereignis zu verarbeiten:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.7";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle update
    public function onUpdate($action) {
        if ($action=="install") {
            $this->yellow->toolbox->log("info", "Install event");
        }
    }
}
```

Erweiterung um ein tägliches Ereignis zu verarbeiten:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.8";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle update
    public function onUpdate($action) {
        if ($action=="daily") {
            $this->yellow->toolbox->log("info", "Daily event");
        }
    }
}
```

## Debug-Modus

Du kannst den Debug-Modus benutzen um die Ursache eines Problems genauer zu untersuchen oder falls du neugierig bist wie Datenstrom Yellow funktioniert. Um den Debug-Modus zu aktivieren, öffne die Datei  `system/extensions/yellow-system.ini` und ändere `CoreDebugMode: 1`. Abhängig vom Debug-Modus werden mehr oder weniger Informationen auf dem Bildschirm angezeigt.

Hast du Fragen? [Hilfe finden](.).
