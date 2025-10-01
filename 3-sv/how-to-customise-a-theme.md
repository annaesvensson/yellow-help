---
Title: Hur man anpassar ett tema
---
Så här anpassar du utseendet på din webbplats.

## Anpassa CSS

Du kan anpassa utseendet på din webbplats med HTML och CSS. Alla HTML-filer finns i `system/layouts` mappen. Alla CSS-filer finns i `system/themes` mappen. Du kan ändra dessa filer som du vill och även lägga till dina egna filer. Dina ändringar kommer inte att skrivas över när webbplatsen uppdateras. Färger, teckensnitt, blockelement och andra CSS-klasser definieras i ett tema.

Här är avsnittet för färger och teckensnitt från filen `system/themes/stockholm.css`:

``` css
:root {
    --bg: #fff;
    --code-bg: #f7f7f7;
    --important-bg: #f0f8fe;
    --note-bg: #fffbf0;
    --heading: #111;
    --text: #333;
    --code: #666;
    --link: #07d;
    --link-active: #29f;
    --blockquote-accent: #29f;
    --important-accent: #08e;
    --note-accent: #fb0;
    --separator: #ddd;
    --border: #bbb;
    --font: "Open Sans", Helvetica, sans-serif;
    --monospace-font: Consolas, Menlo, Courier, monospace;
}
```

Här är en exempel-CSS för att definiera ett eget blockelement:

``` css
.content .example {
    margin: 1em 0;
    padding: 0.5em 1em;
    background-color: #f7f7f7;
    color: #333;
    border-radius: 3px;
}
```

Här är en exempel-CSS för att definiera en centrerad layout:

``` css
.layout-example .content {
    text-align: center;
}
.layout-example .content p {
    font-size: 1.1em;
    max-width: 48em;
    margin: 2em auto;
}
```

## Anpassa bilder

Ett tema kan ha ytterligare bilder som används i stilmallen. Du kan ändra dessa bilder som du vill och även lägga till dina egna bilder. Varje webbplats har en liten ikon, ibland kallad en favicon. Webbläsaren visar den här ikonen i bokmärken och adressfältet. Till exempel är ikonen för Stockholm-temat filen `system/themes/stockholm.png`.

## Anpassa JavaScript

Ett tema kan ha JavaScript för dynamiska funktioner som inte är möjliga med enbart CSS. Du kan spara JavaScript i en fil som har ett liknande namn som CSS-filen. Då ingår det automatiskt i webbplatsen. Till exempel skulle motsvarande fil för Stockholm-temat vara filen `system/themes/stockholm.js`.

## Anpassa inställningar

Standardtemat definieras i [systeminställningarna](how-to-change-the-system#systeminställningar) i filen `system/extensions/yellow-system.ini`. Ett annat tema kan definieras i [sidinställningarna](how-to-change-the-system#sidinställningar) högst upp på varje sida, till exempel `Theme: stockholm`.

Har du några frågor? [Få hjälp](.).
