---
Title: Wie man das System ändert
---
Alle Systemdateien befinden sich im `system`-Verzeichnis. Hier passt man seine Webseite an.

``` box-drawing {aria-hidden=true}
├── content
├── media
└── system
    ├── extensions
    ├── layouts
    ├── themes
    └── trash
```

Das `system/extensions`-Verzeichnis enthält installierte Erweiterungen und Konfigurationsdateien. Man kann das Aussehen seiner Webseite im `system/layouts`-Verzeichnis und `system/themes`-Verzeichnis anpassen. Man kann Layouts und Themen so ändern wie man will, Kenntnisse in HTML, CSS und JavaScript sind erforderlich. Das `system/trash`-Verzeichnis enthält gelöschte Dateien.

## Systemeinstellungen

Die zentrale Konfigurationsdatei ist `system/extensions/yellow-system.ini`. Hier ist ein Beispiel:

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Layout: default
    Theme: berlin
    Language: de
    Parser: markdown
    Status: public

Im [Webbrowser](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md) oder auf deinem [Computer](https://github.com/annaesvensson/yellow-core/tree/main/README-de.md) kannst du die Systemeinstellungen ändern. Die Systemeinstellungen enthalten die Einstellungen der Webseite und aller Erweiterungen. Nach einer neuen Installation sollte man unbedingt `Sitename`, `Author` und `Email` überprüfen. Die folgenden Einstellungen können vorgenommen werden:

`Sitename` = Name der Webseite  
`Author` = Name des Webmasters  
`Email` = E-Mail des Webmasters  
`Layout` = Standard-Layout  
`Theme` = Standard-Thema  
`Language` = Standard-Sprache  
`Parser` = Standard-Seitenparser  
`Status` = Standard-Seitenstatus, [unterstützte Statuswerte](#einstellungen-status)  

## Benutzereinstellungen

Die Benutzereinstellungen sind in der Datei `system/extensions/yellow-user.ini` gespeichert. Hier ist ein Beispiel:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Designer
    Language: de
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Home: /
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

Im [Webbrowser](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md) oder der [Befehlszeile](https://github.com/annaesvensson/yellow-command/tree/main/README-de.md) kannst du neue Benutzerkonten anlegen. Ein Benutzerkonto besteht aus `Email` und weiteren Einstellungen. Falls du nicht willst dass Seiten im Webbrowser verändert werden, dann beschränke Benutzerkonten. Öffne die Konfigurationsdatei, ändere `Access` und `Home`. Benutzer dürfen Seiten innerhalb ihrer Startseite bearbeiten, aber nirgendwo sonst.

## Spracheinstellungen

Die Spracheinstellungen sind in der Datei `system/extensions/yellow-language.ini` gespeichert. Hier ist ein Beispiel:

    Language: de
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: d.m.Y
    CoreDateFormatLong: d.m.Y H:i
    EditMailFooter: @sitename
    ImageDefaultAlt: Bild ohne Beschreibung
    media/images/photo.jpg: Das ist ein Beispielbild

Hier kannst du die Spracheinstellungen festlegen. Eine Sprache besteht aus `Language` und weiteren Einstellungen. Du kannst die [Standardeinstellungen aus Sprachdateien](https://github.com/annaesvensson/yellow-language/blob/main/translation/german/german.txt) kopieren und in die Konfigurationsdatei einfügen. Du kannst auch deine eigenen Spracheinstellungen zur Konfigurationsdatei hinzufügen, beispielsweise Bildunterschriften.

## Seiteneinstellungen

Die folgenden Einstellungen können ganz oben auf einer Seite vorgenommen werden

`Title` = Seitentitel  
`TitleContent` = Seitentitel der im Inhalt angezeigt wird  
`TitleNavigation` = Seitentitel der in der Navigation angezeigt wird  
`TitleHeader` = Seitentitel der im Webbrowser angezeigt wird  
`TitleSlug` = Seitentitel zum Speichern der Seite  
`Description` = Beschreibung der Seite  
`Author` = Autoren der Seite, durch Komma getrennt  
`Email` = E-Mail des Seitenautors  
`Layout` = Layout der Seite  
`LayoutNew` = Layout um eine neue Seite zu erzeugen  
`Theme` = Thema der Seite  
`Language` = Sprache der Seite  
`Parser` = Parser der Seite  
`Status` = Status der Seite, [unterstützte Statuswerte](#einstellungen-status)  
`Redirect` = Umleitung zu einer neuen Seite oder URL  
`Image` = Bild der Seite  
`ImageAlt` = Beschreibung des Bildes der Seite  
`Modified` = Änderungsdatum der Seite, JJJJ-MM-TT Format  
`Published` = Veröffentlichungsdatum der Seite, JJJJ-MM-TT Format  
`Tag` = Tags zur Kategorisierung der Seite, durch Komma getrennt  
`Build` = Optionen zum Erstellen einer statischen Webseite, durch Komma getrennt  
`Comment` = Optionen zum Anzeigen von Kommentaren, durch Komma getrennt  

<a id="einstellungen-status"></a>Die folgenden Seiten-Statuswerte werden unterstützt:

`public` = Seite ist eine normale Seite  
`private` = Seite ist nicht sichtbar, Benutzer muss das Kennwort eingeben, [erfordert Private-Erweiterung](https://github.com/schulle4u/yellow-extensions-schulle4u/tree/main/private/README-de.md)  
`draft` = Seite ist nicht sichtbar, Benutzer muss sich einloggen, [erfordert Draft-Erweiterung](https://github.com/annaesvensson/yellow-draft/tree/main/README-de.md)  
`unlisted` = Seite ist nicht sichtbar, aber kann mit dem richtigen Link abgerufen werden  
`shared` = Seite ist nicht sichtbar, aber kann in andere Seiten eingebunden werden  

Hast du Fragen? [Hilfe finden](.).
