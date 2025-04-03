---
Title: API för utvecklare
---
Vi <3 människor som kodar.

[toc]

## Mappstruktur

Du kan redigera din webbplats i textredigeraren. Mappen `content` innehåller webbplatsens [innehållsfilerna](how-to-change-the-content). Du kan redigera din webbplats här. Mappen `media` innehåller webbplatsens [mediefilerna](how-to-change-the-media). Du kan lagra dina bilder och filer här. Mappen `system` innehåller webbplatsens [systemfilerna](how-to-change-the-system). Du kan hitta konfigurationsfilar här.

``` box-drawing {aria-hidden=true}
├── content               = innehållsfiler
│   ├── 1-home            = hemsida
│   ├── 9-about           = informationssida
│   └── shared            = delade filer
├── media                 = mediefiler
│   ├── downloads         = filer för nedladdning
│   ├── images            = bildfiler för innehåll
│   └── thumbnails        = miniatyrbilder för innehåll
└── system                = systemfiler
    ├── extensions        = konfigurerbara tilläggsfiler, till exempel INI
    ├── layouts           = konfigurerbara layoutfiler, till exempel HTML
    ├── themes            = konfigurerbara temafiler, till exempel CSS
    └── workers           = filer for utvecklare, formgivare och översättare
```

Följande filer är viktiga, det är bäst att ta en närmare titt på dem:

