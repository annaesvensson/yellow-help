---
Title: Hur man anpassar HTML och CSS
---
Läs hur man anpassar utseendet på sin webbplats.

## Anpassa HTML

Du kan anpassa utseendet på din webbplats med HTML. Alla HTML-filer finns i `system/layouts` mappen. Du kan ändra dessa filer som du vill och även lägga till dina egna filer. Dina ändringar kommer inte att skrivas över när webbplatsen uppdateras. För sofistikerade layouter finns det ett [API för utvecklare](api-for-developers).

Standardlayouten definieras i [systeminställningarna](how-to-change-the-system#systeminställningar) i filen `system/extensions/yellow-system.ini`. En annan layout kan definieras i [sidinställningarna](how-to-change-the-system#sidinställningar) högst upp på varje sida, till exempel `Layout: default`. 

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
<p>Senast uppdaterad <?php echo $this->yellow->page->getDateHtml("modified") ?></p>
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

## Anpassa CSS

Du kan anpassa utseendet på din webbplats med CSS. Alla CSS-filer finns i `system/themes` mappen. Du kan ändra dessa filer som du vill och även lägga till dina egna filer. Dina ändringar kommer inte att skrivas över när webbplatsen uppdateras. Färger, teckensnitt och blockelement kan anpassas med CSS.

Standardtemat definieras i [systeminställningarna](how-to-change-the-system#systeminställningar) i filen `system/extensions/yellow-system.ini`. Ett annat tema kan definieras i [sidinställningarna](how-to-change-the-system#sidinställningar) högst upp på varje sida, till exempel `Theme: stockholm`.

Här är en exempel-CSS för färger och teckensnitt från filen `system/themes/stockholm.css`:

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

Här är en exempel-CSS för ett eget blockelement med gul färg:

``` css
.content .example {
    padding: 0.15em;
    background-color: #ffeeaa;
    color: #333;
}
```

Här är en exempel-CSS för ett eget blockelement med större teckensnitt:

``` css
.content .superduper {
    margin: 2em 0;
    font-size: 1.3em;
}
```

## Anpassa JavaScript

Ett tema kan ha JavaScript för dynamiska funktioner som inte är möjliga med enbart CSS. Du kan spara JavaScript i en fil som har ett liknande namn som CSS-filen. Då ingår det automatiskt i webbplatsen. Till exempel skulle motsvarande fil för Stockholm-temat vara filen `system/themes/stockholm.js`.

## Anpassa bilder

Ett tema kan ha ytterligare bilder som används i stilmallen. Du kan ändra dessa bilder som du vill och även lägga till dina egna bilder. Varje webbplats har en liten ikon, ibland kallad en favicon. Webbläsaren visar den här ikonen i bokmärken och adressfältet. Till exempel är ikonen för Stockholm-temat filen `system/themes/stockholm.png`.

Har du några frågor? [Få hjälp](.).
