---
Title: API for developers
---
We <3 people who code.

[toc]

## Folder structure

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
    ├── extensions        = installed extensions and configuration files
    ├── layouts           = configurable layout files
    ├── themes            = configurable theme files
    └── trash             = deleted files
```

You can change everything in the file manager on your computer. The `content` folder contains the content files of the website. You can edit your website here. The `media` folder contains the media files of the website. You can store your images and files here. The `system` folder contains the system files of the website. You can customise installed extensions and configuration files here.

`system/extensions/yellow-system.ini` = [file with system settings](how-to-change-the-system#system-settings)  
`system/extensions/yellow-user.ini` = [file with user settings](how-to-change-the-system#user-settings)  
`system/extensions/yellow-language.ini` = [file with language settings](how-to-change-the-system#language-settings)  

## Tools

### Built-in web server

You can start the built-in web server at the command line. The built-in web server is convenient for developers and designers. Open a terminal window. Go to your installation folder, where the file `yellow.php` is. Type `php yellow.php serve`, you can optionally add a URL. Open a web browser and go to the URL shown.

### Built-in web editor

You can edit your website in a web browser. The login page is available on your website as `http://website/edit/`. Log in with your user account. You can use the normal navigation, make some changes and see the result immediately. The built-in web editor allows you to edit content files, upload media files and change system settings. It is a great way to update your website.

### Static site generator

The biggest difference between a static website and a normal website is that a static site generator builds everything in advance, instead of waiting for a file to be requested. Open a terminal window. Go to your installation folder, where the file `yellow.php` is. Type `php yellow.php build`, you can optionally add a folder and a location. This will build a static website in the `public` folder. Upload the static website to your web server and build a new one when needed.

## Objects

The following objects are available:

