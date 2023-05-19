---
Title: Contributing guidelines
---
Learn how to work with us and solve problems.

## How to work with us

* [Improve features, languages, themes](https://github.com/datenstrom/yellow-extensions) and [make your own extension](https://github.com/annaesvensson/yellow-publish).
* Imagine what would make life easier and what the user wants to do.
* Aim for the smallest possible solution, first make it work then make it better.
* Ask yourself, do I need this, do I want this, can I make this better?

## How to ask a question

* [Start a new discussion for each question](https://github.com/datenstrom/yellow/discussions/categories/ask-a-question).
* Write the question in the title, it's the first thing everyone will see.
* Describe as precisely as possible what you want to do and which problems you have.
* Select an answer, when your question has been answered.

## How to report a bug

* [Start a new discussion for each bug](https://github.com/datenstrom/yellow/discussions/categories/report-a-bug).
* Explain how to reproduce the bug, check if it happens every time.
* Add many details, especially the log file `system/extensions/yellow-website.log`.
* Select an answer, when the bug has been fixed.

## Good to know

We make things for people. Work with us, ask questions and report bugs. We are interested in what you want to do and which problems you have. The more we know the better we can help. Our community is a place to help each other. Where you can ask and answer questions. Most answers are provided by members, just like you. Don't force anything. You can step out of discussions at any time if the dialog is not constructive. Focus on the people who show interest and want to work with you. Thank people who point you in the right direction and give them a thumbs up. You can find us on [Discord](https://discord.gg/NYvTETsHS9), [GitHub](https://github.com/datenstrom) or [contact a human](https://datenstrom.se/contact/).

## Examples

Asking a question about settings:

    Title: How do I change the language of my website?
    
    Hello, during installation I selected the wrong language. Now I want to 
    change the language of my website to english. When I change the settings 
    it doesn't work. I checked that the english extension is installed. 
    Here are my settings in file `system/extensions/yellow-system.ini`:
    
    ```
    Sitename: Datenstrom Yellow
    Author: Datenstrom
    Email: webmaster
    Language: english
    Layout: default
    Theme: stockholm
    ```
    
    Let me know if you need more information. Thanks for your help.

Asking a question about layout files:

    Title: How do I show the correct date in layout files?
    
    Hello, I want to show the date a page was last updated, similar to what 
    is shown on wiki pages. I am having some problems with the API, no matter 
    what I do, the generated HTML code always shows the date 1970-01-01.
    Here is my layout file `system/layouts/default.html`:
    
    ```
    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <p>Last updated on <?php echo $this->yellow->page->getDateHtml("updated") ?></p>
    <?php echo $this->yellow->page->getContentHtml() ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>
    ```
    
    Let me know if you need more information. Thanks for your help.

Reporting a bug along with the log file:

    Title: Call to undefined function detectCoffee()
    
    Hello, I get the error message: Call to undefined function detectCoffee() 
    in /var/www/website/system/extensions/fika.php. You can reproduce the bug 
    in a new installation, select small website, install the fika extension. 
    Here is my log file `system/extensions/yellow-website.log`:
    
    ```
    2020-10-28 14:13:07 info Install Datenstrom Yellow 0.8.17, PHP 8.0.24, Apache 2.4.33, Mac
    2020-10-28 14:13:07 info Install extension 'Core 0.8.41'
    2020-10-28 14:13:07 info Install extension 'Markdown 0.8.19'
    2020-10-28 14:13:07 info Install extension 'Stockholm 0.8.13'
    2020-10-28 14:13:07 info Install extension 'English 0.8.27'
    2020-10-28 14:13:07 info Install extension 'German 0.8.27'
    2020-10-28 14:13:07 info Install extension 'Swedish 0.8.27'
    2020-10-28 14:18:11 info Install extension 'Fika 0.8.15'
    2020-10-28 14:18:11 error Can't parse file 'system/extensions/fika.php'!
    ```
    
    Let me know if you need more information. Thanks for investigating.

## Related information

* [How to make an extension](https://github.com/annaesvensson/yellow-publish)
* [How to make a translation](https://github.com/annaesvensson/yellow-language)
* [How to improve the help](https://github.com/annaesvensson/yellow-help)

Do you have questions? [Get help](.).
