---
Title: Hur man anpassar ett språk
---
Så här anpassar du ett språk på din webbplats.

## Enkelspråkigt läge 

Standardspråket definieras [systeminställningarna](how-to-change-the-system#systeminställningar). Ett annat språk kan definieras i [sidinställningarna](how-to-change-the-system#sidinställningar) högst upp på varje sida, till exempel `Language: en`. 

En engelsk sida:

```
---
Title: About
Language: en
---
Birds of a feather flock together.
```

En tysk sida:

```
---
Title: Über
Language: de
---
Wo zusammenwächst was zusammen gehört.
```

En svensk sida:

```
---
Title: Om
Language: sv
---
Lika barn leka bäst.
```

## Flerspråkigt läge

För flerspråkiga webbplatser kan du använda flerspråkigt läge. Till exempel om du översätter en hel webbplats. Öppna filen `system/extensions/yellow-system.ini` och ändra `CoreMultiLanguageMode: 1`. Gå till din innehållsmapp och skapa en ny mapp för varje språk. Här är ett exempel: 

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

Den första skärmdumpen visar mapparna `1-en`,` 2-de` och `3-sv`. Detta ger dig webbadresserna `http://website/` `http://website/de/` `http://website/sv/` för engelska, tyska och svenska. Här är ett annat exempel: 

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

Den andra skärmdumpen visar mapparna `1-en`,` 2-de`, `3-sv` och `default`. Detta ger dig webbadresserna `http://website/en/` `http://website/de/` `http://website/sv/` och en hemsida `http://website/` som automatiskt upptäcker besökarens språk.

För att visa ett språkval kan du skapa en sida som visar tillgängliga språk. Språkvalet kan integreras i navigeringen på din webbplats. Detta gör det möjligt för besökare att välja språk. 

Har du några frågor? [Få hjälp](.).
