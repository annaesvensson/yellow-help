---
Title: Riktlinjer för samarbete
---
Läs hur du ställer frågor, rapporterar fel och jobbar med oss.

## Hur man ställer en fråga

* Skriv frågan i rubriken, det är det första alla kommer att se.
* Beskriv så exakt som möjligt vad du vill göra och vilka problem du har.
* Lägg till ett exempel, till exempel Markdown, inställningar eller din källkod.
* Välj ett svar när din fråga har besvarats.

Om du vill ställa en fråga, [starta en ny diskussion](https://github.com/datenstrom/community/discussions/categories/ask-a-question).

## Hur man rapporterar ett fel

* Förklara hur man återskapar felet, med så mycket information som du har.
* Visa felmeddelandet, det är bäst att kopiera det du ser på skärmen.
* Lägg till många detaljer, särskilt loggfilen `system/extensions/yellow-website.log`.
* Välj ett svar när felet har åtgärdats.

Om du vill rapportera ett fel, [starta en ny diskussion](https://github.com/datenstrom/community/discussions/categories/report-a-bug).

## Hur man jobbar med oss

* Föreställ dig vad användaren vill göra och vad som skulle göra livet enklare.
* Sikta på minsta möjliga lösning, först få det att fungera och sedan gör det bättre.
* Fråga dig själv, behöver jag det här, vill jag det här, kan jag göra det här bättre?
* Förbättra tillgängliga tilläggen och gör dem mer användbara.

## Bra att veta

Jobba med oss, ställ frågor och rapportera fel. Vi är intresserade av vad du vill göra och vilka problem du har. Ju mer vi vet, desto bättre. Vår nätgemenskap är en plats att hjälpa varandra. Där du kan ställa och svara på frågor. De flesta av svaren tillhandahålls av medlemmar, precis som du. Använd en onlineöversättare om engelska inte är ditt modersmål. Tvinga ingenting. Du kan lämna diskussioner när som helst om dialogen inte är konstruktiv. Fokusera på människor som visa intresse och vill jobba tillsammans med dig. Tacka människor som pekar dig i rätt riktning och som skriver användbara svar. 

Du hittar oss på [GitHub](https://github.com/datenstrom), [Discord](https://discord.gg/NYvTETsHS9) eller [kontakta en människa](https://datenstrom.se/sv/contact/).

## Exempel

Ställa en fråga om inställningar:

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

Ställa en fråga om layoutfiler:

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

Rapportera ett fel tillsammans med loggfilen:

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

## Relaterad information

* [Hur man gör ett tillägg](https://github.com/annaesvensson/yellow-publish/tree/main/README-sv.md)
* [Hur man gör en översättning](https://github.com/annaesvensson/yellow-language/tree/main/README-sv.md)
* [Hur man förbättrar hjälpen](https://github.com/annaesvensson/yellow-help/tree/main/README-sv.md) 

Har du några frågor? [Få hjälp](.).
