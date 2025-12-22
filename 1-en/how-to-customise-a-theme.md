---
Title: How to customise a theme
---
Learn how to customise the appearance of your website.

## Customising CSS

You can customise the appearance of your website with HTML and CSS. All HTML files are stored in your `system/layouts` folder. All CSS files are stored in your `system/themes` folder. You can change these files as you like and also add your own files. Your changes will not be overwritten when the website is updated. Colors, fonts, block elements and other CSS classes are defined in a theme.

Here's the section for colors and fonts from the file `system/themes/stockholm.css`:

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
    margin: 1em 0;
    padding: 0.5em 1em;
    background-color: #fffbf0;
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

Here's an example CSS for a custom layout with centered text:

``` css
.layout-center .content {
    text-align: center;
}
.layout-center .content p {
    font-size: 1.1em;
    max-width: 48em;
    margin: 2em auto;
}
```

## Customising images

A theme may have additional images that are used in the stylesheet. You can change these images as you like and also add your own images. Each website has a small icon, sometimes called a favicon. The web browser displays this icon in bookmarks and the address bar. For example the icon for the Stockholm theme is file `system/themes/stockholm.png`.

## Customising JavaScript

A theme may have JavaScript for dynamic features that are not possible with CSS alone. You can save JavaScript into a file which has a similar name as the CSS file. Then it will be automatically included in the website. For example the corresponding file for the Stockholm theme would be the file `system/themes/stockholm.js`.

## Customising settings

The default theme is defined in the [system settings](how-to-change-the-system#system-settings) in file `system/extensions/yellow-system.ini`. A different theme can be defined in the [page settings](how-to-change-the-system#page-settings) at the top of each page, for example `Theme: stockholm`.

Do you have questions? [Get help](.).
