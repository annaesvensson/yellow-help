---
Title: Richtlinien zum Zusammenarbeiten
---
Erfahre wie du mit uns arbeiten und Probleme lösen kannst.

## Wie man mit uns arbeitet

* [Verbessere Funktionen, Sprachen, Themes](https://github.com/datenstrom/yellow-extensions/tree/main/README-de.md) und [erstelle deine eigene Erweiterung](https://github.com/annaesvensson/yellow-publish/tree/main/README-de.md).
* Stell dir vor was das Leben einfacher machen würde und was der Benutzer machen möchte.
* Strebe die kleinstmögliche Lösung an, erst funktionieren lassen dann besser machen.
* Frage dich selbst, brauche ich das, will ich das, kann ich das besser machen?

## Wie man eine Frage stellt

* [Beginne eine neue Diskussion für jede Frage](https://github.com/datenstrom/yellow/discussions/categories/ask-a-question).
* Schreibe die Frage in den Titel, es ist das Erste was alle sehen.
* Beschreibe möglichst genau was du machen möchtest und welche Probleme du hast.
* Wähle eine Antwort aus, wenn deine Frage beantwortet wurde.

## Wie man einen Fehler meldet

* [Beginne eine neue Diskussion für jeden Fehler](https://github.com/datenstrom/yellow/discussions/categories/report-a-bug).
* Erkläre wie man den Fehler reproduziert, überprüfe ob es jedesmal passiert.
* Füge viele Details hinzu, vor allem die Logdatei `system/extensions/yellow-website.log`.
* Wähle eine Antwort aus, wenn der Fehler behoben wurde.

## Gut zu wissen

Wir machen Dingen für Menschen. Arbeite mit uns, stelle Fragen und melde Fehler. Es interessiert uns was du machen möchtest und welche Probleme du hast. Je mehr wir wissen, desto besser können wir dir helfen. Unsere Netzgemeinschaft ist ein Ort um sich gegenseitig zu helfen. Wo man Fragen stellen und beantworten kann. Die meisten Antworten werden von Mitgliedern, so wie du, bereitgestellt. Erzwinge nichts. Konzentriere dich auf die Menschen die Interesse zeigen und mit dir zusammenarbeiten wollen. Du findest uns auf [Discord](https://discord.gg/NYvTETsHS9), [GitHub](https://github.com/datenstrom) oder [kontaktiere einen Menschen](https://datenstrom.se/de/contact/).

## Beispiele

Eine Frage über Einstellungen stellen, auf Englisch:

    Title: How do I change the language of my website?
    
    Hello, during installation I selected the wrong language. Now I want to 
    change the language of my website to english. When I change the settings 
    it doesn't work. I checked that the english extension is installed. 
    Here are my settings in file `system/extensions/yellow-system.ini`:
    
    ```
    Sitename: Datenstrom Yellow
    Author: Datenstrom
    Email: webmaster
    Language: english
    Layout: default
    Theme: stockholm
    ```
    
    Let me know if you need more information. Thanks for your help.

Eine Frage über Layoutdateien stellen, auf Englisch:

    Title: How do I show the correct date in layout files?
    
    Hello, I want to show the date a page was last updated, similar to what 
    is shown on wiki pages. I am currently having some problems with the API, 
    the generated HTML code always shows the date 1970-01-01.
    Here is my layout file `system/layouts/default.html`:
    
    ```
    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <p>Last updated on <?php echo $this->yellow->page->getDateHtml("updated") ?></p>
    <?php echo $this->yellow->page->getContent() ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>
    ```
    
    Let me know if you need more information. Thanks for your help.

Einen Fehler zusammen mit der Logdatei melden, auf Englisch:

    Title: Call to undefined function detectCoffee()
    
    Hello, I get the error message: Call to undefined function detectCoffee() 
    in /var/www/website/system/extensions/fika.php. You can reproduce the bug 
    in a new installation, select small website, install the fika extension. 
    Here is my log file `system/extensions/yellow-website.log`:
    
    ```
    2020-10-28 14:13:07 info Install Datenstrom Yellow 0.8.17, PHP 8.0.24, Apache 2.4.33, Mac
    2020-10-28 14:13:07 info Install extension 'Core 0.8.41'
    2020-10-28 14:13:07 info Install extension 'Markdown 0.8.19'
    2020-10-28 14:13:07 info Install extension 'Stockholm 0.8.13'
    2020-10-28 14:13:07 info Install extension 'English 0.8.27'
    2020-10-28 14:13:07 info Install extension 'German 0.8.27'
    2020-10-28 14:13:07 info Install extension 'Swedish 0.8.27'
    2020-10-28 14:18:11 info Install extension 'Fika 0.8.15'
    2020-10-28 14:18:11 error Can't parse file 'system/extensions/fika.php'!
    ```
    
    Let me know if you need more information. Thanks for investigating.

## Verwandte Informationen

* [Wie man eine Erweiterung erstellt](https://github.com/annaesvensson/yellow-publish/tree/main/README-de.md)
* [Wie man eine Übersetzung erstellt](https://github.com/annaesvensson/yellow-language/tree/main/README-de.md)
* [Wie man die Hilfe verbessert](https://github.com/annaesvensson/yellow-help/tree/main/README-de.md) 

Hast du Fragen? [Hilfe finden](.).
