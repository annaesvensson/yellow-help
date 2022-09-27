---
Title: Wie man ein kleines Blog erstellt
---
Hier erfährst du, wie du dein Blog erstellst.

[toc]

## Erste Schritte

[Folge der Installationsanleitung](how-to-get-started), wähle `Kleines Blog` aus und klicke auf `Installieren`. Dein Blog ist sofort erreichbar. Die Installation kommt mit drei Seiten, "Startseite", "Blog" und "Über". Das ist nur ein Beispiel um loszulegen. Verändere alles so wie du willst. Du kannst Blogseiten im Webbrowser oder Texteditor bearbeiten. Mache was am besten in deinen Arbeitsablauf passt.

## Blogseiten bearbeiten

Falls du Blogseiten im Webbrowser bearbeiten möchtest, kannst du das auf deiner Webseite machen unter `http://website/edit/blog/`. Falls du Blogseiten auf deinem Computer bearbeiten möchtest, schau dir das `content/2-blog`-Verzeichnis an. Probier es einfach mal aus. Öffne die Datei `content/2-blog/2020-04-07-blog-example.md`. Ganz oben auf der Seite kannst du `Title` und andere [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ändern. Darunter kannst du [Text](how-to-change-the-content#text) und [Bilder](how-to-change-the-media#bilder) ändern. Hier ist ein Beispiel:

```
---
Title: Blog-Beispiel
Published: 2020-04-07
Author: Datenstrom
Layout: blog
Tag: Beispiel
---
Das ist eine Beispielseite fürs Blog.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 
```

Um eine neue Blogseite hinzuzufügen, erstellst du eine neue Datei im Blogverzeichnis. Ganz oben auf der Seite solltest du `Published` und weitere Einstellungen ändern. Datumsangaben erfolgen im Format JJJJ-MM-TT. Das Veröffentlichungsdatum wird zur Sortierung der Blogseiten verwendet. Mit `Tag` kann man ähnliche Seiten gruppieren. Hier ist ein weiteres Beispiel:

```
---
Title: Fika ist gut für dich
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Beispiel, Kaffee
---
Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der Menschen  
bei einer Tasse Kaffee oder Tee zusammenkommen. Das kann mit Arbeitskollegen  
sein oder du lädst Freunde dazu ein. Fika ist ein so bedeutender Teil vom 
schwedischen Alltag, dass es sowohl als Verb als auch als Nomen verwendet  
wird. Wie oft machst du Fika?
```

Du kannst ein Video hinzufügen mit der [Youtube-Erweiterung](https://github.com/datenstrom/yellow-extensions/tree/master/source/youtube/README-de.md):

```
---
Title: Fika ist gut für dich
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Beispiel, Kaffee, Video
---
Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der Menschen  
bei einer Tasse Kaffee oder Tee zusammenkommen. Das kann mit Arbeitskollegen  
sein oder du lädst Freunde dazu ein. Fika ist ein so bedeutender Teil vom 
schwedischen Alltag, dass es sowohl als Verb als auch als Nomen verwendet  
wird. Wie oft machst du Fika?

[youtube SUpY1BT9Xf4]
```

Du kannst `[--more--]` benutzen, um an der gewünschten Stelle einen Seitenumbruch zu erzeugen. Der Rest wird angezeigt, wenn ein Besucher auf die Blogseite klickt:

```
---
Title: Fika ist gut für dich
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Beispiel, Kaffee, Video
---
Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der Menschen  
bei einer Tasse Kaffee oder Tee zusammenkommen. Das kann mit Arbeitskollegen  
sein oder du lädst Freunde dazu ein. Fika ist ein so bedeutender Teil vom 
schwedischen Alltag, dass es sowohl als Verb als auch als Nomen verwendet  
wird. Wie oft machst du Fika? [--more--]

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

## Funktionen, Themen und Sprachen hinzufügen

Es gibt [Erweiterungen für deine Webseite](https://github.com/datenstrom/yellow-extensions/tree/master/README-de.md) und eine [API für Entwickler](api-for-developers).

## Verwandte Informationen

* [Wie man eine Webseite im Webbrowser bearbeitet](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit/README-de.md)
* [Wie man eine Webseite auf dem Computer bearbeitet](https://github.com/datenstrom/yellow-extensions/tree/master/source/core/README-de.md)
* [Wie man ein Blog benutzt](https://github.com/datenstrom/yellow-extensions/tree/master/source/blog/README-de.md)

Hast du Fragen? [Hilfe finden](.).
