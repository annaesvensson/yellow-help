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

Führe den Befehl `chmod -R a+rw *` im Installations-Verzeichnis aus. Du kannst auch deine SFTP-Software verwenden, um allen Dateien Schreibrechte zu geben. Es wird empfohlen allen Dateien und Verzeichnissen im Installations-Verzeichnis Schreibrechte zu geben. Sobald die Webseite ausreichende Schreibrechte im `system`-Verzeichnis hat, sollte das Problem behoben sein.

```
Datenstrom Yellow requires configuration file!
```

Kopiere die mitgelieferte `.htaccess` Datei ins Installations-Verzeichnis. Überprüfe ob deine SFTP-Software eine Einstellung hat, um alle Dateien anzuzeigen. Es passiert manchmal dass die `.htaccess` Datei bei der Installation übersehen wurde. Nachdem die fehlende Konfigurationsdatei ins Installations-Verzeichnis kopiert wurde, sollte das Problem behoben sein.

```
Datenstrom Yellow requires rewrite support!
```

Überprüfe die Konfigurationsdatei des Webservers, siehe [Probleme mit Apache](#probleme-mit-apache) und [Probleme mit Nginx](#probleme-mit-nginx). Du musst entweder die Konfigurationsdatei deines Webservers ändern oder du verwendest einen anderen Webserver. Sobald der Webserver HTTP-Anfragen an die `yellow.php` weiterleitet, sollte das Problem behoben sein.

```
Datenstrom Yellow requires complete upload!
```

Kopiere nochmal alle mitgelieferten Dateien ins Installations-Verzeichnis. Überprüfe ob deine SFTP-Software beim Hochladen eine Fehlermeldung anzeigt. Es passiert manchmal dass die Datenübertragung beim Hochladen unterbrochen wurde. Nachdem die fehlenden Dateien ins Installations-Verzeichnis kopiert wurden, sollte das Problem behoben sein.

## Probleme nach der Installation

Die folgende Fehlermeldung kann auftreten: 

```
Datenstrom Yellow stopped with fatal error. Activate the debug mode for more information.
```

Du kannst den Debug-Modus benutzen um die Ursache eines Problems genauer zu untersuchen, den Stack-Trace eines Programms anzuzeigen oder falls du neugierig bist wie Datenstrom Yellow funktioniert. Abhängig vom Debug-Level werden mehr oder weniger Informationen auf dem Bildschirm angezeigt. So aktivierst du den Debug-Modus auf deiner Website:

Öffne die Datei `system/extensions/yellow-system.ini` und ändere `CoreDebugMode: 1`.

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage language:de layout:wiki-start theme:stockholm parser:markdown
YellowCore::processRequest file:content/2-de/2-wiki/page.md
YellowCore::request status:200 time:19 ms
```

Dateisysteminformationen durch Erhöhen des Debug-Levels zu `CoreDebugMode: 2`.

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowLanguage::load file:system/extensions/yellow-language.ini
YellowUser::load file:system/extensions/yellow-user.ini
YellowLookup::findFileFromContentLocation /de/wiki/ -> content/2-de/2-wiki/page.md
YellowContent::scanLocation location:/de/shared/
YellowLookup::findContentLocationFromFile /de/shared/page-new-default <- content/2-de/shared/page-new-default.md
YellowLookup::findContentLocationFromFile /de/shared/page-new-wiki <- content/2-de/shared/page-new-wiki.md
```

Maximum Informationen durch Erhöhen des Debug-Levels zu `CoreDebugMode: 3`.

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:de
YellowSystem::load Layout:default
YellowSystem::load Theme:stockholm
```

Du kannst wichtige Informationen in der Datei `system/extensions/yellow-website.log` finden. Falls du die Ursache eines Problems nicht selbst beheben kannst, dann [melde einen Fehler zusammen mit der Logdatei](contributing-guidelines). Die Logdatei gibt einen schnellen Überblick was auf deiner Website passiert und wann sie zuletzt aktualisiert wurde. Hier ist ein Beispiel:

```
2020-10-28 14:13:07 info Install Datenstrom Yellow 0.8.17, PHP 8.0.24, Apache 2.4.33, Mac
2020-10-28 14:13:07 info Install extension 'Core 0.8.41'
2020-10-28 14:13:07 info Install extension 'Markdown 0.8.19'
2020-10-28 14:13:07 info Install extension 'Stockholm 0.8.13'
2020-10-28 14:13:07 info Install extension 'English 0.8.27'
2020-10-28 14:13:07 info Install extension 'German 0.8.27'
2020-10-28 14:13:07 info Install extension 'Swedish 0.8.27'
2020-10-28 14:18:11 info Install extension 'Fika 0.8.15'
2020-10-28 14:18:11 error Can't parse file 'system/extensions/fika.php'!
```

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

Wenn deine Webseite nicht funktioniert, dann musst du das [Rewrite-Modul aktivieren](https://stackoverflow.com/questions/869092/how-to-enable-mod-rewrite-for-apache-2-2) und die [AllowOverride-Konfiguration ändern](https://stackoverflow.com/questions/18740419/how-to-set-allowoverride-all). Auf manchen Webservern muss du die AllowOverride-Konfiguration ändern von `AllowOverride None` zu `AllowOverride All`. Nachdem die Konfiguration verändert wurde, musst du möglicherweise den Apache-Webserver neustarten.

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

Wenn deine Webseite nicht funktioniert, dann überprüfe `server_name` und `root` in der Konfigurationsdatei. Auf manchen Webservern musst du die FastCGI-Konfiguration ändern zu `fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;` abhängig von der PHP-Version. Nachdem die Konfiguration verändert wurde, musst du möglicherweise den [Nginx-Webserver neustarten](https://stackoverflow.com/questions/21292533/reload-nginx-configuration).

## Verwandte Informationen

* [Wie man einen Webserver startet](https://github.com/annaesvensson/yellow-serve/tree/main/README-de.md)
* [Wie man ein Benutzerkonto ändert](https://github.com/annaesvensson/yellow-edit/tree/main/README-de.md)
* [Wie man eine Webseite aktualisiert](https://github.com/annaesvensson/yellow-update/tree/main/README-de.md)

Hast du Fragen? [Hilfe finden](.).
