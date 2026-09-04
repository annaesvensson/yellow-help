---
Title: Fehlerbehebung
ShowLanguageSelection: 1
---
Erfahre wie man Probleme auf seiner Webseite behebt.

## Fehlermeldungen

? Datenstrom Yellow stopped with fatal error 
? 
? Die Software ist abgestürzt. Aktiviere den Debug-Modus um weitere Informationen zu erhalten. Sehr wahrscheinlich funktioniert eine Erweiterung nicht richtig oder ist nicht auf dem neusten Stand. Sobald die entsprechende Erweiterung aktualisiert wurde, sollte das Problem behoben sein. Wende dich an den Webmaster, falls diese Fehlermeldung ständig angezeigt wird.

? Datenstrom Yellow requires PHP 7.0 or higher
? 
? Installiere die aktuelle PHP-Version auf deinem Webserver. Du benötigst `PHP 7.0` oder höher. Unter Linux benutzt man am besten die Paketverwaltung der Linux-Distribution, für Mac gibt es MAMP, für Windows gibt es XAMPP. Es wird empfohlen die neuste PHP-Version zu verwenden. Sobald die Webseite die notwendige PHP-Version findet, sollte das Problem behoben sein.

? Datenstrom Yellow requires PHP xxx extension
? 
? Installiere die fehlende PHP-Erweiterung auf deinem Webserver. Du benötigst `curl gd mbstring zip`. Denke daran dass der Webserver und die Befehlszeile möglicherweise unterschiedliche PHP-Versionen verwenden. Es wird empfohlen die gleiche PHP-Version zu verwenden. Sobald die Webseite die notwendigen PHP-Erweiterungen findet, sollte das Problem behoben sein.

? Datenstrom Yellow requires rewrite rules
? 
? Überprüfe die Konfiguration deines Webservers. Der Webserver benötigt zusätzliche URL-Umschreibungsregeln, aber das hängt sehr stark vom verwendeten Webserver und dem Betriebssystem ab. Wende dich am besten an deinen Webhosting-Anbieter. Sobald der Webserver HTTP-Anfragen an die `yellow.php` weiterleitet, sollte das Problem behoben sein.

? Datenstrom Yellow requires write access
? 
? Führe den Befehl `chmod -R a+rw *` im Installations-Verzeichnis aus. Du kannst auch deine FTP-Anwendung verwenden, um allen Dateien Schreibrechte zu geben. Es wird empfohlen allen Dateien und Verzeichnissen im Installations-Verzeichnis Schreibrechte zu geben. Sobald die Webseite ausreichende Schreibrechte im `system`-Verzeichnis hat, sollte das Problem behoben sein.

? Datenstrom Yellow requires htaccess file
? 
? Kopiere die mitgelieferte `.htaccess`-Datei ins Installations-Verzeichnis. Überprüfe ob deine FTP-Anwendung eine Einstellung hat, um alle Dateien anzuzeigen. Es passiert manchmal dass die `.htaccess`-Datei bei der Installation übersehen wurde. Sobald die fehlende Konfigurationsdatei ins Installations-Verzeichnis kopiert wurde, sollte das Problem behoben sein.

? Datenstrom Yellow requires complete upload
? 
? Kopiere nochmal alle mitgelieferten Dateien ins Installations-Verzeichnis. Überprüfe ob deine FTP-Anwendung beim Hochladen eine Fehlermeldung anzeigt. Es passiert manchmal dass die Datenübertragung beim Hochladen unterbrochen wurde. Nachdem alle Dateien ins Installations-Verzeichnis kopiert wurden, sollte das Problem behoben sein.

? Can't write file
? 
? Die Datei kann nicht ins Dateisystem geschrieben werde. Führe den Befehl `chmod -R a+rw *` im Installations-Verzeichnis aus. Du kannst auch deine FTP-Anwendung verwenden, um allen Dateien Schreibrechte zu geben. Manchmal ist eine Anwendung für Datei-Synchronisation nicht richtig konfiguriert. Wende dich an den Webmaster, falls du weiterhin Probleme mit dem Dateisystem hast.

