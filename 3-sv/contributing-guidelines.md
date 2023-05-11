---
Title: Riktlinjer för samarbete
---
Läs hur du jobbar med oss och löser problem.

## Hur man jobbar med oss

* [Förbättra funktioner, språk, teman](https://github.com/datenstrom/yellow-extensions/tree/main/README-sv.md) och [gör ditt eget tillägg](https://github.com/annaesvensson/yellow-publish/tree/main/README-sv.md).
* Föreställ dig vad som skulle göra livet enklare och vad användaren vill göra.
* Sikta på minsta möjliga lösning, först få det att fungera och sedan gör det bättre.
* Fråga dig själv, behöver jag det här, vill jag det här, kan jag göra det här bättre?

## Hur man ställer en fråga

* [Starta en ny diskussion för varje fråga](https://github.com/datenstrom/yellow/discussions/categories/ask-a-question).
* Skriv frågan i rubriken, det är det första alla kommer att se.
* Beskriv så exakt som möjligt vad du vill göra och vilka problem du har.
* Välj ett svar när din fråga har besvarats.

## Hur man rapporterar ett fel

* [Starta en ny diskussion för varje fel](https://github.com/datenstrom/yellow/discussions/categories/report-a-bug).
* Förklara hur man återskapar felet, kolla om det händer varje gång.
* Lägg till många detaljer, särskilt loggfilen `system/extensions/yellow-website.log`.
* Välj ett svar när felet har åtgärdats.

## Bra att veta

Vi gör saker för människor. Jobba med oss, ställ frågor och rapportera fel. Vi är intresserade av vad du vill göra och vilka problem du har. Ju mer vi vet desto bättre kan vi hjälpa till. Vår nätgemenskap är en plats att hjälpa varandra. Där du kan ställa och svara på frågor. De flesta av svaren tillhandahålls av medlemmar, precis som du. Tvinga ingenting. Fokusera på människor som visa intresse och vill jobba med dig. Du hittar oss på [Discord](https://discord.gg/NYvTETsHS9), [GitHub](https://github.com/datenstrom) eller [kontakta en människa](https://datenstrom.se/sv/contact/).

## Exempel

Ställa en fråga om inställningar, på engelska:

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

Ställa en fråga om layoutfiler, på engelska:

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

Rapportera ett fel tillsammans med loggfilen, på engelska:

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

## Relaterad information

* [Hur man gör ett tillägg](https://github.com/annaesvensson/yellow-publish/tree/main/README-sv.md)
* [Hur man gör en översättning](https://github.com/annaesvensson/yellow-language/tree/main/README-sv.md)
* [Hur man förbättrar hjälpen](https://github.com/annaesvensson/yellow-help/tree/main/README-sv.md) 

Har du några frågor? [Få hjälp](.).
