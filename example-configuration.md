# Example configuration

You can use the following web server configurations for Datenstrom Yellow.

`.htaccess` file for the Apache web server:

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

`Caddyfile` file for the Caddy web server:

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

`nginx.conf` file for the Nginx web server:

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

Do you have questions? [Get help](https://datenstrom.se/yellow/help/).
