---
Title: How to make a small website
---
Learn how to make your website.

[toc]

## First steps

[Follow the installation instructions](how-to-get-started), select `Small website` and click `Install`. Your website is immediately available. The installation comes with two pages, 'Home' and 'About'. This is just an example to get you started. Change everything as you like. You can edit web pages in a web browser or text editor. Do what fits best into your workflow.

## Edit web pages

If you want to edit web pages in a web browser, you can do this on your website at `http://website/edit/`. If you want to edit web pages on your computer, have a look inside your `content` folder. Give it a try. Open the file `content/1-home/page.md`. At the top of the page you can change `Title` and other [page settings](how-to-change-the-system#page-settings). Below you can change [text](how-to-change-the-content#text) and [images](how-to-change-the-media#images). Here's an example:

```
---
Title: Home
---
[image photo.jpg Example rounded]

[edit - You can edit this page in a web browser] or use a text editor. 
[Get help](https://datenstrom.se/yellow/help/).
```

To create a new page, add a new file to the home folder or to another `content` folder:

```
---
Title: Example page
---
This is an example page.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 
```

Now let's add text formatting:

```
---
Title: Example page
---
This is an example page.

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 

Normal **bold** *italic* ~~strikethrough~~ `code`
```

## Show header and footer

To show a header create the file `content/shared/header.md`. Here's an example:

```
---
Title: Header
Status: shared
---
Website is under construction.
```

To show a footer create the file `content/shared/footer.md`. Here's an example:

```
---
Title: Footer
Status: shared
---
[Made with Datenstrom Yellow](https://datenstrom.se/yellow/).
```

## Add features, themes and languages

There are [extensions for your website](https://github.com/datenstrom/yellow-extensions) and an [API for developers](api-for-developers).

## Related information

* [How to edit a website in a web browser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit)
* [How to edit a website on your computer](https://github.com/datenstrom/yellow-extensions/tree/master/source/core)
* [How to build a static website](https://github.com/datenstrom/yellow-extensions/tree/master/source/command)

Do you have questions? [Get help](.).
