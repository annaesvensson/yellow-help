---
Title: Contributing guidelines
---
Learn how to work with us and solve problems.

## How to work with us

* Imagine what the user wants to do and what would make life easier.
* Aim for the smallest possible solution, first make it work then make it better.
* Ask yourself, do I need this, do I want this, can I make this better?
* Improve the available extensions and make them more useful.

If you want to work with us, [make an extension](https://datenstrom.se/yellow/extensions/) or [make a translation](how-to-customise-a-language#make-a-translation).

## How to ask a question

* Write the question in the title, it's the first thing everyone will see.
* Describe as precisely as possible what you want to do and which problems you have.
* Add an example, for example Markdown, settings or your source code.
* Select an answer, when your question has been answered.

If you want to ask a question, [start a new discussion](https://github.com/datenstrom/yellow/discussions/categories/ask-a-question).

## How to report a bug

* Explain how to reproduce the bug, with as many information as you have.
* Show the error message, it's best to copy what you see on your screen.
* Add many details, especially the log file `system/extensions/yellow-website.log`.
* Select an answer, when the bug has been fixed.

If you want to report a bug, [start a new discussion](https://github.com/datenstrom/yellow/discussions/categories/report-a-bug).

## Good to know

We are interested in what you want to do and which problems you have. The more we know the better we can help. Our community is a place to help each other. Where you can ask and answer questions. Most answers are provided by members, just like you. Use an online translator if English is not your first language. Don't force anything. You can step out of discussions at any time if the dialog is not constructive. Focus on the people who show interest and want to work together with you. Thank people who point you in the right direction and who write helpful answers. 

You can find us on [GitHub](https://github.com/datenstrom), [Discord](https://discord.gg/NYvTETsHS9) or [contact a human](https://datenstrom.se/contact/).

## Examples

Asking a question about settings:

    Title: How do I change the language of my website?
    
    Hello, during installation I selected the wrong language. Now I want to 
    change the language of my website to English. When I change the settings 
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
    in /var/www/website/system/workers/fika.php. You can reproduce the bug 
    in a new installation, select small website, install the fika extension. 
    Here is my log file `system/extensions/yellow-website.log`:
    
    ```
    2024-04-28 14:13:07 info Install Datenstrom Yellow 0.9, PHP 8.1.27, Apache 2.4.33, Mac
    2024-04-28 14:13:07 info Install extension 'Core 0.9.9'
    2024-04-28 14:13:07 info Install extension 'Markdown 0.9.1'
    2024-04-28 14:13:07 info Install extension 'Stockholm 0.9.2'
    2024-04-28 14:13:07 info Install extension 'English 0.9.2'
    2024-04-28 14:13:07 info Install extension 'German 0.9.2'
    2024-04-28 14:13:07 info Install extension 'Swedish 0.9.2'
    2024-04-28 14:23:11 info Install extension 'Fika 0.9.1'
    2024-04-28 14:23:11 error Process file 'system/workers/fika.php' with fatal error!
    ```
    
    Let me know if you need more information. Thanks for investigating.

## Related information

* [How to make an extension](https://github.com/annaesvensson/yellow-publish)
* [How to make a translation](https://github.com/annaesvensson/yellow-language)
* [How to improve the help](https://github.com/annaesvensson/yellow-help)

Do you have questions? [Get help](.).
