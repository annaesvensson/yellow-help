---
Title: Hur man skapar en liten blogg
---
! {.important}
! Den här sidan finns inte på ditt språk. Vill du göra en översättning? [Läs mer](https://github.com/annaesvensson/yellow-help/blob/main/readme-sv.md).

[toc]

## First steps

[Follow the installation instructions](how-to-get-started), select `Small blog` and click `Install`. Your blog is immediately available. The installation comes with three pages, 'Home', 'Blog' and 'About'. This is just an example to get you started. Change everything as you like. You can edit blog pages in a web browser or text editor. Do what fits best into your workflow.

## Edit blog pages

If you want to edit blog pages in a web browser, you can do this on your website at `http://website/edit/blog/`. If you want to edit blog pages on your computer, have a look inside your `content/3-blog` folder. Give it a try. Open the file `content/3-blog/2020-04-07-blog-example.md`. At the top of the page you can change `Title` and other [page settings](how-to-change-the-system#page-settings). Below you can change [text](how-to-change-the-content#text) and [images](how-to-change-the-media#images). Here's an example:

```
---
Title: Blog example page
Published: 2020-04-07
Author: Datenstrom
Layout: blog
Tag: Example
---
This is an example page.

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

Now let's add a photo with the [image extension](https://github.com/annaesvensson/yellow-image):

```
---
Title: Fika is good for you
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Example, Coffee, Photo
---
Fika is a Swedish custom. It's a social coffee break where people 
gather to have a cup of coffee or tea together. You can have fika with 
colleagues at work. You can invite your friends to fika. Fika is such 
an important part of life in Sweden that it is both a verb and a noun. 
How often do you fika?

[image photo.jpg "This is an example image"]
```

You can use `[--more--]` to add a page break at the desired spot. The rest will be shown when a visitor clicks on the blog page:

```
---
Title: Fika is good for you
Published: 2020-06-01
Author: Datenstrom
Layout: blog
Tag: Example, Coffee, Photo
---
Fika is a Swedish custom. It's a social coffee break where people 
gather to have a cup of coffee or tea together. You can have fika with 
colleagues at work. You can invite your friends to fika. Fika is such 
an important part of life in Sweden that it is both a verb and a noun. 
How often do you fika? [--more--]

[image photo.jpg "This is an example image"]
```

## Show header and footer

To show a header create the file `content/shared/header.md`. Here's an example:

```
---
Title: Header
---
Website is under construction.
```

To show a footer create the file `content/shared/footer.md`. Here's an example:

```
---
Title: Footer
---
[Made with Datenstrom Yellow](https://datenstrom.se/yellow/).
```

## Add features languages and themes

There are [extensions for your website](https://datenstrom.se/yellow/extensions/) and an [API for developers](api-for-developers).

## Related information

* [How to edit a website in a web browser](https://github.com/annaesvensson/yellow-edit)
* [How to edit a website on your computer](https://github.com/annaesvensson/yellow-core)
* [How to use a blog](https://github.com/annaesvensson/yellow-blog)

Do you have questions? [Get help](.).
