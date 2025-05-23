---
Title: Troubleshooting
ShowLanguageSelection: 1
---
Learn how to find and solve problems.

[toc]

## Problems during installation

The following error messages can happen:

```
Datenstrom Yellow requires PHP 7.0 or higher!
```

Install the current PHP version on your web server. You need `PHP 7.0` or higher. On Linux it's best to use the package management of your Linux distribution, for Mac there is MAMP, for Windows there is XAMPP. It's recommended to use the latest PHP version. As soon as the website finds the required PHP version, the problem should be resolved.

```
Datenstrom Yellow requires PHP xxx extension!
```

Install the missing PHP extension on your web server. You need `curl gd mbstring zip`. Please keep in mind that the web server and the command line may use different PHP versions. It's recommended to use the same PHP version. As soon as the website finds the required PHP extensions, the problem should be resolved.

```
Datenstrom Yellow requires write access!
```

Execute the command `chmod -R a+rw *` in the installation folder. You can also use your FTP application to give write permissions to all files. It's recommended to give write permissions to all files and folders in the installation folder. As soon as the website has sufficient write access in the `system` folder, the problem should be resolved.

```
Datenstrom Yellow requires configuration file!
```

Copy the supplied `.htaccess` file into the installation folder. Check if your FTP application has a setting to show all files. It sometimes happens that the `.htaccess` file was overlooked during installation. As soon as the missing configuration file has been copied into the installation folder, the problem should be resolved.

```
Datenstrom Yellow requires rewrite support!
```

Check the configuration file of your web server, see [problems with web server](#problems-with-web-server), [Apache](#problems-with-apache) and [Nginx](#problems-with-nginx). Some web servers require additional settings, but this depends very much on the web server and operating system you use. As soon as the web server forwards HTTP requests to the `yellow.php`, the problem should be resolved.

```
Datenstrom Yellow requires complete upload!
```

Copy again all of the supplied files into the installation folder. Check if your FTP application shows an error message during upload. It sometimes happens that the data transfer was interrupted during upload. After all files have been copied into the installation folder, the problem should be resolved.

## Problems after installation

The following error message can happen:

```
Datenstrom Yellow stopped with fatal error. Activate the debug mode for more information.
```

You can use the debug mode to investigate the cause of a problem in more detail or if you are curious about how Datenstrom Yellow works. To activate the debug mode on your website open file `system/extensions/yellow-system.ini` and change `CoreDebugMode: 1`. Depending on the debug mode, more or less information are shown on screen.

Basic information with the setting `CoreDebugMode: 1`:

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage language:en layout:wiki-start theme:stockholm parser:markdown
YellowCore::processRequest file:content/1-en/2-wiki/page.md
YellowCore::request status:200 time:19 ms
```

File system information with the setting `CoreDebugMode: 2`:

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowLanguage::load file:system/extensions/yellow-language.ini
YellowUser::load file:system/extensions/yellow-user.ini
YellowLookup::findFileFromContentLocation /wiki/ -> content/1-en/2-wiki/page.md
YellowContent::scanLocation location:/shared/
YellowLookup::findContentLocationFromFile /shared/page-new-default <- content/1-en/shared/page-new-default.md
YellowLookup::findContentLocationFromFile /shared/page-new-wiki <- content/1-en/shared/page-new-wiki.md
```

Maximum information with the setting `CoreDebugMode: 3`:

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:en
YellowSystem::load Layout:default
YellowSystem::load Theme:stockholm
```

Important information is also written to file `system/extensions/yellow-website.log`. If you can't fix the cause of a problem yourself, then [report a bug along with the log file](contributing-guidelines). The log file gives a quick overview of what happens on your website, when it was installed and which errors occurred. Here's an example:

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

## Problems with web server

When your website doesn't work, then check the configuration file of your web server. You need a configuration file that forwards HTTP requests to the content management system. You can translate the supplied `.htaccess` configuration file into a format that your web server understands. If you can't find a suitable configuration file, then [ask our community](contributing-guidelines).

## Problems with Apache

Here's a `.htaccess` configuration file for the Apache web server:

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

Here's a `.htaccess` configuration file for a subfolder, for example `http://website/yellow/`:

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

Here's a `.htaccess` configuration file for a subdomain, for example `http://sub.domain.website/`:

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

When your website doesn't work, then check the AllowOverride configuration of your web server. On some web servers you have to change the AllowOverride configuration from `AllowOverride None` to `AllowOverride All`. After the configuration has been changed, you may have to restart the Apache web server.

## Problems with Nginx

Here's a `nginx.conf` configuration file for the Nginx web server:

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

Here's a `nginx.conf` configuration file for a static website:

``` nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    default_type text/html;
    error_page 404 /404.html;
}
```

When your website doesn't work, then check `server_name` and `root` in the configuration file. On some web servers you have to change the FastCGI configuration to `fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;` depending on the PHP version. After the configuration has been changed, you may have to restart the Nginx web server.

Do you have questions? [Get help](.).
