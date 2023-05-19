---
Title: Hur man anpassar en layout
---
Så här anpassar du en layout på din webbplats. 

## Anpassa HTML

För att anpassa [HTML](https://www.w3schools.com/html/)-koden på din webbplats ändrar man layouten. Låt oss se hur layouter görs. Standardlayouten definieras i [systeminställningarna](how-to-change-the-system#systeminställningar). En annan layout kan definieras i [sidinställningarna](how-to-change-the-system#sidinställningar) högst upp på varje sida, till exempel `Layout: default`. 

Här är en exempelfil `system/layouts/default.html`:

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

Här är en exempellayout för att visa sidinnehåll och ytterligare HTML-kod:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
<p>Hello world</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa sidinnehåll och ytterligare bloggsidor: 

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

Teman kan ha sina egna layoutfiler för att skriva över den befintliga layouten. Lägg till ett tema i filnamnet. Till exempel kommer filen `system/layouts/default.html` att användas med vilket tema som helst, filen `system/layouts/stockholm-default.html` kommer bara att användas med `Theme: stockholm`. 

Har du några frågor? [Få hjälp](.).