? Can't send email message
? 
? Die E-Mail-Nachricht kann nicht versendet werden. Möglicherweise musst du die E-Mail-Adresse für ausgehende Nachrichten so konfigurieren, dass die E-Mail-Adresse deinen Domainnamen enthält. Manchmal funktioniert die voreingestellte E-Mail-Adresse nicht oder der Mailserver ist falsch konfiguriert. Wende dich an den Webmaster, falls diese Fehlermeldung ständig angezeigt wird. 

? Can't generate static page
? 
? Die entsprechende Seite wird in einer statischen Webseite nicht unterstützt. Der statische Generator hat gewisse technische Beschränkungen, beispielsweise kann kein E-Mail-Kontaktformular generiert werden. Theoretisch könnte jede Seite als statische Seite generiert werden, jedoch wären dann zusätzliche Dienste erforderlich, um dynamische HTTP-Anfragen zu verarbeiten.

? Can't connect to the update server
? 
? Die Software-Aktualisierung ist nicht möglich. Diese Fehlermeldung bedeutet in der Regel, dass keine Internetverbindung besteht oder dass der Internetzugang auf dem Webserver blockiert ist. Falls du einen Webserver mit SSH-Zugang hast, kannst du die Internetverbindung überprüfen. Führe den Befehl `curl -I https://datenstrom.se` auf dem Webserver aus.

## Probleme mit deinem Webserver

Du benötigst einen Webserver der HTTP-Anfragen an Datenstrom Yellow weiterleitet. Wende dich am besten an deinen Webhosting-Anbieter und lasse die Konfiguration deines Webservers überprüfen. Der Webserver muss drei Dinge erledigen. Erstens muss er HTTP-Anfragen für nicht existierende Dateien/Verzeichnisse an die `yellow.php` weiterleiten. Zweitens muss er den direkten Zugriff auf das `content`-Verzeichnis mit einer Fehlerseite blockieren. Drittens muss er den direkten Zugriff auf das `system`-Verzeichnis mit einer Fehlerseite blockieren. [Siehe Konfigurationen für verbreitete Webserver](https://github.com/annaesvensson/yellow-help/blob/main/yellow-web-server-configurations.md).

## Probleme mit deinem Mailserver 

Du benötigst einen Mailserver um E-Mails verschicken zu können. Wende dich am besten an deinen Webhosting-Anbieter und frage nach ob Sendmail aktiviert ist. Nachdem du überprüft hast dass Sendmail aktiviert ist, besteht die nächste Möglichkeit darin die E-Mail für ausgehende Nachrichten zu konfigurieren. Öffne die Datei `system/extensions/yellow-system.ini` und ändere `From`. Konfiguriere eine E-Mail-Adresse mit deinem Domainnamen, beispielsweise `noreply@example.com`. Manchmal funktioniert die voreingestellte E-Mail-Adresse nicht oder der Mailserver ist falsch konfiguriert. [Weitere Informationen zu Systemeinstellungen](how-to-change-the-system#systemeinstellungen).

## Probleme mit installierten Erweiterungen

[Du kannst einen Fehler melden oder Produktfeedback geben](https://datenstrom.se/de/support/) falls etwas nicht wie erwartet funktionieren sollte. Erkläre wie man den Fehler reproduziert, gebe detaillierte Informationen an und füge die Datei `system/extensions/yellow-website.log` hinzu. Überprüfe ob der Fehler in einer brandneuen Installation auftritt. Vermeide es Fehler zu melden die sich nicht in einer Neuinstallation reproduzieren lassen. Erkläre unbedingt wie man den Fehler reproduziert, da dein Fehlerbericht andernfalls ignoriert wird.

Du kannst den Debug-Modus benutzen um die Ursache eines Problems genauer zu untersuchen oder falls du neugierig bist wie Datenstrom Yellow funktioniert. Um den Debug-Modus zu aktivieren, öffne die Datei `system/extensions/yellow-system.ini` und ändere `CoreDebugMode: 1`. Es werden dann zusätzliche Informationen auf dem Bildschirm und in der Browser-Konsole angezeigt. Abhängig vom Debug-Modus werden mehr oder weniger Informationen angezeigt. [Weitere Informationen zum Debuggen](api-for-developers#debuggen).

Hast du Fragen? [Hilfe finden](.).
