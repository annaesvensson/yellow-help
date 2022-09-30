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

Prefix and suffix are removed from the location, so that it looks better. For example the folder `content/1-home` is available on your website as `http://website/`. The folder `content/9-about` is available on your website as `http://website/about/`. The file `content/2-wiki/wiki-example.md` is available on your website as `http://website/wiki/wiki-example`. 

While most folders are available on your website, there are two exception. The `content/1-home` folder must not contain subfolders. The `content/shared` folder may only be included in other folders, it's not directly available on your website. 

## Text

You can edit your website in a web browser or text editor. At the top of a page you can change `Title` and other [page settings](how-to-change-the-system#page-settings). Below you can change text and images. Text formatting with [Markdown](https://github.com/annaesvensson/yellow-markdown) is supported. You can also use HTML and shortcuts. Here are some examples:

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

Making quotes:

    > Quote
    >> Quote of a quote
    >>> Quote of a quote of a quote

Making links:

    [Link to page](/help/how-to-make-a-small-website)
    [Link to file](/media/downloads/yellow.pdf)
    [Link to website](https://datenstrom.se)

Adding images:

    [image photo.jpg Example]
    [image photo.jpg "This is an example image"]
    [image photo.jpg "This is an especially long description"]

Making tables:

    | Coffee     | Milk | Strength |
    |------------|------|----------|
    | Espresso   | no   | strong   |
    | Macchiato  | yes  | medium   |
    | Cappuccino | yes  | weak     |

Making footnotes:

    Text with a footnote[^1] and some more footnotes.[^2] [^3]
    
    [^1]: Here's the first footnote
    [^2]: Here's the second footnote
    [^3]: Here's the third footnote

Showing source code:

    ```
    Source code will be shown unchanged.
    function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    ```

Making paragraphs:

    Here's the first paragraph. Text can span over several lines
    and can be separated by a blank line from the next paragraph.

    Here's the second paragraph.

Making line breaks:

    Here's the first line⋅⋅
    Here's the second line⋅⋅
    Here's the third line⋅⋅
    
    Spaces at the end of the line are shown with dots (⋅)

Making notices:

    ! Here's a notice with warning
    
    !! Here's a notice with error
    
    !!! Here's a notice with tip

Using CSS:

    ! {.class}
    ! Here's a notice with custom class.
    ! Text can span over several lines
    ! and contain Markdown text formatting.

Using HTML:

    <strong>Text with HTML</strong> can be used optionally.
    <img src="/media/images/photo.jpg" alt="This is an example image">
    <a href="https://datenstrom.se" target="_blank">Open link in new tab</a>.

Using shortcuts:

    [image photo.jpg]     = adding an image
    [gallery photo.*jpg]  = adding an image gallery with popup
    [slider photo.*jpg]   = adding an image gallery with slider
    [youtube fhs55HEl-Gc] = embedding a video
    [toc]                 = making a table of contents

    Shortcuts require additional extensions to work.

Do you have questions? [Get help](.).
