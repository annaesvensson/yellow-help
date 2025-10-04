---
Title: How to change the system
---
All system files are located in the `system` folder. You can change your website here.

``` box-drawing {aria-hidden=true}
├── content
├── media
└── system
    ├── extensions
    ├── layouts
    ├── themes
    └── workers
```

The `system/extensions` folder contains configuration files and the log file. You can change the appearance of your website in the `system/layouts` folder and `system/themes` folder. You can change all layouts and themes as you like. Knowledge of HTML and CSS is required. It is better not to change any files in the `system/workers` folder.

## System settings

The main configuration file is `system/extensions/yellow-system.ini`. Here's an example:

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Language: en
    Layout: default
    Theme: stockholm
    Parser: markdown
    Status: public

You can use a [web browser](https://github.com/annaesvensson/yellow-edit) or your [computer](https://github.com/annaesvensson/yellow-core) to change the system settings. The system settings contain the settings of your website and of all installed extensions. The following settings can be configured:

`Sitename` = name of the website  
`Author` = name of the webmaster  
`Email` = email of the webmaster  
`Language` = default language, e.g. `en`  
`Layout` = default layout  
`Theme` = default theme  
`Parser` = default content parser  
`Status` = default page status, [supported status values](#settings-status)  

## Language settings

The language settings are stored in file `system/extensions/yellow-language.ini`. Here's an example:

    Language: en
    CoreDescription: Core functionality of your website.
    CorePaginationPrevious: ← Previous
    CorePaginationNext: Next →
    CoreTimeFormatShort: H:i
    CoreTimeFormatMedium: H:i:s
    CoreTimeFormatLong: H:i:s T
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: Y-m-d
    CoreDateFormatLong: Y-m-d H:i
    media/images/photo.jpg: This is an example image

You can define the language settings here. A language consist of `Language` and other settings. The language settings contain the language settings of your website and all installed extensions. You can also add your own language settings to the configuration file, for example image captions.

## User settings

The user settings are stored in file `system/extensions/yellow-user.ini`. Here's an example:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Developer and designer
    Language: en
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Home: /
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

You can use a [web browser](https://github.com/annaesvensson/yellow-edit) or the [command line](https://github.com/annaesvensson/yellow-core) to create new user accounts. A user account consists of `Email` and other settings. If you don't want that pages are modified in a web browser, then restrict user accounts. Open the configuration file, change `Access` and `Home`. Users are allowed to edit pages within their home page, but nowhere else.

## Page settings

The following settings can be configured at the top of a page:

`Title` = page title  
`TitleContent` = page title shown in content  
`TitleNavigation` = page title shown in navigation  
`TitleHeader` = page title shown in web browser  
`TitleSlug` = page title used for saving the page  
`Description` = page description  
`Author` = page author(s), comma separated  
`Email` = email of page author  
`Language` = page language, e.g. `en`  
`Layout` = page layout  
`LayoutNew` = page layout for creating a new page  
`Theme` = page theme  
`Parser` = page content parser  
`Status` = page status, [supported status values](#settings-status)  
`Redirect` = redirect to a new page or URL  
`Image` = page image  
`ImageAlt` = description of the page image  
`Modified` = page modification date, YYYY-MM-DD format  
`Published` = page publication date, YYYY-MM-DD format  
`Tag` = page tag(s) for categorisation, comma separated  
`Generate` = option(s) for generating a static website, comma separated  
`Comment` = option(s) for showing comments, comma separated  

<a id="settings-status"></a>The following page status values are supported:

`public` = page is a normal page  
`private` = page is not visible, user needs to enter password, [requires private extension](https://github.com/schulle4u/yellow-private)  
`draft` = page is not visible, user needs to log in, [requires draft extension](https://github.com/annaesvensson/yellow-draft)  
`unlisted` = page is not visible, but can be accessed with the correct link  
`shared` = page is not visible, but can be included in other pages  

## Website update

You can use a [web browser](https://github.com/annaesvensson/yellow-update) or the [command line](https://github.com/annaesvensson/yellow-core) to update your website. You decide when you want to update your website. There's also a [what's new page](what-s-new). Here you'll find information about the latest product changes and published extensions. Detailed information can be found in the documentation for each extension.

## Log file

The log file can be found in file `system/extensions/yellow-website.log`. Here's an example:

```
2024-04-28 14:13:07 info Install Datenstrom Yellow 0.9, PHP 8.1.27, Apache 2.4.33, Linux
2024-04-28 14:13:07 info Install extension 'Core 0.9.9'
2024-04-28 14:13:07 info Install extension 'Markdown 0.9.1'
2024-04-28 14:13:07 info Install extension 'Stockholm 0.9.2'
2024-04-28 14:13:07 info Install extension 'English 0.9.2'
2024-04-28 14:13:07 info Install extension 'German 0.9.2'
2024-04-28 14:13:07 info Install extension 'Swedish 0.9.2'
2024-04-28 14:23:11 info Install extension 'Fika 0.9.1'
2024-04-28 14:23:11 error Process file 'system/workers/fika.php' with fatal error!
```

Do you have questions? [Get help](.).
