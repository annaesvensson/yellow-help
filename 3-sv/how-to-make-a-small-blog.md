---
Title: Hur man skapar en liten blogg
---
!!! Den här sidan finns inte på ditt språk. Vill du göra en översättning? [Läs mer](/sv/yellow/help/contributing-guidelines).

[toc]

## First steps

[Follow the installation instructions](how-to-get-started), select `Small blog` and click `Install`. Your blog is immediately available. The installation comes with three pages, 'Home', 'Blog' and 'About'. This is just an example to get you started. Change everything as you like. You can edit blog pages in a web browser or text editor. Do what fits best into your workflow.

## Edit blog pages

If you want to edit blog pages in a web browser, you can do this on your website at `http://website/edit/blog/`. If you want to edit blog pages on your computer, have a look inside your `content/2-blog` folder. Give it a try. Open the file `content/2-blog/2020-04-07-blog-example.md`. At the top of the page you can change `Title` and other [page settings](how-to-change-the-system#page-settings). Below you can change [text](how-to-change-the-content#text) and [images](how-to-change-the-media#images). Here's an example:

```
---
Title: Blog example
Published: 2020-04-07
Author: Datenstrom
Layout: blog
Tag: Example
---
This is an example blog page. 

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 
```

To create a new blog page, add a new file to the blog folder. Set `Published` and more settings at the top of a page. Dates should be written in the format YYYY-MM-DD. The publishing date will be used to sort blog pages. You can use `Tag` to group similar pages together. Here's another example:

```
---
Title: Fika is good for you
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Example, Coffee
---
Fika is a Swedish custom. It's a social coffee break where people 
gather to have a cup of coffee or tea together. You can have fika with 
colleagues at work. You can invite your friends to fika. Fika is such 
an important part of life in Sweden that it is both a verb and a noun. 
How often do you fika?
```

Now let's add a video with the [Youtube extension](https://github.com/datenstrom/yellow-extensions/tree/master/source/youtube):

```
---
Title: Fika is good for you
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Example, Coffee, Video
---
Fika is a Swedish custom. It's a social coffee break where people 
gather to have a cup of coffee or tea together. You can have fika with 
colleagues at work. You can invite your friends to fika. Fika is such 
an important part of life in Sweden that it is both a verb and a noun. 
How often do you fika?

[youtube SUpY1BT9Xf4]
```

You can use `[--more--]` to add a page break at the desired spot. The rest will be shown when a visitor clicks on the blog page:

```
---
Title: Fika is good for you
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Example, Coffee, Video
---
Fika is a Swedish custom. It's a social coffee break where people 
gather to have a cup of coffee or tea together. You can have fika with 
colleagues at work. You can invite your friends to fika. Fika is such 
an important part of life in Sweden that it is both a verb and a noun. 
How often do you fika? [--more--]

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

## Add features, themes and languages

There are [extensions for your website](https://github.com/datenstrom/yellow-extensions) and an [API for developers](api-for-developers).

## Related information

* [How to edit a website in a web browser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit)
* [How to edit a website on your computer](https://github.com/datenstrom/yellow-extensions/tree/master/source/core)
* [How to use a blog](https://github.com/datenstrom/yellow-extensions/tree/master/source/blog)

Do you have questions? [Get help](.).
