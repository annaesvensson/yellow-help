---
Title: Fehlerbehebung
ShowLanguageSelection: 1
---
Erfahre wie du Probleme finden und lösen kannst.

[toc]

## Probleme während der Installation

Die folgenden Fehlermeldungen können auftreten:

```
Datenstrom Yellow requires PHP 7.0 or higher!
```

Installiere die aktuelle PHP-Version auf deinem Webserver. Du benötigst `PHP 7.0` oder höher. Unter Linux benutzt man am besten die Paketverwaltung der Linux-Distribution, für Mac gibt es MAMP, für Windows gibt es XAMPP. Es wird empfohlen die neuste PHP-Version zu verwenden. Sobald die Website die notwendige PHP-Version findet, sollte das Problem behoben sein.

```
Datenstrom Yellow requires PHP xxx extension!
```

Installiere die fehlende PHP-Erweiterung auf deinem Webserver. Du benötigst `curl gd mbstring zip`. Denke daran dass der Webserver und die Befehlszeile möglicherweise unterschiedliche PHP-Versionen verwenden. Es wird empfohlen die gleiche PHP-Version zu verwenden. Sobald die Website die notwendigen PHP-Erweiterungen findet, sollte das Problem behoben sein.

```
Datenstrom Yellow requires write access!
```

Führe den Befehl `chmod -R a+rw *` im Installations-Verzeichnis aus. Du kannst auch deine FTP-Anwendung verwenden, um allen Dateien Schreibrechte zu geben. Es wird empfohlen allen Dateien und Verzeichnissen im Installations-Verzeichnis Schreibrechte zu geben. Sobald die Webseite ausreichende Schreibrechte im `system`-Verzeichnis hat, sollte das Problem behoben sein.

```
Datenstrom Yellow requires configuration file!
```

Kopiere die mitgelieferte `.htaccess` Datei ins Installations-Verzeichnis. Überprüfe ob deine FTP-Anwendung eine Einstellung hat, um alle Dateien anzuzeigen. Es passiert manchmal dass die `.htaccess` Datei bei der Installation übersehen wurde. Sobald die fehlende Konfigurationsdatei ins Installations-Verzeichnis kopiert wurde, sollte das Problem behoben sein.

```
Datenstrom Yellow requires rewrite support!
```

Überprüfe die Konfigurationsdatei deines Webservers, siehe [Probleme mit dem Webserver](#probleme-mit-dem-webserver), [Apache](#probleme-mit-apache) und [Nginx](#probleme-mit-nginx). Bei einigen Webservern sind zusätzliche Einstellungen erforderlich, aber das hängt stark vom verwendeten Webserver und Betriebssystem ab. Sobald der Webserver HTTP-Anfragen an die `yellow.php` weiterleitet, sollte das Problem behoben sein.

```
Datenstrom Yellow requires complete upload!
```

Kopiere nochmal alle mitgelieferten Dateien ins Installations-Verzeichnis. Überprüfe ob deine FTP-Anwendung beim Hochladen eine Fehlermeldung anzeigt. Es passiert manchmal dass die Datenübertragung beim Hochladen unterbrochen wurde. Nachdem alle Dateien ins Installations-Verzeichnis kopiert wurden, sollte das Problem behoben sein.

## Probleme nach der Installation

Die folgende Fehlermeldung kann auftreten: 

```
Datenstrom Yellow stopped with fatal error. Activate the debug mode for more information.
```

Du kannst den Debug-Modus benutzen um Probleme zu untersuchen oder falls du neugierig bist wie Datenstrom Yellow funktioniert. Um den Debug-Modus zu aktivieren, öffne die Datei  `system/extensions/yellow-system.ini` und ändere `CoreDebugMode: 1`. Abhängig vom Debug-Modus werden mehr oder weniger Informationen auf dem Bildschirm angezeigt. [Weitere Informationen zum Debug-Modus](api-for-developers#debug-modus).

Wichtige Informationen werden außerdem in die Datei `system/extensions/yellow-website.log` geschrieben. Falls du die Ursache eines Problems nicht selbst beheben kannst, dann [melde einen Fehler zusammen mit der Logdatei](contributing-guidelines). Die Logdatei gibt einen schnellen Überblick was auf deiner Website passiert, wann sie installiert wurde und welche Fehler aufgetreten sind. Hier ist ein Beispiel:

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

## Probleme mit dem Webserver

Wenn deine Webseite nicht funktioniert, dann überprüfe die Konfigurationsdatei deines Webservers. Du benötigst eine Konfigurationsdatei welche HTTP-Anfragen an das Content-Management-System weiterleitet. Du kannst die mitgelieferte `.htaccess` Konfigurationsdatei in ein Format übersetzen, das dein Webserver versteht. Falls du keine geeignete Konfigurationsdatei findest, dann [frage unsere Netzgemeinschaft](contributing-guidelines).

## Probleme mit Apache

Hier ist eine `.htaccess` Konfigurationsdatei für den Apache-Webserver:

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

Hier ist eine `.htaccess` Konfigurationsdatei für ein Unterverzeichnis, beispielsweise `http://website/yellow/`:

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

Hier ist eine `.htaccess` Konfigurationsdatei für eine Subdomain, beispielsweise `http://sub.domain.website/`:

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

Wenn deine Webseite nicht funktioniert, dann überprüfe die AllowOverride-Konfiguration deines Webservers. Auf manchen Webservern muss du die AllowOverride-Konfiguration ändern von `AllowOverride None` zu `AllowOverride All`. Nachdem die Konfiguration verändert wurde, musst du möglicherweise den Apache-Webserver neustarten.

## Probleme mit Nginx

Hier ist eine `nginx.conf` Konfigurationsdatei für den Nginx-Webserver:

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

Hier ist eine `nginx.conf` Konfigurationsdatei für eine statische Webseite:

``` nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    default_type text/html;
    error_page 404 /404.html;
}
```

Wenn deine Webseite nicht funktioniert, dann überprüfe `server_name` und `root` in der Konfigurationsdatei. Auf manchen Webservern musst du die FastCGI-Konfiguration ändern zu `fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;` abhängig von der PHP-Version. Nachdem die Konfiguration verändert wurde, musst du möglicherweise den Nginx-Webserver neustarten.

Hast du Fragen? [Hilfe finden](.).
