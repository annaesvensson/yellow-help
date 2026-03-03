---
Title: Fehlerbehebung
ShowLanguageSelection: 1
---
Erfahre wie man häufige Probleme löst.

[toc]

## Probleme während der Installation einer Webseite

Die folgenden Fehlermeldungen können auftreten:

? Datenstrom Yellow requires PHP 7.0 or higher
? 
? Installiere die aktuelle PHP-Version auf deinem Webserver. Du benötigst `PHP 7.0` oder höher. Unter Linux benutzt man am besten die Paketverwaltung der Linux-Distribution, für Mac gibt es MAMP, für Windows gibt es XAMPP. Es wird empfohlen die neuste PHP-Version zu verwenden. Sobald die Webseite die notwendige PHP-Version findet, sollte das Problem behoben sein.

? Datenstrom Yellow requires PHP xxx extension
? 
? Installiere die fehlende PHP-Erweiterung auf deinem Webserver. Du benötigst `curl gd mbstring zip`. Denke daran dass der Webserver und die Befehlszeile möglicherweise unterschiedliche PHP-Versionen verwenden. Es wird empfohlen die gleiche PHP-Version zu verwenden. Sobald die Webseite die notwendigen PHP-Erweiterungen findet, sollte das Problem behoben sein.

? Datenstrom Yellow requires rewrite support
? 
? Überprüfe die Konfiguration deines Webservers, [siehe Beispiel-Dateien](#probleme-mit-dem-webserver). Bei einigen Webservern sind zusätzliche Einstellungen erforderlich, aber das hängt sehr stark vom verwendeten Webserver und Betriebssystem ab. Wende dich am besten an deinen Webhosting-Anbieter. Sobald der Webserver HTTP-Anfragen an die `yellow.php` weiterleitet, sollte das Problem behoben sein.

? Datenstrom Yellow requires write access
? 
? Führe den Befehl `chmod -R a+rw *` im Installations-Verzeichnis aus. Du kannst auch deine FTP-Anwendung verwenden, um allen Dateien Schreibrechte zu geben. Es wird empfohlen allen Dateien und Verzeichnissen im Installations-Verzeichnis Schreibrechte zu geben. Sobald die Webseite ausreichende Schreibrechte im `system`-Verzeichnis hat, sollte das Problem behoben sein.

? Datenstrom Yellow requires htaccess file
? 
? Kopiere die mitgelieferte `.htaccess`-Datei ins Installations-Verzeichnis. Überprüfe ob deine FTP-Anwendung eine Einstellung hat, um alle Dateien anzuzeigen. Es passiert manchmal dass die `.htaccess`-Datei bei der Installation übersehen wurde. Sobald die fehlende Konfigurationsdatei ins Installations-Verzeichnis kopiert wurde, sollte das Problem behoben sein.

? Datenstrom Yellow requires complete upload
? 
? Kopiere nochmal alle mitgelieferten Dateien ins Installations-Verzeichnis. Überprüfe ob deine FTP-Anwendung beim Hochladen eine Fehlermeldung anzeigt. Es passiert manchmal dass die Datenübertragung beim Hochladen unterbrochen wurde. Nachdem alle Dateien ins Installations-Verzeichnis kopiert wurden, sollte das Problem behoben sein.

## Probleme nach der Installation einer Webseite

Die folgenden Fehlermeldungen können auftreten:

? Datenstrom Yellow stopped with fatal error 
? 
? Die Software ist abgestürzt. Aktiviere den [Debug-Modus](api-for-developers#debuggen) um weitere Informationen zu erhalten. Du solltest dich an den Webmaster wenden, falls das Problem bestehen bleibt. Sehr wahrscheinlich funktioniert eine Erweiterung nicht richtig oder ist nicht auf dem neusten Stand. Sobald die entsprechende Datei aktualisiert oder entfernt wurde, sollte das Problem behoben sein.

? Can't connect to the update server
? 
? Die Aktualisierung ist derzeit nicht möglich. Diese Fehlermeldung bedeutet in der Regel, dass keine Internetverbindung besteht oder dass das Internetzugang auf deinem Webserver blockiert ist. Wenn du einen Webserver mit SSH-Zugang hast, kannst du das selbst überprüfen. Führe den Befehl `curl https://datenstrom.se` auf dem Webserver aus.

? Can't generate static page
? 
? Die entsprechende Seite wird in einer statischen Website nicht unterstützt. Der statische Generator hat gewisse technische Beschränkungen, beispielsweise kann kein Kontaktformular generiert werden. Theoretisch könnte jede Seite als statische Seite generiert werden, jedoch wären dann zusätzliche Dienste erforderlich, um dynamische HTTP-Anfragen zu verarbeiten.

## Probleme mit dem Webserver

Du benötigst einen Webserver der HTTP-Anfragen an Datenstrom Yellow weiterleitet. Dein Webserver muss drei Dinge erledigen. Erstens muss er Anfragen für nicht existierende Dateien/Verzeichnisse an die `yellow.php` weiterleiten. Zweitens muss er den direkten Zugriff auf das `content`-Verzeichnis mit einer Fehlerseite blockieren. Drittens muss er den direkten Zugriff auf das `system`-Verzeichnis mit einer Fehlerseite blockieren. Bei einigen Webservern sind zusätzliche Einstellungen erforderlich, aber das hängt sehr stark vom verwendeten Webserver und Betriebssystem ab. Wende dich am besten an deinen Webhosting-Anbieter.

Die folgenden Beispiel-Dateien sind verfügbar:

? `.htaccess`-Datei für den Apache-Webserver
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

? `Caddyfile`-Datei für den Caddy-Webserver
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

? `nginx.conf`-Datei für den Nginx-Webserver
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

## Probleme mit dem Mailserver 

Du benötigst einen Mailserver um E-Mails verschicken zu können. Wende dich am besten an deinen Webhosting-Anbieter und frage ob Sendmail aktiviert ist. Nachdem du überprüft hast dass Sendmail aktiviert ist, besteht die nächste Möglichkeit darin die E-Mail für ausgehende Nachrichten zu konfigurieren. Die Standard-E-Mail-Adresse für ausgehende Nachrichten ist `noreply`. Der Mailserver muss deinen Domainnamen hinzufügen, damit daraus eine vollständige E-Mail-Adresse wird, zum Beispiel `noreply@example.com`. Manchmal funktioniert das nicht oder der Mailserver ist falsch konfiguriert.

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`ContactSiteEmail` = Email für ausgehende Nachrichten, [erfordert Contact-Erweiterung](https://github.com/annaesvensson/yellow-contact/tree/main/readme-de.md)  
`EditSiteEmail` =  Email für ausgehende Nachrichten, [erfordert Edit-Erweiterung](https://github.com/annaesvensson/yellow-edit/tree/main/readme-de.md)  

## Allgemeine Probleme

Du kannst den Debug-Modus benutzen um die Ursache eines Problems genauer zu untersuchen oder falls du neugierig bist wie Datenstrom Yellow funktioniert. Um den Debug-Modus zu aktivieren, öffne die Datei `system/extensions/yellow-system.ini` und ändere `CoreDebugMode: 1`. Es werden dann zusätzliche Informationen auf dem Bildschirm und in der Browser-Konsole angezeigt. Abhängig vom Debug-Modus werden mehr oder weniger Informationen angezeigt. [Weitere Informationen zum Debuggen](api-for-developers#debuggen).

Hast du Fragen? [Hilfe finden](.).
