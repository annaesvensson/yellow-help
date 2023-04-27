---
Title: Felsökning
ShowLanguageSelection: 1
---
Läs hur du hittar och åtgärdar problem.

[toc]

## Problem under installationen

Följande felmeddelanden kan uppstå:

```
Datenstrom Yellow requires PHP 7.0 or higher!
```

Installera senaste PHP-versionen på din webbserver.
```
Datenstrom Yellow requires PHP extension!
```

Installera saknade PHP-tillägget på din webbserver. Du behöver `curl gd mbstring zip`.

```
Datenstrom Yellow requires write access!
```

Kör kommandot `chmod -R a+rw *` i installationsmappen. Du kan också använda din SFTP-programvara för att ge skrivbehörighet till alla filer. Det rekommenderas att ge skrivbehörighet till alla filer och mappar i installationsmappen. Så snart webbplatsen har tillräcklig skrivåtkomst i `system`-mappen bör problemet lösas.

```
Datenstrom Yellow requires configuration file!
```

Kopiera medföljande `.htaccess`-filen till installationsmappen. Kontrollera om din SFTP-programvara har en inställning för att visa alla filer. Ibland händer det att filen `.htaccess` förbises under installationen. Efter att saknade konfigurationsfilen har kopierats till installationsmappen bör problemet lösas.

```
Datenstrom Yellow requires rewrite support!
```

Kontrollera webbserverns konfigurationsfil, se [problem med Apache](#problem-med-apache) och [problem med Nginx](#problem-med-nginx). Du måste antingen ändra konfigurationsfilen för din webbserver eller så använder du en annan webbserver. Så snart webbservern vidarebefordrar HTTP-förfrågningar till `yellow.php`, bör problemet lösas.

```
Datenstrom Yellow requires complete upload!
```

Kopiera igen alla medföljande filer till installationsmappen. Kontrollera om din SFTP-programvara visar ett felmeddelande under uppladdningen. Ibland händer det att dataöverföringen avbröts under uppladdningen. Efter att saknade filer har kopierats till installationsmappen bör problemet lösas.

## Problem efter installationen

Följande felmeddelande kan uppstå:

```
Datenstrom Yellow stopped with fatal error. Activate the debug mode for more information.
```

Du kan använda felsökningsläget för att undersöka orsaken till ett problem mer i detalj, för att visa stackspåret av ett program eller om du är nyfiken på hur Datenstrom Yellow fungerar. Beroende på debug-level visas mer eller mindre information på skärmen. Så här aktiverar du felsökningsläget på din webbplats:

Öppna filen `system/extensions/yellow-system.ini` och ändra `CoreDebugMode: 1`.

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage language:sv layout:wiki-start theme:stockholm parser:markdown
YellowCore::processRequest file:content/3-sv/2-wiki/page.md
YellowCore::request status:200 time:19 ms
```

Få filsystem information genom att öka debug-level till `CoreDebugMode: 2`.

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowLanguage::load file:system/extensions/yellow-language.ini
YellowUser::load file:system/extensions/yellow-user.ini
YellowLookup::findFileFromContentLocation /sv/wiki/ -> content/3-sv/2-wiki/page.md
YellowContent::scanLocation location:/sv/shared/
YellowLookup::findContentLocationFromFile /sv/shared/page-new-default <- content/3-sv/shared/page-new-default.md
YellowLookup::findContentLocationFromFile /sv/shared/page-new-wiki <- content/3-sv/shared/page-new-wiki.md
```

Få maximal information genom att öka debug-level till `CoreDebugMode: 3`.

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:sv
YellowSystem::load Layout:default
YellowSystem::load Theme:stockholm
```

Du kan hitta viktig information i loggfilen. Öppna filen `system/extensions/yellow-website.log` och sök efter `error`. Om du inte är säker på hur man åtgärdar ett problem, [rapportera ett fel](contributing-guidelines) tillsammans med loggfilen. Loggfilen ger dig i alla fall en snabb översikt över vad som händer på din webbplats. Här är ett exempel: 

```
2020-10-28 14:13:07 info Install Datenstrom Yellow 0.8.17, PHP 7.1.33, Apache 2.4.33, Mac
2020-10-28 14:13:07 info Install extension 'Core 0.8.41'
2020-10-28 14:13:07 info Install extension 'Markdown 0.8.19'
2020-10-28 14:13:07 info Install extension 'Stockholm 0.8.13'
2020-10-28 14:13:07 info Install extension 'English 0.8.27'
2020-10-28 14:13:07 info Install extension 'German 0.8.27'
2020-10-28 14:13:07 info Install extension 'Swedish 0.8.27'
2020-10-28 14:18:11 info Install extension 'Fika 0.8.15'
2020-10-28 14:18:11 error Can't parse file 'system/extensions/fika.php'!
```

## Problem med Apache

Här är en `.htaccess`-konfigurationsfil för Apache-webbservern:

``` apache
<IfModule mod_rewrite.c>
RewriteEngine on
DirectoryIndex index.html yellow.php
RewriteRule ^(content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

Här är en `.htaccess`-konfigurationsfil för en undermapp, till exempel `http://website/yellow/`:

``` apache
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteBase /yellow/
DirectoryIndex index.html yellow.php
RewriteRule ^(content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

Här är en `.htaccess`-konfigurationsfil för en underdomän, till exempel `http://sub.domain.website/`:

``` apache
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteBase /
DirectoryIndex index.html yellow.php
RewriteRule ^(content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

När din webbplats inte fungerar måste du [aktivera rewrite-modulen](https://stackoverflow.com/questions/869092/how-to-enable-mod-rewrite-for-apache-2-2) och [ändra AllowOverride-konfigurationen](https://stackoverflow.com/questions/18740419/how-to-set-allowoverride-all). Efter att konfigurationen har ändrats kan du behöva starta om Apache-webbservern.

## Problem med Nginx

Här är en `nginx.conf `-konfigurationsfil för Nginx-webbservern:

``` nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    default_type text/html;
    index index.html yellow.php;

    location /content {
        rewrite ^(.*)$ /error break;
    }

    location /system {
        rewrite ^(.*)$ /error break;
    }

    location / {
        if (!-e $request_filename) {
            rewrite ^/(.*)$ /yellow.php last;
            break;
        }
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index yellow.php;
        include fastcgi.conf;
    }
}
```

Här är en `nginx.conf`-konfigurationsfil för en statisk webbsida:

``` nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    default_type text/html;
    error_page 404 /404.html;
}
```

När din webbplats inte fungerar, kontrollera `server_name` och `root` i konfigurationsfilen. Efter att konfigurationen har ändrats kan du behöva [starta om Nginx-webbservern](https://stackoverflow.com/questions/21292533/reload-nginx-configuration).

## Relaterad information

* [Hur man startar en webbserver](https://github.com/annaesvensson/yellow-serve/tree/main/README-sv.md)
* [Hur man skapar ett användarkonto](https://github.com/annaesvensson/yellow-edit/tree/main/README-sv.md)
* [Hur man uppdaterar en webbplats](https://github.com/annaesvensson/yellow-update/tree/main/README-sv.md)

Har du några frågor? [Få hjälp](.).
