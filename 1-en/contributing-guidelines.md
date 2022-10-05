---
Title: Contributing guidelines
---
Learn how to work with us and make good products.

## How to ask a question

* [Start a new discussion for each question](https://github.com/datenstrom/yellow/discussions/categories/ask-a-question).
* Write the question in the title, it's the first thing everyone will see.
* Describe in detail what you want to do and which problems you have.
* Select an answer, when your question has been answered.

## How to report a bug

* [Start a new discussion for each bug](https://github.com/datenstrom/yellow/discussions/categories/report-a-bug).
* Explain how to reproduce the bug, check if it happens every time.
* Add many details, especially the log file `system/extensions/yellow-website.log`.
* Select an answer, when the bug has been fixed.

##  How to make an extension

* [Start with a feature](https://github.com/schulle4u/yellow-helloworld), [language](https://github.com/annaesvensson/yellow-language/tree/main/translation/english) or [theme](https://github.com/annaesvensson/yellow-stockholm).
* Think about how to make life easier, focus on people and their everyday life.
* Upload your extension to GitHub, add the topic `datenstrom-yellow` to your repository.
* Make an announcement, when your extension is done.

## How to share your experiences

Ask questions, report bugs and share your experiences. We are interested in what you want to do and which problems you have. The more we know the better we can help. Our community is a place to help each other. Where you can ask and answer questions. Most answers are provided by members, just like you. Don't force anything. Focus on the people who show interest and want to work with you. You can find us on [Discord](https://discord.gg/NYvTETsHS9), [GitHub](https://github.com/datenstrom), [Twitter](https://twitter.com/datenstromnews) or [contact a human](https://datenstrom.se/contact/).

## Examples

Asking a question:

```
How do I change the language of my website?

Hello, during installation I selected the wrong language. Now I want to 
change the language of my website to english. When I change the settings 
it doesn't work. I checked that the english extension is installed. 
Here are my settings in file `system/extensions/yellow-system.ini`:

Sitename: Datenstrom Yellow
Author: Datenstrom
Email: webmaster
Language: english
Layout: default
Theme: stockholm

Thanks for your help.
```

Reporting a bug:

```
Call to undefined function detectTimezone()

Hello, I get the error message: Call to undefined function detectTimezone() 
in /var/www/website/system/extensions/fika.php. You can reproduce the bug 
in a new installation, select small website, install the fika extension. 
Here's my log file `system/extensions/yellow-website.log`:

2020-10-28 14:13:07 info Install Datenstrom Yellow 0.8.17, PHP 7.1.33, Apache 2.4.33, Mac
2020-10-28 14:13:07 info Install extension 'English 0.8.27'
2020-10-28 14:13:07 info Install extension 'German 0.8.27'
2020-10-28 14:13:07 info Install extension 'Swedish 0.8.27'
2020-10-28 14:18:11 info Install extension 'Fika 0.8.15'
2020-10-28 14:18:11 error Can't parse file 'system/extensions/fika.php'!

Let me know if you need more information. Thanks for investigating.
```

## Related information

* [How to make an extension](https://github.com/annaesvensson/yellow-publish)
* [How to make a translation](https://github.com/annaesvensson/yellow-language)
* [How to edit the help](https://github.com/annaesvensson/yellow-help)

Do you have questions? [Get help](.).
