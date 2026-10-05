# Datenstrom Yellow task list

You can help us with open tasks:

- [ ] Added support for installing extensions in web browser. Users want to install extensions in browser.
- [ ] Added support for light and dark mode to all themes. Light and dark mode is expected on mobile devices.
- [ ] Added support for web forms in Markdown. Users can create email contact forms or a feedback/survey forms.
- [ ] Added support for page history in wiki extension. Users want to see/compare what has changed.
- [ ] Added support for search in static website. Give users similar features in dynamic/static website.
- [ ] Added support for configurable icon generator/bundler/stacker. Better page loading time.
- [ ] Added support for dynamic loading of JS/CSS files in bundler. Better page loading time.
- [ ] Added support for Wysiwyg editor for Markdown. Users can edit websites without much knowledge.
- [ ] Added comment extension, provides a convenient commenting system. Make it no longer experimental.
- [ ] Added maintenance extension, puts website in maintenance mode. Make it no longer experimental.
- [ ] Added math extension, mathematical expressions with TeX/LaTeX. Make it no longer experimental.
- [ ] Added SMTP extension, send emails to a remote server. Websites may not have a working mail system.
- [x] Updated API, added method onGenerate() for static websites. Generate unusual files and URLs.
- [x] Updated API, added method onValidate() for input validation. Developers want to validate HTML forms.
- [x] Updated API, changed page->getBase() to page->getHomeLocation(). API should be understandable.
- [ ] Updated API, YellowPageCollection no longer derives from ArrayObject. ArrayObject interface is strange.
- [ ] Updated contact extension, contact form with better protection. Spammers gonna spam.
- [ ] Updated edit extension, autocomplete for links and tags. Users do less, software does more.
- [ ] Updated edit extension, settings dialog with dropdown menus. Users want important system settings in browser.
- [ ] Updated edit extension toolbar, improved emoji and icon selection dialog. Give users more control.
- [ ] Updated edit extension toolbar, dropdown menus with keyboard navigation Give users more control.
- [ ] Updated edit extension toolbar, buttons accessible on small screens. Disappearing buttons.
- [ ] Updated edit extension toolbar, improved link and file selection dialog. Give users more control.
- [x] Updated feed extension, short URL for a machine readable feed.xml. Some find long URL ugly. 
- [ ] Updated icon extension, SVG stack instead of WOFF font. Developers want consistent files formats.
- [ ] Updated image extension, different media files for light and dark mode. Give users more control.
- [x] Updated sitemap extension, short URL for a machine readable sitemap.xml. Some find long URL ugly.
- [x] Updated website, more information about product feedback. A new way of working together.
- [ ] Updated website, Swedish translation for missing help pages. Better multi language documentation.
- [ ] Tested performance with thousands of content files. For people who make large websites.

## How to improve code

You can find core functionality of websites in the [core](https://github.com/annaesvensson/yellow-core) and everything else in [extensions](https://datenstrom.se/yellow/extensions/). Imagine what the user wants to do and what would make their life easier. Ask yourself, do I need this, do I want this, can I make this better? Remember to focus on people. Not on technical details and lots of features. For experienced developers and designers there's a [style guide](https://github.com/annaesvensson/yellow-help/blob/main/yellow-style-guide.md). Did you improve code? You have three options. The first option is to fork the relevant repository and send a pull request to the developer. It may or may not be accepted. The second option is to [write product feedback](https://datenstrom.se/support/). The third option is to [make a new extension](https://github.com/annaesvensson/yellow-maintain).

## How to improve documentation

You can find basic documentation for websites in the [help](https://github.com/annaesvensson/yellow-help) and more detailed documentation in [extensions](https://datenstrom.se/yellow/extensions/). Imagine what the user wants to do and what would make their life easier. Review the documentation from the perspective of the user. As a general rule, the documentation should consist of several sections, include examples that users can copy/paste, explain settings that users can customise and be written in an easy-to-understand language. For experienced writers there's a [style guide](https://github.com/annaesvensson/yellow-help/blob/main/yellow-style-guide.md). Did you improve documentation? Fork the relevant repository and send a pull request to the developer.

Do you have questions? [Get help](https://datenstrom.se/yellow/help/).
