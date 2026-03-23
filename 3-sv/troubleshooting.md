---
Title: Felsökning
ShowLanguageSelection: 1
---
Läs hur man löser vanliga problem.

[toc]

## Problem under installationen av en webbsida

Följande felmeddelanden kan uppstå:

? Datenstrom Yellow requires PHP 7.0 or higher
? 
? Installera den aktuella PHP-versionen på din webbserver. Du behöver `PHP 7.0` eller högre. På Linux är det bäst att använda pakethanteringen av Linux-distributionen, för Mac finns det MAMP, för Windows finns det XAMPP. Det rekommenderas att använda den senaste PHP-versionen. Så snart webbplatsen hittar den nödvändiga PHP-versionen bör problemet lösas.

? Datenstrom Yellow requires PHP xxx extension
? 
? Installera saknade PHP-tillägget på din webbserver. Du behöver `curl gd mbstring zip`. Tänk på att webbservern och kommandoraden kan använda olika PHP-versioner. Det rekommenderas att använda samma PHP-versionen. Så snart webbplatsen hittar de nödvändiga PHP-tilläggen bör problemet lösas.

? Datenstrom Yellow requires rewrite rules
? 
? Kontrollera konfigurationen av din webbserver. Webbservern kräver ytterligare regler för omskrivning av URL-adresser, men det beror mycket på vilken webbserver och vilket operativsystem du använder. Det är bäst att kontakta din webbhotell för hjälp. Så snart webbservern vidarebefordrar HTTP-förfrågningar till `yellow.php` bör problemet lösas.

? Datenstrom Yellow requires write access
? 
? Kör kommandot `chmod -R a+rw *` i installationsmappen. Du kan också använda din FTP-applikation för att ge skrivbehörighet till alla filer. Det rekommenderas att ge skrivbehörighet till alla filer och mappar i installationsmappen. Så snart webbplatsen har tillräcklig skrivåtkomst i `system`-mappen bör problemet lösas.

? Datenstrom Yellow requires htaccess file
? 
? Kopiera medföljande `.htaccess`-filen till installationsmappen. Kontrollera om din FTP-applikation har en inställning för att visa alla filer. Ibland händer det att `.htaccess`-filen förbises under installationen. Så snart saknade konfigurationsfilen har kopierats till installationsmappen bör problemet lösas.

? Datenstrom Yellow requires complete upload
? 
? Kopiera igen alla medföljande filer till installationsmappen. Kontrollera om din FTP-applikation visar ett felmeddelande under uppladdningen. Ibland händer det att dataöverföringen avbröts under uppladdningen. Efter att alla filer har kopierats till installationsmappen bör problemet lösas.

## Problem efter installationen av en webbsida

Följande felmeddelanden kan uppstå:

? Inloggningen misslyckades
? 
? Emailen eller lösenordet är felaktigt. Det här felmeddelandet innebär oftast att lösenordet är felaktigt. Om du har glömt ditt lösenord kan du återställa det. Du kan också skapa ett nytt användarkonto i en webbläsare eller på kommandoraden. Kontakta webbmastern om du fortfarande har problem med ditt användarkonto.

? Can't write file
? 
? Filen kan inte skrivas till filsystemet. Kör kommandot `chmod -R a+rw *` i installationsmappen. Du kan också använda din FTP-applikation för att ge skrivbehörighet till alla filer. Ibland är en applikation för filsynkronisering felaktigt konfigurerat. Kontakta webbmastern om du fortfarande har problem med filsystemet.

? Can't send email message
? 
? E-postmeddelandet kan inte skickas. Du kan behöva konfigurera e-postadressen för utgående meddelanden så att e-postadressen innehåller ditt domännamn. Ibland fungerar inte standard-e-postadressen eller så är e-postservern felkonfigurerad. Kontakta webbmastern om detta felmeddelande visas hela tiden.

? Can't generate static page
? 
? Den motsvarande sidan stöds inte i en statisk webbplats. Det finns vissa tekniska begränsningar för vad den statiska generatorn kan göra, till exempel kan den statiska generatorn inte generera ett e-postkontaktformulär. Teoretiskt sett kan vilken sida som helst genereras som en statisk sida, men då behöver man ytterligare tjänster för att hantera dynamiska HTTP-förfrågningar.

? Can't connect to the update server
? 
? Programuppdateringen är inte möjlig. Detta felmeddelande betyder vanligtvis att det inte finns någon internetanslutning eller att internetåtkomsten är blockerad på webbservern. Om du har en webbserver med SSH-åtkomst kan du kontrollera internetanslutningen. Kör kommandot `curl -I https://datenstrom.se` på webbservern.

? Datenstrom Yellow stopped with fatal error
? 
? Programvaran har kraschat. Aktivera felsökningsläget för att få mer information. Troligtvis fungerar ett tillägg inte som det ska eller är inte uppdaterat. Så snart det relevanta tillägget har uppdaterats bör problemet lösas. Kontakta webbmastern om detta felmeddelande visas hela tiden.

## Problem med din webbserver

Du behöver en webbserver som vidarebefordrar HTTP-förfrågningar till Datenstrom Yellow. Det är bäst att kontakta din webbhotell och be dem kontrollera konfigurationen av din webbserver. Webbservern måste utföra tre uppgifter. För det första måste den vidarebefordra HTTP-förfrågningar om icke-existerande filer/mappar till `yellow.php`. För det andra måste den blockera direkt åtkomst till `content`-mappen med en felsida. För det tredje måste den blockera direkt åtkomst till `system`-mappen med en felsida. [Se integritet](privacy) och [exempel-konfiguration](https://github.com/annaesvensson/yellow-help/blob/main/example-configuration.md).

## Problem med din e-postserver

Du behöver en e-postserver för att kunna skicka e-post. Det är bäst att kontakta din webbhotell och fråga om sendmail är aktiverat. När du har bekräftat att sendmail är aktiverat är nästa steg att konfigurera email för utgående meddelanden. Öppna filen `system/extensions/yellow-system.ini` och ändra `From`. Konfigurera en e-postadress med ditt domännamn, till exempel `noreply@example.com.` Ibland fungerar inte standard-e-postadressen eller så är e-postservern felkonfigurerad. [Läs mer om systeminställningar](how-to-change-the-system#systeminställningar).

## Problem med tillägg

Du kan använda felsökningsläget för att undersöka orsaken till ett problem eller om du är nyfiken på hur Datenstrom Yellow fungerar. För att aktivera felsökningsläget, öppna filen `system/extensions/yellow-system.ini` och ändra `CoreDebugMode: 1`. Ytterligare information kommer att visas på skärmen och i webbläsarkonsolen. Beroende på felsökningsläget visas mer eller mindre information. [Läs mer om debugging](api-for-developers#debugging).

Har du några frågor? [Få hjälp](.).
