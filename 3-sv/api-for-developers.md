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

Följande filer är viktiga för webbplatsens funktion:

`system/extensions/yellow-system.ini` = [fil med systeminställningar](how-to-change-the-system#systeminställningar)  
`system/extensions/yellow-language.ini` = [fil med språkinställningar](how-to-change-the-system#språkinställningar)  
`system/extensions/yellow-user.ini` = [fil med användarinställningar](how-to-change-the-system#användarinställningar)  
`system/extensions/yellow-website.log` = [webbplatsen loggfil](how-to-change-the-system#loggfilen)  

## Objekt

Med hjälp av API:et har du tillgång till filer, inställningar och tillägg. API:et är uppdelat i flera objekt och speglar i princip filsystemet. Det finns `$this->yellow->content` för att komma åt innehållsfiler, `$this->yellow->media` för att komma åt mediafiler och `$this->yellow->system` för att komma åt systeminställningar.

``` box-drawing {aria-hidden=true}
┌────────────────────┐     ┌───────────────────────┐
│ Webbläsare         │     │ Kommandorad           │
└────────────────────┘     └───────────────────────┘
         │                            │
         ▼                            ▼
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
│ Filer              │     │ Inställningar         │    │ Tillägg            │
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
Hantera en begäran från webbläsaren

`yellow->command($line = ""): int`  
Hantera ett kommando från kommandoraden

`yellow->layout($name, $arguments = null): void`  
Inkludera ett layout

`yellow->getLayoutArguments($sizeMin = 9): array`  
Returnera layoutargument

---

Exempelkod för att hantera en begäran från webbläsaren:

``` php
$yellow = new YellowCore();
$yellow->load();
$yellow->request();
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

Layoutfil för att visa innehållsfiler:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getLocation(true) ?></li>
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

### Yellow system

Klassen `YellowSystem` ger tillgång till [systeminställningar](how-to-change-the-system#systeminställningar). Följande metoder är tillgängliga:

`get` `getDifferent` `getHtml` `getModified` `getSettings` `isExisting` `save` `set` `setDefault`

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

`system->getSettings($filterStart = "", $filterEnd = ""): array`  
Returnera systeminställningar

`system->getModified($httpFormat = false): int|string`  
Returnera ändringsdatum for systeminställningar, Unix-tid eller HTTP-format

`system->isExisting($key): bool`  
Kontrollera om systeminställning finns

---

Layoutfil för att visa systeminställningar:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php echo "Sitename: ".$this->yellow->system->getHtml("sitename")."<br />" ?>
<?php echo "Name: ".$this->yellow->system->getHtml("author")."<br />" ?>
<?php echo "Email: ".$this->yellow->system->getHtml("email")."<br />" ?>
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

Layoutfil för att visa språkinställningar:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->toolbox->enumerate("system", "language") as $language): ?>
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

Layoutfil för att visa användarinställningar:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->toolbox->enumerate("system", "email") as $email): ?>
<?php echo $this->yellow->user->getUserHtml("name", $email) ?> - 
<?php echo $this->yellow->user->getUserHtml("status", $email) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow extension

Klassen `YellowExtension` ger tillgång till installerade tillägg. Följande metoder är tillgängliga:

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

Layoutfil för att visa installerade tillägg:

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

### Yellow toolbox

Klassen `YellowToolbox` ger tillgång till verktygslådan med hjälpmetoder. Följande metoder är tillgängliga:

`appendFile` `copyFile` `createTextDescription` `deleteDirectory` `deleteFile` `enumerate` `getCookie` `getDirectoryEntries` `getDirectoryEntriesRecursive` `getDirectoryInformation` `getDirectoryInformationRecursive` `getFileModified` `getFileSize` `getFileType` `getLocationArguments` `getServer` `getTextArguments` `getTextLines` `getTextList` `log` `mail` `modifyFile` `readFile` `renameDirectory` `renameFile` `writeFile`

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

`toolbox->enumerate($action, $text): array`  
Returnera tillgängliga värden

`toolbox->mail($action, $headers, $message): bool`  
Skicka emailmeddelande

`toolbox->log($action, $message): void`  
Skriv information till loggfilen

---

Layoutfil for att visa katalog:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<ul>
<?php $path = $this->yellow->system->get("coreExtensionDirectory") ?>
<?php foreach($this->yellow->toolbox->getDirectoryEntries($path, "/.*/", true, false) as $entry): ?>
<li><?php echo htmlspecialchars($entry) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
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

Layoutfil för att testa strängfunktioner och arrayfunktioner:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<pre><?php

$string = "För människor och maskiner";
echo strtoloweru($string);                   // för människor och maskiner
echo strtoupperu($string);                   // FÖR MÄNNISKOR OCH MASKINER

$string = "Text med UTF-8 tecken åäö";
echo strlenu($string);                       // 25
echo strposu($string, "UTF");                // 9
echo substru($string, -3, 3);                // åäö

var_dump(is_string_empty(""));               // bool(true)
var_dump(is_string_empty("text"));           // bool(false)
var_dump(is_string_empty("0"));              // bool(false)

var_dump(is_array_empty(array()));           // bool(true)
var_dump(is_array_empty(new ArrayObject())); // bool(true)
var_dump(is_array_empty(array("entry")));    // bool(false)

?></pre>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

## Händelser

En webbplats består av kärnan och andra tillägg. I början laddas alla tillägg och `onLoad` kommer att anropas. Det finns olika händelser som informerar dig när en begäran från webbläsaren tas emot, ett kommando utförs eller information uppdateras. Du kan hantera de händelser som du är intresserad av.

``` box-drawing {aria-hidden=true}
onLoad                                                              Information
    │                                                               uppdateras
    ▼                                                                   │
onStartup ───────────────────────────────────────────┐                  │
    │                                                │                  │
    ▼                                                │                  │
onRequest ───────────────────┐                       │                  │
    │                        │                       │                  │
    ▼                        ▼                       ▼                  ▼
onParseMetaData          onEditContentFile       onCommand          onUpdate
onParseContentRaw        onEditMediaFile         onCommandHelp      onEnumerate
onParseContentElement    onEditSystemFile            │              onMail
onParseContentHtml       onEditUserAccount           │              onLog
onParsePageLayout            │                       │
onParsePageExtra             │                       │
onParsePageOutput            │                       │
    │                        │                       │
    ▼                        │                       │
onShutdown ◀─────────────────┴───────────────────────┘
```

Följande typer av händelser är tillgängliga:

`Yellow core händelser` = [meddelar när ett tillstånd ändras](#yellow-core-händelser)  
`Yellow parse händelser` = [meddelar när en sida genereras](#yellow-parse-händelser)  
`Yellow edit händelser` = [meddelar när en fil redigeras](#yellow-edit-händelser)  
`Yellow command händelser` = [meddelar när ett kommando utförs](#yellow-command-händelser)  
`Yellow update händelser` = [meddelar när information uppdateras](#yellow-update-händelser)  

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

Tilläggsfil för att hantera initieringen:

``` php
<?php
// Example extension, https://github.com/annaesvenson/yellow-example

class YellowExample {
    const VERSION = "0.9.1";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
}
```

### Yellow parse händelser

Yellow parse händelser meddelar när en sida genereras. Följande händelser är tillgängliga:

`onParseContentElement` `onParseContentHtml` `onParseContentRaw` `onParseMetaData` `onParsePageExtra` `onParsePageLayout` `onParsePageOutput`

Följande content-element-typer är tillgängliga:

`inline` = förkortning för textelement  
`block` = förkortning för blockelement, kan innehålla flera textrader  
`general` = allmänt blockelement, kan innehålla flera textrader  
`code` = kod blockelement, kan innehålla flera textrader  
`symbol` = symbol för textelement  

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

Tilläggsfil för att hantera en förkortning:

``` php
<?php
// Example extension, https://github.com/annaesvenson/yellow-example

class YellowExample {
    const VERSION = "0.9.2";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content element
    public function onParseContentElement($page, $name, $text, $attributes, $type) {
        $output = null;
        if ($name=="example" && ($type=="block" || $type=="inline")) {
            if (is_string_empty($text)) $text = "Hello World";
            $output = "<div class=\"example\">".htmlspecialchars($text)."</div>";
        }
        return $output;
    }
}
```

### Yellow edit händelser

Yellow edit händelser meddelar när en fil redigeras. Följande händelser är tillgängliga:

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

Tilläggsfil för att hantera innehållsfiländringar:

``` php
<?php
// Example extension, https://github.com/annaesvenson/yellow-example

class YellowExample {
    const VERSION = "0.9.3";
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

### Yellow command händelser

Yellow command händelser meddelar när ett kommando utförs. Följande händelser är tillgängliga:

`onCommand` `onCommandHelp`

---

Beskrivning av händelser och argument:

`public function onCommand($command, $text)`  
Hantera kommandon

`public function onCommandHelp()`  
Hantera hjälp för kommandon

---

Tilläggsfil för att hantera ett kommando:

``` php
<?php
// Example extension, https://github.com/annaesvenson/yellow-example

class YellowExample {
    const VERSION = "0.9.4";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle command
    public function onCommand($command, $text) {
        $statusCode = 0;
        if ($command=="example") {
            if (is_string_empty($text)) $text = "Command has been handled";
            echo "Yellow $command: $text\n";
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

### Yellow update händelser

Yellow update händelser meddelar när information uppdateras. Följande händelser är tillgängliga:

`onEnumerate` `onLog` `onMail` `onUpdate`

Följande uppdateringsåtgärder är tillgängliga:

`clean` = städa upp filer för statisk webbplats  
`daily` = daglig händelse för alla tillägg  
`install` = tillägget är installerat  
`uninstall` = tillägget är avinstallerat  
`update` = tillägget är uppdaterat  

Följande uppräkningsåtgärder är tillgängliga:

`system` = tillgängliga värden för en nyckel i systeminställningar  

---

Beskrivning av händelser och argument:

`public function onUpdate($action)`  
Hantera uppdatering

`public function onEnumerate($action, $text)`  
Hantera uppräkning

`public function onMail($action, $headers, $message)`  
Hantera email

`public function onLog($action, $message)`  
Hantera loggning

---

Tilläggsfil för att hantera en daglig händelse:

``` php
<?php
// Example extension, https://github.com/annaesvenson/yellow-example

class YellowExample {
    const VERSION = "0.9.5";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle update
    public function onUpdate($action) {
        if ($action=="daily") {
            $this->yellow->toolbox->log("info", "Daily event has been handled");
        }
    }
}
```

## Verktyg

### Liten webbredigerare

Du kan redigera din webbplats i en webbläsare. Inloggningssidan är tillgänglig på din webbplats som `http://website/edit/`. Logga in med ditt användarkonto. Du kan använda vanliga navigeringen, göra ändringar och se resultatet omedelbart. Den lilla webbredigeraren ger dig möjlighet att ändra innehållsfiler, ladda upp mediefiler och konfigurera inställningar. Textformatering med Markdown stöds. HTML stöds också. [Läs mer om lilla webbredigeraren](https://github.com/annaesvensson/yellow-edit/tree/main/readme-sv.md).

### Litet layoutsystem

Du kan anpassa din webbplats med HTML och CSS. Lyckligtvis behöver du inte lära dig ett webbramverk, utan kan använda vanlig HTML och CSS. För sofistikerade layouter finns det ett API för utvecklare. Detta ger dig möjlighet att komma åt innehållsfiler, skapa kontrollstrukturer och det mesta kommer förmodligen att verka ganska bekant för dig som utvecklare. Vi använder samma API:et överallt, från layoutfiler till tillägg. [Läs mer om layouter](how-to-customise-a-layout) och [teman](how-to-customise-a-theme).

### Inbyggd webbserver

Du kan starta en webbserver på kommandoraden. Den inbyggda webbservern är praktisk för utvecklare, formgivare och översättare. Detta ger dig möjlighet att ändra din webbplats på din dator och ladda upp den till din webbserver senare. Öppna ett terminalfönster. Gå till installationsmappen där filen `yellow.php` finns. Skriv `php yellow.php serve`, du kan valfritt ange en URL. Öppna en webbläsare och gå till URL:en som visas. [Läs mer om inbyggda webbservern](https://github.com/annaesvensson/yellow-serve/tree/main/readme-sv.md).

### Statisk generator

Du kan generera en statisk webbplats på kommandoraden. Den statiska generatorn skapar hella webbplatsen i förväg, istället för att vänta på att en fil ska begäras. Öppna ett terminalfönster. Gå till installationsmappen där filen `yellow.php` finns. Skriv `php yellow.php generate`, du kan valfritt ange en mapp och en plats. Detta kommer att generera en statisk webbplats i `public` mappen. Ladda upp statiska webbplatsen till din webbserver och generera en ny när det behövs. [Läs mer om statiska generatorn](https://github.com/annaesvensson/yellow-generate/tree/main/readme-sv.md).

## Felsökningsläge

Du kan använda felsökningsläget för att undersöka orsaken till ett problem eller om du är nyfiken på hur Datenstrom Yellow fungerar. För att aktivera felsökningsläget, öppna filen `system/extensions/yellow-system.ini` och ändra `CoreDebugMode: 1`. Ytterligare information kommer att visas på skärmen och i webbläsarkonsolen. Beroende på felsökningsläget visas mer eller mindre information.

Grundläggande information med inställningen `CoreDebugMode: 1`:

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage language:sv layout:wiki-start theme:stockholm parser:markdown
YellowCore::processRequest file:content/3-sv/2-wiki/page.md
YellowCore::request status:200 time:19 ms
```

Filsystem information med inställningen `CoreDebugMode: 2`:

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowLanguage::load file:system/extensions/yellow-language.ini
YellowUser::load file:system/extensions/yellow-user.ini
YellowLookup::findFileFromContentLocation /sv/wiki/ -> content/3-sv/2-wiki/page.md
YellowContent::scanLocation location:/sv/shared/
YellowLookup::findContentLocationFromFile /sv/shared/page-new-default <- content/3-sv/shared/page-new-default.md
YellowLookup::findContentLocationFromFile /sv/shared/page-new-wiki <- content/3-sv/shared/page-new-wiki.md
```

Maximal information med inställningen `CoreDebugMode: 3`:

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:sv
YellowSystem::load Layout:default
YellowSystem::load Theme:stockholm
```

Har du några frågor? [Få hjälp](.).
