---
Title: API för utvecklare
---
Vi <3 människor som kodar. 

[toc]

## Mappstruktur

Du kan ändra allt i filhanteraren på din dator. Mappen `content` innehåller webbplatsens innehållsfilerna. Du kan redigera din webbplats här. Mappen `media` innehåller webbplatsens mediefiler. Du kan lagra dina bilder och filer här. Mappen `system` innehåller webbplatsens systemfilerna. Du kan hitta installerade tillägg och konfigurationsfilar här.

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
    ├── extensions        = installerade tillägg och konfigurationsfilar
    ├── layouts           = konfigurerbara layoutfiler
    ├── themes            = konfigurerbara temafiler
    └── trash             = raderade filer
```

Följande konfigurationsfiler och loggfiler är tillgängliga:

`system/extensions/yellow-system.ini` = [fil med systeminställningar](how-to-change-the-system#systeminställningar)  
`system/extensions/yellow-language.ini` = [fil med språkinställningar](how-to-change-the-system#språkinställningar)  
`system/extensions/yellow-user.ini` = [fil med användarinställningar](how-to-change-the-system#användarinställningar)  
`system/extensions/yellow-website.log` = [loggfil för din webbplats](troubleshooting#problem-efter-installationen)  

## Verktyg

### Inbyggd webbredigerare

Du kan redigera din webbplats i en webbläsare. Inloggningssidan är tillgänglig på din webbplats som `http://website/edit/`. Logga in med ditt användarkonto. Du kan använda vanliga navigeringen, göra ändringar och se resultatet omedelbart. Inbyggda webbredigeraren låter dig redigera innehållsfiler, ladda upp mediefiler och ändra systeminställningar. Det är ett utmärkt sätt att uppdatera webbsidor.

### Inbyggd webbserver

Du kan starta inbyggda webbservern på kommandoraden. Den inbyggda webbservern är praktisk för utvecklare och formgivare. Detta gör att du kan skapa små webbsidor på din dator och ladda upp dem till din webbserver senare. Öppna ett terminalfönster. Gå till installationsmappen där filen `yellow.php` finns. Skriv `php yellow.php serve`, du kan valfritt ange en URL. Öppna en webbläsare och gå till URL:en som visas.

### Static-site-generator

Du kan bygga en statisk webbplats på kommandoraden. Den static-site-generator bygger hella webbsidan i förväg, istället för att vänta på att en fil ska begäras. Öppna ett terminalfönster. Gå till installationsmappen där filen `yellow.php` finns. Skriv `php yellow.php build`, du kan valfritt ange en mapp och en plats. Detta kommer att bygga en statisk webbplats i `public` mappen. Ladda upp den statiska webbplatsen till din webbserver och bygg en ny när det behövs

## Objekt

Med hjälp av `$this->yellow` kan du komma åt webbplatsen. API:et är uppdelat i flera objekt och speglar i princip filsystemet. Det finns `$this->yellow->content` för att komma åt innehållsfiler, `$this->yellow->media` för att komma åt mediafiler och `$this->yellow->system` för att komma åt systeminställningar. Källkoden för hela API finns i filen `system/extensions/core.php`.

``` box-drawing {aria-hidden=true}
┌──────────────┐                    ┌──────────────┐
│ Webbserver   │                    │ Kommandorad  │
└──────────────┘                    └──────────────┘
       │                                   │
       ▼                                   ▼
┌──────────────────────────────────────────────────┐    ┌───────────────┐
│ Core                                             │◀──▶│ Tillägg       |
│                                                  │    └───────────────┘
│ $this->yellow           $this->yellow->user      │    ┌───────────────┐
│ $this->yellow->content  $this->yellow->extension │◀──▶│ Layouter      │
│ $this->yellow->media    $this->yellow->page      │    └───────────────┘
│ $this->yellow->system   $this->yellow->lookup    │    ┌───────────────┐
│ $this->yellow->language $this->yellow->toolbox   │◀──▶│ Theman        │
└──────────────────────────────────────────────────┘    └───────────────┘
```

Följande objekt är tillgängliga:

