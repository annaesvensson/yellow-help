---
Title: Hur man ändrar innehållet
---
Alla innehållsfiler finns i `content` mappen. Du kan redigera din webbplats här.

``` box-drawing {aria-hidden=true}
├── content
│   ├── 1-home
│   ├── 9-about
│   └── shared
├── media
└── system
```

Din `content` mapp finns tillgängliga på din webbplats. Varje mapp har en fil som heter `page.md`. Du kan lägga till fler filer och mappar. Du kan också använda specialtecken i fil- och mappnamn, till exempel ÄÖÅ. Med andra ord det du ser i filhanteraren är webbplatsen du får.

## Filer och mappar

Din webbplats skapas automatiskt från din `content` mapp: 

1. Mappar kan ha ett numeriskt prefix för sortering, t.ex. `1-home` eller `9-about`
2. Filer kan ha ett numeriskt prefix för sortering, t.ex. `2020-04-07-blog-example.md`
3. Filer och mappar utan prefix har ingen speciell betydelse, t.ex. `wiki-example.md`

Prefix och suffix tas bort från adressen, så att det ser bättre ut. Till exempel mappen `content/1-home` är tillgänglig på din webbplats som `http://website/`. Mappen `content/9-about` är tillgänglig på din webbplats som `http://website/about/`. Filen `content/2-wiki/wiki-example.md` är tillgänglig på din webbplats som `http://website/wiki/wiki-example`.

Medan flesta mappar är tillgängliga på din webbplats, finns det två undantag. Mappen `content/1-home` får inte innehålla undermappar. Mappen `content/shared` får bara inkluderas på andra mappar, den är inte direkt tillgänglig på din webbplats.

## Text

Du kan redigera din webbplats i en webbläsare eller textredigerare. Högst upp på en sida kan du ändra `Title` och andra [sidinställningar](how-to-change-the-system#sidinställningar). Nedan kan du ändra text och bilder. Textformatering med [Markdown](https://github.com/annaesvensson/yellow-markdown/tree/main/README-sv.md) stöds. HTML stöds också. Här är några exempel:

    ---
    Title: Exempelsida
    ---
    Detta är en exempelsida.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 

Formatera text:

    Normal **fet** *kursiv* ~~struken~~ `code`

Skapa en lista:

    * objekt ett
    * objekt två
    * objekt tre

Skapa en sorterad lista:

    1. objekt ett
    2. objekt två
    3. objekt tre

Skapa en uppgiftslista:

    - [x] objekt ett
    - [ ] objekt två
    - [ ] objekt tre

Skapa en rubrik:

    # Rubrik 1
    ## Rubrik 2
    ### Rubrik 3

Skapa länkar:

    [Länk till sidan](/help/how-to-make-a-small-website)
    [Länk till fil](/media/downloads/yellow-svenska.pdf)
    [Länk till webbplats](https://datenstrom.se/sv/)

Lägga till bilder:

    [image photo.jpg Exempel]
    [image photo.jpg "Detta är en exempelbild"]
    [image photo.jpg "Detta är en särskilt lång beskrivning"]

Skapa tabeller:

    | Kaffe      | Mjölk | Styrka  |
    |------------|-------|---------|
    | Espresso   | nej   | stark   |
    | Macchiato  | ja    | medium  |
    | Cappuccino | ja    | svag    |

Skapa fotnoter:

    Text med en fotnot[^1] och några fler fotnoter.[^2] [^3]
    
    [^1]: Här är den första fotnoten
    [^2]: Här är den andra fotnoten
    [^3]: Här är den tredje fotnoten

Visa källkod:

    ```
    Källkoden visas oförändrad.
    function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    ```

Skapa paragraf:

    Här är första paragrafen. Text kan sträcka sig över flera rader
    och kan separeras med en tom rad från nästa paragrafen.

    Här är andra paragrafen. 

Skapa radbrytningar:

    Här är första raden⋅⋅
    Här är andra raden⋅⋅
    Här är tredje raden⋅⋅
    
    Mellanslag i slutet av raden representeras av prickar (⋅)

Skapa citat:

    > Citat
    
    >> Citat i citat
    
    >>> Citat i citat i citat

Använd HTML:

    <strong>Text med HTML</strong> kan valfritt användas.
    <img src="/media/images/photo.jpg" alt="This is an example image">
    <a href="https://datenstrom.se" target="_blank">Öppna länken i en ny flik</a>.

Använd förkortningar:

    [image photo.jpg] = lägga till en bild eller miniatyrbild
    [gallery photo]   = lägga till ett bildgalleri med popup
    [slider photo]    = lägga till ett bildgalleri med reglaget

Använd blockelementen:

    ! Här är ett allmänt blockelement.
    ! Text kan sträcka sig över flera rader
    ! och innehåller Markdown-textformatering.

    ! {.important}
    ! Här är information som måste beaktas.

    ! {.note}
    ! Här är information du borde känna till.

Har du några frågor? [Få hjälp](.).
