---
Title: Wie man die Medien ändert
---
Alle Mediendateien befinden sich im `media`-Verzeichnis. Hier speichert man seine Bilder und andere Dateien.

``` box-drawing {aria-hidden=true}
├── content
├── media
│   ├── downloads
│   ├── images
│   └── thumbnails
└── system
```

Das `media/downloads`-Verzeichnis enthält Dateien zum Herunterladen. Das `media/images`-Verzeichnis ist zum Speichern von Bildern gedacht. Das `media/thumbnails`-Verzeichnis enthält Miniaturbilder. Man kann auch weitere Verzeichnisse hinzufügen und Dateien so organisieren wie man will. Im Grunde genommen kann jede Mediendatei von der Webseite heruntergeladen werden.

## Dateien zum Herunterladen

Du kannst Dateien zum Herunterladen anbieten. Alle Dateiformate werden unterstützt, das Hochladen kann beschränkt sein auf die Dateiformate MP3, OGG, PDF und ZIP. Um eine Datei hinzuzufügen, kopierst du die Datei ins `media/download`-Verzeichnis und erstellst einen Link. Du kannst Dateien auch im Webbrowser hochladen, dann wird der Link an der gewünschten Stelle hinzugefügt.

Link erstellen, unterschiedliche Dateiformate:

    [PDF-Datei herunterladen](/media/downloads/yellow-deutsch.pdf)
    [ZIP-Datei herunterladen](/media/downloads/yellow-main.zip)
    [Audio-Datei herunterladen](/media/downloads/audio-file.mp3)

## Bilder

Du kannst die [Image-Erweiterung](https://github.com/annaesvensson/yellow-image/tree/main/README-de.md) benutzen um Bilder einzubinden. Die Bildformate GIF, JPG, PNG und SVG werden unterstützt. Um ein Bild hinzuzufügen, kopierst du das Bild ins `media/images`-Verzeichnis und erstellst eine `[image]`-Abkürzung. Du kannst Bilder auch im Webbrowser hochladen, dann wird das Bild an der gewünschten Stelle hinzugefügt.

Bild hinzufügen, unterschiedliche Beschreibungen:

    [image photo.jpg Beispiel]
    [image photo.jpg "Dies ist ein Beispielbild"]
    [image photo.jpg "Dies ist eine besonders lange Beschreibung"]

Bild hinzufügen, unterschiedliche Stile:

    [image photo.jpg Beispiel left]
    [image photo.jpg Beispiel center]
    [image photo.jpg Beispiel right]

Bild hinzufügen, unterschiedliche Größen:

    [image photo.jpg Beispiel right 50%]
    [image photo.jpg Beispiel right 64 64]
    [image photo.jpg Beispiel right 320 200]

Bild hinzufügen, unterschiedliche Größen mit dem Standardstil:

    [image photo.jpg Beispiel - 50%]
    [image photo.jpg Beispiel - 64 64]
    [image photo.jpg Beispiel - 320 200]

## Bildergalerien

Du kannst die [Gallery-Erweiterung](https://github.com/annaesvensson/yellow-gallery/tree/main/README-de.md) oder [Slider-Erweiterung](https://github.com/annaesvensson/yellow-slider/tree/main/README-de.md) benutzen um Bildergalerien einzubinden. Die Bildformate GIF, JPG, PNG und SVG werden unterstützt. Um eine Bildergalerie hinzuzufügen, kopierst du die Bilder ins `media/images`-Verzeichnis und erstellst eine `[gallery]`-Abkürzung. Du kannst Bilder auch im Webbrowser hochladen.

Bildergalerie mit Popup hinzufügen, unterschiedliche Sortierungen:

    [gallery photo.*jpg name]
    [gallery photo.*jpg modified]
    [gallery photo.*jpg size]

Bildergalerie mit Popup hinzufügen, unterschiedliche Größen:

    [gallery photo.*jpg name zoom 25%]
    [gallery photo.*jpg name zoom 50%]
    [gallery photo.*jpg name zoom 100%]

Bildergalerie mit Slider hinzufügen, unterschiedliche Sortierungen:

    [slider photo.*jpg name]
    [slider photo.*jpg modified]
    [slider photo.*jpg size]

Bildergalerie mit Slider hinzufügen, unterschiedliche Größen:

    [slider photo.*jpg name loop 25%]
    [slider photo.*jpg name loop 50%]
    [slider photo.*jpg name loop 100%]

## Videos

Du kannst die [Youtube-Erweiterung](https://github.com/annaesvensson/yellow-youtube/tree/main/README-de.md) benutzen um Videos einzubinden.

Video einbinden, unterschiedliche Videos:

    [youtube fhs55HEl-Gc]
    [youtube wNiyp89pTi0]
    [youtube OV5J6BfToSw]

Video einbinden, unterschiedliche Größen:

    [youtube fhs55HEl-Gc right 50%]
    [youtube fhs55HEl-Gc right 200 112]
    [youtube fhs55HEl-Gc right 400 224]

Hast du Fragen? [Hilfe finden](.).
