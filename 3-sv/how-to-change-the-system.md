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
    └── trash
```

Mappen `system/extensions` innehåller installerade tillägg och konfigurationsfilar. Du kan justera utseendet på din webbplats i `system/layouts` mappen och `system/themes` mappen. Du kan ändra layouter och teman som du vill, vissa kunskaper i HTML, CSS och JavaScript krävs. Mappen `system/trash` innehåller raderade filer.

## Systeminställningar

Den centrala konfigurationsfilen är `system/extensions/yellow-system.ini`. Här är ett exempel: 

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Layout: default
    Theme: stockholm
    Language: sv
    Parser: markdown
    Status: public

Du kan använda [webbläsaren](https://github.com/annaesvensson/yellow-edit/tree/main/README-sv.md) eller din [dator](https://github.com/annaesvensson/yellow-core/tree/main/README-sv.md) för att ändra systeminställningar. Systeminställningarna innehåller inställningarna för din webbplats och för alla tillägg. Efter en ny installation var noga med att kontrollera `Sitename`, `Author` och `Email`. Följande inställningar kan konfigureras:

`Sitename` = webbplatsens namn  
`Author` = webmasterns namn  
`Email` = webmasterns email  
`Layout` = standardlayout  
`Theme` = standardtema  
`Language` = standardspråk  
`Parser` = standard sidparser  
`Status` = standard sidstatus, [stödda statusvärden](#inställningar-status)  

## Användarinställningar

Användarinställningar lagras i filen `system/extensions/yellow-user.ini`. Här är ett exempel:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Formgivare
    Language: sv
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Home: /
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

Du kan använda [webbläsaren](https://github.com/annaesvensson/yellow-edit/tree/main/README-sv.md) eller [kommandoraden](https://github.com/annaesvensson/yellow-command/tree/main/README-sv.md) för att skapa nya användarkonton. Ett användarkonto består av `Email` och andra inställningar. Om du inte vill att sidorna ska ändras i en webbläsare begränsar du användarkonton. Öppna konfigurationsfilen, ändra `Access` och `Home`. Användare får redigera sidor på sin hemsida, men inte någon annanstans.

## Språkinställningar

Språkinställningar lagras i filen `system/extensions/yellow-language.ini`. Här är ett exempel:

    Language: sv
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: Y-m-d
    CoreDateFormatLong: Y-m-d H:i
    EditMailFooter: @sitename
    ImageDefaultAlt: Bild utan beskrivning
    media/images/photo.jpg: Detta är en exempelbild

Du kan definiera språkinställningarna här. Ett språk består av `Language` och andra inställningar. Du kan kopiera [standardinställningarna från språkfiler](https://github.com/annaesvensson/yellow-language/blob/main/translation/swedish/swedish.txt) och klistra in dem i konfigurationsfilen. Du kan också lägga till dina egna språkinställningar i konfigurationsfilen, till exempel bildtexter.

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
`Layout` = sidans layout  
`LayoutNew` = sidans layout för att skapa en ny sida  
`Theme` = sidans tema  
`Language` = sidans språk  
`Parser` = sidans parser  
`Status` = sidans status, [stödda statusvärden](#inställningar-status)  
`Redirect` = omdirigera till en ny sida eller URL  
`Image` = sidans bild  
`ImageAlt` = beskrivning av sidans bild  
`Modified` = sidans ändringsdatum, ÅÅÅÅ-MM-DD format  
`Published` = sidans publiceringsdatum, ÅÅÅÅ-MM-DD format  
`Tag` = taggar för kategorisering av sidan, kommaseparerade  
`Build` = alternativ för att bygga en statisk webbplats, kommaseparerade  
`Comment` = alternativ för att visa kommentarer, kommaseparerade  

<a id="inställningar-status"></a>Följande sidstatusvärden stöds:

`public` = sidan är en vanlig sida  
`private` = sidan är inte synlig, användaren måste ange lösenord, [kräver private-tillägg](https://github.com/schulle4u/yellow-extensions-schulle4u/tree/main/private)  
`draft` = sidan är inte synlig, användaren måste logga in, [kräver draft-tillägg](https://github.com/annaesvensson/yellow-draft/tree/main/README-sv.md)  
`unlisted` = sidan är inte synlig, men kan nås med rätt länk  
`shared` = sidan är inte synlig, men kan ingå i andra sidor  

Har du några frågor? [Få hjälp](.).
