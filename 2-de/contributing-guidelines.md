---
Title: Richtlinien zum Zusammenarbeiten
---
Erfahre wie du mit uns arbeiten und Probleme lösen kannst.

## Wie man mit uns arbeitet

* Stell dir vor was der Benutzer machen möchte und was das Leben einfacher machen würde.
* Strebe die kleinstmögliche Lösung an, erst funktionieren lassen dann besser machen.
* Frage dich selbst, brauche ich das, will ich das, kann ich das besser machen?
* Verbessere die verfügbaren Erweiterungen und mache sie nützlicher.

Falls du mit uns arbeiten willst, [erstelle eine Erweiterung](https://datenstrom.se/de/yellow/extensions/) oder [erstelle eine Übersetzung](how-to-customise-a-language#erstelle-eine-übersetzung).

## Wie man eine Frage stellt

* Schreibe die Frage in den Titel, es ist das Erste was alle sehen.
* Beschreibe möglichst genau was du machen möchtest und welche Probleme du hast.
* Füge ein Beispiel hinzu, beispielsweise Markdown, Einstellungen oder deinen Quellcode.
* Wähle eine Antwort aus, wenn deine Frage beantwortet wurde.

Falls du eine Frage stellen willst, [beginne eine neue Diskussion](https://github.com/datenstrom/yellow/discussions/categories/ask-a-question).

## Wie man einen Fehler meldet

* Erkläre wie man den Fehler reproduziert, mit so vielen Informationen wie du hast.
* Zeige die Fehlermeldung an, am besten kopierst du was du auf dem Bildschirm siehst.
* Füge viele Details hinzu, vor allem die Logdatei `system/extensions/yellow-website.log`.
* Wähle eine Antwort aus, wenn der Fehler behoben wurde.

Falls du einen Fehler melden willst, [beginne eine neue Diskussion](https://github.com/datenstrom/yellow/discussions/categories/report-a-bug).

## Gut zu wissen

Arbeite mit uns, stelle Fragen und melde Fehler. Es interessiert uns was du machen möchtest und welche Probleme du hast. Je mehr wir wissen, desto besser können wir dir helfen. Unsere Netzgemeinschaft ist ein Ort um sich gegenseitig zu helfen. Wo man Fragen stellen und beantworten kann. Die meisten Antworten werden von Mitgliedern, so wie du, bereitgestellt. Verwende einen Online-Übersetzer, falls Englisch nicht deine Muttersprache ist. Erzwinge nichts. Du kannst aus Diskussionen jederzeit aussteigen, falls es nicht konstruktiv verläuft. Konzentriere dich auf die Menschen die Interesse zeigen und mit dir zusammenarbeiten wollen. Bedanke dich bei den Menschen die dir den richtigen Weg zeigen und hilfreiche Antworten schreiben.

Du findest uns auf [GitHub](https://github.com/datenstrom), [Discord](https://discord.gg/NYvTETsHS9) oder [kontaktiere einen Menschen](https://datenstrom.se/de/contact/).

## Beispiele

Eine Frage über Einstellungen stellen:

    Title: How do I change the language of my website?
    
    Hello, during installation I selected the wrong language. Now I want to 
    change the language of my website to English. When I change the settings 
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

Eine Frage über Layoutdateien stellen:

    Title: How do I show the correct date in layout files?
    
    Hello, I want to show the date a page was last updated, similar to what 
    is shown on wiki pages. I am having some problems with the API, no matter 
    what I do, the generated HTML code always shows the date 1970-01-01.
    Here is my layout file `system/layouts/default.html`:
    
    ```
    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <p>Last updated on <?php echo $this->yellow->page->getDateHtml("updated") ?></p>
    <?php echo $this->yellow->page->getContentHtml() ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>
    ```
    
    Let me know if you need more information. Thanks for your help.

Einen Fehler zusammen mit der Logdatei zu melden:

    Title: Call to undefined function detectCoffee()
    
    Hello, I get the error message: Call to undefined function detectCoffee() 
    in /var/www/website/system/workers/fika.php. You can reproduce the bug 
    in a new installation, select small website, install the fika extension. 
    Here is my log file `system/extensions/yellow-website.log`:
    
    ```
    2024-04-28 14:13:07 info Install Datenstrom Yellow 0.9, PHP 8.1.27, Apache 2.4.33, Mac
    2024-04-28 14:13:07 info Install extension 'Core 0.9.9'
    2024-04-28 14:13:07 info Install extension 'Markdown 0.9.1'
    2024-04-28 14:13:07 info Install extension 'Stockholm 0.9.2'
    2024-04-28 14:13:07 info Install extension 'English 0.9.2'
    2024-04-28 14:13:07 info Install extension 'German 0.9.2'
    2024-04-28 14:13:07 info Install extension 'Swedish 0.9.2'
    2024-04-28 14:23:11 info Install extension 'Fika 0.9.1'
    2024-04-28 14:23:11 error Process file 'system/workers/fika.php' with fatal error!
    ```
    
    Let me know if you need more information. Thanks for investigating.

## Verwandte Informationen

* [Wie man eine Erweiterung erstellt](https://github.com/annaesvensson/yellow-publish/tree/main/README-de.md)
* [Wie man eine Übersetzung erstellt](https://github.com/annaesvensson/yellow-language/tree/main/README-de.md)
* [Wie man die Hilfe verbessert](https://github.com/annaesvensson/yellow-help/tree/main/README-de.md) 

Hast du Fragen? [Hilfe finden](.).
