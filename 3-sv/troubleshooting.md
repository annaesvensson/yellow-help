---
Title: Felsökning
ShowLanguageSelection: 1
---
Läs hur man löser vanliga problem.

[toc]

## Problem under installationen av en webbsida

Följande felmeddelanden kan uppstå:

? Datenstrom Yellow requires PHP 7.0 or higher
? 
? Installera den aktuella PHP-versionen på din webbserver. Du behöver `PHP 7.0` eller högre. På Linux är det bäst att använda pakethanteringen av Linux-distributionen, för Mac finns det MAMP, för Windows finns det XAMPP. Det rekommenderas att använda den senaste PHP-versionen. Så snart webbplatsen hittar den nödvändiga PHP-versionen bör problemet lösas.

? Datenstrom Yellow requires PHP xxx extension
? 
? Installera saknade PHP-tillägget på din webbserver. Du behöver `curl gd mbstring zip`. Tänk på att webbservern och kommandoraden kan använda olika PHP-versioner. Det rekommenderas att använda samma PHP-versionen. Så snart webbplatsen hittar de nödvändiga PHP-tilläggen bör problemet lösas.

? Datenstrom Yellow requires rewrite support
? 
? Kontrollera konfiguration för din webbserver, [se exempelfiler](#problem-med-webbservern). Vissa webbservrar kräver ytterligare inställningar, men det beror mycket på vilken webbserver och vilket operativsystem du använder. Det är bäst att kontakta din webbhotell för hjälp. Så snart webbservern vidarebefordrar HTTP-förfrågningar till `yellow.php` bör problemet lösas.

? Datenstrom Yellow requires write access
? 
? Kör kommandot `chmod -R a+rw *` i installationsmappen. Du kan också använda din FTP-applikation för att ge skrivbehörighet till alla filer. Det rekommenderas att ge skrivbehörighet till alla filer och mappar i installationsmappen. Så snart webbplatsen har tillräcklig skrivåtkomst i `system`-mappen bör problemet lösas.

? Datenstrom Yellow requires htaccess file
? 
? Kopiera medföljande `.htaccess`-filen till installationsmappen. Kontrollera om din FTP-applikation har en inställning för att visa alla filer. Ibland händer det att `.htaccess`-filen förbises under installationen. Så snart saknade konfigurationsfilen har kopierats till installationsmappen bör problemet lösas.

? Datenstrom Yellow requires complete upload
? 
? Kopiera igen alla medföljande filer till installationsmappen. Kontrollera om din FTP-applikation visar ett felmeddelande under uppladdningen. Ibland händer det att dataöverföringen avbröts under uppladdningen. Efter att alla filer har kopierats till installationsmappen bör problemet lösas.

## Problem efter installation av en webbsida

Följande felmeddelanden kan uppstå:

? Datenstrom Yellow stopped with fatal error
? 
? Programvaran har kraschat. Aktivera [felsökningsläget](api-for-developers#debugging) för att få mer information. Du bör kontakta webbmastern om problemet kvarstår. Troligtvis fungerar ett tillägg inte korrekt eller är inte uppdaterad. Så snart relevanta filen har uppdaterats eller tagits bort bör problemet lösas.

? Can't connect to the update server
? 
? Uppdateringen är för närvarande inte möjlig. Detta felmeddelande betyder vanligtvis att det inte finns någon internetanslutning eller att internetåtkomsten är blockerad på din webbserver. Om du har en webbserver med SSH-åtkomst kan du kontrollera detta själv. Kör kommandot `curl https://datenstrom.se` på webbservern.

? Can't generate static page
? 
? Den motsvarande sidan stöds inte i en statisk webbplats. Det finns vissa tekniska begränsningar för vad den statiska generatorn kan göra, till exempel kan den statiska generatorn inte generera ett kontaktformulär. Teoretiskt sett kan vilken sida som helst genereras som en statisk sida, men då behöver man ytterligare tjänster för att hantera dynamiska HTTP-förfrågningar.

## Problem med webbservern

Du behöver en webbserver som vidarebefordrar HTTP-förfrågningar till Datenstrom Yellow. Din webbserver måste utföra tre uppgifter. För det första måste den vidarebefordra förfrågningar om icke-existerande filer/mappar till `yellow.php`. För det andra måste den blockera direkt åtkomst till `content`-mappen med en felsida. För det tredje måste den blockera direkt åtkomst till `system`-mappen med en felsida. Vissa webbservrar kräver ytterligare inställningar, men det beror mycket på vilken webbserver och vilket operativsystem du använder. Det är bäst att kontakta din webbhotell för hjälp.

Följande exempelfiler är tillgängliga:

? `.htaccess`-fil för Apache-webbservern
? 
? ```
? <IfModule mod_rewrite.c>
? RewriteEngine on
? DirectoryIndex index.html yellow.php
? RewriteRule ^(content|system)/ error [L]
? RewriteCond %{REQUEST_FILENAME} !-f
? RewriteCond %{REQUEST_FILENAME} !-d
? RewriteRule ^ yellow.php [L]
? </IfModule>
? ```

? `Caddyfile`-fil för Caddy-webbservern
? 
? ```
? example.com {
?    root * /var/www/example
?    file_server
?    php_fastcgi 127.0.0.1:9000	
?    try_files {path} /index.html /yellow.php
?    
?    @blocked {
?       path /content/* 
?       path /system/*
?    }
?    rewrite @blocked /error 
? }
? ```

? `nginx.conf`-fil för Nginx-webbservern
? 
? ```
? server {
?     listen 80;
?     server_name example.com;
?     root /var/www/example/;
?     default_type text/html;
?     index index.html yellow.php;
? 
?     location /content {
?         rewrite ^(.*)$ /error break;
?     }
? 
?     location /system {
?         rewrite ^(.*)$ /error break;
?     }
? 
?     location / {
?         if (!-e $request_filename) {
?             rewrite ^/(.*)$ /yellow.php last;
?             break;
?         }
?     }
? 
?     location ~ \.php$ {
?         fastcgi_split_path_info ^(.+\.php)(/.+)$;
?         fastcgi_pass 127.0.0.1:9000;
?         fastcgi_index yellow.php;
?         include fastcgi.conf;
?     }
? }
? ```

## Problem med e-postservern

Du behöver en e-postserver för att kunna skicka e-post. Det är bäst att kontakta din webbhotell och fråga om sendmail är aktiverat. När du har bekräftat att sendmail är aktiverat är nästa steg att konfigurera email för utgående meddelanden. Standard-e-postadressen för utgående meddelanden är `noreply`. E-postservern behöver lägga till ditt domännamn för att skapa en komplett e-postadress, till exempel `noreply@example.com`. Ibland fungerar det inte eller så är e-postservern felkonfigurerad.

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`ContactSiteEmail` = email för utgående meddelanden, [kräver contact-tillägg](https://github.com/annaesvensson/yellow-contact/tree/main/readme-sv.md)  
`EditSiteEmail` =  email för utgående meddelanden, [kräver edit-tillägg](https://github.com/annaesvensson/yellow-edit/tree/main/readme-sv.md)  

## Allmänna problem

Du kan använda felsökningsläget för att undersöka orsaken till ett problem eller om du är nyfiken på hur Datenstrom Yellow fungerar. För att aktivera felsökningsläget, öppna filen `system/extensions/yellow-system.ini` och ändra `CoreDebugMode: 1`. Ytterligare information kommer att visas på skärmen och i webbläsarkonsolen. Beroende på felsökningsläget visas mer eller mindre information. [Läs mer om debugging](api-for-developers#debugging).

Har du några frågor? [Få hjälp](.).
