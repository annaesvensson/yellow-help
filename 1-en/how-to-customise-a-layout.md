---
Title: How to customise a layout
---
Here's how to customise the appearance of your website.

## Customising HTML

You can customise the appearance of your website with HTML and CSS. All HTML files are stored in your `system/layouts` folder. All CSS files are stored in your `system/themes` folder. You can change these files as you like and also add your own files. Your changes will not be overwritten when the website is updated. For sophisticated layouts there's an [API for developers](api-for-developers).

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
<p>Last edited on <?php echo $this->yellow->page->getDateHtml("modified") ?></p>
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

## Customising settings

The default layout is defined in the [system settings](how-to-change-the-system#system-settings) in file `system/extensions/yellow-system.ini`. A different layout can be defined in the [page settings](how-to-change-the-system#page-settings) at the top of each page, for example `Layout: default`.

Do you have questions? [Get help](.).
