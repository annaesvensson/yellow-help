---
Title: Felsökning
ShowLanguageSelection: 1
---
Läs hur du löser vanliga problem.

[toc]

## Problem under installation

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
Datenstrom Yellow requires rewrite support!
```

Kontrollera konfiguration för din webbserver, [se exempel](#problem-med-webbservern). Vissa webbservrar kräver ytterligare inställningar, men det beror mycket på vilken webbserver och vilket operativsystem du använder. Det är bäst att kontakta din webbhotell för hjälp. Så snart webbservern vidarebefordrar HTTP-förfrågningar till `yellow.php` bör problemet lösas.

```
Datenstrom Yellow requires htaccess file!
```

Kopiera medföljande `.htaccess`-filen till installationsmappen. Kontrollera om din FTP-applikation har en inställning för att visa alla filer. Ibland händer det att filen `.htaccess` förbises under installationen. Så snart saknade konfigurationsfilen har kopierats till installationsmappen bör problemet lösas.

```
Datenstrom Yellow requires complete upload!
```

Kopiera igen alla medföljande filer till installationsmappen. Kontrollera om din FTP-applikation visar ett felmeddelande under uppladdningen. Ibland händer det att dataöverföringen avbröts under uppladdningen. Efter att alla filer har kopierats till installationsmappen bör problemet lösas.

## Problem efter installation eller uppdatering

Följande felmeddelande kan uppstå:

```
Datenstrom Yellow stopped with fatal error. Activate the debug mode for more information.
```

Sök efter problem i loggfilen `system/extensions/yellow-website.log`. Här är ett exempel:

```
2024-04-28 14:13:07 info Install Datenstrom Yellow 0.9, PHP 8.1.27, Apache 2.4.33, Linux
2024-04-28 14:13:07 info Install extension 'Core 0.9.9'
2024-04-28 14:13:07 info Install extension 'Edit 0.9.2'
2024-04-28 14:13:07 info Install extension 'Markdown 0.9.2'
2024-04-28 14:13:07 info Install extension 'English 0.9.2'
2024-04-28 14:13:07 info Install extension 'German 0.9.2'
2024-04-28 14:13:07 info Install extension 'Swedish 0.9.2'
2024-04-28 14:23:10 info Install extension 'Fika 0.9.1'
2024-04-28 14:33:13 info Update extension 'Fika 0.9.2'
2024-04-28 14:33:14 error Process file 'system/workers/fika.php' with fatal error!
```

Du kan använda felsökningsläget för att undersöka orsaken till ett problem eller om du är nyfiken på hur Datenstrom Yellow fungerar. För att aktivera felsökningsläget, öppna filen `system/extensions/yellow-system.ini` och ändra `CoreDebugMode: 1`. Ytterligare information kommer att visas på skärmen och i webbläsarkonsolen. Beroende på felsökningsläget visas mer eller mindre information. [Läs mer om felsökningsläget](api-for-developers#felsökningsläge).

## Problem med e-postservern

Du behöver en e-postserver för att Datenstrom Yellow ska kunna skicka e-post. Kontakta din webbhotell och fråga om sendmail är aktiverat. När du har bekräftat att sendmail är aktiverat är nästa alternativ att konfigurera email för utgående meddelanden. Standard-e-postadressen för utgående meddelanden är `noreply`. E-postservern behöver lägga till ditt domännamn för att skapa en komplett e-postadress, till exempel `noreply@example.com`. Ibland fungerar det inte eller så är e-postservern felkonfigurerad.

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`ContactSiteEmail` = email för utgående meddelanden, [kräver contact-tillägg](https://github.com/annaesvensson/yellow-contact/tree/main/README-sv.md)  
`EditSiteEmail` =  email för utgående meddelanden, [kräver edit-tillägg](https://github.com/annaesvensson/yellow-edit/tree/main/README-sv.md)  

## Problem med webbservern

Du behöver en webbserver som vidarebefordrar HTTP-förfrågningar till Datenstrom Yellow. Din webbserver måste utföra tre viktiga uppgifter. För det första måste den vidarebefordra förfrågningar om icke-existerande filer/mappar till `yellow.php`. För det andra måste den blockera direkt åtkomst till `content`-mappen med en felsida. För det tredje måste den blockera direkt åtkomst till `system`-mappen med en felsida. Vissa webbservrar kräver ytterligare inställningar, men det beror mycket på vilken webbserver och vilket operativsystem du använder. Det är bäst att kontakta din webbhotell för hjälp.

Här är en `.htaccess`-exempel för Apache-webbservern:

```
<IfModule mod_rewrite.c>
RewriteEngine on
DirectoryIndex index.html yellow.php
RewriteRule ^(content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

Här är en `Caddyfile`-exempel för Caddy-webbservern:

```
example.com {
   root * /var/www/example
   file_server
   php_fastcgi 127.0.0.1:9000	
   try_files {path} /index.html /yellow.php
   
   @blocked {
      path /content/* 
      path /system/*
   }
   rewrite @blocked /error 
}
```

Här är en `nginx.conf`-exempel för Nginx-webbservern:

```
server {
    listen 80;
    server_name example.com;
    root /var/www/example/;
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

Har du några frågor? [Få hjälp](.).