`system/extensions/yellow-system.ini` = [fil med systeminställningar](how-to-change-the-system#systeminställningar)  
`system/extensions/yellow-language.ini` = [fil med språkinställningar](how-to-change-the-system#språkinställningar)  
`system/extensions/yellow-user.ini` = [fil med användarinställningar](how-to-change-the-system#användarinställningar)  
`system/extensions/yellow-website.log` = [loggfilen för webbplatsen](how-to-change-the-system#loggfilen)  

## Verktyg

### Nättredigerare

Du kan redigera din webbplats i en webbläsare. Inloggningssidan är tillgänglig på din webbplats som `http://website/edit/`. Logga in med ditt användarkonto. Du kan använda vanliga navigeringen, göra ändringar och se resultatet omedelbart. Nättredigeraren ger dig möjlighet att redigera innehållsfiler och ladda upp mediefiler. Det är ett utmärkt sätt att uppdatera webbsidor. Textformatering med Markdown stöds. HTML stöds också. [Läs mer om nättredigeraren](https://github.com/annaesvensson/yellow-edit/tree/main/README-sv.md).

### Webbserver

Du kan starta en webbserver på kommandoraden. Den inbyggda webbservern är praktisk för utvecklare, formgivare och översättare. Detta ger dig möjlighet att se din webbplats på din dator och ladda upp den till din webbserver senare. Öppna ett terminalfönster. Gå till installationsmappen där filen `yellow.php` finns. Skriv `php yellow.php serve`, du kan valfritt ange en URL. Öppna en webbläsare och gå till URL:en som visas. [Läs mer om webbservern](https://github.com/annaesvensson/yellow-serve/tree/main/README-sv.md).

### Statisk generator

Du kan generera en statisk webbplats på kommandoraden. Den static-site-generatorn skapar hella webbplatsen i förväg, istället för att vänta på att en fil ska begäras. Öppna ett terminalfönster. Gå till installationsmappen där filen `yellow.php` finns. Skriv `php yellow.php generate`, du kan valfritt ange en mapp och en plats. Detta kommer att generera en statisk webbplats i `public` mappen. Ladda upp statiska webbplatsen till din webbserver och generera en ny när det behövs. [Läs mer om statiska generatorn](https://github.com/annaesvensson/yellow-generate/tree/main/README-sv.md).

### Kommandorad

Du kan köra kommandon från kommandoraden. Detta ger dig möjlighet att till exempel starta en webbserver, generera en statisk webbplats och uppdatera en webbplats. De tillgängliga kommandona beror på installerade tillägg. Öppna ett terminalfönster. Gå till installationsmappen där filen yellow.php finns. Skriv php yellow.php för att visa tillgängliga kommandona. [Läs mer om kommandoraden](https://github.com/annaesvensson/yellow-core/tree/main/README-sv.md).

## Objekt

Med hjälp av API:et har du tillgång till filsystemet, inställningar och tillägg. API:et är uppdelat i flera objekt och speglar i princip filsystemet. Det finns `$this->yellow->content` för att komma åt innehållsfiler, `$this->yellow->media` för att komma åt mediafiler och `$this->yellow->system` för att komma åt systeminställningar. Källkoden för hela API:et finns i filen `system/workers/core.php`.

``` box-drawing {aria-hidden=true}
┌────────────────────────────────────────────────────────────────────────────┐
│ API                                                                        │
│                                                                            │
│ $this->yellow            $this->yellow->system    $this->yellow->extension │
│ $this->yellow->content   $this->yellow->language  $this->yellow->lookup    │ 
│ $this->yellow->media     $this->yellow->user      $this->yellow->toolbox   │
│                          $this->yellow->page                               │
└────────────────────────────────────────────────────────────────────────────┘
          │                           │                           │  
          ▼                           ▼                           ▼ 
┌────────────────────┐     ┌───────────────────────┐    ┌────────────────────┐
│ Filsystem          │     │ Inställningar         │    │ Tillägg            │
└────────────────────┘     └───────────────────────┘    └────────────────────┘
```

Följande objekt är tillgängliga:

`$this->yellow` = [tillgång till API:et](#yellow)  
`$this->yellow->content` = [tillgång till innehållsfiler](#yellow-content)  
`$this->yellow->media` = [tillgång till mediefiler](#yellow-media)  
`$this->yellow->system` = [tillgång till systeminställningar](#yellow-system)  
`$this->yellow->language` = [tillgång till språkinställningar](#yellow-language)  
`$this->yellow->user` = [tillgång till användarinställningar](#yellow-user)  
`$this->yellow->extension` = [tillgång till tillägg](#yellow-extension)  
`$this->yellow->lookup` = [tillgång till uppslags och normaliseringsmetoder](#yellow-lookup)  
`$this->yellow->toolbox` = [tillgång till verktygslådan med hjälpmetoder](#yellow-toolbox)  
`$this->yellow->page` = [tillgång till aktuella sidan](#yellow-page)  

### Yellow

Klassen `Yellow` ger tillgång till API:et. Följande metoder är tillgängliga:

`command` `getLayoutArguments` `layout` `load` `request`

---

Beskrivning av metoder och argument:

`yellow->load(): void`  
Hantera initialisering

`yellow->request(): int`  
Hantera begäran från webbläsaren

`yellow->command($line = ""): int`  
Hantera kommandon från kommandoraden

`yellow->layout($name, $arguments = null): void`  
Inkludera layouten

`yellow->getLayoutArguments($sizeMin = 9): array`  
Returnera layoutargument

---

Layoutfil med header och footer:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow content

Klassen `YellowContent` ger tillgång till [innehållsfiler](how-to-change-the-content). Följande metoder är tillgängliga:

`clean` `find` `index` `multi` `path` `top`

---

Beskrivning av metoder och argument:

`content->find($location, $absoluteLocation = false): YellowPage|null`  
Returnera [page](#yellow-page), null om det inte finns

`content->index($showInvisible = false): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med sidor på webbplatsen

`content->top($showInvisible = false): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med navigering på toppnivå

`content->path($location, $absoluteLocation = false): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med sökväg i navigering

`content->multi($location, $absoluteLocation = false, $showInvisible = false): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med flera språk i flerspråkigt läge

`content->clean(): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) som är tom

---

Layoutfil för att visa alla sidor:


``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa sidor under en viss plats:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->find("/help/")->getChildren() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa navigationssidor på toppnivå:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->top() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("titleNavigation") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow media

Klassen `YellowMedia` ger tillgång till [mediefiler](how-to-change-the-media). Följande metoder är tillgängliga:

`clean` `index` `find`

---

Beskrivning av metoder och argument:

`media->find($location, $absoluteLocation = false): YellowPage|null`  
Returnera [page](#yellow-page) med information om mediefilen, null om det inte finns

`media->index($showInvisible = false): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med mediefiler

`media->clean(): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) som är tom

---

Layoutfil för att visa mediefiler:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index() ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa senaste mediefiler:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index()->sort("modified", false) ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa mediefiler av en viss typ:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index()->filter("type", "pdf") ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow system

Klassen `YellowSystem` ger tillgång till [systeminställningar](how-to-change-the-system#systeminställningar). Följande metoder är tillgängliga:

`get` `getAvailable` `getDifferent` `getHtml` `getModified` `getSettings` `isExisting` `save` `set` `setDefault`

---

Beskrivning av metoder och argument:

`system->save($fileName, $settings): bool`  
Spara systeminställningarna i filen

`system->setDefault($key, $value): void`  
Ställ in standard systeminställning

`system->set($key, $value): void`  
Ställ in systeminställning

`system->get($key): string`  
Returnera systeminställning

`system->getHtml($key): string`  
Returnera systeminställning, HTML-kodad

`system->getDifferent($key): string`  
Returnera ett annat värde för en systeminställning

`system->getAvailable($key): array`  
Returnera tillgängliga värden för en systeminställning

`system->getSettings($filterStart = "", $filterEnd = ""): array`  
Returnera systeminställningar

`system->getModified($httpFormat = false): int|string`  
Returnera ändringsdatum for systeminställningar, Unix-tid eller HTTP-format

`system->isExisting($key): bool`  
Kontrollera om systeminställning finns

---

Layoutfil för att visa webbansvarig:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php echo "Name: ".$this->yellow->system->getHtml("author")."<br />" ?>
<?php echo "Email: ".$this->yellow->system->getHtml("email")."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att kontrollera om en specifik inställning är aktiverad: 

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php $debugMode = $this->yellow->system->get("coreDebugMode") ?>
Debug mode is <?php echo htmlspecialchars($debugMode ? "on" : "off") ?>.
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa core-inställningar: 

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getSettings("core") as $key=>$value): ?>
<?php echo htmlspecialchars("$key: $value") ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow language

Klassen `YellowLanguage` ger tillgång till [språkinställningar](how-to-change-the-system#språkinställningar). Följande metoder är tillgängliga:

`getDateFormatted` `getDateRelative` `getDateStandard` `getModified` `getSettings` `getText` `getTextHtml` `isExisting` `isText` `setDefaults` `setText`

---

Beskrivning av metoder och argument:

`language->setDefaults($lines): void`  
Ställ in standard språkinställningar

`language->setText($key, $value, $language): void`  
Ställ in språkinställning

`language->getText($key, $language = ""): string`  
Returnera språkinställning

`language->getTextHtml($key, $language = ""): string`  
Returnera språkinställning, HTML-kodad

`language->getDateStandard($text, $language = ""): string`  
Returnera text som [språkspecifikt datum](how-to-change-the-system#språkinställningar), konvertera till ett av standardformaten

`language->getDateRelative($timestamp, $format, $daysLimit, $language = ""): string`  
Returnera Unix-tid som [datum](https://www.php.net/manual/en/function.date.php), i förhållande till idag

`language->getDateFormatted($timestamp, $format, $language = ""): string`  
Returnera Unix-tid som [datum](https://www.php.net/manual/en/function.date.php)

`language->getSettings($filterStart = "", $filterEnd = "", $language = ""): array`  
Returnera språkinställningar

`language->getModified($httpFormat = false): int|string`  
Returnera ändringsdatum för språkinställningar, Unix-tid eller HTTP-format

`language->isText($key, $language = ""): bool`  
Kontrollera om språkinställning finns

`language->isExisting($language): bool`  
Kontrollera om språket finns

---

Layoutfil för att visa en språkinställning:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->language->getTextHtml("wikiModified") ?> 
<?php echo $this->yellow->page->getDateHtml("modified") ?></p>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att kontrollera om ett specifikt språk finns:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->language->isExisting("sv") ?>
<p>Swedish language <?php echo htmlspecialchars($found? "" : "not") ?> installed.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa språk och översättare:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getAvailable("language") as $language): ?>
<?php echo $this->yellow->language->getTextHtml("languageDescription", $language) ?> - 
<?php echo $this->yellow->language->getTextHtml("languageTranslator", $language) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow user

Klassen `YellowUser` ger tillgång till [användarinställningar](how-to-change-the-system#användarinställningar). Följande metoder är tillgängliga:

`getModified` `getSettings` `getUser` `getUserHtml` `isExisting` `isUser` `remove` `save` `setUser`

---

Beskrivning av metoder och argument:

`user->save($fileName, $email, $settings): bool`  
Spara användarinställningar i filen

`user->remove($fileName, $email): bool`  
Ta bort användarinställningar från fil

`user->setUser($key, $value, $email): void`  
Ställ in användarinställning

`user->getUser($key, $email = ""): string`  
Returnera användarinställning

`user->getUserHtml($key, $email = ""): string`  
Returnera användarinställning, HTML-kodad

`user->getSettings($email = ""): array`  
Returnera användarinställningar

`user->getModified($httpFormat = false): int|string`  
Returnera ändringsdatum för användarinställningar, Unix-tid eller HTTP-format

`user->isUser($key, $email = ""): bool`  
Kontrollera om användarinställning finns

`user->isExisting($email): bool`  
Kontrollera om användaren finns

---

Layoutfil för att visa den aktuella användaren:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php echo "Name: ".$this->yellow->user->getUserHtml("name")."<br />" ?>
<?php echo "Email: ".$this->yellow->user->getUserHtml("email")."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att kontrollera om en användare är inloggad:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->user->isUser("name") ?>
<p>You are <?php echo htmlspecialchars($found? "" : "not") ?> logged in.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa användare och deras status:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getAvailable("email") as $email): ?>
<?php echo $this->yellow->user->getUserHtml("name", $email) ?> - 
<?php echo $this->yellow->user->getUserHtml("status", $email) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow extension

Klassen `YellowExtension` ger tillgång till tillägg. Följande metoder är tillgängliga:

`get` `getModified` `isExisting`

---

Beskrivning av metoder och argument:

`extension->get($key): object`  
Returnera tillägg

`extension->getModified($httpFormat = false): int|string`  
Returnera ändringsdatum för tilläg, Unix-tid eller HTTP-format

`extension->isExisting($key): bool`  
Kontrollera om tilläget finns

---

Layoutfil för att visa tillägg:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach($this->yellow->extension->data as $key=>$value): ?>
<?php echo htmlspecialchars($key." ".$value["version"]) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att kontrollera om ett specifikt tillägg finns:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->extension->isExisting("search") ?>
<p>Search extension <?php echo htmlspecialchars($found ? "" : "not") ?> installed.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Kod för att anropa en funktion från ett annat tillägg:

``` php
if ($this->yellow->extension->isExisting("image")) {
    $fileName = "media/images/photo.jpg";
    list($src, $width, $height) = $this->yellow->extension->get("image")->getImageInformation($fileName, "100%", "100%");
    echo "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\" />";
}
```

### Yellow lookup

Klassen `YellowLookup` ger tillgång till uppslags och normaliseringsmetoder. Följande metoder är tillgängliga:

`findContentLocationFromFile` `findFileFromContentLocation` `findFileFromMediaLocation` `findFileFromSystemLocation` `findMediaDirectory` `findMediaLocationFromFile` `findSystemLocationFromFile` `getHtmlAttributes` `getUrlInformation` `isCommandLine` `isContentFile` `isFileLocation` `isMediaFile` `isSystemFile` `isValidFile` `normaliseAddress` `normaliseArguments` `normaliseClass` `normaliseData` `normaliseHeaders` `normaliseLocation` `normaliseName` `normalisePath` `normaliseUrl`

---

Beskrivning av metoder och argument:

`lookup->findContentLocationFromFile($fileName): string`  
Returnera innehållsplats från filsökvägen

`lookup->findFileFromContentLocation($location, $directory = false): string`  
Returnera filsökväg från innehållsplatsen

`lookup->findMediaLocationFromFile($fileName): string`  
Returnera medieplats från filsökvägen

`lookup->findFileFromMediaLocation($location): string`  
Returnera filsökväg från medieplatsen

`lookup->findMediaDirectory($key): string`  
Returnera mediakatalog från en systeminställning

`lookup->findSystemLocationFromFile($fileName): string`  
Returnera systemplats från filsökvägen, för virtuellt mappade systemfiler

`lookup->findFileFromSystemLocation($location): string`  
Returnera filsökväg från systemplatsen, för virtuellt mappade systemfiler

`lookup->normaliseName($text, $removePrefix = false, $removeExtension = false, $filterStrict = false): string`  
Normalisera namn

`lookup->normaliseData($text, $type = "html", $filterStrict = true): string`  
Normalisera element och attribut i HTML/SVG-data 

`lookup->normaliseAddress($input, $type = "mail", $filterStrict = true): string`  
Normalisera namn och email för en enda adress

`lookup->normaliseHeaders($input, $type = "mime", $filterStrict = true): string`  
Normalisera fält i MIME-headers

`lookup->normaliseClass($text): string`  
Normalisera CSS-klass

`lookup->normalisePath($text): string`  
Normalisera relativa sökvägsandelar 

`lookup->normaliseLocation($location, $pageLocation, $filterStrict = true): string`  
Normalisera plats, gör absolut plats

`lookup->normaliseArguments($text, $filterStrict = true): string`  
Normalisera platsargument

`lookup->normaliseUrl($scheme, $address, $base, $location, $filterStrict = true): string`  
Normalisera URL, gör absolut URL

`lookup->getUrlInformation($url): string`  
Returnera URL-information

`lookup->getHtmlAttributes($text) : string`  
Returnera HTML-attribut från generiska Markdown-attribut

`lookup->isFileLocation($location): bool`  
Kontrollera om platsen anger fil eller katalog

`lookup->isValidFile($fileName): bool`  
Kontrollera om filen är giltig

`lookup->isContentFile($fileName): bool`  
Kontrollera om innehållsfil

`lookup->isMediaFile($fileName): bool`  
Kontrollera om mediefil

`lookup->isSystemFile($fileName): bool`  
Kontrollera om systemfil

`lookup->isCommandLine(): bool`  
Kontrollera om kommandoraden körs

---

Layoutfil för att visa bildsökvägar:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php $pathInstall = $this->yellow->system->get("coreServerInstallDirectory") ?>
<?php $pathImages = $this->yellow->lookup->findMediaDirectory("coreImageLocation") ?>
<?php $pathThumbs = $this->yellow->lookup->findMediaDirectory("coreThumbnailLocation") ?>
<?php echo "Image files: ".htmlspecialchars($pathInstall.$pathImages)."<br />" ?>
<?php echo "Image thumbnails: ".htmlspecialchars($pathInstall.$pathThumbs)."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa sidtyp:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $fileLocation = $this->yellow->lookup->isFileLocation($this->yellow->page->location) ?>
<p>Page is <?php echo htmlspecialchars($fileLocation? "file" : "directory") ?>.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Kod för att dela upp en URL:

``` php
if (!is_string_empty($url)) {
    list($scheme, $address, $base) = $this->yellow->lookup->getUrlInformation($url);
    echo "Found scheme:$scheme address:$address base:$base\n";
}
```

### Yellow toolbox

Klassen `YellowToolbox` ger tillgång till verktygslådan med hjälpmetoder. Följande metoder är tillgängliga:

`appendFile` `copyFile` `createTextDescription` `deleteDirectory` `deleteFile` `getCookie` `getDirectoryEntries` `getDirectoryEntriesRecursive` `getDirectoryInformation` `getDirectoryInformationRecursive` `getFileModified` `getFileSize` `getFileType` `getLocationArguments` `getServer` `getTextArguments` `getTextLines` `getTextList` `log` `mail` `modifyFile` `readFile` `renameDirectory` `renameFile` `writeFile`

---

Beskrivning av metoder och argument:

`toolbox->getCookie($key): string`  
Returnera webbläsarkakan för aktuella HTTP-begäran

`toolbox->getServer($key): string`  
Returnera serverargument för aktuella HTTP-begäran

`toolbox->getLocationArguments(): string`  
Returnera platsargument för aktuella HTTP-begäran

`toolbox->getDirectoryEntries($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true): array`  
Returnera filer och kataloger

`toolbox->getDirectoryEntriesRecursive($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true, $levelMax = 0): array`  
Returnera filer och kataloger rekursivt

`toolbox->getDirectoryInformation($path): array`  
Returnera kataloginformation, ändringsdatum och filantal

`toolbox->getDirectoryInformationRecursive($path, $levelMax = 0): array`  
Returnera kataloginformation rekursivt, ändringsdatum och filantal

`toolbox->readFile($fileName, $sizeMax = 0): string`  
Läs fil, tom sträng om den inte hittas

`toolbox->writeFile($fileName, $fileData, $mkdir = false): bool`  
Skriv fil  

`toolbox->appendFile($fileName, $fileData, $mkdir = false): bool`  
Lägg till fil

`toolbox->copyFile($fileNameSource, $fileNameDestination, $mkdir = false): bool`  
Kopiera fil

`toolbox->renameFile($fileNameSource, $fileNameDestination, $mkdir = false): bool`  
Byt namn på en fil

`toolbox->renameDirectory($pathSource, $pathDestination, $mkdir = false): bool`  
Byt namn på en mapp

`toolbox->deleteFile($fileName, $pathTrash = ""): bool`  
Radera fil  

`toolbox->deleteDirectory($path, $pathTrash = ""): bool`  
Radera mapp  

`toolbox->modifyFile($fileName, $modified): bool`  
Ställ in ändringsdatum för fil/mapp, Unix-tid 

`toolbox->getFileModified($fileName): int`  
Returnera ändringsdatum för fil/mapp, Unix-tid 

`toolbox->getFileSize($fileName): int`  
Returnera filstorlek

`toolbox->getFileType($fileName): string`  
Returnera filtyp

`toolbox->getTextLines($text): array`  
Returnera rader från text, inklusive radbrytningar

`toolbox->getTextList($text, $separator, $size): array`  
Returnera array med specifik storlek från text 

`toolbox->getTextArguments($text, $optional = "-", $sizeMin = 9): array`  
Returnera array med variabel storlek från text, separerade av mellanslag

`toolbox->createTextDescription($text, $lengthMax = 0, $removeHtml = true, $endMarker = "", $endMarkerText = ""): string`  
Skapa textbeskrivning, med eller utan HTML

`toolbox->mail($action, $headers, $message): bool`  
Skicka emailmeddelande

`toolbox->log($action, $message): void`  
Skriv information till loggfilen

---

Kod för att läsa textrader från filen:

``` php
$fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
$fileData = $this->yellow->toolbox->readFile($fileName);
foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
    echo $line;
}
```

Kod för att visa filer i en mapp:

``` php
$path = $this->yellow->system->get("coreExtensionDirectory");
foreach ($this->yellow->toolbox->getDirectoryEntries($path, "/.*/", true, false) as $entry) {
    echo "Found file $entry\n";
}
```

Kod för att ändra text i flera filer:

``` php
$path = $this->yellow->system->get("coreContentDirectory");
foreach ($this->yellow->toolbox->getDirectoryEntriesRecursive($path, "/^.*\.md$/", true, false) as $entry) {
    $fileData = $fileDataNew = $this->yellow->toolbox->readFile($entry);
    $fileDataNew = str_replace("I drink a lot of water", "I drink a lot of coffee", $fileDataNew);
    if ($fileData!=$fileDataNew && !$this->yellow->toolbox->writeFile($entry, $fileDataNew)) {
        $this->yellow->toolbox->log("error", "Can't write file '$entry'!");
    }
}
```

### Yellow page

Klassen `YellowPage` ger tillgång till en sidan och dess [sidinställningar](how-to-change-the-system#sidinställningar). Följande metoder är tillgängliga:

`error` `get` `getBase` `getChildren` `getChildrenRecursive` `getContentHtml` `getContentRaw` `getDate` `getDateFormatted` `getDateFormattedHtml` `getDateHtml` `getDateRelative` `getDateRelativeHtml` `getExtraHtml` `getHeader` `getHtml` `getLastModified` `getLocation` `getModified` `getPage` `getPages` `getParent` `getParentTop` `getRequest` `getRequestHtml` `getSiblings` `getStatusCode` `getUrl` `isActive` `isAvailable` `isCacheable` `isError` `isExisting` `isHeader` `isPage` `isRequest` `isVisible` `set` `status`

---

Beskrivning av metoder och argument:

`page->set($key, $value): void`  
Ställ in sidinställning

`page->get($key): string`  
Returnera sidinställning 

`page->getHtml($key): string`  
Returnera sidinställning, HTML-kodad  

`page->getDate($key, $format = ""): string`  
Returnera sidinställning som [språkspecifikt datum](how-to-change-the-system#språkinställningar)  

`page->getDateHtml($key, $format = ""): string`  
Returnera sidinställning som [språkspecifikt datum](how-to-change-the-system#språkinställningar), HTML-kodad  

`page->getDateRelative($key, $format = "", $daysLimit = 30): string`  
Returnera sidinställning som [språkspecifikt datum](how-to-change-the-system#språkinställningar), i förhållande till idag 

`page->getDateRelativeHtml($key, $format = "", $daysLimit = 30): string`  
Returnera sidinställning som [språkspecifikt datum](how-to-change-the-system#språkinställningar), i förhållande till idag, HTML-kodad

`page->getDateFormatted($key, $format): string`  
Returnera sidinställning som [datum](https://www.php.net/manual/en/function.date.php)  

`page->getDateFormattedHtml($key, $format): string`  
Returnera sidinställning som [datum](https://www.php.net/manual/en/function.date.php), HTML-kodad  

`page->getContentRaw(): string`  
Returnera sidinnehållsdata, råformat

`page->getContentHtml(): string`  
Returnera sidinnehållsdata, HTML-kodat

`page->getExtraHtml($name): string`  
Returnera sidextradata, HTML-kodat

`page->getParent(): YellowPage|null`  
Returnera överordnad sida, null om ingen

`page->getParentTop($homeFallback = false): YellowPage|null`  
Returnera överordnad sida på toppnivå, null om ingen 

`page->getSiblings($showInvisible = false): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med sidor på samma nivå 

`page->getChildren($showInvisible = false): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med barnsidor

`page->getChildrenRecursive($showInvisible = false, $levelMax = 0): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med barnsidor rekursivt

`page->getPages($key): YellowPageCollection`  
Returnera [page collection](#yellow-page-collection) med ytterligare sidor

`page->getPage($key): YellowPage`  
Returnera delad sida

`page->getUrl($canonicalUrl = false): string`  
Returnera sidans URL

`page->getBase($multiLanguage = false): string`  
Returnera sidans bas

`page->getLocation($absoluteLocation = false): string`  
Returnera sidans plats

`page->getRequest($key): string`  
Returnera requestargument av sidan

`page->getRequestHtml($key): string`  
Returnera requestargument av sidan, HTML-kodad

`page->getHeader($key): string`  
Returnera responseheader av sidan

`page->getModified($httpFormat = false): int|string`  
Returnera sidans ändringsdatum, Unix-tid eller HTTP-format

`page->getLastModified($httpFormat = false): int|string`  
Returnera sidans senaste ändringsdatum, Unix-tid eller HTTP-format

`page->getStatusCode($httpFormat = false): int|string`  
Returnera sidans statuskod, nummer eller HTTP-format

`page->status($statusCode, $location = ""): void`  
Svara med statuskod, inget sidinnehåll

`page->error($statusCode, $errorMessage = ""): void`  
Svara med felsidan

`page->isAvailable(): bool`  
Kontrollera om sidan är tillgänglig

`page->isVisible(): bool`  
Kontrollera om sidan är synlig

`page->isActive(): bool`  
Kontrollera om sidan ligger inom aktuella HTTP-begäran

`page->isCacheable(): bool`  
Kontrollera om sidan kan cachelagras

`page->isError(): bool`  
Kontrollera om sidan med fel

`page->isExisting($key): bool`  
Kontrollera om sidinställning finns  

`page->isRequest($key): bool`  
Kontrollera om requestargument finns 

`page->isHeader($key): bool`  
Kontrollera om responseheader finns

`page->isPage($key): bool`  
Kontrollera om delad sida finns

---

Layoutfil för att visa sidinnehåll:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa sidinnehåll och författare:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->page->getHtml("author") ?></p>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa sidinnehåll och modifieringsdatum:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->page->getDateHtml("modified") ?></p>
<?php echo $this->yellow->page->getContentHtml() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow page collection

Klassen `YellowPageCollection` ger tillgång till flera sidor. Följande metoder är tillgängliga:

`append` `diff` `filter` `getFilter` `getModified` `getPageNext` `getPagePrevious` `getPaginationCount` `getPaginationLocation` `getPaginationNext` `getPaginationNumber` `getPaginationPrevious` `group` `intersect` `isEmpty` `isPagination` `limit` `match` `merge` `paginate` `prepend` `remove` `reverse` `shuffle` `similar` `sort`

---

Beskrivning av metoder och argument:

`pages->append($page): void`  
Lägg till sidan till slutet av page collection

`pages->prepend($page): void`  
Placera sidan i början av page collection

`pages->remove($page): YellowPageCollection`  
Ta bort sidan från page collection

`pages->filter($key, $value, $exactMatch = true): YellowPageCollection`  
Filtrera page collection efter sidinställning

`pages->match($regex = "/.*/", $filterByLocation = true): YellowPageCollection`  
Filtrera page collection efter plats eller fil

`pages->similar($page): YellowPageCollection`  
Sortera page collection efter inställningslikhet

`pages->sort($key, $ascendingOrder = true): YellowPageCollection`  
Sortera page collection efter sidinställning

`pages->group($key, $ascendingOrder = true, $format = ""): array`  
Gruppera page collection efter sidinställning, returnera array med flera collections

`pages->merge($input): YellowPageCollection`  
Beräkna union, lägg till en page collection

`pages->intersect($input): YellowPageCollection`  
Beräkna korsningen, ta bort sidor som inte finns i en annan page collection

`pages->diff($input): YellowPageCollection`  
Beräkna skillnaden, ta bort sidor som finns i en annan page collection

`pages->limit($pagesMax): YellowPageCollection`  
Begränsa antalet sidor i page collection

`pages->reverse(): YellowPageCollection`  
Omvänd page collection

`pages->shuffle(): YellowPageCollection`  
Gör page collection slumpmässig

`pages->paginate($limit): YellowPageCollection`  
Skapa en paginering för page collection

`pages->getPaginationNumber(): int`  
Returnera aktuellt sidnummer i paginering

`pages->getPaginationCount(): int`  
Returnera högsta sidnummer i paginering

`pages->getPaginationLocation($absoluteLocation = true, $pageNumber = 1): string`  
Returnera plats för en sida i paginering 

`pages->getPaginationPrevious($absoluteLocation = true): string`  
Returnera plats för föregående sida i paginering

`pages->getPaginationNext($absoluteLocation = true): string`  
Returnera plats för nästa sida i paginering

`pages->getPagePrevious($page): YellowPage|null`  
Returnera föregående sida i page collection, null om ingen 

`pages->getPageNext($page): YellowPage|null`  
Returnera nästa sida i page collection, null om ingen 

`pages->getFilter(): string`  
Returnera nuvarande sidfilter 

`pages->getModified($httpFormat = false): int|string`  
Returnera ändringsdatum för page collection, Unix-tid eller HTTP-format  

`pages->isPagination(): bool`  
Kontrollera om det finns en paginering

`pages->isEmpty(): bool`  
Kontrollera om page collection är tom

---

Layoutfil för att visa tre slumpmässiga sidor:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->shuffle()->limit(3) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa senaste sidor:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->sort("modified", false) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil för att visa senaste sidor med paginering:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->sort("modified", false)->paginate(10) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
<?php $this->yellow->layout("pagination", $pages) ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow string

Följande funktioner utökar PHP-strängfunktioner och arrayfunktioner: 

`is_array_empty` `is_string_empty` `strlenu` `strposu` `strrposu` `strtoloweru` `strtoupperu` `substru`

---

Beskrivning av funktioner och argument:

`strtoloweru($string): string`  
Konvertera sträng till gemener, UTF-8-kompatibel

`strtoupperu($string): string`  
Konvertera sträng till versaler, UTF-8-kompatibel

`strlenu($string): int` + `strlenb($string): int`  
Returnera stränglängd, UTF-8 tecken eller byte

`strposu($string, $search): int|false` + `strposb($string, $search): int|false`  
Returnera strängposition för första träffen, UTF-8 tecken eller byte

`strrposu($string, $search): int|false` + `strrposb($string, $search): int|false`  
Returnera strängposition för senaste träffen, UTF-8 tecken eller byte

`substru($string, $start, $length): string` + `substrb($string, $start, $length): string`  
Returnera en del av en sträng, UTF-8-tecken eller byte

`is_string_empty($string): bool`  
Kontrollera om strängen är tom

`is_array_empty($array): bool`  
Kontrollera om arrayen är tom

---

Kod för att konvertera strängar:

``` php
$string = "För människor och maskiner";
echo strtoloweru($string);                   // för människor och maskiner
echo strtoupperu($string);                   // FÖR MÄNNISKOR OCH MASKINER
```

Kod för att komma åt strängar:

``` php
$string = "Text med UTF-8 tecken åäö";
echo strlenu($string);                       // 25
echo strposu($string, "UTF");                // 9
echo substru($string, -3, 3);                // åäö
```

Kod för att kontrollera om strängar är tomma:

``` php
var_dump(is_string_empty(""));               // bool(true)
var_dump(is_string_empty("text"));           // bool(false)
var_dump(is_string_empty("0"));              // bool(false)
```

Kod för att kontrollera om arrayer är tomma:

``` php
var_dump(is_array_empty(array()));           // bool(true)
var_dump(is_array_empty(new ArrayObject())); // bool(true)
var_dump(is_array_empty(array("entry")));    // bool(false)
```

## Händelser

Med hjälp av händelser meddelar hemsidan dig när något interessant händer. Först laddas tilläggen och `onLoad` anropas. Så snart systemet har startat anropas antingen `onRequest` eller `onCommand`. En begäran från webbläsaren kan hanteras med olika händelser. I de flesta fall genereras innehållet av en sida. Om ett fel har inträffat genereras en felsida. Slutligen matas den genererade sidan ut.

``` box-drawing {aria-hidden=true}
onLoad ───────▶ onStartup ───────────────────────────────────────────┐
                    │                                                │
                    ▼                                                │
                onRequest ───────────────────┐                       │
                    │                        │                       │
                    ▼                        ▼                       ▼
onLog           onParseMetaData          onEditContentFile       onCommand  
onMail          onParseContentRaw        onEditMediaFile         onCommandHelp
onUpdate        onParseContentElement    onEditSystemFile            │
                onParseContentHtml       onEditUserAccount           │
                onParsePageLayout            │                       │
                onParsePageExtra             │                       │
                onParsePageOutput            │                       │
                    │                        │                       │
                    ▼                        │                       │
                onShutdown ◀─────────────────┴───────────────────────┘
```

Följande typer av händelser är tillgängliga:

`Yellow core händelser` = [meddelar när ett tillstånd ändras](#yellow-core-händelser)  
`Yellow info händelser` = [meddelar när information finns tillgänglig](#yellow-info-händelser)  
`Yellow parse händelser` = [meddelar när en sida visas](#yellow-parse-händelser)  
`Yellow edit händelser` = [meddelar när en fil redigeras i webbläsaren](#yellow-edit-händelser)  
`Yellow command händelser` = [meddelar när ett kommando körs](#yellow-command-händelser)  

### Yellow core händelser

Yellow core händelser meddelar när ett tillstånd ändras. Följande händelser är tillgängliga:

`onLoad` `onRequest` `onShutdown` `onStartup`

---

Beskrivning av händelser och argument:

`public function onLoad($yellow)`  
Hantera initialisering

`public function onStartup()`  
Hantera start

`public function onRequest($scheme, $address, $base, $location, $fileName)`  
Hantera begäran

`public function onShutdown()`  
Hantera avstängningen

---

Tillägg för att hantera initieringen:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.1";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
}
```

### Yellow info händelser

Yellow info händelser meddelar när information finns tillgänglig. Följande händelser är tillgängliga:

`onLog` `onMail` `onUpdate`

Följande uppdateringsåtgärder är tillgängliga:

`clean` = städa upp filer för statisk webbplats  
`daily` = daglig händelse för alla tillägg  
`install` = tillägget är installerat  
`uninstall` = tillägget är avinstallerat  
`update` = tillägget är uppdaterat  

---

Beskrivning av händelser och argument:

`public function onLog($action, $message)`  
Hantera loggning

`public function onMail($action, $headers, $message)`  
Hantera email

`public function onUpdate($action)`  
Hantera uppdatering

---

Tillägg för att hantera en uppdateringshändelse:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.2";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle update
    public function onUpdate($action) {
        if ($action=="install") {
            $this->yellow->toolbox->log("info", "Install event");
        }
    }
}
```

Tillägg för att hantera en daglig händelse:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.3";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle update
    public function onUpdate($action) {
        if ($action=="daily") {
            $this->yellow->toolbox->log("info", "Daily event");
        }
    }
}
```

### Yellow parse händelser

Yellow parse händelser meddelar när en sida visas. Följande händelser är tillgängliga:

`onParseContentElement` `onParseContentHtml` `onParseContentRaw` `onParseMetaData` `onParsePageExtra` `onParsePageLayout` `onParsePageOutput`

Följande elementtyper är tillgängliga:

`inline` = förkortning med ett textelement  
`block` = förkortning med ett blockelement  
`code` = kod blockelement, kan innehålla flera textrader  
`notice` = indikation blockelement, kan innehålla flera textrader   
`symbol` = symbol textelement, används för emoji och ikoner  

---

Beskrivning av händelser och argument:

`public function onParseMetaData($page)`  
Hantera metadata av en sida

`public function onParseContentRaw($page, $text)`  
Hantera sidinnehåll i råformat

`public function onParseContentElement($page, $name, $text, $attributes, $type)`  
Hantera sidinnehåll för ett element

`public function onParseContentHtml($page, $text)`  
Hantera sidinnehåll i HTML-format

`public function onParsePageLayout($page, $name)`  
Hantera sidlayout

`public function onParsePageExtra($page, $name)`  
Hantera extra data för sidan

`public function onParsePageOutput($page, $text)`  
Hantera output data för sidan

---

Tillägg för att skapa en egen förkortning:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.4";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content element
    public function onParseContentElement($page, $name, $text, $attributes, $type) {
        $output = null;
        if ($name=="example" && ($type=="block" || $type=="inline")) {
            $output = "<div class=\"".htmlspecialchars($name)."\">";
            $output .= "Add more HTML code here";
            $output .= "</div>";
        }
        return $output;
    }
}
```

Tillägg för att skapa en HTML header:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.5";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $assetLocation = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("coreAssetLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$assetLocation}example.css\" />\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$assetLocation}example.js\"></script>\n";
        }
        return $output;
    }
}
```

### Yellow edit händelser

Yellow edit händelser meddelar när en fil redigeras i webbläsaren. Följande händelser är tillgängliga:

`onEditContentFile` `onEditMediaFile` `onEditSystemFile` `onEditUserAccount`

Följande innehållsåtgärder är tillgängliga:

`precreate` = sidan skapas, metadata är inte klar än  
`preedit` = sidan redigeras, metadata är inte klar än  
`create` = sidan skapas  
`edit` = sidan redigeras  
`delete` = sidan tas bort  
`restore` = sidan återställs  

---

Beskrivning av händelser och argument:

`public function onEditContentFile($page, $action, $email)`  
Hantera innehållsfiländringar

`public function onEditMediaFile($file, $action, $email)`  
Hantera mediefiländringar

`public function onEditSystemFile($file, $action, $email)`  
Hantera systemfiländringar

`public function onEditUserAccount($action, $email, $password)`  
Hantera ändringar av användarkonton

---

Tillägg för att hantera innehållsfiländringar:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.6";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle content file changes
    public function onEditContentFile($page, $action, $email) {
        if ($action=="edit" && !$page->isError()) {
            $title = $page->get("title");
            $name = $this->yellow->user->getUser("name", $email);
            $this->yellow->toolbox->log("info", "Edit page by user '".strtok($name, " ")."'");
        }
    }
}
```

Tillägg för att hantera mediefiländringar:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.7";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle media file changes
    public function onEditMediaFile($file, $action, $email) {
        if ($action=="upload" && !$file->isError()) {
            $fileType = $file->get("type");
            $name = $this->yellow->user->getUser("name", $email);
            $this->yellow->toolbox->log("info", "Upload file by user '".strtok($name, " ")."'");
        }
    }
}
```

### Yellow command händelser

Yellow command händelser meddelar när ett kommando körs. Följande händelser är tillgängliga:

`onCommand` `onCommandHelp`

---

Beskrivning av händelser och argument:

`public function onCommand($command, $text)`  
Hantera kommandon

`public function onCommandHelp()`  
Hantera hjälp för kommandon

---

Tillägg för att hantera ett kommando:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.8";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle command
    public function onCommand($command, $text) {
        $statusCode = 0;
        if ($command=="example") {
            echo "Yellow $command: Add more text here\n";
            $statusCode = 200;
        }
        return $statusCode;
    }

    // Handle command help
    public function onCommandHelp() {
        return "example";
    }
}
```

Tillägg för att hantera flera kommandon:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.9";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
     // Handle command
    public function onCommand($command, $text) {
        switch ($command) {
            case "hello":   $statusCode = $this->processCommandHello($command, $text); break;
            case "goodbye": $statusCode = $this->processCommandGoodbye($command, $text); break;
            default:        $statusCode = 0;
        }
        return $statusCode;
    }

    // Handle command help
    public function onCommandHelp() {
        return array("hello [name]", "goodbye [name]");
    }
    
    // Handle command for hello
    public function processCommandHello($command, $text) {
        if (is_string_empty($text)) $text = "World";
        echo "Hello $text\n";
        return 200;
    }
    
    // Handle command for goodbye
    public function processCommandGoodbye($command, $text) {
        if (is_string_empty($text)) $text = "World";
        echo "Goodbye $text\n";
        return 200;
    }
}
```

Har du några frågor? [Få hjälp](.).
