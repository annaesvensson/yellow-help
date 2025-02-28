---
Title: Wie man ein kleines Blog macht
---
Hier erfährst du, wie du dein Blog machst.

[toc]

## Erste Schritte

[Folge der Installationsanleitung](how-to-get-started), wähle `Kleines Blog` aus und klicke auf `Installieren`. Dein Blog ist sofort erreichbar. Die Installation kommt mit drei Seiten, "Startseite", "Blog" und "Über". Das ist nur ein Beispiel um loszulegen. Verändere alles so wie du willst. Du kannst Blogseiten im Webbrowser oder Texteditor bearbeiten. Mache was am besten in deinen Arbeitsablauf passt.

## Blogseiten bearbeiten

Falls du Blogseiten im Webbrowser bearbeiten möchtest, kannst du das auf deiner Webseite machen unter `http://website/edit/blog/`. Falls du Blogseiten auf deinem Computer bearbeiten möchtest, schau dir das `content/3-blog`-Verzeichnis an. Probier es einfach mal aus. Öffne die Datei `content/3-blog/2020-04-07-blog-example.md`. Ganz oben auf der Seite kannst du `Title` und andere [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ändern. Darunter kannst du [Text](how-to-change-the-content#text) und [Bilder](how-to-change-the-media#bilder) ändern. Hier ist ein Beispiel:

```
---
Title: Blog-Beispielseite
Published: 2020-04-07
Author: Datenstrom
Layout: blog
Tag: Beispiel
---
Das ist eine Beispielseite.

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

Du kannst ein Foto hinzufügen mit der [Image-Erweiterung](https://github.com/annaesvensson/yellow-image/tree/main/README-de.md):

```
---
Title: Fika ist gut für dich
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Beispiel, Kaffee, Foto
---
Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der Menschen  
bei einer Tasse Kaffee oder Tee zusammenkommen. Das kann mit Arbeitskollegen  
sein oder du lädst Freunde dazu ein. Fika ist ein so bedeutender Teil vom 
schwedischen Alltag, dass es sowohl als Verb als auch als Nomen verwendet  
wird. Wie oft machst du Fika?

[image photo.jpg "Dies ist ein Beispielbild"]
```

Du kannst `[--more--]` benutzen, um an der gewünschten Stelle einen Seitenumbruch zu erzeugen. Der Rest wird angezeigt, wenn ein Besucher auf die Blogseite klickt:

```
---
Title: Fika ist gut für dich
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Beispiel, Kaffee, Foto
---
Fika ist ein schwedischer Brauch. Es ist eine Kaffeepause, bei der Menschen  
bei einer Tasse Kaffee oder Tee zusammenkommen. Das kann mit Arbeitskollegen  
sein oder du lädst Freunde dazu ein. Fika ist ein so bedeutender Teil vom 
schwedischen Alltag, dass es sowohl als Verb als auch als Nomen verwendet  
wird. Wie oft machst du Fika? [--more--]

[image photo.jpg "Dies ist ein Beispielbild"]
```

## Kopfzeile und Fußzeile anzeigen

Um eine Kopfzeile anzuzeigen, erstelle die Datei `content/shared/header.md`. Hier ist ein Beispiel:

```
---
Title: Header
---
Webseite ist im Aufbau.
```

Um eine Fußzeile anzuzeigen, erstelle die Datei `content/shared/footer.md`. Hier ist ein Beispiel:

```
---
Title: Footer
---
[Erstellt mit Datenstrom Yellow](https://datenstrom.se/de/yellow/).
```

## Funktionen, Sprachen und Themes hinzufügen

Es gibt [Erweiterungen für deine Webseite](https://datenstrom.se/de/yellow/extensions/) und eine [API für Entwickler](api-for-developers).

## Verwandte Informationen

* [Wie man eine Webseite im Webbrowser bearbeitet](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md)
* [Wie man eine Webseite auf dem Computer bearbeitet](https://github.com/annaesvensson/yellow-core/tree/main/README-de.md)
* [Wie man ein Blog benutzt](https://github.com/annaesvensson/yellow-blog/tree/main/README-de.md)

Hast du Fragen? [Hilfe finden](.).
