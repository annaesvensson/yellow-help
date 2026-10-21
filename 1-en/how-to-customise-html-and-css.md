---
Title: How to customise HTML and CSS
---
Learn how to customise the appearance of your website.

## Customising HTML

You can customise the appearance of your website with HTML. All HTML files are stored in your `system/layouts` folder. You can change these files as you like and also add your own files. Your changes will not be overwritten when the website is updated. For sophisticated layouts there's an [API for developers](api-for-developers).

The default layout is defined in the [system settings](how-to-change-the-system#system-settings) in file `system/extensions/yellow-system.ini`. A different layout can be defined in the [page settings](how-to-change-the-system#page-settings) at the top of each page, for example `Layout: default`.

Here's an example file `system/layouts/default.html`:

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

Here's an example layout for showing page content and modification date:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
<p>Last updated on <?php echo $this->yellow->page->getDateHtml("modified") ?></p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Here's an example layout for showing page content and additional blog pages:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
<?php $pages = $this->yellow->content->index()->filter("layout", "blog")->sort("published", false)->limit(5) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<?php $this->yellow->page->setHeader("Cache-Control", "max-age=60") ?>
<table>
<?php foreach ($pages as $page): ?>
<tr>
<td><a href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("title") ?></a></td>
<td><?php echo $page->getHtml("author") ?></td>
<td><?php echo $page->getDateHtml("published") ?></td>
</tr>
<?php endforeach ?>
</table>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Note that themes can have their own layout files. For example the file `system/layouts/default.html` will be used with any theme, the file `system/layouts/stockholm-default.html` will only be used with `Theme: stockholm`.

## Customising CSS

You can customise the appearance of your website with CSS. All CSS files are stored in your `system/themes` folder. You can change these files as you like and also add your own files. Your changes will not be overwritten when the website is updated. Colors, fonts and block elements can be customised with CSS.

The default theme is defined in the [system settings](how-to-change-the-system#system-settings) in file `system/extensions/yellow-system.ini`. A different theme can be defined in the [page settings](how-to-change-the-system#page-settings) at the top of each page, for example `Theme: stockholm`.

Here's an example CSS for colors and fonts from the file `system/themes/stockholm.css`:

``` css
:root {
    --bg: #fff;
    --code-bg: #f7f7f7;
    --important-bg: #f0f8fe;
    --heading: #111;
    --text: #333;
    --code: #666;
    --link: #07d;
    --link-active: #29f;
    --blockquote-accent: #29f;
    --important-accent: #08e;
    --separator: #ddd;
    --border: #bbb;
    --font: "Open Sans", Helvetica, sans-serif;
    --monospace-font: Consolas, Menlo, Courier, monospace;
}
```

Here's an example CSS for a custom block element with yellow color:

``` css
.content .example {
    padding: 0.15em;
    background-color: #ffeeaa;
    color: #333;
}
```

Here's an example CSS for a custom block element with bigger font:

``` css
.content .superduper {
    margin: 2em 0;
    font-size: 1.3em;
}
```

## Customising assets

A theme may have HTML, CSS, JavaScript and other files, which are commonly referred to as assets. You can change these files as you like or delete them if you don't need them. Direct access to the `system` folder is not allowed. That's why assets are available via the virtual location `/assets/`. The file formats CSS, GIF, ICO, JS, JPEG, JPG, JSON, MAP, PNG, SCSS, SVG, WEBMANIFEST, WOFF and WOFF2 are supported. For example the CSS file for the Stockholm theme would be file `system/themes/stockholm.css`, available on your website as `http://website/assets/stockholm.css`.

A JavaScript file with a name similar to that of the CSS file is automatically included in your website. For example the corresponding JavaScript file for the Stockholm theme would be the file `system/themes/stockholm.js`, available on your website as `http://website/assets/stockholm.js`.

Your website usually has a small icon, sometimes called a favicon, which is automatically included. Your web browser displays this icon in bookmarks and the address bar. For example the icon for the Stockholm theme would be file `system/themes/stockholm.png`, available on your website as `http://website/assets/stockholm.png`.

Do you have questions? [Get help](.).