`$this->yellow` = [tillgång till API:et](#yellow)  
`$this->yellow->content` = [tillgång till innehållsfiler](#yellow-content)  
`$this->yellow->media` = [tillgång till mediefiler](#yellow-media)  
`$this->yellow->system` = [tillgång till systeminställningar](#yellow-system)  
`$this->yellow->language` = [tillgång till språkinställningar](#yellow-language)  
`$this->yellow->user` = [tillgång till användarinställningar](#yellow-user)  
`$this->yellow->extension` = [tillgång till tillägg](#yellow-extension)  
`$this->yellow->page` = [tillgång till aktuella sidan](#yellow-page)  
`$this->yellow->toolbox` = [tillgång till verktygslådan med hjälpfunktioner](#yellow-toolbox)  

### Yellow

Yellow ger tillgång till API:et. Följande metoder är tillgängliga:

`command` `getLayoutArguments` `layout` `load` `log` `request`

`yellow->load()`  
Hantera initialisering

`yellow->request()`  
Hantera begäran

`yellow->command($line = "")`  
Hantera kommandon

`yellow->log($action, $message)`  
Hantera loggning

`yellow->layout($name, $arguments = null)`  
Inkludera layouten

`yellow->getLayoutArguments($sizeMin = 9)`  
Returnera layoutargument

#### Yellow exempel

Layoutfil med header och footer:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil som skickar ett argument:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $this->yellow->layout("hello", "World") ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Layoutfil som tar emot ett argument:


``` html
<?php list($name, $text) = $this->yellow->getLayoutArguments() ?>
<?php echo "Hello $text" ?>
```

### Yellow content

Yellow content ger tillgång till innehållsfiler. Följande metoder är tillgängliga:

`clean` `find` `index` `multi` `path` `top`

`content->find($location, $absoluteLocation = false)`  
Returnera [page](#yellow-page), null om det inte finns

`content->index($showInvisible = false, $multiLanguage = false, $levelMax = 0)`  
Returnera [page collection](#yellow-page-collection) med alla sidor

`content->top($showInvisible = false, $showOnePager = true)`  
Returnera [page collection](#yellow-page-collection) med navigering på toppnivå

`content->path($location, $absoluteLocation = false)`  
Returnera [page collection](#yellow-page-collection) med sökväg i navigering

`content->multi($location, $absoluteLocation = false, $showInvisible = false)`  
Returnera [page collection](#yellow-page-collection) med flera språk i flerspråkigt läge

`content->clean()`  
Returnera [page collection](#yellow-page-collection) som är tom

Layoutfil för att visa alla sidor:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index(true, true) ?>
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

#### Yellow content exempel

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

Yellow media ger tillgång till mediefiler. Följande metoder är tillgängliga:

`clean` `index` `find`

`media->find($location, $absoluteLocation = false)`  
Returnera [page](#yellow-page) med information om mediefilen, null om det inte finns

`media->index($showInvisible = false, $multiPass = false, $levelMax = 0)`  
Returnera [page collection](#yellow-page-collection) med alla mediefiler

`media->clean()`  
Returnera [page collection](#yellow-page-collection) som är tom

#### Yellow media exempel

Layoutfil för att visa alla mediefiler:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index(true) ?>
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

Yellow system ger tillgång till systeminställningar. Följande metoder är tillgängliga:

`get` `getAvailable` `getDifferent` `getHtml` `getModified` `getSettings` `isExisting`

`system->get($key)`  
Returnera [systeminställning](how-to-change-the-system#systeminställningar)

`system->getHtml($key)`  
Returnera [systeminställning](how-to-change-the-system#systeminställningar), HTML-kodad

`system->getDifferent($key)`  
Returnera ett annat värde för en [systeminställning](how-to-change-the-system#systeminställningar)

`system->getAvailable($key)`  
Returnera tillgängliga värden för en [systeminställning](how-to-change-the-system#systeminställningar)

`system->getSettings($filterStart = "", $filterEnd = "")`  
Returnera [systeminställningar](how-to-change-the-system#systeminställningar)

`system->getModified($httpFormat = false)`  
Returnera ändringsdatum for [systeminställningar](how-to-change-the-system#systeminställningar), Unix-tid eller HTTP-format

`system->isExisting($key)`  
Kontrollera om [systeminställning](how-to-change-the-system#systeminställningar) finns

#### Yellow system exempel

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
<?php $multiLanguageMode = $this->yellow->system->get("coreMultiLanguageMode") ?>
Multi language mode is <?php echo htmlspecialchars($multiLanguageMode ? "on" : "off") ?>.
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

Yellow language ger tillgång till språkinställningar. Följande metoder är tillgängliga:

`getModified` `getSettings` `getText` `getTextHtml` `isExisting` `isText`

`language->getText($key, $language = "")`  
Returnera [språkinställning](how-to-change-the-system#språkinställningar)

`language->getTextHtml($key, $language = "")`  
Returnera [språkinställning](how-to-change-the-system#språkinställningar), HTML-kodad

`language->getSettings($filterStart = "", $filterEnd = "", $language = "")`  
Returnera [språkinställningar](how-to-change-the-system#språkinställningar)

`language->getModified($httpFormat = false)`  
Returnera ändringsdatum för [språkinställningar](how-to-change-the-system#språkinställningar), Unix-tid eller HTTP-format

`language->isText($key, $language = "")`  
Kontrollera om [språkinställning](how-to-change-the-system#språkinställningar) finns

`language->isExisting($language)`  
Kontrollera om språket finns

#### Yellow language exempel

Layoutfil för att visa en språkinställning:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->language->getTextHtml("wikiModified") ?> 
<?php echo $this->yellow->page->getDateHtml("modified") ?></p>
<?php echo $this->yellow->page->getContent() ?>
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

Yellow user ger tillgång till användarinställningar. Följande metoder är tillgängliga:

`getModified` `getSettings` `getUser` `getUserHtml` `isExisting` `isUser`

`user->getUser($key, $email = "")`  
Returnera [användarinställning](how-to-change-the-system#användarinställningar)

`user->getUserHtml($key, $email = "")`  
Returnera [användarinställning](how-to-change-the-system#användarinställningar), HTML encoded

`user->getSettings($email = "")`  
Returnera [användarinställningar](how-to-change-the-system#användarinställningar)

`user->getModified($httpFormat = false)`  
Returnera ändringsdatum för [användarinställningar](how-to-change-the-system#användarinställningar), Unix-tid eller HTTP-format

`user->isUser($key, $email = "")`  
Kontrollera om [användarinställning](how-to-change-the-system#användarinställningar) finns

`user->isExisting($email)`  
Kontrollera om användaren finns

#### Yellow user exempel

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

Yellow extension ger tillgång till tillägg. Följande metoder är tillgängliga:

`get` `getModified` `isExisting`

`extension->get($key)`  
Returnera tillägg

`extension->getModified($httpFormat = false)`  
Returnera ändringsdatum för tilläg, Unix-tid eller HTTP-format

`extension->isExisting($key)`  
Kontrollera om tilläget finns

#### Yellow extension exempel

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

### Yellow page

Yellow page ger tillgång till aktuella sidan. Följande metoder är tillgängliga:

`error` `get` `getBase` `getChildren` `getChildrenRecursive` `getContent` `getDate` `getDateFormatted` `getDateFormattedHtml` `getDateHtml` `getDateRelative` `getDateRelativeHtml` `getExtra` `getHeader` `getHtml` `getLastModified` `getLocation` `getModified` `getPage` `getPages` `getParent` `getParentTop` `getRequest` `getRequestHtml` `getSiblings` `getStatusCode` `getUrl` `isActive` `isAvailable` `isCacheable` `isError` `isExisting` `isHeader` `isPage` `isRequest` `isVisible` `status`

`page->get($key)`  
Returnera [sidinställning](how-to-change-the-system#sidinställningar) 

`page->getHtml($key)`  
Returnera [sidinställning](how-to-change-the-system#sidinställningar), HTML-kodad  

`page->getDate($key, $format = "")`  
Returnera [sidinställning](how-to-change-the-system#sidinställningar) som [språkspecifikt datum](how-to-change-the-system#språkinställningar)  

`page->getDateHtml($key, $format = "")`  
Returnera [sidinställning](how-to-change-the-system#sidinställningar) som [språkspecifikt datum](how-to-change-the-system#språkinställningar), HTML-kodad  

`page->getDateRelative($key, $format = "", $daysLimit = 30)`  
Returnera [sidinställning](how-to-change-the-system#sidinställningar) som [språkspecifikt datum](how-to-change-the-system#språkinställningar), i förhållande till idag 

`page->getDateRelativeHtml($key, $format = "", $daysLimit = 30)`  
Returnera [sidinställning](how-to-change-the-system#sidinställningar) som [språkspecifikt datum](how-to-change-the-system#språkinställningar), i förhållande till idag, HTML-kodad

`page->getDateFormatted($key, $format)`  
Returnera [sidinställning](how-to-change-the-system#sidinställningar) som [datum](https://www.php.net/manual/en/function.date.php)  

`page->getDateFormattedHtml($key, $format)`  
Returnera [sidinställning](how-to-change-the-system#sidinställningar) som [datum](https://www.php.net/manual/en/function.date.php), HTML-kodad  

`page->getContent($rawFormat = false)`  
Returnera sidinnehåll, HTML-kodat eller råformat

`page->getParent()`  
Returnera överordnad sida, null om ingen

`page->getParentTop($homeFallback = false)`  
Returnera överordnad sida på toppnivå, null om ingen 

`page->getSiblings($showInvisible = false)`  
Returnera [page collection](#yellow-page-collection) med sidor på samma nivå 

`page->getChildren($showInvisible = false)`  
Returnera [page collection](#yellow-page-collection) med barnsidor

`page->getChildrenRecursive($showInvisible = false, $levelMax = 0)`  
Returnera [page collection](#yellow-page-collection) med barnsidor rekursivt

`page->getPages($key)`  
Returnera [page collection](#yellow-page-collection) med ytterligare sidor

`page->getPage($key)`  
Returnera delad sida

`page->getUrl()`  
Returnera sidans URL

`page->getBase($multiLanguage = false)`  
Returnera sidans bas

`page->getLocation($absoluteLocation = false)`  
Returnera sidans plats

`page->getRequest($key)`  
Returnera requestargument av sidan

`page->getRequestHtml($key)`  
Returnera requestargument av sidan, HTML-kodad

`page->getHeader($key)`  
Returnera responseheader av sidan

`page->getExtra($name)`  
Returnera extra data för sidan

`page->getModified($httpFormat = false)`  
Returnera sidans ändringsdatum, Unix-tid eller HTTP-format

`page->getLastModified($httpFormat = false)`  
Returnera sidans senaste ändringsdatum, Unix-tid eller HTTP-format

`page->getStatusCode($httpFormat = false)`  
Returnera sidans statuskod, nummer eller HTTP-format

`page->status($statusCode, $location = "")`  
Svara med statuskod, inget sidinnehåll

`page->error($statusCode, $errorMessage = "")`  
Svara med felsidan

`page->isAvailable()`  
Kontrollera om sidan är tillgänglig

`page->isVisible()`  
Kontrollera om sidan är synlig

`page->isActive()`  
Kontrollera om sidan ligger inom aktuella HTTP-begäran

`page->isCacheable()`  
Kontrollera om sidan kan cachelagras

`page->isError()`  
Kontrollera om sidan med fel

`page->isExisting($key)`  
Kontrollera om [sidinställning](how-to-change-the-system#sidinställningar) finns  

`page->isRequest($key)`  
Kontrollera om requestargument finns 

`page->isHeader($key)`  
Kontrollera om responseheader finns

`page->isPage($key)`  
Kontrollera om delad sida finns

#### Yellow page exempel

Layoutfil för att visa sidinnehåll:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContent() ?>
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
<?php echo $this->yellow->page->getContent() ?>
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
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow page collection

Yellow page collection ger tillgång till flera sidor. Följande metoder är tillgängliga:

`append` `diff` `filter` `getFilter` `getModified` `getPageNext` `getPagePrevious` `getPaginationCount` `getPaginationLocation` `getPaginationNext` `getPaginationNumber` `getPaginationPrevious` `intersect` `isEmpty` `isPagination` `limit` `match` `merge` `paginate` `prepend` `reverse` `shuffle` `similar` `sort`

`pages->append($page)`  
Lägg till slutet av page collection

`pages->prepend($page)`  
Placera i början av page collection

`pages->filter($key, $value, $exactMatch = true)`  
Filtrera page collection efter [sidinställning](how-to-change-the-system#sidinställningar)

`pages->match($regex = "/.*/", $filterByLocation = true)`  
Filtrera page collection efter plats eller fil

`pages->sort($key, $ascendingOrder = true)`  
Sortera page collection efter [sidinställning](how-to-change-the-system#sidinställningar)

`pages->similar($page, $ascendingOrder = false)`  
Sortera page collection efter inställningslikhet

`pages->merge($input)`  
Beräkna union, lägg till en page collection

`pages->intersect($input)`  
Beräkna korsningen, ta bort sidor som inte finns i en annan page collection

`pages->diff($input)`  
Beräkna skillnaden, ta bort sidor som finns i en annan page collection

`pages->limit($pagesMax)`  
Begränsa antalet sidor i page collection

`pages->reverse()`  
Omvänd page collection

`pages->shuffle()`  
Gör page collection slumpmässig

`pages->paginate($limit)`  
Skapa en paginering för page collection

`pages->getPaginationNumber()`  
Returnera aktuellt sidnummer i paginering

`pages->getPaginationCount()`  
Returnera högsta sidnummer i paginering

`pages->getPaginationLocation($absoluteLocation = true, $pageNumber = 1)`  
Returnera plats för en sida i paginering 

`pages->getPaginationPrevious($absoluteLocation = true)`  
Returnera plats för föregående sida i paginering

`pages->getPaginationNext($absoluteLocation = true)`  
Returnera plats för nästa sida i paginering

`pages->getPagePrevious($page)`  
Returnera föregående sida i page collection, null om ingen 

`pages->getPageNext($page)`  
Returnera nästa sida i page collection, null om ingen 

`pages->getFilter()`  
Returnera nuvarande sidfilter 

`pages->getModified($httpFormat = false)`  
Returnera ändringsdatum för page collection, Unix-tid eller HTTP-format  

`pages->isPagination()`  
Kontrollera om det finns en paginering

`page->isEmpty()`  
Kontrollera om page collection är tom

#### Yellow page collection exempel

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

Layoutfil för att visa draftsidor:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index(true, true)->filter("status", "draft") ?>
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

### Yellow toolbox

Yellow toolbox ger tillgång till verktygslådan med hjälpfunktioner:

`appendFile` `copyFile` `createFile` `createTextDescription` `deleteDirectory` `deleteFile` `getCookie` `getDirectoryEntries` `getDirectoryEntriesRecursive` `getFileModified` `getFileType` `getLocationArguments` `getServer` `getTextArguments` `getTextLines` `getTextList` `modifyFile` `normaliseArguments` `normaliseData` `normalisePath` `readFile` `renameDirectory` `renameFile`

`toolbox->getCookie($key)`  
Returnera webbläsarkakan för aktuella HTTP-begäran

`toolbox->getServer($key)`  
Returnera serverargument för aktuella HTTP-begäran

`toolbox->getLocationArguments()`  
Returnera platsargument för aktuella HTTP-begäran

`toolbox->getDirectoryEntries($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true)`  
Returnera filer och kataloger

`toolbox->getDirectoryEntriesRecursive($path, $regex = "/.*/", $sort = true, $directories = true, $levelMax = 0)`  
Returnera filer och kataloger rekursivt

`toolbox->readFile($fileName, $sizeMax = 0)`  
Läs fil, tom sträng om den inte hittas

`toolbox->createFile($fileName, $fileData, $mkdir = false)`  
Skapa fil  

`toolbox->appendFile($fileName, $fileData, $mkdir = false)`  
Lägg till fil

`toolbox->copyFile($fileNameSource, $fileNameDestination, $mkdir = false)`  
Kopiera fil

`toolbox->renameFile($fileNameSource, $fileNameDestination, $mkdir = false)`  
Byt namn på en fil

`toolbox->renameDirectory($pathSource, $pathDestination, $mkdir = false)`  
Byt namn på en mapp

`toolbox->deleteFile($fileName, $pathTrash = "")`  
Radera fil  

`toolbox->deleteDirectory($path, $pathTrash = "")`  
Radera mapp  

`toolbox->modifyFile($fileName, $modified)`  
Ställ in ändringsdatum för fil/mapp, Unix-tid 

`toolbox->getFileModified($fileName)`  
Returnera ändringsdatum för fil/mapp, Unix-tid 

`toolbox->getFileType($fileName)`  
Returnera filtyp

`toolbox->getTextLines($text)`  
Returnera rader från text, inklusive radbrytningar

`toolbox->getTextList($text, $separator, $size)`  
Returnera array med specifik storlek från text 

`toolbox->getTextArguments($text, $optional = "-", $sizeMin = 9)`  
Returnera array med variabel storlek från text, separerade av mellanslag

`toolbox->createTextDescription($text, $lengthMax = 0, $removeHtml = true, $endMarker = "", $endMarkerText = "")`  
Skapa textbeskrivning, med eller utan HTML

`toolbox->normaliseArguments($text, $appendSlash = true, $filterStrict = true)`  
Normalisera platsargument

`toolbox->normaliseData($text, $type = "html", $filterStrict = true)`  
Normalisera element och attribut i HTML/SVG-data 

`toolbox->normalisePath($text)`  
Normalisera relativa sökvägsandelar 

#### Yellow toolbox exempel

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
    if ($fileData!=$fileDataNew && !$this->yellow->toolbox->createFile($entry, $fileDataNew)) {
        $this->yellow->log("error", "Can't write file '$entry'!");
    }
}
```

### Yellow string

Följande funktioner utökar PHP-strängfunktioner och variabelfunktioner: 

`is_array_empty` `is_string_empty` `strlenu` `strposu` `strrposu` `strtoloweru` `strtoupperu` `substru`

`strtoloweru($string)`  
Konvertera sträng till gemener, UTF-8-kompatibel

`strtoupperu($string)`  
Konvertera sträng till versaler, UTF-8-kompatibel

`strlenu($string)` + `strlenb($string)`  
Returnera stränglängd, UTF-8 tecken eller byte

`strposu($string, $search)` + `strposb($string, $search)`  
Returnera strängposition för första träffen, UTF-8 tecken eller byte

`strrposu($string, $search)` + `strrposb($string, $search)`  
Returnera strängposition för senaste träffen, UTF-8 tecken eller byte

`substru($string, $start, $length)` + `substrb($string, $start, $length)`  
Returnera en del av en sträng, UTF-8-tecken eller byte

`is_string_empty($string)`  
Kontrollera om strängen är tom

`is_array_empty($array)`  
Kontrollera om arrayen är tom

#### Yellow string exempel

Kod för att konvertera strängar:

``` php
$string = "Datenstrom Yellow är för människor som skapar små webbsidor";
echo strtoloweru($string);    // datenstrom yellow är för människor som skapar små webbsidor
echo strtoupperu($string);    // DATENSTROM YELLOW ÄR FÖR MÄNNISKOR SOM SKAPAR SMÅ WEBBSIDOR
$string = "Text med UTF-8 tecken åäö";
echo strlenu($string);        // 25
echo strposu($string, "UTF"); // 9
echo substru($string, -3, 3); // åäö
```

Kod för att kontrollera om variabler är tomma:

``` php
var_dump(is_string_empty(""));               // bool(true)
var_dump(is_string_empty("text"));           // bool(false)
var_dump(is_string_empty("0"));              // bool(false)
var_dump(is_array_empty(array()));           // bool(true)
var_dump(is_array_empty(new ArrayObject())); // bool(true)
var_dump(is_array_empty(array("entry")));    // bool(false)
```

## Händelser

Med hjälp av händelser kan hemsidan informera när något händer. Först laddas tilläggen och `onLoad` anropas. Så snart alla tillägg har laddats kallas `onStartup`. En sida kan hanteras med olika händelser. I de flesta fall genereras sidinnehållet. Om ett fel har inträffat genereras en felsida. Slutligen matas sidan ut och `onShutdown` anropas.

``` box-drawing {aria-hidden=true}
onLoad ───────▶ onStartup ───────────────────────────────────────────┐
                    │                                                │
                    ▼                                                │
                onRequest ───────────────────┐                       │
                    │                        │                       │
                    ▼                        ▼                       ▼
                onParseMetaData          onEditContentFile       onCommand  
                onParseContentRaw        onEditMediaFile         onCommandHelp
                onParseContentShortcut   onEditSystemFile            │
                onParseContentHtml       onEditUserAccount           │
                onParsePageLayout            │                       │
onUpdate        onParsePageExtra             │                       │
onLog           onParsePageOutput            │                       │
                    │                        │                       │
                    ▼                        │                       │
                onShutDown ◀─────────────────┴───────────────────────┘
```

Följande händelser är tillgängliga:

`onCommand` `onCommandHelp` `onEditContentFile` `onEditMediaFile` `onEditSystemFile` `onEditUserAccount` `onLoad` `onLog` `onParseContentHtml` `onParseContentRaw` `onParseContentShortcut` `onParseMetaData` `onParsePageExtra` `onParsePageLayout` `onParsePageOutput` `onRequest` `onShutdown` `onStartup` `onUpdate`

### Yellow core händelser

Yellow core händelser meddelar när ett tillstånd ändras:

`public function onLoad($yellow)`  
Hantera initialisering

`public function onStartup()`  
Hantera start

`public function onRequest($scheme, $address, $base, $location, $fileName)`  
Hantera begäran

`public function onUpdate($action)`  
Hantera uppdatering

`public function onLog($action, $message)`  
Hantera loggning

`public function onShutdown()`  
Hantera avstängningen

#### Yellow core händelser exempel

Tillägg för hantering av initiering:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.0";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
}
```

Tillägg för hantering av daglig uppdateringshändelse:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.1";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }

    // Handle update
    public function onUpdate($action) {
        if ($action=="daily") {
            $this->yellow->log("info", "Handle daily update event");
        }
    }
}
```

### Yellow parse händelser

Yellow core händelser meddelar när en sida visas:

`public function onParseMetaData($page)`  
Hantera metadata av en sida

`public function onParseContentRaw($page, $text)`  
Hantera sidinnehåll i råformat

`public function onParseContentShortcut($page, $name, $text, $type)`  
Hantera sidinnehåll av förkortning

`public function onParseContentHtml($page, $text)`  
Hantera sidinnehåll i HTML-format

`public function onParsePageLayout($page, $name)`  
Hantera sidlayout

`public function onParsePageExtra($page, $name)`  
Hantera extra data för sidan

`public function onParsePageOutput($page, $text)`  
Hantera output data för sidan

#### Yellow parse händelser exempel

Tillägg för egen förkortning:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.2";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
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

Tillägg för egen header:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.3";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $extensionLocation = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("coreExtensionLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$extensionLocation}example.css\" />\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$extensionLocation}example.js\"></script>\n";
        }
        return $output;
    }
}
```

### Yellow edit händelser

Yellow edit händelser meddelar när en sida redigeras:

`public function onEditContentFile($page, $action, $email)`  
Hantera innehållsfiländringar

`public function onEditMediaFile($file, $action, $email)`  
Hantera mediefiländringar

`public function onEditSystemFile($file, $action, $email)`  
Hantera systemfiländringar

`public function onEditUserAccount($action, $email, $password)`  
Hantera ändringar av användarkonton

#### Yellow edit händelser exempel

Tillägg för hantering av sidredigering:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.4";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle media file changes
    public function onEditContentFile($page, $action, $email) {
        if ($action=="edit") {
            $title = $page->get("title");
            $name = $this->yellow->user->getUser("name", $email);
            $this->yellow->log("info", "Edit page by user '".strtok($name, " ")."'");
        }
    }
}
```

Tillägg för hantering av filuppladdning:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.5";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle media file changes
    public function onEditMediaFile($file, $action, $email) {
        if ($action=="upload") {
            $fileName = $file->fileName;
            $fileType = $this->yellow->toolbox->getFileType($file->get("fileNameShort"));
            $name = $this->yellow->user->getUser("name", $email);
            $this->yellow->log("info", "Upload file by user '".strtok($name, " ")."'");
        }
    }
}
```

### Yellow command händelser

Yellow command händelser när ett kommando körs:

`public function onCommand($command, $text)`  
Hantera kommandon

`public function onCommandHelp()`  
Hantera hjälp för kommandon

#### Yellow command händelser exempel

Tillägg för eget kommando:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.6";
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

Tillägg för flera egna kommandon:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.7";
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

## Relaterad information

* [Hur man använder kommandoraden](https://github.com/annaesvensson/yellow-command/tree/main/README-sv.md)
* [Hur man gör ett tillägg](https://github.com/annaesvensson/yellow-publish/tree/main/README-sv.md)
* [Hur man gör en översättning](https://github.com/annaesvensson/yellow-language/tree/main/README-sv.md)

Har du några frågor? [Få hjälp](.).
