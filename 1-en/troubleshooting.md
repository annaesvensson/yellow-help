---
Title: Troubleshooting
ShowLanguageSelection: 1
---
Learn how to find and fix problems.

[toc]

## Problems during installation

The following error messages can happen:

```
Datenstrom Yellow requires write access!
```

Run the command `chmod -R a+rw *` in the installation folder. You can also use your FTP software to give write permissions to all files. It's recommended to give write permissions to all files and folders in the installation folder. As soon as the website has sufficient write access in the `system` folder, the problem should be resolved.

```
Datenstrom Yellow requires complete upload!
```

Copy again all of the supplied files into the installation folder. Check if your FTP software shows an error message during upload. It sometimes happens that the data transfer was interrupted during upload. After the missing files have been copied into the installation folder, the problem should be resolved.

```
Datenstrom Yellow requires configuration file!
```

Copy the supplied `.htaccess` file into the installation folder. Check if your FTP software has a setting to show all files. It sometimes happens that the `.htaccess` file was overlooked during installation. After the missing configuration file has been copied into the installation folder, the problem should be resolved.

```
Datenstrom Yellow requires rewrite support!
```

Check the configuration file of the web server, see [problems with Apache](#problems-with-apache) and [problems with Nginx](#problems-with-nginx). You either need to change the configuration file of your web server or you use another web server. As soon as the web server forwards HTTP requests to the `yellow.php`, the problem should be resolved.


```
Datenstrom Yellow requires PHP extension!
```

Install the missing PHP extension on your web server. You need `curl gd mbstring zip`.

```
Datenstrom Yellow requires PHP 7.0 or higher!
```

Install the latest PHP version on your web server.

## Problems after installation

The following error message can happen:

```
Check the log file. Activate the debug mode for more information.
```

Check the log file `system/extensions/yellow-website.log`. If there are write errors, then give write permissions to the affected files. If there are other errors, then replace the affected files or [report a bug](contributing-guidelines). The log file gives you in any case a quick overview of what happens on your website. Here's an example:

```
2020-10-28 14:13:07 info Install Datenstrom Yellow 0.8.17, PHP 7.1.33, Apache 2.4.33, Mac
2020-10-28 14:13:07 info Install extension 'English 0.8.27'
2020-10-28 14:13:07 info Install extension 'German 0.8.27'
2020-10-28 14:13:07 info Install extension 'Swedish 0.8.27'
2020-10-28 14:13:17 info Add user 'Anna'
2020-12-18 21:02:42 info Update extension 'Core 0.8.42'
2020-12-18 21:02:42 error Can't write file 'system/extensions/yellow-system.ini'!
```

You can use the debug mode to investigate the cause of a problem in more detail, to show the stack trace of a program or if you are curious about how Datenstrom Yellow works. Depending on the debug level, more or less information are shown on screen. Here is how to activate the debug mode on your website:

Open file `system/extensions/yellow-system.ini` and change `CoreDebugMode: 1`.

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage layout:wiki-start theme:stockholm language:en parser:markdown
YellowCore::processRequest file:content/1-en/2-wiki/page.md
YellowCore::request status:200 time:19 ms
```

Get file system information by increasing debug level to `CoreDebugMode: 2`.

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowUser::load file:system/extensions/yellow-user.ini
YellowLanguage::load file:system/extensions/english.txt
YellowLanguage::load file:system/extensions/german.txt
YellowLanguage::load file:system/extensions/swedish.txt
YellowLanguage::load file:system/extensions/yellow-language.ini
YellowLookup::findFileFromContentLocation /wiki/ -> content/1-en/2-wiki/page.md
```

Get maximum information by increasing debug level to `CoreDebugMode: 3`.

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Layout:default
YellowSystem::load Theme:stockholm
YellowSystem::load Language:en
```

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

When your website doesn't work, then you have to [enable the rewrite module](https://stackoverflow.com/questions/869092/how-to-enable-mod-rewrite-for-apache-2-2) and [change the AllowOverride configuration](https://stackoverflow.com/questions/18740419/how-to-set-allowoverride-all). After the configuration has been changed, you may have to restart the Apache web server.

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

When your website doesn't work, then check `server_name` and `root` in the configuration file. After the configuration has been changed, you may have to [restart the Nginx web server](https://stackoverflow.com/questions/21292533/reload-nginx-configuration).

## Related information

* [How to start the built-in web server](https://github.com/annaesvensson/yellow-serve)
* [How to create a user account](https://github.com/annaesvensson/yellow-edit)
* [How to update a website](https://github.com/annaesvensson/yellow-update)

Do you have questions? [Get help](.).
