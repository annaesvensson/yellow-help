---
Title: Wie man den Inhalt ändert
---
Alle Inhaltsdateien befinden sich im `content`-Verzeichnis. Hier bearbeitet man seine Webseite. 

``` box-drawing {aria-hidden=true}
├── content
│   ├── 1-home
│   ├── 9-about
│   └── shared
├── media
└── system
```

Das `content`-Verzeichnis steht auf deiner Webseite zur Verfügung. In jedem Verzeichnis gibt es eine Datei mit Namen `page.md`. Man kann weitere Dateien und Verzeichnisse hinzufügen. Man kann auch Sonderzeichen in Datei- und Verzeichnisnamen benutzen, zum Beispiel ÄÖÅ. Mit anderen Worten, das was du im Dateimanager siehst ist die Webseite die du bekommt.

## Dateien und Verzeichnisse

Deine Webseite wird automatisch aus dem `content`-Verzeichnis erstellt:

1. Verzeichnisse können ein numerisches Präfix zum Sortieren haben, z.B. `1-home` oder `9-about`
2. Dateien können ein numerisches Präfix zum Sortieren haben, z.B. `2020-04-07-blog-example.md`
3. Dateien und Verzeichnisse ohne Präfix haben keine besondere Bedeutung, z.B. `wiki-example.md`

Präfixe und Suffixe werden aus der Adresse entfernt, damit es besser aussieht. Zum Beispiel ist das Verzeichnis `content/1-home` vorhanden als `http://website/`. Das Verzeichnis `content/9-about` ist vorhanden als `http://website/about/`. Die Datei `content/2-wiki/wiki-example.md` ist vorhanden als `http://website/wiki/wiki-example`.

Während die meisten Verzeichnisse auf deiner Website verfügbar sind, gibt es zwei Ausnahmen. Das `content/1-home`-Verzeichnis darf keine Unterverzeichnisse besitzen. Das `content/shared`-Verzeichnis darf nur in andere Verzeichnisse eingebunden werden, es steht auf deiner Webseite nicht direkt zur Verfügung.

## Text

Du kannst deine Webseite im Webbrowser oder Texteditor bearbeiten. Ganz oben auf einer Seite kannst du `Title` und andere [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ändern. Darunter kannst du Text und Bilder ändern. Textformatierung mit [Markdown](https://github.com/annaesvensson/yellow-markdown/tree/main/readme-de.md) wird unterstützt. HTML wird auch unterstützt. Hier sind einige Beispiele:

    ---
    Title: Beispielseite
    ---
    Das ist eine Beispielseite.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.

Text formatieren:

    Normal **Fettschrift** *Kursiv* ~~Durchgestrichen~~ `Code`

Eine Liste erstellen:

    * Punkt eins
    * Punkt zwei
    * Punkt drei

Eine sortierte Liste erstellen:

    1. Punkt eins
    2. Punkt zwei
    3. Punkt drei

Eine Aufgabenliste erstellen:

    - [x] Punkt eins
    - [ ] Punkt zwei
    - [ ] Punkt drei

Eine Überschrift erstellen:

    # Überschrift 1
    ## Überschrift 2
    ### Überschrift 3

Links erstellen:

    [Link zu Seite](/help/how-to-make-a-small-website)
    [Link zu Datei](/media/downloads/yellow-deutsch.pdf)
    [Link zu Webseite](https://datenstrom.se/de/)

Bilder hinzufügen:

    [image photo.jpg Beispiel]
    [image photo.jpg "Dies ist ein Beispielbild"]
    [image photo.jpg "Dies ist eine besonders lange Beschreibung"]

Tabellen erstellen:

    | Kaffee     | Milch | Stärke  |
    |------------|-------|---------|
    | Espresso   | nein  | stark   |
    | Cortado    | ja    | mittel  |
    | Cappuccino | ja    | schwach |

Fußnoten erstellen:

    Text mit einer Fußnote[^1] und noch weiteren Fußnoten.[^2] [^3]
    
    [^1]: Hier ist die erste Fußnote
    [^2]: Hier ist die zweite Fußnote
    [^3]: Hier ist die dritte Fußnote

Absätze erstellen:

    Hier ist der erste Absatz. Der Text kann über mehrere Zeilen gehen
    und kann durch eine Leerzeile vom nächsten Absatz getrennt werden.

    Hier ist der zweite Absatz.

Zeilenumbrüche erstellen:

    Hier ist die erste Zeile⋅⋅
    Hier ist die zweite Zeile⋅⋅
    Hier ist die dritte Zeile⋅⋅
    
    Leerzeichen am Zeilenende sind dargestellt durch Punkte (⋅)

Zitate erstellen:

    > Zitat
    
    >> Zitat im Zitat
    
    >>> Zitat im Zitat im Zitat

Abkürzungen benutzen:

    [image photo.jpg] = Bild oder Miniaturbild hinzufügen
    [gallery photo]   = Bildergalerie mit Popup hinzufügen
    [slider photo]    = Bildergalerie mit Schieber hinzufügen

Codeblöcke benutzen:

    ```
    Code wird unverändert angezeigt.
    function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    ```

Zusammenklappbare Blöcke benutzen:

    ? Details anzeigen
    ?
    ? Dies ist ein zusammenklappbares Blockelement. Es wird
    ? nur angezeigt, wenn man auf den ersten Absatz klickt
    ? und kann Markdown-Textformatierungen beinhalten.

Allgemeine Blöcke benutzen:

    ! Hier ist ein allgemeines Blockelement.
    ! Der Text kann über mehrere Zeilen gehen
    ! und kann Markdown-Textformatierung beinhalten.

    ! {.important}
    ! Hier sind Informationen die Aufmerksamkeit erfordern.

    ! {.example}
    ! Hier ist ein eigenes Blockelement, kann mit CSS angepasst werden.

Hast du Fragen? [Hilfe finden](.).
