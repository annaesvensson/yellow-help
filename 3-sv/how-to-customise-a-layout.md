---
Title: Hur man anpassar en layout
---
Så här anpassar du utseendet på din webbplats.

## Anpassa HTML

Du kan anpassa utseendet på din webbplats med HTML och CSS. Alla HTML-filer finns i `system/layouts` mappen. Alla CSS-filer finns i `system/themes` mappen. Du kan ändra dessa filer som du vill och även lägga till dina egna filer. Dina ändringar kommer inte att skrivas över när webbplatsen uppdateras. För sofistikerade layouter finns det ett [API för utvecklare](api-for-developers).

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

Här är en exempellayout för att visa sidinnehåll och modifieringsdatum:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContentHtml() ?>
<p>Senast redigerad <?php echo $this->yellow->page->getDateHtml("modified") ?></p>
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

Observera att teman kan ha sina egna layoutfiler. Till exempel kommer filen `system/layouts/default.html` att användas med vilket tema som helst, filen `system/layouts/stockholm-default.html` kommer bara att användas med `Theme: stockholm`. 

## Anpassa inställningar

Standardlayouten definieras i [systeminställningarna](how-to-change-the-system#systeminställningar) i filen `system/extensions/yellow-system.ini`. En annan layout kan definieras i [sidinställningarna](how-to-change-the-system#sidinställningar) högst upp på varje sida, till exempel `Layout: default`. 

Har du några frågor? [Få hjälp](.).
