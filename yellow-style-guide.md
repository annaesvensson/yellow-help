# Datenstrom Yellow style guide

You should use the following guidelines for your own code:

* Use consistent indentation with 4 spaces, no tabs.
* Use double quotes for strings, not single quotes, e.g. `"Coffee is good for you"`.
* Class names use PascalCase, e.g. `YellowCore`, `YellowEdit`, `YellowFika`.
* Method/function names use camelCase, e.g. `getRequestInformation`, `onLoad`.
* Property/variable names use camelCase, e.g. `$yellow`, `$statusCode`, `$fileName`.
* HTML/CSS related names use kebab-case, e.g. `yellow`, `edit-toolbar`, `fika-logo`.
* File names use kebab-case, with the extension name used as a prefix,  
  e.g. `fika.php`, `fika.css`, `fika.js`, `fika-library.min.js`, `fika-stack.svg`.
* Opening braces `{` are on the same line, closing braces `}` are placed on their own line.
* One space is used after keywords such as `if`, `switch`, `case`, `for`, `while`, `return`,  
  e.g. `switch ($statusCode)`, `for ($i=0; $i<$length; ++$i)`, `return $statusCode`.
* One space is used around parentheses and compound logical operations,  
  e.g. `if ($name=="example" && ($type=="block" || $type=="inline"))`.
* Start each source file with link to a website, that contains license and contact information,  
  e.g. `// Datenstrom Yellow, https://datenstrom.se/yellow/`.
* Use a single-line comment to describe classes, methods and properties,  
  e.g. `// Return request information`.
* Spend time on maintainability and refactoring, neglected design is expensive design.
* Use the same patterns throughout your own code, if unsure strive for consistency.
* Keep methods relatively small, sweet and focused on one thing, if unsure do less.
* Don't keep features/settings/files that are leftovers from experimentation.
* Don't have features/settings/files just in case someone needs them later.
* Don't have code comments inside methods and functions.

You should use the following guidelines for your own documentation:

* Use Markdown for text formatting, use spaces instead of tabs.
* Use appropriate titles, e.g. `How to make a small website`, `Ten principles for good design`
* Extension documentation use titles with a version number, e.g.  `Core 0.9.1`.
* Extension documentation have version numbers that begin with the product release number.
* Extension documentation arrange headings in the following order, all are optional:  
  `How to...`  
  `Examples`  
  `Settings`  
  `Acknowledgements`  
* Settings are described in the following style:  
  `CoreServerUrl` = URL of the website  
  `CoreTimezone` = timezone of the website  
  `CoreDebugMode` = enable debug mode, 0 to 3  
* Files are described in the following style:  
  `system/extensions/yellow-system.ini` = file with system settings  
  `system/extensions/yellow-language.ini` = file with language settings  
  `system/extensions/yellow-user.ini` = file with user settings
* File names  use kebab-case and do not contain any capital letters,  
  e.g. `readme.md`, `how-to-make-a-small-website.md`, `ten-principles-for-good-design.md`
* Use HTML to add a screenshot suitable for Codeberg, GitHub and other platforms,  
  e.g. `<p align="center"><img src="screenshot.png" alt="Screenshot" /></p>`.
* Use HTML at the beginning of a line to add an additional link target to a page,  
  e.g. `<a id="settings-files"></a>`.
* Use the PNG image format for screenshots and thumbnails.
* Check the spelling, British English is the reference language.
* Give examples that users can copy/paste, if unsure add more examples.
* Don't have more than one extension per repository.

You should use the following technical terms, alphabetical order:

* `Datenstrom Yellow` is the full product name of this software - not "Yellow CMS".
* An `extension` gives you additional features, languages and themes - not "plugin".
* A `layout` is a HTML file, it can render a complete or a partial page - not "template".
* A `navigation` is automatically generated from content folders - not "menu bar".
* The `page settings` can be configured at the top of each page - not "front matter".
* A `shortcut` is a way to extend Markdown with additional features - not "shortcode".
* A `static generator` makes the entire website in advance, instead of waiting for the request. 
* The `system settings` contain the settings of the website and of all installed extensions.
* A `theme` is a CSS file, it may come with additional images, fonts, JavaScript and so on.
* A `web editor` allows you to edit a website in a `web browser` - not "admin panel".
* A `web server` is a computer software/hardware required to run a website.

In summary, there are many styles, the point of a style guide is that we have chosen one.

Do you have questions? [Get help](https://datenstrom.se/yellow/help/).
