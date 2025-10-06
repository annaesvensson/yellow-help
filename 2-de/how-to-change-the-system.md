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
    └── workers
```

Das `system/extensions`-Verzeichnis enthält Konfigurationsdateien und die Logdatei. Man kann das Aussehen seiner Webseite im `system/layouts`-Verzeichnis und `system/themes`-Verzeichnis anpassen. Man kann alle Layouts und Themes so ändern wie man will. Kenntnisse in HTML und CSS sind erforderlich. Im `system/workers`-Verzeichnis sollte man keine Dateien ändern.

## Systemeinstellungen

Die zentrale Konfigurationsdatei ist `system/extensions/yellow-system.ini`. Hier ist ein Beispiel:

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Language: de
    Layout: default
    Theme: berlin
    Parser: markdown
    Status: public

Im [Webbrowser](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md) oder auf deinem [Computer](https://github.com/annaesvensson/yellow-core/tree/main/README-de.md) kannst du die Systemeinstellungen ändern. Die Systemeinstellungen enthalten die Einstellungen der Webseite und aller installierten Erweiterungen. Die folgenden Einstellungen können vorgenommen werden:

`Sitename` = Name der Webseite  
`Author` = Name des Webmasters  
`Email` = E-Mail des Webmasters  
`Language` = Standard-Sprache, z.B. `de`  
`Layout` = Standard-Layout  
`Theme` = Standard-Theme  
`Parser` = Standard-Inhaltsparser  
`Status` = Standard-Seitenstatus, [unterstützte Statuswerte](#einstellungen-status)  

## Spracheinstellungen

Die Spracheinstellungen sind in der Datei `system/extensions/yellow-language.ini` gespeichert. Hier ist ein Beispiel:

    Language: de
    CoreDescription: Kernfunktionalität deiner Webseite.
    CorePaginationPrevious: ← Zurück
    CorePaginationNext: Weiter →
    CoreTimeFormatShort: H:i
    CoreTimeFormatMedium: H:i:s
    CoreTimeFormatLong: H:i:s T
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: d.m.Y
    CoreDateFormatLong: d.m.Y H:i
    media/images/photo.jpg: Das ist ein Beispielbild

Hier kannst du die Spracheinstellungen festlegen. Eine Sprache besteht aus `Language` und weiteren Einstellungen. Die Spracheinstellungen enthalten die Spracheinstellungen der Webseite und aller installierten Erweiterungen. Du kannst auch deine eigenen Spracheinstellungen zur Konfigurationsdatei hinzufügen, beispielsweise Bildunterschriften.

## Benutzereinstellungen

Die Benutzereinstellungen sind in der Datei `system/extensions/yellow-user.ini` gespeichert. Hier ist ein Beispiel:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Entwickler und Designer
    Language: de
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Home: /
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

Im [Webbrowser](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md) oder der [Befehlszeile](https://github.com/annaesvensson/yellow-core/tree/main/README-de.md) kannst du neue Benutzerkonten anlegen. Ein Benutzerkonto besteht aus `Email` und weiteren Einstellungen. Falls du nicht willst dass Seiten im Webbrowser verändert werden, dann beschränke Benutzerkonten. Öffne die Konfigurationsdatei, ändere `Access` und `Home`. Benutzer dürfen Seiten innerhalb ihrer Startseite bearbeiten, aber nirgendwo sonst.

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
`Language` = Sprache der Seite, z.B. `de`  
`Layout` = Layout der Seite  
`LayoutNew` = Layout um eine neue Seite zu erzeugen  
`Theme` = Theme der Seite  
`Parser` = Inhaltsparser der Seite  
`Status` = Status der Seite, [unterstützte Statuswerte](#einstellungen-status)  
`Redirect` = Umleitung zu einer neuen Seite oder URL  
`Image` = Bild der Seite  
`ImageAlt` = Beschreibung des Bildes der Seite  
`Modified` = Änderungsdatum der Seite, JJJJ-MM-TT Format  
`Published` = Veröffentlichungsdatum der Seite, JJJJ-MM-TT Format  
`Tag` = Tags zur Kategorisierung der Seite, durch Komma getrennt  
`Generate` = Optionen zum Generieren einer statischen Webseite, durch Komma getrennt  
`Comment` = Optionen zum Anzeigen von Kommentaren, durch Komma getrennt  

<a id="einstellungen-status"></a>Die folgenden Seiten-Statuswerte werden unterstützt:

`public` = Seite ist eine normale Seite  
`private` = Seite ist nicht sichtbar, Benutzer muss das Kennwort eingeben, [erfordert Private-Erweiterung](https://github.com/schulle4u/yellow-private/tree/main/README-de.md)  
`draft` = Seite ist nicht sichtbar, Benutzer muss sich einloggen, [erfordert Draft-Erweiterung](https://github.com/annaesvensson/yellow-draft/tree/main/README-de.md)  
`unlisted` = Seite ist nicht sichtbar, aber kann mit dem richtigen Link abgerufen werden  
`shared` = Seite ist nicht sichtbar, aber kann in andere Seiten eingebunden werden  

## Webseite aktualisieren

Im [Webbrowser](https://github.com/annaesvensson/yellow-update/tree/main/README-de.md) oder der [Befehlszeile](https://github.com/annaesvensson/yellow-core/tree/main/README-de.md) kannst du deine Webseite aktualisieren. Es gibt Informationen über die [neusten Produktänderungen](what-s-new) und Erweiterungen. Denke daran dass nur veröffentlichte Erweiterungen aktualisiert werden, möglicherweise musst du experimentelle Erweiterungen manuell aktualisieren. Detaillierte Information findest du in  der entsprechenden Erweiterung.

## Logdatei

Die Logdatei findet man in der Datei `system/extensions/yellow-website.log`. Hier ist ein Beispiel:

```
2024-04-28 14:13:07 info Install Datenstrom Yellow 0.9, PHP 8.1.27, Apache 2.4.33, Linux
2024-04-28 14:13:07 info Install extension 'Core 0.9.9'
2024-04-28 14:13:07 info Install extension 'Markdown 0.9.1'
2024-04-28 14:13:07 info Install extension 'Stockholm 0.9.2'
2024-04-28 14:13:07 info Install extension 'English 0.9.2'
2024-04-28 14:13:07 info Install extension 'German 0.9.2'
2024-04-28 14:13:07 info Install extension 'Swedish 0.9.2'
2024-04-28 14:23:11 info Install extension 'Fika 0.9.1'
2024-04-28 14:23:11 error Process file 'system/workers/fika.php' with fatal error!
```

Hast du Fragen? [Hilfe finden](.).
