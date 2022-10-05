---
Title: Richtlinien zum Zusammenarbeiten
---
Erfahre wie du mit uns zusammenarbeitest und gute Produkte machst.

## Wie man eine Frage stellt

* [Beginne eine neue Diskussion für jede Frage](https://github.com/datenstrom/yellow/discussions/categories/ask-a-question).
* Schreibe die Frage in den Titel, es ist das Erste was alle sehen.
* Beschreibe ausführlich was du machen möchtest und welche Probleme du hast.
* Wähle eine Antwort aus, wenn deine Frage beantwortet wurde.

## Wie man einen Fehler meldet

* [Beginne eine neue Diskussion für jeden Fehler](https://github.com/datenstrom/yellow/discussions/categories/report-a-bug).
* Erkläre wie man den Fehler reproduziert, überprüfe ob es jedesmal passiert.
* Füge viele Details hinzu, vor allem die Logdatei `system/extensions/yellow-website.log`.
* Wähle eine Antwort aus, wenn der Fehler behoben wurde.

## Wie man eine Erweiterung erstellt

* [Beginne mit einer Funktion](https://github.com/schulle4u/yellow-helloworld), [einer Sprache](https://github.com/annaesvensson/yellow-language/tree/main/translation/german) oder [einem Thema](https://github.com/annaesvensson/yellow-stockholm/tree/main/README-de.md).
* Denk darüber nach wie man das Leben einfacher macht, konzentriere dich auf Menschen und deren Alltag.
* Lade deine Erweiterung zu GitHub hoch, füge das Thema `datenstrom-yellow` zu deinem Repository hinzu.
* Mache eine Ankündigung, wenn deine Erweiterung fertig ist.

## Wie man Erfahrungen austauscht

Stelle Fragen, melde Fehler und tausche Erfahrungen aus. Es interessiert uns was du machen möchtest und welche Probleme du hast. Unsere Netzgemeinschaft ist ein Ort um sich gegenseitig zu helfen. Wo man Fragen stellen und beantworten kann. Die meisten Antworten werden von Mitgliedern, so wie du, bereitgestellt. Erzwinge nichts. Konzentriere dich auf die Menschen die Interesse zeigen und mit dir zusammenarbeiten wollen. Du findest uns auf [Discord](https://discord.gg/NYvTETsHS9), [GitHub](https://github.com/datenstrom), [Twitter](https://twitter.com/datenstromnews) oder [kontaktiere einen Menschen](https://datenstrom.se/de/contact/).

## Beispiele

Eine Frage auf Englisch stellen:

```
How do I change the language of my website?

Hello, during installation I selected the wrong language. Now I want to 
change the language of my website to german. When I change the settings 
it doesn't work. I checked that the german extension is installed. 
Here are my settings in file `system/extensions/yellow-system.ini`:

Sitename: Datenstrom Yellow
Author: Datenstrom
Email: webmaster
Language: german
Layout: default
Theme: stockholm

Thanks for your help.
```

Einen Fehler auf Englisch melden:

```
Call to undefined function detectTimezone()

Hello, I get the error message: Call to undefined function detectTimezone() 
in /var/www/website/system/extensions/fika.php. You can reproduce the bug 
in a new installation, select small website, install the fika extension. 
Here's my log file `system/extensions/yellow-website.log`:

2020-10-28 14:13:07 info Install Datenstrom Yellow 0.8.17, PHP 7.1.33, Apache 2.4.33, Mac
2020-10-28 14:13:07 info Install extension 'English 0.8.27'
2020-10-28 14:13:07 info Install extension 'German 0.8.27'
2020-10-28 14:13:07 info Install extension 'Swedish 0.8.27'
2020-10-28 14:18:11 info Install extension 'Fika 0.8.15'
2020-10-28 14:18:11 error Can't parse file 'system/extensions/fika.php'!

Let me know if you need more information. Thanks for investigating.
```

## Verwandte Informationen

* [Wie man eine Erweiterung erstellt](https://github.com/annaesvensson/yellow-publish/tree/main/README-de.md)
* [Wie man eine Übersetzung erstellt](https://github.com/annaesvensson/yellow-language/tree/main/README-de.md)
* [Wie man die Hilfe bearbeitet](https://github.com/annaesvensson/yellow-help/tree/main/README-de.md) 

Hast du Fragen? [Hilfe finden](.).