`$this->yellow->page` = [access to current page](#yellow-page)  
`$this->yellow->content` = [access to content files](#yellow-content)  
`$this->yellow->media` = [access to media files](#yellow-media)  
`$this->yellow->system` = [access to system settings](#yellow-system)  
`$this->yellow->user` = [access to user settings](#yellow-user)  
`$this->yellow->language` = [access to language settings](#yellow-language)  
`$this->yellow->extension` = [access to extensions](#yellow-extension)  
`$this->yellow->toolbox` = [access to toolbox with helper functions](#yellow-toolbox)  

With the help of `$this->yellow` you can access the website. The API is divided into several objects and basically reflects the file system. In the toolbox you can find helper functions and file operations for your own extensions. The source code of the entire API can be found in file `system/extensions/core.php`.

### Yellow page

Yellow page gives access to current page:

**page->get($key)**  
Return [page setting](how-to-change-the-system#page-settings) 

**page->getHtml($key)**  
Return [page setting](how-to-change-the-system#page-settings), HTML encoded  

**page->getDate($key, $format = "")**  
Return [page setting](how-to-change-the-system#page-settings) as [language specific date](how-to-change-the-system#language-settings)  

**page->getDateHtml($key, $format = "")**  
Return [page setting](how-to-change-the-system#page-settings) as [language specific date](how-to-change-the-system#language-settings), HTML encoded  

**page->getDateRelative($key, $format = "", $daysLimit = 30)**  
Return [page setting](how-to-change-the-system#page-settings) as [language specific date](how-to-change-the-system#language-settings), relative to today

**page->getDateRelativeHtml($key, $format = "", $daysLimit = 30)**  
Return [page setting](how-to-change-the-system#page-settings) as [language specific date](how-to-change-the-system#language-settings), relative to today, HTML encoded

**page->getDateFormatted($key, $format)**  
Return [page setting](how-to-change-the-system#page-settings) as [date](https://www.php.net/manual/en/function.date.php)  

**page->getDateFormattedHtml($key, $format)**  
Return [page setting](how-to-change-the-system#page-settings) as [date](https://www.php.net/manual/en/function.date.php), HTML encoded  

**page->getContent($rawFormat = false)**  
Return page content, HTML encoded or raw format

**page->getParent()**  
Return parent page, null if none

**page->getParentTop($homeFallback = false)**  
Return top-level parent page, null if none

**page->getSiblings($showInvisible = false)**  
Return [page collection](#yellow-page-collection) with pages on the same level

**page->getChildren($showInvisible = false)**  
Return [page collection](#yellow-page-collection) with child pages

**page->getChildrenRecursive($showInvisible = false, $levelMax = 0)**  
Return [page collection](#yellow-page-collection) with child pages recursively

**page->getPages($key)**  
Return [page collection](#yellow-page-collection) with additional pages

**page->getPage($key)**  
Return shared page

**page->getUrl()**  
Return page URL

**page->getBase($multiLanguage = false)**  
Return page base

**page->getLocation($absoluteLocation = false)**  
Return page location

**page->getRequest($key)**  
Return page request argument

**page->getRequestHtml($key)**  
Return page request argument, HTML encoded

**page->getHeader($key)**  
Return page response header

**page->getExtra($name)**  
Return page extra data

**page->getModified($httpFormat = false)**  
Return page modification date, Unix time or HTTP format

**page->getLastModified($httpFormat = false)**  
Return last modification date, Unix time or HTTP format

**page->getStatusCode($httpFormat = false)**  
Return page status code, number or HTTP format

**page->status($statusCode, $location = "")**  
Respond with status code, no page content

**page->error($statusCode, $errorMessage = "")**  
Respond with error page

**page->isAvailable()**  
Check if page is available

**page->isVisible()**  
Check if page is visible

**page->isActive()**  
Check if page is within current HTTP request

**page->isCacheable()**  
Check if page is cacheable

**page->isError()**  
Check if page with error

**page->isExisting($key)**  
Check if [page setting](how-to-change-the-system#page-settings) exists  

**page->isRequest($key)**  
Check if request argument exists

**page->isHeader($key)**  
Check if response header exists

**page->isPage($key)**  
Check if shared page exists  

Here's an example layout for showing page content:

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

Here's an example layout for showing page content and author:

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

Here's an example layout for showing page content and modification date:

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

Yellow page collection gives access to multiple pages:

**pages->append($page)**  
Append to end of page collection

**pages->prepend($page)**  
Prepend to start of page collection

**pages->filter($key, $value, $exactMatch = true)**  
Filter page collection by [page setting](how-to-change-the-system#page-settings)

**pages->match($regex = "/.*/", $filterByLocation = true)**  
Filter page collection by location or file

**pages->sort($key, $ascendingOrder = true)**  
Sort page collection by [page setting](how-to-change-the-system#page-settings)

**pages->similar($page, $ascendingOrder = false)**  
Sort page collection by settings similarity

**pages->merge($input)**  
Calculate union, merge page collection

**pages->intersect($input)**  
Calculate intersection, remove pages that are not present in another page collection

**pages->diff($input)**  
Calculate difference, remove pages that are present in another page collection

**pages->limit($pagesMax)**  
Limit the number of pages in page collection

**pages->reverse()**  
Reverse page collection

**pages->shuffle()**  
Randomize page collection

**pages->paginate($limit)**  
Paginate page collection

**pages->getPaginationNumber()**  
Return current page number in pagination

**pages->getPaginationCount()**  
Return highest page number in pagination

**pages->getPaginationLocation($absoluteLocation = true, $pageNumber = 1)**  
Return location for a page in pagination

**pages->getPaginationPrevious($absoluteLocation = true)**  
Return location for previous page in pagination

**pages->getPaginationNext($absoluteLocation = true)**  
Return location for next page in pagination

**pages->getPagePrevious($page)**  
Return previous page in collection, null if none

**pages->getPageNext($page)**  
Return next page in collection, null if none

**pages->getFilter()**  
Return current page filter

**pages->getModified($httpFormat = false)**  
Return page collection modification date, Unix time or HTTP format

**pages->isPagination()**  
Check if there is a pagination

Here's an example layout for showing three random pages:

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

Here's an example layout for showing latest pages:

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

Here's an example layout for showing draft pages:

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

### Yellow content

Yellow content gives access to content files:

**content->find($location, $absoluteLocation = false)**  
Return [page](#yellow-page), null if not found

**content->index($showInvisible = false, $multiLanguage = false, $levelMax = 0)**  
Return [page collection](#yellow-page-collection) with all pages

**content->top($showInvisible = false, $showOnePager = true)**  
Return [page collection](#yellow-page-collection) with top-level navigation

**content->path($location, $absoluteLocation = false)**  
Return [page collection](#yellow-page-collection) with path ancestry

**content->multi($location, $absoluteLocation = false, $showInvisible = false)**  
Return [page collection](#yellow-page-collection) with multiple languages in multi language mode

**content->clean()**  
Return [page collection](#yellow-page-collection) that is empty

Here's an example layout for showing all pages:

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

Here's an example layout for showing pages below a specific location:

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

Here's an example layout for showing top-level navigation pages:

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

Yellow media gives access to media files:

**media->find($location, $absoluteLocation = false)**  
Return [page](#yellow-page) with media file information, null if not found

**media->index($showInvisible = false, $multiPass = false, $levelMax = 0)**  
Return [page collection](#yellow-page-collection) with all media files

**media->clean()**  
Return [page collection](#yellow-page-collection) that is empty

Here's an example layout for showing all media files:

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

Here's an example layout for showing latest media files:

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

Here's an example layout for showing media files of a specific type:

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

Yellow system gives access to system settings:

**system->get($key)**  
Return [system setting](how-to-change-the-system#system-settings)

**system->getHtml($key)**  
Return [system setting](how-to-change-the-system#system-settings), HTML encoded

**system->getSettings($filterStart = "", $filterEnd = "")**  
Return [system settings](how-to-change-the-system#system-settings)

**system->getValues($key)**  
Return supported values for [system setting](how-to-change-the-system#system-settings), empty if not known

**system->getModified($httpFormat = false)**  
Return [system settings](how-to-change-the-system#system-settings) modification date, Unix time or HTTP format

**system->isExisting($key)**  
Check if [system setting](how-to-change-the-system#system-settings) exists

Here's an example layout for showing webmaster:

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

Here's an example layout for checking if a specific setting is activated:

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

Here's an example layout for showing core settings:

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

### Yellow user

Yellow user gives access to user settings:

**user->getUser($key, $email = "")**  
Return [user setting](how-to-change-the-system#user-settings)

**user->getUserHtml($key, $email = "")**  
Return [user setting](how-to-change-the-system#user-settings), HTML encoded

**user->getSettings($email = "")**  
Return [user settings](how-to-change-the-system#user-settings)

**user->getModified($httpFormat = false)**  
Return [user settings](how-to-change-the-system#user-settings) modification date, Unix time or HTTP format

**user->isUser($key, $email = "")**  
Check if [user setting](how-to-change-the-system#user-settings) exists

**user->isExisting($email)**  
Check if user exists

Here's an example layout for showing current user:

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

Here's an example layout for checking if a user is logged in:

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

Here's an example layout for showing users and their status:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getValues("email") as $email): ?>
<?php echo $this->yellow->user->getUserHtml("name", $email) ?> - 
<?php echo $this->yellow->user->getUserHtml("status", $email) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow language

Yellow language gives access to language settings:

**language->getText($key, $language = "")**  
Return [language setting](how-to-change-the-system#language-settings)

**language->getTextHtml($key, $language = "")**  
Return [language setting](how-to-change-the-system#language-settings), HTML encoded

**language->getSettings($filterStart = "", $filterEnd = "", $language = "")**  
Return [language settings](how-to-change-the-system#language-settings)

**language->getModified($httpFormat = false)**  
Return [language settings](how-to-change-the-system#language-settings) modification date, Unix time or HTTP format

**language->isText($key, $language = "")**  
Check if [language setting](how-to-change-the-system#language-settings) exists

**language->isExisting($language)**  
Check if language exists

Here's an example layout for showing a language setting:

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

Here's an example layout for checking if a specific language exists:

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

Here's an example layout for showing languages and translators:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getValues("language") as $language): ?>
<?php echo $this->yellow->language->getTextHtml("languageDescription", $language) ?> - 
<?php echo $this->yellow->language->getTextHtml("languageTranslator", $language) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow extension

Yellow extension gives access to extensions:

**extension->get($key)**  
Return extension

**extension->getModified($httpFormat = false)**  
Return extensions modification date, Unix time or HTTP format

**extension->isExisting($key)**  
Check if extension exists

Here's an example layout for showing extensions:

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

Here's an example layout for checking if a specific extension exists:

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

Here's an example code for calling a function from another extension:

``` php
if ($this->yellow->extension->isExisting("image")) {
    $fileName = "media/images/photo.jpg";
    list($src, $width, $height) = $this->yellow->extension->get("image")->getImageInformation($fileName, "100%", "100%");
    echo "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\" />";
}
```

### Yellow toolbox

Yellow toolbox gives access to toolbox with helper functions:

**toolbox->getCookie($key)**  
Return browser cookie from from current HTTP request  

**toolbox->getServer($key)**  
Return server argument from current HTTP request

**toolbox->getLocationArguments()**  
Return location arguments from current HTTP request

**toolbox->getDirectoryEntries($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true)**  
Return files and directories

**toolbox->getDirectoryEntriesRecursive($path, $regex = "/.*/", $sort = true, $directories = true, $levelMax = 0)**  
Return files and directories recursively

**toolbox->readFile($fileName, $sizeMax = 0)**  
Read file, empty string if not found  

**toolbox->createFile($fileName, $fileData, $mkdir = false)**  
Create file  

**toolbox->appendFile($fileName, $fileData, $mkdir = false)**  
Append file  

**toolbox->copyFile($fileNameSource, $fileNameDestination, $mkdir = false)**  
Copy file  

**toolbox->renameFile($fileNameSource, $fileNameDestination, $mkdir = false)**  
Rename file  

**toolbox->renameDirectory($pathSource, $pathDestination, $mkdir = false)**  
Rename directory  

**toolbox->deleteFile($fileName, $pathTrash = "")**  
Delete file  

**toolbox->deleteDirectory($path, $pathTrash = "")**  
Delete directory  

**toolbox->modifyFile($fileName, $modified)**  
Set file/directory modification date, Unix time  

**toolbox->getFileModified($fileName)**  
Return file/directory modification date, Unix time  

**toolbox->getFileType($fileName)**  
Return file type

**toolbox->getTextLines($text)**  
Return lines from text, including newline  

**toolbox->getTextList($text, $separator, $size)**  
Return array of specific size from text  

**toolbox->getTextArguments($text, $optional = "-", $sizeMin = 9)**  
Return array of variable size from text, space separated  

**toolbox->createTextDescription($text, $lengthMax = 0, $removeHtml = true, $endMarker = "", $endMarkerText = "")**  
Create text description, with or without HTML

**toolbox->normaliseArguments($text, $appendSlash = true, $filterStrict = true)**  
Normalise location arguments

**toolbox->normaliseData($text, $type = "html", $filterStrict = true)**  
Normalise elements and attributes in HTML/SVG data

**toolbox->normalisePath($text)**  
Normalise relative path tokens

Here's an example code for reading text lines from file:

``` php
$fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
$fileData = $this->yellow->toolbox->readFile($fileName);
foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
    echo $line;
}
```

Here's an example code for showing files in a folder:

``` php
$path = $this->yellow->system->get("coreExtensionDirectory");
foreach ($this->yellow->toolbox->getDirectoryEntries($path, "/.*/", true, false) as $entry) {
    echo "Found file $entry\n";
}
```

Here's an example code for changing text in multiple files:

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

The following functions extend PHP string functions:

**strtoloweru($string)**  
Make string lowercase, UTF-8 compatible

**strtoupperu($string)**  
Make string uppercase, UTF-8 compatible

**strlenu($string)** + **strlenb($string)**  
Return string length, UTF-8 characters or bytes

**strposu($string, $search)** + **strposb($string, $search)**  
Return string position of first match, UTF-8 characters or bytes

**strrposu($string, $search)** + **strrposb($string, $search)**  
Return string position of last match, UTF-8 characters or bytes

**substru($string, $start, $length)** + **substrb($string, $start, $length)**  
Return part of a string, UTF-8 characters or bytes

**strempty($string)**  
Check if string is empty

Here's an example code for using various string functions:

```php
$string = "Datenstrom Yellow is for people who make small websites";
echo strtoloweru($string);    // datenstrom yellow is for people who make small websites
echo strtoupperu($string);    // DATENSTROM YELLOW IS FOR PEOPLE WHO MAKE SMALL WEBSITES

$string = "Text with UTF-8 characters åäö";
echo strlenu($string);        // 30
echo strposu($string, "UTF"); // 10
echo substru($string, -3, 3); // åäö

var_dump(strempty("text"));   // bool(false)
var_dump(strempty("0"));      // bool(false)
var_dump(strempty(""));       // bool(true)
```

## Events

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
                onParsePageLayout            │                       ▼
                onParsePageExtra             │                   onUpdate
                onParsePageOutput            │                   onLog
                    │                        │                       │
                    ▼                        │                       │
                onShutDown ◀─────────────────┴───────────────────────┘
```

When a page is displayed, the extensions are loaded and `onLoad` will be called. As soon as all extensions are loaded `onStartup` will be called. The page can be handled with various [parse events](#yellow-parse-events). Then the page content will be generated. If an error has occurred, an error page will be generated. Finally the page is output and `onShutdown` will be called.

When a page is edited, the extensions are loaded and `onLoad` will be called. As soon as all extensions are loaded `onStartup` will be called. Changes at the page can be handled with various [edit events](#yellow-edit-events). Then the page will be saved. Finally a status code is output to reload the page and `onShutdown` will be called.

When a command is executed, the extensions are loaded and `onLoad` will be called. As soon as all extensions are loaded `onStartup` will be called. The command can be handled with various [command events](#yellow-command-events). If no command has been entered, the available commands will be shown. Finally a return code is output and `onShutdown` will be called.

### Yellow core events

Yellow core events notify when a state has changed:

**public function onLoad($yellow)**  
Handle initialisation

**public function onStartup()**  
Handle startup

**public function onRequest($scheme, $address, $base, $location, $fileName)**  
Handle request

**public function onUpdate($action)**  
Handle update

**public function onLog($action, $message)**  
Handle logging

**public function onShutdown()**  
Handle shutdown

Here's an example extension for handling an event:

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

### Yellow parse events

Yellow parse events notify when a page is displayed:

**public function onParseMetaData($page)**  
Handle page meta data

**public function onParseContentRaw($page, $text)**  
Handle page content in raw format

**public function onParseContentShortcut($page, $name, $text, $type)**  
Handle page content of shortcut

**public function onParseContentHtml($page, $text)**  
Handle page content in HTML format

**public function onParsePageLayout($page, $name)**  
Handle page layout

**public function onParsePageExtra($page, $name)**  
Handle page extra data

**public function onParsePageOutput($page, $text)**  
Handle page output data

Here's an example extension for handling a shortcut:

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

### Yellow edit events

Yellow edit events notify when a page is edited:

**public function onEditContentFile($page, $action, $email)**  
Handle content file changes

**public function onEditMediaFile($file, $action, $email)**  
Handle media file changes

**public function onEditSystemFile($file, $action, $email)**  
Handle system file changes

**public function onEditUserAccount($action, $email, $password)**  
Handle user account changes

Here's an example extension for handling a file:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.3";
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
            // Add more code here
        }
    }
}
```

### Yellow command events

Yellow command events notify when a command is executed:

**public function onCommand($command, $text)**  
Handle command

**public function onCommandHelp()**  
Handle command help

Here's an example extension for handling a command:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.4";
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
        return "example\n";
    }
}
```

## Relevant information

* [How to use the command line](https://github.com/annaesvensson/yellow-command)
* [How to make an extension](https://github.com/annaesvensson/yellow-publish)
* [How to make a translation](https://github.com/annaesvensson/yellow-language)

Do you have questions? [Get help](.).
