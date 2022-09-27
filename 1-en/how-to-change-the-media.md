---
Title: How to change the media 
---
All media files are located in the `media` folder. You can store your images and other files here.

``` box-drawing {aria-hidden=true}
├── content
├── media
│   ├── downloads
│   ├── images
│   └── thumbnails
└── system
```

The `media/downloads` folder contains files for download. The `media/images` folder is the place to store your images. The `media/thumbnails` folder contains image thumbnails. You can also add more folders and organise files as you like. Essentially, any media file can be downloaded from the website.

## Downloads

You can provide files for download. All file formats are supported, however the upload may be restricted to file formats MP3, OGG, PDF and ZIP. To add a file, copy the file into the `media/downloads` folder and make a link. You can also upload files in a web browser, then the link will be added at the desired spot.

Making a link, different file formats:

    [Download PDF file](/media/downloads/yellow.pdf)
    [Download ZIP file](/media/downloads/yellow.zip)
    [Download audio file](/media/downloads/audio-file.mp3)

## Images

You can use the [image extension](https://github.com/datenstrom/yellow-extensions/tree/master/source/image) to embed images. The image formats GIF, JPG, PNG and SVG are supported. To add an image, copy the image into the `media/images` folder and create an `[image]` shortcut. You can also upload images in a web browser, then the image is added at the desired spot.

Adding an image, different descriptions:

    [image photo.jpg Example]
    [image photo.jpg "This is an example image"]
    [image photo.jpg "This is an especially long description"]

Adding an image, different styles:

    [image photo.jpg Example left]
    [image photo.jpg Example center]
    [image photo.jpg Example right]

Adding an image, different sizes:

    [image photo.jpg Example right 50%]
    [image photo.jpg Example right 64 64]
    [image photo.jpg Example right 320 200]

Adding an image, different sizes with the default style:

    [image photo.jpg Example - 50%]
    [image photo.jpg Example - 64 64]
    [image photo.jpg Example - 320 200]

## Image galleries

You can use the [gallery extension](https://github.com/datenstrom/yellow-extensions/tree/master/source/gallery) or [slider extension](https://github.com/datenstrom/yellow-extensions/tree/master/source/slider) to embed image galleries. The image formats GIF, JPG, PNG and SVG are supported. To add a gallery, copy images into the `media/images` folder and create a `[gallery]` shortcut. You can also upload images in a web browser.

Adding an image gallery with popup, different sortings:

    [gallery photo.*jpg name]
    [gallery photo.*jpg modified]
    [gallery photo.*jpg size]

Adding an image gallery with popup, different sizes:

    [gallery photo.*jpg name zoom 25%]
    [gallery photo.*jpg name zoom 50%]
    [gallery photo.*jpg name zoom 100%]

Adding an image gallery with slider, different sortings:

    [slider photo.*jpg name]
    [slider photo.*jpg modified]
    [slider photo.*jpg size]

Adding an image gallery with slider, different sizes:

    [slider photo.*jpg name loop 25%]
    [slider photo.*jpg name loop 50%]
    [slider photo.*jpg name loop 100%]

## Videos

You can use the [Youtube extension](https://github.com/datenstrom/yellow-extensions/tree/master/source/youtube) to embed videos:

Embedding a video, different videos:

    [youtube fhs55HEl-Gc]
    [youtube wNiyp89pTi0]
    [youtube OV5J6BfToSw]

Embedding a video, different sizes:

    [youtube fhs55HEl-Gc right 50%]
    [youtube fhs55HEl-Gc right 200 112]
    [youtube fhs55HEl-Gc right 400 224]

Do you have questions? [Get help](.).
