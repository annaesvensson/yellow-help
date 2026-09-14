---
Title: Serverkonfigurationen
---
Erfahre welche Serverkonfigurationen verfügbar sind.

`.htaccess`-Datei für den Apache und LiteSpeed-Webserver:

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

`Caddyfile`-Datei für den Caddy-Webserver:

```
example.com {
   root * /var/www/example
?    file_server
   php_fastcgi 127.0.0.1:9000	
   try_files {path} /index.html /yellow.php
   
   @blocked {
      path /content/* 
      path /system/*
   }
   rewrite @blocked /error 
}
```

`nginx.conf`-Datei für den Nginx-Webserver:

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