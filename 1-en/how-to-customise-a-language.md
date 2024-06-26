---
Title: How to customise a language
---
Here's how to customise a language of your website.

## Customise language settings

To adjust the language of your website change the [language settings](how-to-change-the-system#language-settings). The language settings contain the settings of all installed extensions. You can also add your own language settings to the configuration file, for example image captions.

## Single language mode

The default language is defined the [system settings](how-to-change-the-system#system-settings). A different language can be defined in the [page settings](how-to-change-the-system#page-settings) at the top of each page, for example `Language: en`.

An English page:

```
---
Title: About
Language: en
---
Birds of a feather flock together.
```

A German page:

```
---
Title: Über
Language: de
---
Wo zusammenwächst was zusammen gehört.
```

A Swedish page:

```
---
Title: Om
Language: sv
---
Lika barn leka bäst.
```

## Multi language mode

For multilingual websites you can use the multi language mode. For example if you translate an entire website. Open file `system/extensions/yellow-system.ini` and change `CoreMultiLanguageMode: 1`. Go to your `content` folder and create a new folder for each language. Here's an example:

```
├── content               
│   ├── 1-en              
│   │   ├── 1-home        = http://website/
│   │   ├── 9-about
│   │   └── shared    
│   ├── 2-de              
│   │   ├── 1-home        = http://website/de/
│   │   ├── 9-about
│   │   └── shared    
│   └── 3-sv              
│       ├── 1-home        = http://website/sv/
│       ├── 9-about
│       └── shared    
├── media                 
└── system                
```

The first screenshot shows the folders `1-en`, `2-de` and `3-sv`. This gives you the URLs `http://website/` `http://website/de/` `http://website/sv/` for English, German and Swedish. Here's another example:

```
├── content               
│   ├── 1-en              
│   │   ├── 1-home        = http://website/en/
│   │   ├── 9-about
│   │   └── shared    
│   ├── 2-de              
│   │   ├── 1-home        = http://website/de/
│   │   ├── 9-about
│   │   └── shared    
│   ├── 3-sv              
│   │   ├── 1-home        = http://website/sv/
│   │   ├── 9-about
│   │   └── shared    
│   └── default           = http://website/       
├── media                 
└── system                
```

The second screenshot shows the folders `1-en`, `2-de`, `3-sv` and `default`. This gives you the URLs `http://website/en/` `http://website/de/` `http://website/sv/` and a home page `http://website/` that automatically detects the visitor's language. 

To show a language selection, you can create a page that lists available languages. The language selection can be integrated into the navigation of your website. This allows visitors to choose the language.

## Make a translation

When you install a website you are greeted with a hello. You can make a translation if a language is missing. Start with the English language file or one of the available languages. This will show you which text lines and text fragments are available. It is enough if you translate the English language file. A maintainer can take care of everything else. [Learn more about translations](https://github.com/annaesvensson/yellow-language).

Do you have questions? [Get help](.).
