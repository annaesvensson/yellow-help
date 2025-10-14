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

Kontrollera konfigurationsfilen för din webbserver, [se problem med webbserver](#problem-med-webbserver), [Apache](#problem-med-apache) och [Nginx](#problem-med-nginx). Vissa webbservrar kräver ytterligare inställningar, men det beror mycket på vilken webbserver och vilket operativsystem du använder. Så snart webbservern vidarebefordrar HTTP-förfrågningar till `yellow.php` bör problemet lösas.

```
Datenstrom Yellow requires complete upload!
```

Kopiera igen alla medföljande filer till installationsmappen. Kontrollera om din FTP-applikation visar ett felmeddelande under uppladdningen. Ibland händer det att dataöverföringen avbröts under uppladdningen. Efter att alla filer har kopierats till installationsmappen bör problemet lösas.

## Problem efter installationen eller uppdateringen

Följande felmeddelande kan uppstå:

```
Datenstrom Yellow stopped with fatal error. Activate the debug mode for more information.
```

Du kan använda felsökningsläget för att undersöka problem eller om du är nyfiken på hur Datenstrom Yellow fungerar. För att aktivera felsökningsläget på din webbplats, öppna filen `system/extensions/yellow-system.ini` och ändra `CoreDebugMode: 1`. Beroende på felsökningsläget visas mer eller mindre information på skärmen. [Läs mer om felsökningsläget](api-for-developers#felsökningsläge).

Viktig information skrivs också till filen `system/extensions/yellow-website.log`. Om du inte kan åtgärda orsaken till ett problem själv, [rapportera ett fel tillsammans med loggfilen](contributing-guidelines). Loggfilen ger en översikt över vad som händer på din webbplats, vilka tillägg installerades och vilka uppdaterades. Här är ett exempel:

```
2024-04-28 14:13:07 info Install Datenstrom Yellow 0.9, PHP 8.1.27, Apache 2.4.33, Linux
2024-04-28 14:13:07 info Install extension 'Core 0.9.9'
2024-04-28 14:13:07 info Install extension 'Edit 0.9.2'
2024-04-28 14:13:07 info Install extension 'Markdown 0.9.2'
2024-04-28 14:13:07 info Install extension 'English 0.9.2'
2024-04-28 14:13:07 info Install extension 'German 0.9.2'
2024-04-28 14:13:07 info Install extension 'Swedish 0.9.2'
2024-04-28 14:23:11 info Install extension 'Fika 0.9.1'
2024-04-28 14:23:11 error Process file 'system/workers/fika.php' with fatal error!
2024-04-28 14:33:13 info Update extension 'Fika 0.9.2'
```

## Problem med webbserver

Kontrollera konfigurationsfilen på din webbserver. Du behöver en konfigurationsfil som vidarebefordrar HTTP-förfrågningar till innehållshanteringssystemet. Du kan översätta medföljande `.htaccess`-konfigurationsfilen till ett format som din webbserver förstår. Om du inte hittar en konfigurationsfil för din webbserver, kontakta din webbhotell eller [fråga Datenstroms nätgemenskapen](contributing-guidelines).

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
