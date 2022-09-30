---
Title: How to make a small wiki
---
Learn how to make your wiki.

[toc]

## First steps

[Follow the installation instructions](how-to-get-started), select `Small wiki` and click `Install`. Your wiki is immediately available. The installation comes with three pages, 'Home', 'Wiki' and 'About'. This is just an example to get you started. Change everything as you like. You can edit wiki pages in a web browser or text editor. Do what fits best into your workflow.

## Edit wiki pages

If you want to edit wiki pages in a web browser, you can do this on your website at `http://website/edit/wiki/`. If you want to edit wiki pages on your computer, have a look inside your `content/2-wiki` folder. Give it a try. Open the file `content/2-wiki/wiki-example.md`. At the top of the page you can change `Title` and other [page settings](how-to-change-the-system#page-settings). Below you can change [text](how-to-change-the-content#text) and [images](how-to-change-the-media#images). Here's an example:

```
---
Title: Wiki example
Layout: wiki
Tag: Example
---
This is an example wiki page. 

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 
```

To create a new wiki page, add a new file to the wiki folder. Set `Title` and more settings at the top of a page. You can use `Tag` to group similar pages together. Here's another example:

```
---
Title: Coffee is good for you
Layout: wiki
Tag: Example, Coffee
---
Coffee is a beverage made from the roasted beans of the coffee plant.

1. Start with fresh coffee. Coffee beans start losing quality immediately 
   after roasting and grinding. The best coffee is made from beans ground 
   right after roasting. 
2. Brew a cup of coffee. Coffee is prepared with different methods and 
   additional flavorings such as milk and sugar. There are Espresso, Filter 
   coffee, French press, Italian Moka, Turkish coffee and many more. Find 
   out what's your favorite.
3. Enjoy.
```

Now let's add a video with the [Youtube extension](https://github.com/annaesvensson/yellow-youtube):

```
---
Title: Coffee is good for you
Layout: wiki
Tag: Example, Coffee, Video
---
Coffee is a beverage made from the roasted beans of the coffee plant.

1. Start with fresh coffee. Coffee beans start losing quality immediately 
   after roasting and grinding. The best coffee is made from beans ground 
   right after roasting. 
2. Brew a cup of coffee. Coffee is prepared with different methods and 
   additional flavorings such as milk and sugar. There are Espresso, Filter 
   coffee, French press, Italian Moka, Turkish coffee and many more. Find 
   out what's your favorite.
3. Enjoy.

[youtube SUpY1BT9Xf4]
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

## Add features, languages and themes

There are [extensions for your website](https://github.com/datenstrom/yellow-extensions) and an [API for developers](api-for-developers).

## Related information

* [How to edit a website in a web browser](https://github.com/annaesvensson/yellow-edit)
* [How to edit a website on your computer](https://github.com/annaesvensson/yellow-core)
* [How to use a wiki](https://github.com/annaesvensson/yellow-wiki)

Do you have questions? [Get help](.).
