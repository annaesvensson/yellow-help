---
Title: Hur man ändrar systemet
---
Alla systemfiler finns i `system` mappen. Du kan anpassa din webbplats här. 

``` box-drawing {aria-hidden=true}
├── content
├── media
└── system
    ├── extensions
    ├── layouts
    ├── themes
    └── workers
```

Mappen `system/extensions` innehåller konfigurationsfilar och loggfilen. Du kan justera utseendet på din webbplats i `system/layouts` mappen och `system/themes` mappen. Du kan ändra alla layouter och teman som du vill. Vissa kunskaper i HTML och CSS krävs. Det är bättre om man inte ändrar filer i `system/workers` mappen.

## Systeminställningar

Den centrala konfigurationsfilen är `system/extensions/yellow-system.ini`. Här är ett exempel: 

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Language: sv
    Layout: default
    Theme: stockholm
    Parser: markdown
    Status: public

Du kan använda [webbläsaren](https://github.com/annaesvensson/yellow-edit/tree/main/README-sv.md) eller din [dator](https://github.com/annaesvensson/yellow-core/tree/main/README-sv.md) för att ändra systeminställningar. Systeminställningarna innehåller inställningarna för din webbplats och för alla installerade tillägg. Följande inställningar kan konfigureras:

`Sitename` = webbplatsens namn  
`Author` = webmasterns namn  
`Email` = webmasterns email  
`Language` = standardspråk, t.ex. `sv`  
`Layout` = standardlayout  
`Theme` = standardtema  
`Parser` = standard innehållsparser  
`Status` = standard sidstatus, [stödda statusvärden](#inställningar-status)  

## Språkinställningar

Språkinställningar lagras i filen `system/extensions/yellow-language.ini`. Här är ett exempel:

    Language: sv
    CoreDescription: Kärnfunktionalitet på din webbplats.
    CorePaginationPrevious: ← Tidigare
    CorePaginationNext: Nästa →
    CoreTimeFormatShort: H:i
    CoreTimeFormatMedium: H:i:s
    CoreTimeFormatLong: H:i:s T
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: Y-m-d
    CoreDateFormatLong: Y-m-d H:i
    media/images/photo.jpg: Detta är en exempelbild

Du kan definiera språkinställningarna här. Ett språk består av `Language` och andra inställningar. Språkinställningarna innehåller språkinställningarna för din webbplats och för alla installerade tillägg. Du kan också lägga till dina egna språkinställningar i konfigurationsfilen, till exempel bildtexter.

## Användarinställningar

Användarinställningar lagras i filen `system/extensions/yellow-user.ini`. Här är ett exempel:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Utvecklare och formgivare
    Language: sv
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Home: /
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

Du kan använda [webbläsaren](https://github.com/annaesvensson/yellow-edit/tree/main/README-sv.md) eller [kommandoraden](https://github.com/annaesvensson/yellow-core/tree/main/README-sv.md) för att skapa nya användarkonton. Ett användarkonto består av `Email` och andra inställningar. Om du inte vill att sidorna ska ändras i en webbläsare begränsar du användarkonton. Öppna konfigurationsfilen, ändra `Access` och `Home`. Användare får redigera sidor på sin hemsida, men inte någon annanstans.

## Sidinställningar

Följande inställningar kan konfigureras högst upp på en sida:

`Title` = namn på sidan  
`TitleContent` = namn på sidan som visas i innehållet  
`TitleNavigation` = namn på sidan som visas i navigeringen  
`TitleHeader` = namn på sidan som visas i webbläsaren  
`TitleSlug` = namn för att spara sidan  
`Description` = sidans beskrivning  
`Author` = sidans författare, kommaseparerade  
`Email` = email av sidans författare  
`Language` = sidans språk, t.ex. `sv`  
`Layout` = sidans layout  
`LayoutNew` = sidans layout för att skapa en ny sida  
`Theme` = sidans tema  
`Parser` = sidans innehållsparser  
`Status` = sidans status, [stödda statusvärden](#inställningar-status)  
`Redirect` = omdirigera till en ny sida eller URL  
`Image` = sidans bild  
`ImageAlt` = beskrivning av sidans bild  
`Modified` = sidans ändringsdatum, ÅÅÅÅ-MM-DD format  
`Published` = sidans publiceringsdatum, ÅÅÅÅ-MM-DD format  
`Tag` = taggar för kategorisering av sidan, kommaseparerade  
`Generate` = alternativ för att generera en statisk webbplats, kommaseparerade  
`Comment` = alternativ för att visa kommentarer, kommaseparerade  

<a id="inställningar-status"></a>Följande sidstatusvärden stöds:

`public` = sidan är en vanlig sida  
`private` = sidan är inte synlig, användaren måste ange lösenord, [kräver private-tillägg](https://github.com/schulle4u/yellow-private)  
`draft` = sidan är inte synlig, användaren måste logga in, [kräver draft-tillägg](https://github.com/annaesvensson/yellow-draft/tree/main/README-sv.md)  
`unlisted` = sidan är inte synlig, men kan nås med rätt länk  
`shared` = sidan är inte synlig, men kan ingå i andra sidor  

## Webbplatsuppdatering

Du kan använda [webbläsaren](https://github.com/annaesvensson/yellow-update/tree/main/README-sv.md) eller [kommandoraden](https://github.com/annaesvensson/yellow-core/tree/main/README-sv.md) för att uppdatera din webbplats. Du bestämmer själv när du vill uppdatera din webbplats. Det finns också en [nyhetssida](what-s-new). Här hittar du information om senaste produktändringarna och publicerade tillägg. Detaljerad information finns i dokumentationen för respektive tillägg.

## Loggfilen

Loggfilen finns i filen `system/extensions/yellow-website.log`. Här är ett exempel:

```
2024-04-28 14:13:07 info Install Datenstrom Yellow 0.9, PHP 8.1.27, Apache 2.4.33, Linux
2024-04-28 14:13:07 info Install extension 'Core 0.9.9'
2024-04-28 14:13:07 info Install extension 'Markdown 0.9.1'
2024-04-28 14:13:07 info Install extension 'Stockholm 0.9.2'
2024-04-28 14:13:07 info Install extension 'English 0.9.2'
2024-04-28 14:13:07 info Install extension 'German 0.9.2'
2024-04-28 14:13:07 info Install extension 'Swedish 0.9.2'
2024-04-28 14:23:11 info Install extension 'Fika 0.9.1'
2024-04-28 14:23:11 error Process file 'system/workers/fika.php' with fatal error!
```

Har du några frågor? [Få hjälp](.).
