---
Title: Fehlerbehebung
ShowLanguageSelection: 1
---
Erfahre wie du häufige Probleme lösen kannst.

[toc]

## Probleme während der Installation

Die folgenden Fehlermeldungen können auftreten:

```
Datenstrom Yellow requires PHP 7.0 or higher!
```

Installiere die aktuelle PHP-Version auf deinem Webserver. Du benötigst `PHP 7.0` oder höher. Unter Linux benutzt man am besten die Paketverwaltung der Linux-Distribution, für Mac gibt es MAMP, für Windows gibt es XAMPP. Es wird empfohlen die neuste PHP-Version zu verwenden. Sobald die Webseite die notwendige PHP-Version findet, sollte das Problem behoben sein.

```
Datenstrom Yellow requires PHP xxx extension!
```

Installiere die fehlende PHP-Erweiterung auf deinem Webserver. Du benötigst `curl gd mbstring zip`. Denke daran dass der Webserver und die Befehlszeile möglicherweise unterschiedliche PHP-Versionen verwenden. Es wird empfohlen die gleiche PHP-Version zu verwenden. Sobald die Webseite die notwendigen PHP-Erweiterungen findet, sollte das Problem behoben sein.

```
Datenstrom Yellow requires write access!
```

Führe den Befehl `chmod -R a+rw *` im Installations-Verzeichnis aus. Du kannst auch deine FTP-Anwendung verwenden, um allen Dateien Schreibrechte zu geben. Es wird empfohlen allen Dateien und Verzeichnissen im Installations-Verzeichnis Schreibrechte zu geben. Sobald die Webseite ausreichende Schreibrechte im `system`-Verzeichnis hat, sollte das Problem behoben sein.

```
Datenstrom Yellow requires rewrite support!
```

Überprüfe die Konfiguration deines Webservers, [siehe Beispiele](#probleme-mit-dem-webserver). Bei einigen Webservern sind zusätzliche Einstellungen erforderlich, aber das hängt sehr stark vom verwendeten Webserver und Betriebssystem ab. Wende dich am besten an deinen Webhosting-Anbieter. Sobald der Webserver HTTP-Anfragen an die `yellow.php` weiterleitet, sollte das Problem behoben sein.

```
Datenstrom Yellow requires htaccess file!
```

Kopiere die mitgelieferte `.htaccess` Datei ins Installations-Verzeichnis. Überprüfe ob deine FTP-Anwendung eine Einstellung hat, um alle Dateien anzuzeigen. Es passiert manchmal dass die `.htaccess` Datei bei der Installation übersehen wurde. Sobald die fehlende Konfigurationsdatei ins Installations-Verzeichnis kopiert wurde, sollte das Problem behoben sein.

```
Datenstrom Yellow requires complete upload!
```

Kopiere nochmal alle mitgelieferten Dateien ins Installations-Verzeichnis. Überprüfe ob deine FTP-Anwendung beim Hochladen eine Fehlermeldung anzeigt. Es passiert manchmal dass die Datenübertragung beim Hochladen unterbrochen wurde. Nachdem alle Dateien ins Installations-Verzeichnis kopiert wurden, sollte das Problem behoben sein.

## Probleme nach der Aktualisierung

Die folgende Fehlermeldung kann auftreten: 

```
Datenstrom Yellow stopped with fatal error. Activate the debug mode for more information.
```

Suche in der Logdatei `system/extensions/yellow-website.log` nach Problemen. Hier ist ein Beispiel:

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

Du kannst den Debug-Modus benutzen um die Ursache eines Problems genauer zu untersuchen oder falls du neugierig bist wie Datenstrom Yellow funktioniert. Um den Debug-Modus zu aktivieren, öffne die Datei `system/extensions/yellow-system.ini` und ändere `CoreDebugMode: 1`. Es werden dann zusätzliche Informationen auf dem Bildschirm und in der Browser-Konsole angezeigt. Abhängig vom Debug-Modus werden mehr oder weniger Informationen angezeigt. [Weitere Informationen zum Debug-Modus](api-for-developers#debug-modus).

## Probleme mit dem Mailserver 

Du benötigst einen Mailserver damit Datenstrom Yellow E-Mails verschicken kann. Wende dich an deinen Webhosting-Anbieter und frage ob Sendmail aktiviert ist. Nachdem du überprüft hast dass Sendmail aktiviert ist, besteht die nächste Möglichkeit darin die E-Mail für ausgehende Nachrichten zu konfigurieren. Die Standard-E-Mail-Adresse für ausgehende Nachrichten ist `noreply`. Der Mailserver muss deinen Domainnamen hinzufügen, damit daraus eine vollständige E-Mail-Adresse wird, zum Beispiel `noreply@example.com`. Manchmal funktioniert das nicht oder der Mailserver ist falsch konfiguriert.

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`ContactSiteEmail` = Email für ausgehende Nachrichten, [erfordert Contact-Erweiterung](https://github.com/annaesvensson/yellow-contact/tree/main/README-de.md)  
`EditSiteEmail` =  Email für ausgehende Nachrichten, [erfordert Edit-Erweiterung](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md)  

## Probleme mit dem Webserver

Du benötigst einen Webserver der HTTP-Anfragen an Datenstrom Yellow weiterleitet. Dein Webserver muss drei Dinge erledigen. Erstens muss er Anfragen für nicht existierende Dateien/Verzeichnisse an die `yellow.php` weiterleiten. Zweitens muss er den direkten Zugriff auf das `content`-Verzeichnis mit einer Fehlerseite blockieren. Drittens muss er den direkten Zugriff auf das `system`-Verzeichnis mit einer Fehlerseite blockieren. Bei einigen Webservern sind zusätzliche Einstellungen erforderlich, aber das hängt sehr stark vom verwendeten Webserver und Betriebssystem ab. Wende dich am besten an deinen Webhosting-Anbieter.

Hier ist ein `.htaccess`-Beispiel für den Apache-Webserver:

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

Hier ist ein `Caddyfile`-Beispiel für den Caddy-Webserver:

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

Hier ist ein `nginx.conf`-Beispiel für den Nginx-Webserver:


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

Hast du Fragen? [Hilfe finden](.).
