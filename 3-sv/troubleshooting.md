---
Title: Felsökning
ShowLanguageSelection: 1
---
Läs hur du hittar och löser problem.

[toc]

## Problem under installationen

Följande felmeddelanden kan uppstå:

```
Datenstrom Yellow requires PHP 7.0 or higher!
```

Installera den aktuella PHP-versionen på din webbserver. Du behöver `PHP 7.0` eller högre. På Linux är det bäst att använda pakethanteringen av Linux-distributionen, för Mac finns det MAMP, för Windows finns det XAMPP. Det rekommenderas att använda den senaste PHP-versionen. Så snart webbplatsen hittar den nödvändiga PHP-versionen bör problemet lösas.

```
Datenstrom Yellow requires PHP xxx extension!
```

Installera saknade PHP-tillägget på din webbserver. Du behöver `curl gd mbstring zip`. Tänk på att webbservern och kommandoraden kan använda olika PHP-versioner. Det rekommenderas att använda samma PHP-versionen. Så snart webbplatsen hittar de nödvändiga PHP-tilläggen bör problemet lösas.

```
Datenstrom Yellow requires write access!
```

Kör kommandot `chmod -R a+rw *` i installationsmappen. Du kan också använda din FTP-applikation för att ge skrivbehörighet till alla filer. Det rekommenderas att ge skrivbehörighet till alla filer och mappar i installationsmappen. Så snart webbplatsen har tillräcklig skrivåtkomst i `system`-mappen bör problemet lösas.

```
Datenstrom Yellow requires configuration file!
```

Kopiera medföljande `.htaccess`-filen till installationsmappen. Kontrollera om din FTP-applikation har en inställning för att visa alla filer. Ibland händer det att filen `.htaccess` förbises under installationen. Så snart saknade konfigurationsfilen har kopierats till installationsmappen bör problemet lösas.

```
Datenstrom Yellow requires rewrite support!
```

Kontrollera konfigurationsfilen för din webbserver, se [problem med webbserver](#problem-med-webbserver), [Apache](#problem-med-apache) och [Nginx](#problem-med-nginx). Vissa webbservrar kräver ytterligare inställningar, men det beror mycket på vilken webbserver och vilket operativsystem du använder. Så snart webbservern vidarebefordrar HTTP-förfrågningar till `yellow.php` bör problemet lösas.

```
Datenstrom Yellow requires complete upload!
```

Kopiera igen alla medföljande filer till installationsmappen. Kontrollera om din FTP-applikation visar ett felmeddelande under uppladdningen. Ibland händer det att dataöverföringen avbröts under uppladdningen. Efter att alla filer har kopierats till installationsmappen bör problemet lösas.

## Problem efter installationen

Följande felmeddelande kan uppstå:

```
Datenstrom Yellow stopped with fatal error. Activate the debug mode for more information.
```

Du kan använda felsökningsläget för att undersöka orsaken till ett problem mer i detalj eller om du är nyfiken på hur Datenstrom Yellow fungerar. För att aktivera felsökningsläget på din webbplats, öppna filen `system/extensions/yellow-system.ini` och ändra `CoreDebugMode: 1`. Beroende på felsökningsläget visas mer eller mindre information på skärmen.

Grundläggande information med inställningen `CoreDebugMode: 1`:

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage language:sv layout:wiki-start theme:stockholm parser:markdown
YellowCore::processRequest file:content/3-sv/2-wiki/page.md
YellowCore::request status:200 time:19 ms
```

Filsystem information med inställningen `CoreDebugMode: 2`:

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowLanguage::load file:system/extensions/yellow-language.ini
YellowUser::load file:system/extensions/yellow-user.ini
YellowLookup::findFileFromContentLocation /sv/wiki/ -> content/3-sv/2-wiki/page.md
YellowContent::scanLocation location:/sv/shared/
YellowLookup::findContentLocationFromFile /sv/shared/page-new-default <- content/3-sv/shared/page-new-default.md
YellowLookup::findContentLocationFromFile /sv/shared/page-new-wiki <- content/3-sv/shared/page-new-wiki.md
```

Maximal information med inställningen `CoreDebugMode: 3`:

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:sv
YellowSystem::load Layout:default
YellowSystem::load Theme:stockholm
```

Viktig information skrivs också till filen `system/extensions/yellow-website.log`. Om du inte kan åtgärda orsaken till ett problem själv, [rapportera ett fel tillsammans med loggfilen](contributing-guidelines). Loggfilen ger en snabb översikt över vad som händer på din webbplats, när den installerades och vilka fel som uppstod. Här är ett exempel:

```
2024-04-28 14:13:07 info Install Datenstrom Yellow 0.9, PHP 8.1.27, Apache 2.4.33, Linux
2024-04-28 14:13:07 info Install extension 'Core 0.9.9'
2024-04-28 14:13:07 info Install extension 'Markdown 0.9.1'
2024-04-28 14:13:07 info Install extension 'Stockholm 0.9.2'
2024-04-28 14:13:07 info Install extension 'English 0.9.2'
2024-04-28 14:13:07 info Install extension 'German 0.9.2'
2024-04-28 14:13:07 info Install extension 'Swedish 0.9.2'
2024-04-28 14:23:11 info Install extension 'Fika 0.9.1'
2024-04-28 14:23:11 error Process file 'system/workers/fika.php' with fatal error!
```

## Problem med webbserver

Om din webbplats inte fungerar, kontrollera konfigurationsfilen på din webbserver. Du behöver en konfigurationsfil som vidarebefordrar HTTP-förfrågningar till innehållshanteringssystemet. Du kan översätta medföljande `.htaccess`-konfigurationsfilen till ett format som din webbserver förstår. Om du inte hittar någon lämplig konfigurationsfil, [fråga vår nätgemenskap](contributing-guidelines).

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

När din webbplats inte fungerar, kontrollera AllowOverride-konfigurationen på din webbserver. På vissa webbservrar måste du ändra AllowOverride-konfigurationen från `AllowOverride None` till `AllowOverride All`. Efter att konfigurationen har ändrats kan du behöva starta om Apache-webbservern.

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

När din webbplats inte fungerar, kontrollera `server_name` och `root` i konfigurationsfilen. På vissa webbservrar måste du ändra FastCGI-konfigurationen till `fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;` beroende på PHP-versionen. Efter att konfigurationen har ändrats kan du behöva starta om Nginx-webbservern.

Har du några frågor? [Få hjälp](.).
