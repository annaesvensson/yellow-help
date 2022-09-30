---
Title: Wie man ein kleines Wiki erstellt
---
Hier erfährst du, wie du dein Wiki erstellst.

[toc]

## Erste Schritte

[Folge der Installationsanleitung](how-to-get-started), wähle `Kleines Wiki` aus und klicke auf `Installieren`. Dein Wiki ist sofort erreichbar. Die Installation kommt mit drei Seiten, "Startseite", "Wiki" und "Über". Das ist nur ein Beispiel um loszulegen. Verändere alles so wie du willst. Du kannst Wikiseiten im Webbrowser oder Texteditor bearbeiten. Mache was am besten in deinen Arbeitsablauf passt.

## Wikiseiten bearbeiten

Falls du Wikiseiten im Webbrowser bearbeiten möchtest, kannst du das auf deiner Webseite machen unter `http://website/edit/wiki/`. Falls du Wikiseiten auf deinem Computer bearbeiten möchtest, schau dir das `content/2-wiki`-Verzeichnis an. Probier es einfach mal aus. Öffne die Datei `content/2-wiki/wiki-example.md`. Ganz oben auf der Seite kannst du `Title` und andere [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ändern. Darunter kannst du [Text](how-to-change-the-content#text) und [Bilder](how-to-change-the-media#bilder) ändern. Hier ist ein Beispiel:

```
---
Title: Beispielseite
Layout: wiki
Tag: Beispiel
---
Das ist eine Beispielseite fürs Wiki.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 
```

Um eine neue Wikiseite hinzuzufügen, erstellst du eine neue Datei im Wikiverzeichnis. Ganz oben auf der Seite solltest du `Title` und weitere Einstellungen ändern. Mit `Tag` kannst du ähnliche Seiten gruppieren. Hier ist ein weiteres Beispiel:

```
---
Title: Kaffee ist gut für dich
Layout: wiki
Tag: Beispiel, Kaffee
---
Kaffee ist ein Getränk aus gerösteten Bohnen der Kaffeepflanze.

1. Verwende frischen Kaffee. Kaffeebohnen fangen nach dem Rösten und Mahlen 
   sofort an, an Qualität zu verlieren. Den besten Kaffee erhält man, wenn 
   man die frisch gemahlenen Bohnen sofort weiterverarbeitet.
2. Eine Tasse Kaffee zubereiten. Kaffee kann durch vielerlei Methoden und mit 
   verschiedenen Zusätzen wie Milch und Zucker zubereitet werden. Es gibt 
   Espresso, Filterkaffee, Kaffee aus der französischen Presse, Italienischer 
   Mokka, Türkischen Kaffee und vieles mehr. Finde deinen Lieblingsgeschmack.
3. Genieße.
```

Du kannst ein Video hinzufügen mit der [Youtube-Erweiterung](https://github.com/annaesvensson/yellow-youtube/tree/main/README-de.md):

```
---
Title: Kaffee ist gut für dich
Layout: wiki
Tag: Beispiel, Kaffee, Video
---
Kaffee ist ein Getränk aus gerösteten Bohnen der Kaffeepflanze.

1. Verwende frischen Kaffee. Kaffeebohnen fangen nach dem Rösten und Mahlen 
   sofort an, an Qualität zu verlieren. Den besten Kaffee erhält man, wenn 
   man die frisch gemahlenen Bohnen sofort weiterverarbeitet.
2. Eine Tasse Kaffee zubereiten. Kaffee kann durch vielerlei Methoden und mit 
   verschiedenen Zusätzen wie Milch und Zucker zubereitet werden. Es gibt 
   Espresso, Filterkaffee, Kaffee aus der französischen Presse, Italienischer 
   Mokka, Türkischen Kaffee und vieles mehr. Finde deinen Lieblingsgeschmack.
3. Genieße.

[youtube SUpY1BT9Xf4]
```

## Kopfzeile und Fußzeile anzeigen

Um eine Kopfzeile anzuzeigen, erstelle die Datei `content/shared/header.md`. Hier ist ein Beispiel:

```
---
Title: Header
Status: shared
---
Webseite ist im Aufbau.
```

Um eine Fußzeile anzuzeigen, erstelle die Datei `content/shared/footer.md`. Hier ist ein Beispiel:

```
---
Title: Footer
Status: shared
---
[Erstellt mit Datenstrom Yellow](https://datenstrom.se/de/yellow/).
```

## Funktionen, Sprachen und Themen hinzufügen

Es gibt [Erweiterungen für deine Webseite](https://github.com/datenstrom/yellow-extensions/tree/main/README-de.md) und eine [API für Entwickler](api-for-developers).

## Verwandte Informationen

* [Wie man eine Webseite im Webbrowser bearbeitet](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md)
* [Wie man eine Webseite auf dem Computer bearbeitet](https://github.com/annaesvensson/yellow-core/tree/main/README-de.md)
* [Wie man ein Wiki benutzt](https://github.com/annaesvensson/yellow-wiki/tree/main/README-de.md)

Hast du Fragen? [Hilfe finden](.).
