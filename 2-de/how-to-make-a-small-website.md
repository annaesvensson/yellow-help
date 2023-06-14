---
Title: Wie man eine kleine Webseite erstellt
---
Hier erfährst du, wie du deine Webseite erstellst.

[toc]

## Erste Schritte

[Folge der Installationsanleitung](how-to-get-started), wähle `Kleine Webseite` aus und klicke auf `Installieren`. Deine Webseite ist sofort erreichbar. Die Installation kommt mit zwei Seiten, "Startseite" und "Über". Das ist nur ein Beispiel um loszulegen. Verändere alles so wie du willst. Du kannst Webseiten im Webbrowser oder Texteditor bearbeiten. Mache was am besten in deinen Arbeitsablauf passt.

## Webseiten bearbeiten

Falls du Webseiten im Webbrowser bearbeiten möchtest, kannst du das auf deiner Webseite machen unter `http://website/edit/`. Falls du Webseiten auf deinem Computer bearbeiten möchtest, schau dir das `content`-Verzeichnis an. Probier es einfach mal aus. Öffne die Datei `content/1-home/page.md`. Ganz oben auf der Seite kannst du `Title` und andere [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ändern. Darunter kannst du [Text](how-to-change-the-content#text) und [Bilder](how-to-change-the-media#bilder) ändern. Hier ist ein Beispiel:

```
---
Title: Startseite
---
[image photo.jpg Beispiel rounded]

[edit - Du kannst diese Seite im Webbrowser bearbeiten] oder einen Texteditor benutzen.  
[Hilfe finden](https://datenstrom.se/de/yellow/help/).
```

Um eine neue Seite hinzuzufügen, erstelle eine neue Datei im Home-Verzeichnis oder in einem anderen `content`-Verzeichnis:

```
---
Title: Beispielseite
---
Das ist eine Beispielseite.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
```

Du kannst Textformatierung hinzufügen:

```
---
Title: Beispielseite
---
Das ist eine Beispielseite.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.

Normal **Fettschrift** *Kursiv* ~~Durchgestrichen~~ `Code`
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

## Funktionen, Sprachen und Themes hinzufügen

Es gibt [Erweiterungen für deine Webseite](https://github.com/datenstrom/yellow-extensions/tree/main/README-de.md) und eine [API für Entwickler](api-for-developers).

## Verwandte Informationen

* [Wie man eine Webseite im Webbrowser bearbeitet](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md)
* [Wie man eine Webseite auf dem Computer bearbeitet](https://github.com/annaesvensson/yellow-core/tree/main/README-de.md)
* [Wie man eine statische Webseite generiert](https://github.com/annaesvensson/yellow-generate/tree/main/README-de.md)

Hast du Fragen? [Hilfe finden](.).
