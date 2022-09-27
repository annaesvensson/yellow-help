---
Title: How to customise a theme
---
Here's how to customise the appearance of your website.

## Customising CSS

To adjust the [CSS](https://www.w3schools.com/css/) of your website change the theme. Let's see how themes work. The default theme is defined in the [system settings](how-to-change-the-system#system-settings). A different theme can be defined in the [page settings](how-to-change-the-system#page-settings) at the top of each page, for example `Theme: custom`.

Here's an example file `system/themes/custom.css`:

``` css
.page {
    background-color: #fc4;
    color: #fff;
    text-align: center; 
}
```

## Customising JavaScript

To adjust your website even more you can use [JavaScript](https://www.w3schools.com/js/). This allows you to create dynamic features for websites. You can save JavaScript into a file which has a similar name as the CSS file. Then it will be automatically included.

Here's an example file `system/themes/custom.js`:

``` javascript
var ready = function() {
	console.log("Hello world");
	// Add more JavaScript code here
}
window.addEventListener("DOMContentLoaded", ready, false);
```

## Customising images and files

The `system/themes` folder contains all theme files. You can store your images and font files here, which are used in themes. Each website has a small icon, sometimes called a favicon. The web browser displays this icon for example in the address bar.

Do you have questions? [Get help](.).
