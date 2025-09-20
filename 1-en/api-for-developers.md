---
Title: API for developers
---
We <3 people who code.

[toc]

## Folder structure

You can edit your website in a text editor. The `content` folder contains the [content files](how-to-change-the-content) of the website. You can edit your website here. The `media` folder contains the [media files](how-to-change-the-media) of the website. You can store your images and files here. The `system` folder contains the [system files](how-to-change-the-system) of the website. You can find configuration files here.

``` box-drawing {aria-hidden=true}
├── content               = content files
│   ├── 1-home            = home page
│   ├── 9-about           = information page
│   └── shared            = shared files
├── media                 = media files
│   ├── downloads         = files for download
│   ├── images            = image files for content
│   └── thumbnails        = image thumbnails for content
└── system                = system files
    ├── extensions        = configurable extension files, for example INI
    ├── layouts           = configurable layout files, for example HTML
    ├── themes            = configurable theme files, for example CSS
    └── workers           = files for developers, designers and translators
```

The following files are important, it is best to take a closer look at them:

`system/extensions/yellow-system.ini` = [file with system settings](how-to-change-the-system#system-settings)  
`system/extensions/yellow-language.ini` = [file with language settings](how-to-change-the-system#language-settings)  
`system/extensions/yellow-user.ini` = [file with user settings](how-to-change-the-system#user-settings)  
`system/extensions/yellow-website.log` = [log file of the website](how-to-change-the-system#log-file)  

## Tools

### Small web editor

You can edit your website in a web browser. The login page is available on your website as `http://website/edit/`. Log in with your user account. You can use the normal navigation, make some changes and see the result immediately. The small web editor allows you to edit content files and upload media files. It is a great way to update your website. Text formatting with Markdown is supported. HTML is also supported. [Learn more about the small web editor](https://github.com/annaesvensson/yellow-edit).

### Small layout system

You can customise the appearance of your website with HTML and CSS. Fortunately you don't have to learn a web framework, but can use normal PHP. This allows you to access content files, create control structures and most of it will probably seem pretty familiar to you as a developer. We are using the same API everywhere, from layout files to extensions. It's worth taking a look at the small layout system sooner or later. [Learn more about layouts](how-to-customise-a-layout) and [themes](how-to-customise-a-theme).

### Built-in web server

You can start a web server at the command line. The built-in web server is convenient for developers, designers and translators. This allows you to change your website on your computer and upload it to your web server later. Open a terminal window. Go to your installation folder, where the file `yellow.php` is. Type `php yellow.php serve`, you can optionally add a URL. Open a web browser and go to the URL shown. [Learn more about the built-in web server](https://github.com/annaesvensson/yellow-serve).

### Static generator

You can generate a static website at the command line. The static generator makes the entire website in advance, instead of waiting for a file to be requested. Open a terminal window. Go to your installation folder, where the file `yellow.php` is. Type `php yellow.php generate`, you can optionally add a folder and a location. This will generate a static website in the `public` folder. Upload the static website to your web server and generate a new one when needed. [Learn more about the static generator](https://github.com/annaesvensson/yellow-generate).

## Objects

With the help of the API you have access to the files, settings and extensions. The API is divided into several objects and basically reflects the file system. There's `$this->yellow->content` to access content files, `$this->yellow->media` to access media files and `$this->yellow->system` to access system settings.

``` box-drawing {aria-hidden=true}
┌────────────────────┐     ┌───────────────────────┐
│ Web browser        │     │ Command line          │
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
│ Files              │     │ Settings              │    │ Extensions         │
└────────────────────┘     └───────────────────────┘    └────────────────────┘
```

The following objects are available:

`$this->yellow` = [access to API](#yellow)  
`$this->yellow->content` = [access to content files](#yellow-content)  
`$this->yellow->media` = [access to media files](#yellow-media)  
`$this->yellow->system` = [access to system settings](#yellow-system)  
`$this->yellow->language` = [access to language settings](#yellow-language)  
`$this->yellow->user` = [access to user settings](#yellow-user)  
`$this->yellow->extension` = [access to extensions](#yellow-extension)  
`$this->yellow->lookup` = [access to lookup and normalisation methods](#yellow-lookup)  
`$this->yellow->toolbox` = [access to toolbox with helper methods](#yellow-toolbox)  
`$this->yellow->page` = [access to current page](#yellow-page)  

### Yellow

The class `Yellow` gives access to the API. The following methods are available:

`command` `getLayoutArguments` `layout` `load` `request`

---

Description of methods and arguments:

`yellow->load(): void`  
Handle initialisation

`yellow->request(): int`  
Handle request from web browser

`yellow->command($line = ""): int`  
Handle command from command line

`yellow->layout($name, $arguments = null): void`  
Include layout

`yellow->getLayoutArguments($sizeMin = 9): array`  
Return layout arguments

---

Layout file with header and footer:

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

The class `YellowContent` gives access to [content files](how-to-change-the-content). The following methods are available:

`clean` `find` `index` `multi` `path` `top`

---

Description of methods and arguments:

`content->find($location, $absoluteLocation = false): YellowPage|null`  
Return [page](#yellow-page), null if not found

`content->index($showInvisible = false): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with pages of the website

`content->top($showInvisible = false): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with top-level navigation

`content->path($location, $absoluteLocation = false): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with path ancestry

`content->multi($location, $absoluteLocation = false, $showInvisible = false): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with multiple languages in multi language mode

`content->clean(): YellowPageCollection`  
Return [page collection](#yellow-page-collection) that is empty

---

Layout file for showing pages:

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

Layout file for showing pages below a specific location:

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

Layout file for showing top-level navigation pages:

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

The class `YellowMedia` gives access to [media files](how-to-change-the-media). The following methods are available:

`clean` `index` `find`

---

Description of methods and arguments:

`media->find($location, $absoluteLocation = false): YellowPage|null`  
Return [page](#yellow-page) with media file information, null if not found

`media->index($showInvisible = false): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with media files

`media->clean(): YellowPageCollection`  
Return [page collection](#yellow-page-collection) that is empty

---

Layout file for showing media files:

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

Layout file for showing latest media files:

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

Layout file for showing media files of a specific type:

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

The class `YellowSystem` gives access to [system settings](how-to-change-the-system#system-settings). The following methods are available:

`get` `getAvailable` `getDifferent` `getHtml` `getModified` `getSettings` `isExisting` `save` `set` `setDefault`

---

Description of methods and arguments:

`system->save($fileName, $settings): bool`  
Save system settings to file

`system->setDefault($key, $value): void`  
Set default system setting

`system->set($key, $value): void`  
Set system setting

`system->get($key): string`  
Return system setting

`system->getHtml($key): string`  
Return system setting, HTML encoded

`system->getDifferent($key): string`  
Return different value for system setting

`system->getAvailable($key): array`  
Return available values for system setting

`system->getSettings($filterStart = "", $filterEnd = ""): array`  
Return system settings

`system->getModified($httpFormat = false): int|string`  
Return system settings modification date, Unix time or HTTP format

`system->isExisting($key): bool`  
Check if system setting exists

---

Layout file for showing webmaster:

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

Layout file for checking if a specific setting is activated:

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

Layout file for showing core settings:

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

The class `YellowLanguage` gives access to [language settings](how-to-change-the-system#language-settings). The following methods are available:

`getDateFormatted` `getDateRelative` `getDateStandard` `getModified` `getSettings` `getText` `getTextHtml` `isExisting` `isText` `setDefaults` `setText`

---

Description of methods and arguments:

`language->setDefaults($lines): void`  
Set default language settings

`language->setText($key, $value, $language): void`  
Set language setting

`language->getText($key, $language = ""): string`  
Return language setting

`language->getTextHtml($key, $language = ""): string`  
Return language setting, HTML encoded

`language->getDateStandard($text, $language = ""): string`  
Return text as [language specific date](how-to-change-the-system#language-settings), convert to one of the standard formats

`language->getDateRelative($timestamp, $format, $daysLimit, $language = ""): string`  
Return Unix time as [date](https://www.php.net/manual/en/function.date.php), relative to today

`language->getDateFormatted($timestamp, $format, $language = ""): string`  
Return Unix time as [date](https://www.php.net/manual/en/function.date.php)

`language->getSettings($filterStart = "", $filterEnd = "", $language = ""): array`  
Return language settings

`language->getModified($httpFormat = false): int|string`  
Return language settings modification date, Unix time or HTTP format

`language->isText($key, $language = ""): bool`  
Check if language setting exists

`language->isExisting($language): bool`  
Check if language exists

---

Layout file for showing a language setting:

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

Layout file for checking if a specific language exists:

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

Layout file for showing languages and translators:

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

The class `YellowUser` gives access to [user settings](how-to-change-the-system#user-settings). The following methods are available:

`getModified` `getSettings` `getUser` `getUserHtml` `isExisting` `isUser` `remove` `save` `setUser`

---

Description of methods and arguments:

`user->save($fileName, $email, $settings): bool`  
Save user settings to file

`user->remove($fileName, $email): bool`  
Remove user settings from file

`user->setUser($key, $value, $email): void`  
Set user setting

`user->getUser($key, $email = ""): string`  
Return user setting

`user->getUserHtml($key, $email = ""): string`  
Return user setting, HTML encoded

`user->getSettings($email = ""): array`  
Return user settings

`user->getModified($httpFormat = false): int|string`  
Return user settings modification date, Unix time or HTTP format

`user->isUser($key, $email = ""): bool`  
Check if user setting exists

`user->isExisting($email): bool`  
Check if user exists

---

Layout file for showing current user:

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

Layout file for checking if a user is logged in:

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

Layout file for showing users and their status:

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

The class `YellowExtension` gives access to [extensions](#extensions). The following methods are available:

`get` `getModified` `isExisting`

---

Description of methods and arguments:

`extension->get($key): object`  
Return extension

`extension->getModified($httpFormat = false): int|string`  
Return extensions modification date, Unix time or HTTP format

`extension->isExisting($key): bool`  
Check if extension exists

---

Layout file for showing extensions:

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

Layout file for checking if a specific extension exists:

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

Code for calling a function from another extension:

``` php
if ($this->yellow->extension->isExisting("image")) {
    $fileName = "media/images/photo.jpg";
    list($src, $width, $height) = $this->yellow->extension->get("image")->getImageInformation($fileName, "100%", "100%");
    echo "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\" />";
}
```

### Yellow lookup

The class `YellowLookup` gives access to lookup and normalisation methods. The following methods are available:

`findContentLocationFromFile` `findFileFromContentLocation` `findFileFromMediaLocation` `findFileFromSystemLocation` `findMediaDirectory` `findMediaLocationFromFile` `findSystemLocationFromFile` `getHtmlAttributes` `getUrlInformation` `isCommandLine` `isContentFile` `isFileLocation` `isMediaFile` `isSystemFile` `isValidFile` `normaliseAddress` `normaliseArguments` `normaliseClass` `normaliseData` `normaliseHeaders` `normaliseLocation` `normaliseName` `normalisePath` `normaliseUrl`

---

Description of methods and arguments:

`lookup->findContentLocationFromFile($fileName): string`  
Return content location from file path

`lookup->findFileFromContentLocation($location, $directory = false): string`  
Return file path from content location

`lookup->findMediaLocationFromFile($fileName): string`  
Return media location from file path

`lookup->findFileFromMediaLocation($location): string`  
Return file path from media location

`lookup->findMediaDirectory($key): string`  
Return media directory from a system setting

`lookup->findSystemLocationFromFile($fileName): string`  
Return system location from file path, for virtually mapped system files

`lookup->findFileFromSystemLocation($location): string`  
Return file path from system location, for virtually mapped system files

`lookup->normaliseName($text, $removePrefix = false, $removeExtension = false, $filterStrict = false): string`  
Normalise name

`lookup->normaliseData($text, $type = "html", $filterStrict = true): string`  
Normalise elements and attributes in HTML/SVG data

`lookup->normaliseAddress($input, $type = "mail", $filterStrict = true): string`  
Normalise name and email for a single address

`lookup->normaliseHeaders($input, $type = "mime", $filterStrict = true): string`  
Normalise fields in MIME headers

`lookup->normaliseClass($text): string`  
Normalise CSS class

`lookup->normalisePath($text): string`  
Normalise relative path tokens

`lookup->normaliseLocation($location, $pageLocation, $filterStrict = true): string`  
Normalise location, make absolute location

`lookup->normaliseArguments($text, $filterStrict = true): string`  
Normalise location arguments

`lookup->normaliseUrl($scheme, $address, $base, $location, $filterStrict = true): string`  
Normalise URL, make absolute URL

`lookup->getUrlInformation($url): string`  
Return URL information

`lookup->getHtmlAttributes($text) : string`  
Return HTML attributes from generic Markdown attributes

`lookup->isFileLocation($location): bool`  
Check if location is specifying file or directory

`lookup->isValidFile($fileName): bool`  
Check if file is valid

`lookup->isContentFile($fileName): bool`  
Check if content file

`lookup->isMediaFile($fileName): bool`  
Check if media file

`lookup->isSystemFile($fileName): bool`  
Check if system file

`lookup->isCommandLine(): bool`  
Check if running at command line

---

Layout file for showing image paths:

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

Layout file for showing page type:

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

Code for breaking up a URL:

``` php
if (!is_string_empty($url)) {
    list($scheme, $address, $base) = $this->yellow->lookup->getUrlInformation($url);
    echo "Found scheme:$scheme address:$address base:$base\n";
}
```

### Yellow toolbox

The class `YellowToolbox` gives access to toolbox with helper methods. The following methods are available:

`appendFile` `copyFile` `createTextDescription` `deleteDirectory` `deleteFile` `getCookie` `getDirectoryEntries` `getDirectoryEntriesRecursive` `getDirectoryInformation` `getDirectoryInformationRecursive` `getFileModified` `getFileSize` `getFileType` `getLocationArguments` `getServer` `getTextArguments` `getTextLines` `getTextList` `log` `mail` `modifyFile` `readFile` `renameDirectory` `renameFile` `writeFile`

---

Description of methods and arguments:

`toolbox->getCookie($key): string`  
Return browser cookie from from current HTTP request  

`toolbox->getServer($key): string`  
Return server argument from current HTTP request

`toolbox->getLocationArguments(): string`  
Return location arguments from current HTTP request

`toolbox->getDirectoryEntries($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true): array`  
Return files and directories

`toolbox->getDirectoryEntriesRecursive($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true, $levelMax = 0): array`  
Return files and directories recursively

`toolbox->getDirectoryInformation($path): array`  
Return directory information, modification date and file count

`toolbox->getDirectoryInformationRecursive($path, $levelMax = 0): array`  
Return directory information recursively, modification date and file count

`toolbox->readFile($fileName, $sizeMax = 0): string`  
Read file, empty string if not found  

`toolbox->writeFile($fileName, $fileData, $mkdir = false): bool`  
Write file  

`toolbox->appendFile($fileName, $fileData, $mkdir = false): bool`  
Append file  

`toolbox->copyFile($fileNameSource, $fileNameDestination, $mkdir = false): bool`  
Copy file  

`toolbox->renameFile($fileNameSource, $fileNameDestination, $mkdir = false): bool`  
Rename file  

`toolbox->renameDirectory($pathSource, $pathDestination, $mkdir = false): bool`  
Rename directory  

`toolbox->deleteFile($fileName, $pathTrash = ""): bool`  
Delete file  

`toolbox->deleteDirectory($path, $pathTrash = ""): bool`  
Delete directory  

`toolbox->modifyFile($fileName, $modified): bool`  
Set file/directory modification date, Unix time  

`toolbox->getFileModified($fileName): int`  
Return file/directory modification date, Unix time  

`toolbox->getFileSize($fileName): int`  
Return file size

`toolbox->getFileType($fileName): string`  
Return file type

`toolbox->getTextLines($text): array`  
Return lines from text, including newline  

`toolbox->getTextList($text, $separator, $size): array`  
Return array of specific size from text  

`toolbox->getTextArguments($text, $optional = "-", $sizeMin = 9): array`  
Return array of variable size from text, space separated  

`toolbox->createTextDescription($text, $lengthMax = 0, $removeHtml = true, $endMarker = "", $endMarkerText = ""): string`  
Create text description, with or without HTML

`toolbox->mail($action, $headers, $message): bool`  
Send email message

`toolbox->log($action, $message): void`  
Write information to log file

---

Code for reading text lines from file:

``` php
$fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
$fileData = $this->yellow->toolbox->readFile($fileName);
foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
    echo $line;
}
```

Code for showing files in a folder:

``` php
$path = $this->yellow->system->get("coreExtensionDirectory");
foreach ($this->yellow->toolbox->getDirectoryEntries($path, "/.*/", true, false) as $entry) {
    echo "Found file $entry\n";
}
```

Code for changing text in multiple files:

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

The class `YellowPage` gives access to a page and its [page settings](how-to-change-the-system#page-settings). The following methods are available:

`error` `get` `getBase` `getChildren` `getChildrenRecursive` `getContentHtml` `getContentRaw` `getDate` `getDateFormatted` `getDateFormattedHtml` `getDateHtml` `getDateRelative` `getDateRelativeHtml` `getExtraHtml` `getHeader` `getHtml` `getLastModified` `getLocation` `getModified` `getPage` `getPages` `getParent` `getParentTop` `getRequest` `getRequestHtml` `getSiblings` `getStatusCode` `getUrl` `isActive` `isAvailable` `isCacheable` `isError` `isExisting` `isHeader` `isPage` `isRequest` `isVisible` `set` `status`

---

Description of methods and arguments:

`page->set($key, $value): void`  
Set page setting

`page->get($key): string`  
Return page setting 

`page->getHtml($key): string`  
Return page setting, HTML encoded  

`page->getDate($key, $format = ""): string`  
Return page setting as [language specific date](how-to-change-the-system#language-settings)  

`page->getDateHtml($key, $format = ""): string`  
Return page setting as [language specific date](how-to-change-the-system#language-settings), HTML encoded  

`page->getDateRelative($key, $format = "", $daysLimit = 30): string`  
Return page setting as [language specific date](how-to-change-the-system#language-settings), relative to today

`page->getDateRelativeHtml($key, $format = "", $daysLimit = 30): string`  
Return page setting as [language specific date](how-to-change-the-system#language-settings), relative to today, HTML encoded

`page->getDateFormatted($key, $format): string`  
Return page setting as [date](https://www.php.net/manual/en/function.date.php)  

`page->getDateFormattedHtml($key, $format): string`  
Return page setting as [date](https://www.php.net/manual/en/function.date.php), HTML encoded  

`page->getContentRaw(): string`  
Return page content data, raw format

`page->getContentHtml(): string`  
Return page content data, HTML encoded

`page->getExtraHtml($name): string`  
Return page extra data, HTML encoded

`page->getParent(): YellowPage|null`  
Return parent page, null if none

`page->getParentTop($homeFallback = false): YellowPage|null`  
Return top-level parent page, null if none

`page->getSiblings($showInvisible = false): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with pages on the same level

`page->getChildren($showInvisible = false): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with child pages

`page->getChildrenRecursive($showInvisible = false, $levelMax = 0): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with child pages recursively

`page->getPages($key): YellowPageCollection`  
Return [page collection](#yellow-page-collection) with additional pages

`page->getPage($key): YellowPage`  
Return shared page

`page->getUrl($canonicalUrl = false): string`  
Return page URL

`page->getBase($multiLanguage = false): string`  
Return page base

`page->getLocation($absoluteLocation = false): string`  
Return page location

`page->getRequest($key): string`  
Return page request argument

`page->getRequestHtml($key): string`  
Return page request argument, HTML encoded

`page->getHeader($key): string`  
Return page response header

`page->getModified($httpFormat = false): int|string`  
Return page modification date, Unix time or HTTP format

`page->getLastModified($httpFormat = false): int|string`  
Return last modification date, Unix time or HTTP format

`page->getStatusCode($httpFormat = false): int|string`  
Return page status code, number or HTTP format

`page->status($statusCode, $location = ""): void`  
Respond with status code, no page content

`page->error($statusCode, $errorMessage = ""): void`  
Respond with error page

`page->isAvailable(): bool`  
Check if page is available

`page->isVisible(): bool`  
Check if page is visible

`page->isActive(): bool`  
Check if page is within current HTTP request

`page->isCacheable(): bool`  
Check if page is cacheable

`page->isError(): bool`  
Check if page with error

`page->isExisting($key): bool`  
Check if page setting exists  

`page->isRequest($key): bool`  
Check if request argument exists

`page->isHeader($key): bool`  
Check if response header exists

`page->isPage($key): bool`  
Check if shared page exists  

---

Layout file for showing page content:

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

Layout file for showing page content and author:

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

Layout file for showing page content and modification date:

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

The class `YellowPageCollection` gives access to multiple pages. The following methods are available:

`append` `diff` `filter` `getFilter` `getModified` `getPageNext` `getPagePrevious` `getPaginationCount` `getPaginationLocation` `getPaginationNext` `getPaginationNumber` `getPaginationPrevious` `group` `intersect` `isEmpty` `isPagination` `limit` `match` `merge` `paginate` `prepend` `remove` `reverse` `shuffle` `similar` `sort`

---

Description of methods and arguments:

`pages->append($page): void`  
Append page to end of page collection

`pages->prepend($page): void`  
Prepend page to start of page collection

`pages->remove($page): YellowPageCollection`  
Remove page from page collection

`pages->filter($key, $value, $exactMatch = true): YellowPageCollection`  
Filter page collection by page setting

`pages->match($regex = "/.*/", $filterByLocation = true): YellowPageCollection`  
Filter page collection by location or file

`pages->similar($page: YellowPageCollection`  
Sort page collection by settings similarity

`pages->sort($key, $ascendingOrder = true): YellowPageCollection`  
Sort page collection by page setting

`pages->group($key, $ascendingOrder = true, $format = ""): array`  
Group page collection by page setting, return array with multiple collections

`pages->merge($input): YellowPageCollection`  
Calculate union, merge page collection

`pages->intersect($input): YellowPageCollection`  
Calculate intersection, remove pages that are not present in another page collection

`pages->diff($input): YellowPageCollection`  
Calculate difference, remove pages that are present in another page collection

`pages->limit($pagesMax): YellowPageCollection`  
Limit the number of pages in page collection

`pages->reverse(): YellowPageCollection`  
Reverse page collection

`pages->shuffle(): YellowPageCollection`  
Randomize page collection

`pages->paginate($limit): YellowPageCollection`  
Paginate page collection

`pages->getPaginationNumber(): int`  
Return current page number in pagination

`pages->getPaginationCount(): int`  
Return highest page number in pagination

`pages->getPaginationLocation($absoluteLocation = true, $pageNumber = 1): string`  
Return location for a page in pagination

`pages->getPaginationPrevious($absoluteLocation = true): string`  
Return location for previous page in pagination

`pages->getPaginationNext($absoluteLocation = true): string`  
Return location for next page in pagination

`pages->getPagePrevious($page): YellowPage|null`  
Return previous page in collection, null if none

`pages->getPageNext($page): YellowPage|null`  
Return next page in collection, null if none

`pages->getFilter(): string`  
Return current page filter

`pages->getModified($httpFormat = false): int|string`  
Return page collection modification date, Unix time or HTTP format

`pages->isPagination(): bool`  
Check if there is a pagination

`pages->isEmpty(): bool`  
Check if page collection is empty

---

Layout file for showing three random pages:

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

Layout file for showing latest pages:

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

Layout file for showing latest pages with pagination:

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

The following functions extend PHP string functions and array functions:

`is_array_empty` `is_string_empty` `strlenu` `strposu` `strrposu` `strtoloweru` `strtoupperu` `substru`

---

Description of functions and arguments:

`strtoloweru($string): string`  
Make string lowercase, UTF-8 compatible

`strtoupperu($string): string`  
Make string uppercase, UTF-8 compatible

`strlenu($string): int` + `strlenb($string): int`  
Return string length, UTF-8 characters or bytes

`strposu($string, $search): int|false` + `strposb($string, $search): int|false`  
Return string position of first match, UTF-8 characters or bytes

`strrposu($string, $search): int|false` + `strrposb($string, $search): int|false`  
Return string position of last match, UTF-8 characters or bytes

`substru($string, $start, $length): string` + `substrb($string, $start, $length): string`  
Return part of a string, UTF-8 characters or bytes

`is_string_empty($string): bool`  
Check if string is empty

`is_array_empty($array): bool`  
Check if array is empty

---

Code for converting strings:

``` php
$string = "For people and machines";
echo strtoloweru($string);                   // for people and machines
echo strtoupperu($string);                   // FOR PEOPLE AND MACHINES
```

Code for accessing strings:

``` php
$string = "Text with UTF-8 characters åäö";
echo strlenu($string);                       // 30
echo strposu($string, "UTF");                // 10
echo substru($string, -3, 3);                // åäö
```

Code for checking if strings are empty:

``` php
var_dump(is_string_empty(""));               // bool(true)
var_dump(is_string_empty("text"));           // bool(false)
var_dump(is_string_empty("0"));              // bool(false)
```

Code for checking if arrays are empty:

``` php
var_dump(is_array_empty(array()));           // bool(true)
var_dump(is_array_empty(new ArrayObject())); // bool(true)
var_dump(is_array_empty(array("entry")));    // bool(false)
```

## Extensions

Your website consists of the core and other extensions. At the beginning, all extensions are loaded and `onLoad` will be called. There are various events that inform you when a request from the web browser is received, a command is executed or information is available. In most cases a page will be generated.

``` box-drawing {aria-hidden=true}
onLoad
    │
    ▼
onStartup ───────────────────────────────────────────┐             Information
    │                                                │             is available
    ▼                                                │                  │
onRequest ───────────────────┐                       │                  │
    │                        │                       │                  │
    ▼                        ▼                       ▼                  ▼
onParseMetaData          onEditContentFile       onCommand          onUpdate
onParseContentRaw        onEditMediaFile         onCommandHelp      onMail
onParseContentElement    onEditSystemFile            │              onLog
onParseContentHtml       onEditUserAccount           │
onParsePageLayout            │                       │
onParsePageExtra             │                       │
onParsePageOutput            │                       │
    │                        │                       │
    ▼                        │                       │
onShutdown ◀─────────────────┴───────────────────────┘
```

The following types of events are available:

`Yellow core events` = [notify when a state has changed](#yellow-core-events)  
`Yellow parse events` = [notify when a page is generated](#yellow-parse-events)  
`Yellow edit events` = [notify when a file is edited](#yellow-edit-events)  
`Yellow info events` = [notify when information is available](#yellow-info-events)  

### Yellow core events

Yellow core events notify when a state has changed. The following events are available:

`onCommand` `onCommandHelp` `onLoad` `onRequest` `onShutdown` `onStartup`

---

Description of events and arguments:

`public function onLoad($yellow)`  
Handle initialisation

`public function onStartup()`  
Handle startup

`public function onRequest($scheme, $address, $base, $location, $fileName)`  
Handle request

`public function onCommand($command, $text)`  
Handle command

`public function onCommandHelp()`  
Handle command help

`public function onShutdown()`  
Handle shutdown

---

Extension for handling the initialisation:

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

Extension for handling a command:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.2";
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

### Yellow parse events

Yellow parse events notify when a page is generated. The following events are available:

`onParseContentElement` `onParseContentHtml` `onParseContentRaw` `onParseMetaData` `onParsePageExtra` `onParsePageLayout` `onParsePageOutput`

The following element types are available:

`inline` = shortcut for inline element  
`block` = shortcut for block element, may contain multiple text lines  
`general` = general block element, may contain multiple text lines  
`code` = code block element, may contain multiple text lines  
`symbol` = symbol for inline element  

---

Description of events and arguments:

`public function onParseMetaData($page)`  
Handle page meta data

`public function onParseContentRaw($page, $text)`  
Handle page content in raw format

`public function onParseContentElement($page, $name, $text, $attributes, $type)`  
Handle page content element

`public function onParseContentHtml($page, $text)`  
Handle page content in HTML format

`public function onParsePageLayout($page, $name)`  
Handle page layout

`public function onParsePageExtra($page, $name)`  
Handle page extra data

`public function onParsePageOutput($page, $text)`  
Handle page output data

---

Extension for creating a custom shortcut:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.3";
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

Extension for creating a HTML header:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.4";
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

### Yellow edit events

Yellow edit events notify when a file is edited. The following events are available:

`onEditContentFile` `onEditMediaFile` `onEditSystemFile` `onEditUserAccount`

The following content actions are available:

`precreate` = page is created, meta data is not ready yet  
`preedit` = page is edited, meta data is not ready yet  
`create` = page is created  
`edit` = page is edited  
`delete` = page is deleted  
`restore` = page is restored  

---

Description of events and arguments:

`public function onEditContentFile($page, $action, $email)`  
Handle content file changes

`public function onEditMediaFile($file, $action, $email)`  
Handle media file changes

`public function onEditSystemFile($file, $action, $email)`  
Handle system file changes

`public function onEditUserAccount($action, $email, $password)`  
Handle user account changes

---

Extension for handling content file changes:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.5";
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

Extension for handling media file changes:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.6";
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

### Yellow info events

Yellow info events notify when information is available. The following events are available:

`onLog` `onMail` `onUpdate`

The following update actions are available:

`clean` = clean up files for static website  
`daily` = daily event for all extensions  
`install` = extension is installed  
`uninstall` = extension is uninstalled  
`update` = extension is updated  

---

Description of events and arguments:

`public function onUpdate($action)`  
Handle update

`public function onMail($action, $headers, $message)`  
Handle email

`public function onLog($action, $message)`  
Handle logging

---

Extension for handling an update event:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.7";
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

Extension for handling a daily event:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.8";
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

## Debug mode

You can use the debug mode to investigate problems or if you are curious about how Datenstrom Yellow works. To activate the debug mode on your website open file `system/extensions/yellow-system.ini` and change `CoreDebugMode: 1`. Depending on the debug mode, more or less information are shown on screen.

Basic information with the setting `CoreDebugMode: 1`:

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage language:en layout:wiki-start theme:stockholm parser:markdown
YellowCore::processRequest file:content/1-en/2-wiki/page.md
YellowCore::request status:200 time:19 ms
```

File system information with the setting `CoreDebugMode: 2`:

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowLanguage::load file:system/extensions/yellow-language.ini
YellowUser::load file:system/extensions/yellow-user.ini
YellowLookup::findFileFromContentLocation /wiki/ -> content/1-en/2-wiki/page.md
YellowContent::scanLocation location:/shared/
YellowLookup::findContentLocationFromFile /shared/page-new-default <- content/1-en/shared/page-new-default.md
YellowLookup::findContentLocationFromFile /shared/page-new-wiki <- content/1-en/shared/page-new-wiki.md
```

Maximum information with the setting `CoreDebugMode: 3`:

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:en
YellowSystem::load Layout:default
YellowSystem::load Theme:stockholm
```

Do you have questions? [Get help](.).
