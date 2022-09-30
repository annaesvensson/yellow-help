---
Title: Riktlinjer för samarbete
---
Läs hur du jobbar med oss och skapar bra produkter.

## Hur man ställer en fråga

* [Starta en ny diskussion för varje fråga](https://github.com/datenstrom/yellow/discussions/categories/ask-a-question).
* Skriv frågan i rubriken, det är det första alla kommer att se.
* Beskriv i detalj vad du vill göra och vilka problem du har.
* Välj ett svar när din fråga har besvarats.

## Hur man rapporterar ett fel

* [Starta en ny diskussion för varje fel](https://github.com/datenstrom/yellow/discussions/categories/report-a-bug).
* Förklara hur man återskapar felet, kolla om det händer varje gång.
* Lägg till många detaljer, särskilt loggfilen `system/extensions/yellow-website.log`.
* Välj ett svar när felet har åtgärdats.

## Hur man gör ett tillägg

* [Börja med en exempel-funktion](https://github.com/schulle4u/yellow-extension-helloworld), ett [exempel-språk](https://github.com/annaesvensson/yellow-language/tree/main/translation/swedish) eller ett [exempel-tema](https://github.com/schulle4u/yellow-extension-basic).
* Tänk på hur man gör livet enklare, fokusera på människor och deras vardag.
* Ladda upp ditt tillägg till GitHub, lägg till ämnet `datenstrom-yellow` till ditt repository.
* Gör ett tillkännagivande och visa vad du har gjort när ditt tillägg är klart.

## Hur man utbyter erfarenheter

Ställ frågor, rapportera fel och utbyt erfarenheter. Vi är intresserade av vad du vill göra och vilka problem du har. Ju mer vi vet desto bättre kan vi hjälpa till. Vår nätgemenskap är en plats att hjälpa varandra. Där du kan ställa och svara på frågor. De flesta av svaren tillhandahålls av medlemmar, precis som du. Tvinga ingenting. Fokusera på människor som visa intresse och vill jobba med dig. Du hittar oss på [Discord](https://discord.gg/NYvTETsHS9), [GitHub](https://github.com/datenstrom), [Twitter](https://twitter.com/datenstromnews) eller [kontakta en människa](https://datenstrom.se/sv/contact/).

## Exempel

Ställa en fråga på engelska:

```
How do I change the language of my website?

Hello, during installation I selected the wrong language. Now I want to 
change the language of my website to swedish. When I change the settings 
it doesn't work. I checked that the swedish extension is installed. 
Here are my settings in file `system/extensions/yellow-system.ini`:

Sitename: Datenstrom Yellow
Author: Datenstrom
Email: webmaster
Layout: default
Theme: stockholm
Language: swedish

Thanks for your help.
```

Rapportera ett fel på engelska:

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

## Relaterad information

* [Hur man gör ett tillägg](https://github.com/annaesvensson/yellow-publish/tree/main/README-sv.md)
* [Hur man gör en översättning](https://github.com/annaesvensson/yellow-language/tree/main/README-sv.md)
* [Hur man redigerar hjälpen](https://github.com/annaesvensson/yellow-help/tree/main/README-sv.md) 

Har du några frågor? [Få hjälp](.).
