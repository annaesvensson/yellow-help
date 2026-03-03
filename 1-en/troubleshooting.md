---
Title: Troubleshooting
ShowLanguageSelection: 1
---
Learn how to solve common problems.

[toc]

## Problems during installation of a website

The following error messages can happen:

? Datenstrom Yellow requires PHP 7.0 or higher
? 
? Install the current PHP version on your web server. You need `PHP 7.0` or higher. On Linux it's best to use the package management of your Linux distribution, for Mac there is MAMP, for Windows there is XAMPP. It's recommended to use the latest PHP version. As soon as the website finds the required PHP version, the problem should be resolved.

? Datenstrom Yellow requires PHP xxx extension
? 
? Install the missing PHP extension on your web server. You need `curl gd mbstring zip`. Please keep in mind that the web server and the command line may use different PHP versions. It's recommended to use the same PHP version. As soon as the website finds the required PHP extensions, the problem should be resolved.

? Datenstrom Yellow requires rewrite support
? 
? Check the configuration of your web server, [see example files](#problems-with-web-server). Some web servers require additional settings, but this depends very much on the web server and operating system you use. It's best to contact your web hosting provider. As soon as the web server forwards HTTP requests to the `yellow.php`, the problem should be resolved.

? Datenstrom Yellow requires write access
? 
? Execute the command `chmod -R a+rw *` in the installation folder. You can also use your FTP application to give write permissions to all files. It's recommended to give write permissions to all files and folders in the installation folder. As soon as the website has sufficient write access in the `system` folder, the problem should be resolved.

? Datenstrom Yellow requires htaccess file
? 
? Copy the supplied `.htaccess` file into the installation folder. Check if your FTP application has a setting to show all files. It sometimes happens that the `.htaccess` file was overlooked during installation. As soon as the missing configuration file has been copied into the installation folder, the problem should be resolved.

? Datenstrom Yellow requires complete upload
? 
? Copy again all of the supplied files into the installation folder. Check if your FTP application shows an error message during upload. It sometimes happens that the data transfer was interrupted during upload. After all files have been copied into the installation folder, the problem should be resolved.

## Problems after installation of a website

The following error messages can happen:

? Datenstrom Yellow stopped with fatal error
? 
? The software has crashed. Activate the [debug mode](api-for-developers#debugging) for more information. You should contact the webmaster if the problem persists. Very likely an extension is not working properly or is not up to date. As soon as the relevant file has been updated or removed, the problem should be resolved.

? Can't connect to the update server
? 
? The update is currently not possible. This error message usually means that there is no internet connection or that the internet access is blocked on your web server. If you have a web server with SSH access, you can check this yourself. Execute the command `curl https://datenstrom.se` on the web server.

? Can't generate static page
? 
? The page in question is not supported in a static website. There are some technical limitations to what the static generator can do, for example the static generator can't generate a contact form. Any page could theoretically be generated as a static page, but then you would need additional services to handle dynamic HTTP requests.

## Problems with web server

You need a web server that forwards HTTP requests to Datenstrom Yellow. Your web server has to do three things. First it has to forward requests for non existing files/folders to the `yellow.php`. Second it has to block direct access to the `content` folder with an error page. Third it has to block direct access to the `system` folder with an error page. Some web servers require additional settings, but this depends very much on the web server and operating system you use. It's best to contact your web hosting provider.

The following example files are available:

? `.htaccess` file for the Apache web server
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

? `Caddyfile` file for the Caddy web server
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

? `nginx.conf` file for the Nginx web server
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

## Problems with mail server

You need a mail server to send emails. It's best to contact your web hosting provider and ask if sendmail is enabled. When you have confirmed that sendmail is enabled, your next option is to configure the email for outgoing messages. The default email address for outgoing messages is `noreply`. The mail server has to add your domain name so that it becomes a complete email address, for example `noreply@example.com`. Sometimes this doesn't work or the mail server is miss-configured. 

The following settings can be configured in file `system/extensions/yellow-system.ini`:

`ContactSiteEmail` = email for outgoing messages, [requires contact extension](https://github.com/annaesvensson/yellow-contact)  
`EditSiteEmail` = email for outgoing messages, [requires edit extension](https://github.com/annaesvensson/yellow-edit)  

## General problems

You can use the debug mode to investigate the cause of a problem or if you are curious about how Datenstrom Yellow works. To activate the debug mode on your website open file `system/extensions/yellow-system.ini` and change `CoreDebugMode: 1`. Additional information will be displayed on the screen and in the browser console. Depending on the debug mode, more or less information are shown. [Learn more about debugging](api-for-developers#debugging).

Do you have questions? [Get help](.).
