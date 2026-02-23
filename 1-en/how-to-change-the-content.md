---
Title: How to change the content 
---
All content files are located in the `content` folder. You can edit your website here.

``` box-drawing {aria-hidden=true}
├── content
│   ├── 1-home
│   ├── 9-about
│   └── shared
├── media
└── system
```

The `content` folder is available on your website. Every folder has a file called `page.md`. You can add more files and folders. You can also use special characters in file and folder names, for example ÄÖÅ. In other words, what you see in the file manager is the website you get.

## Files and folders

Your website is automatically created from your `content` folder:

1. Folders can have a numerical prefix for sorting, e.g. `1-home` or `9-about`
2. Files can have a numerical prefix for sorting, e.g. `2020-04-07-blog-example.md`
3. Files and folders without a prefix have no special meaning, e.g. `wiki-example.md`

Prefix and suffix are removed from the address, so that it looks better. For example the folder `content/1-home` is available on your website as `http://website/`. The folder `content/9-about` is available on your website as `http://website/about/`. The file `content/2-wiki/wiki-example.md` is available on your website as `http://website/wiki/wiki-example`. 

While most folders are available on your website, there are two exception. The `content/1-home` folder must not contain subfolders. The `content/shared` folder may only be included in other folders, it's not directly available on your website. 

## Text

You can edit your website in a web browser or text editor. At the top of a page you can change `Title` and other [page settings](how-to-change-the-system#page-settings). Below you can change text and images. Text formatting with [Markdown](https://github.com/annaesvensson/yellow-markdown) is supported. HTML is also supported. Here are some examples:

    ---
    Title: Example page
    ---
    This is an example page.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 

Formatting text:

    Normal **bold** *italic* ~~strikethrough~~ `code`

Making a list:

    * item one
    * item two
    * item three

Making an ordered list:

    1. item one
    2. item two
    3. item three

Making a task list:

    - [x] item one
    - [ ] item two
    - [ ] item three

Making a heading:

    # Heading 1
    ## Heading 2
    ### Heading 3

Making links:

    [Link to page](/help/how-to-make-a-small-website)
    [Link to file](/media/downloads/yellow-english.pdf)
    [Link to website](https://datenstrom.se)

Adding images:

    [image photo.jpg Example]
    [image photo.jpg "This is an example image"]
    [image photo.jpg "This is an especially long description"]

Making tables:

    | Coffee     | Milk | Strength |
    |------------|------|----------|
    | Espresso   | no   | strong   |
    | Cortado    | yes  | medium   |
    | Cappuccino | yes  | weak     |

Making footnotes:

    Text with a footnote[^1] and some more footnotes.[^2] [^3]
    
    [^1]: Here's the first footnote
    [^2]: Here's the second footnote
    [^3]: Here's the third footnote

Making paragraphs:

    Here's the first paragraph. Text can span over several lines
    and can be separated by a blank line from the next paragraph.

    Here's the second paragraph.

Making line breaks:

    Here's the first line⋅⋅
    Here's the second line⋅⋅
    Here's the third line⋅⋅
    
    Spaces at the end of the line are shown with dots (⋅)

Making quotes:

    > Quote
    
    >> Quote of a quote
    
    >>> Quote of a quote of a quote

Using shortcuts:

    [image photo.jpg] = adding an image or image thumbnail
    [gallery photo]   = adding an image gallery with popup
    [slider photo]    = adding an image gallery with slider

Using code blocks:

    ```
    Code will be shown unchanged.
    function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    ```

Using collapsible blocks:

    ? Show details
    ?
    ? This is a collapsible block element. It's only
    ? shown when you click on the first paragraph
    ? and can contain Markdown text formatting.

Using general blocks:

    ! Here's a general block element.
    ! Text can span over several lines
    ! and can contain Markdown text formatting.

    ! {.important}
    ! Here's information that needs attention.

    ! {.example}
    ! Here's a custom block element, can be customised with CSS.

Do you have questions? [Get help](.).
