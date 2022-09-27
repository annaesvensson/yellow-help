---
Title: Wie man eine Sprache anpasst
---
Wie man eine Sprache seiner Webseite anpasst.


## Einsprachen-Modus

Die Standardsprache wird in den [Systemeinstellungen](how-to-change-the-system#systemeinstellungen) festgelegt. Eine andere Sprache lässt sich in den [Seiteneinstellungen](how-to-change-the-system#seiteneinstellungen) ganz oben auf jeder Seite festlegen, zum Beispiel `Language: en`. 

Eine Englische Seite:

```
---
Title: About
Language: en
---
Birds of a feather flock together.
```

Eine Deutsche Seite:

```
---
Title: Über
Language: de
---
Wo zusammenwächst, was zusammen gehört.
```

Eine Schwedische Seite:

```
---
Title: Om
Language: sv
---
Lika barn leka bäst.
```

## Mehrsprachen-Modus

Für mehrsprachige Webseiten kann man den Mehrsprachen-Modus benutzen. Öffne die Datei `system/extensions/yellow-system.ini` und ändere `CoreMultiLanguageMode: 1`. Gehe ins `content`-Verzeichnis und erstelle für jede Sprache ein eigenes Verzeichnis. Hier ist ein Beispiel:

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

Der erste Screenshot zeigt die Verzeichnisse `1-en`, `2-de` und `3-sv`. Das erzeugt die URLs `http://website/` `http://website/de/` `http://website/sv/` für Englisch, Deutsch und Schwedisch. Hier ist noch ein Beispiel:

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

Der zweite Screenshot zeigt die Verzeichnisse `1-en`, `2-de`, `3-sv` und `default`. Das erzeugt die URLs `http://website/en/` `http://website/de/` `http://website/sv/` und die Startseite `http://website/`, welche automatisch die Sprache der Besucher ermittelt. 

Um eine Sprachauswahl anzuzeigen, kannst du eine Seite erstellen welche die vorhandenen Sprachen auflistet. Die Sprachauswahl kann man in die Navigation der Webseite einbauen. Das ermöglicht es Besuchern die Sprache auszuwählen.

Hast du Fragen? [Hilfe finden](.).
