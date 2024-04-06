---
Title: Hur man ändrar medierna
---
Alla mediefiler finns i `media` mappen. Du kan lagra dina bilder och andra filer här. 

``` box-drawing {aria-hidden=true}
├── content
├── media
│   ├── downloads
│   ├── images
│   └── thumbnails
└── system
```

Mappen `media/downloads` innehåller filer för nedladdning. Mappen `media/images` är platsen för att lagra dina bilder. Mappen `media/thumbnails` innehåller miniatyrbilder. Du kan också lägga till fler mappar och organisera filer som du vill. I grund och botten kan alla mediefiler laddas ner från webbplatsen. 

## Filer för nedladdning 

Du kan tillhandahålla filer för nedladdning. Alla filformat stöds, men uppladdning kan vara begränsad till filformat MP3, OGG, PDF och ZIP. För att lägga till en fil, kopiera filen till `media/downloads` mappen och skapa en länk. Du kan också ladda upp filer i en webbläsare, sedan läggs länken till på önskad plats.

Skapa en länk, olika filformat:

    [Ladda ner PDF-fil](/media/downloads/yellow-svenska.pdf)
    [Ladda ner ZIP-fil](/media/downloads/yellow-main.zip)
    [Ladda ner audio-fil](/media/downloads/audio-file.mp3)

## Bilder

Du kan använda [image-tillägget](https://github.com/annaesvensson/yellow-image/tree/main/README-sv.md) för att bädda in bilder. Bildformaten GIF, JPG, PNG och SVG stöds. För att lägga till en bild, kopiera bilden till `media/images` mappen och skapa en `[image]` förkortning. Du kan också ladda upp bilder i en webbläsare, sedan läggs bilden till på önskad plats.

Lägga till en bild, olika beskrivningar:

    [image photo.jpg Exempel]
    [image photo.jpg "Detta är en exempelbild"]
    [image photo.jpg "Detta är en särskilt lång beskrivning"]

Lägga till en bild, olika stilar:

    [image photo.jpg Exempel left]
    [image photo.jpg Exempel center]
    [image photo.jpg Exempel right]

Lägga till en bild, olika storlekar:

    [image photo.jpg Exempel right 50%]
    [image photo.jpg Exempel right 64 64]
    [image photo.jpg Exempel right 320 200]

Lägga till en bild, olika storlekar med standardstilen:

    [image photo.jpg Exempel - 50%]
    [image photo.jpg Exempel - 64 64]
    [image photo.jpg Exempel - 320 200]

## Bildgallerier

Du kan använda [gallery-tillägget](https://github.com/annaesvensson/yellow-gallery/tree/main/README-sv.md) eller [slider-tillägget](https://github.com/annaesvensson/yellow-slider/tree/main/README-sv.md) för att bädda in bildgallerier. Bildformaten GIF, JPG, PNG och SVG stöds. För att lägga till ett bildgalleri, kopiera bilder till `media/images` mappen och skapa en `[gallery]` förkortning. Du kan också ladda upp bilder i en webbläsare.

Lägga till ett bildgalleri med popup, olika sorteringar:

    [gallery photo.*jpg name]
    [gallery photo.*jpg modified]
    [gallery photo.*jpg size]

Lägga till ett bildgalleri med popup, olika storlekar:

    [gallery photo.*jpg name zoom 25%]
    [gallery photo.*jpg name zoom 50%]
    [gallery photo.*jpg name zoom 100%]

Lägga till ett bildgalleri med reglaget, olika sorteringar:

    [slider photo.*jpg name]
    [slider photo.*jpg modified]
    [slider photo.*jpg size]

Lägga till ett bildgalleri med reglaget, olika storlekar:

    [slider photo.*jpg name loop 25%]
    [slider photo.*jpg name loop 50%]
    [slider photo.*jpg name loop 100%]

## Videor

Du kan använda [Youtube-tillägget](https://github.com/annaesvensson/yellow-youtube/tree/main/README-sv.md) för att bädda in videor: 

Bädda in en video, olika videor:

    [youtube fhs55HEl-Gc]
    [youtube wNiyp89pTi0]
    [youtube OV5J6BfToSw]

Bädda in en video, olika storlekar:

    [youtube fhs55HEl-Gc right 50%]
    [youtube fhs55HEl-Gc right 200 112]
    [youtube fhs55HEl-Gc right 400 224]

Har du några frågor? [Få hjälp](.).
