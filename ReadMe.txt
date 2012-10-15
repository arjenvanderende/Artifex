CD-ROM INDELING
---------------
De indeling van de software op de cd-rom is alsvolgt.
Vervang x door de letter van uw cd-rom station.
x:\Software\Apache		Webserver
x:\Software\PHP5		PHP parser
x:\Software\MySQL		Database
x:\Source\Artifex		Voorbeeld case
x:\Source\Examples		Source-code van de hoofdstukken

INSTALLATIE VAN EEN WEBSERVER MET APACHE, MYSQL & PHP5
------------------------------------------------------
1.	Open het bestand x:\Software\Apache\Setup.msi
2.	Volg de installatie procedure en laat Apache installeren naar c:\Webserver\Apache
3.	Open het bestand x:\Software\PHP\Setup.exe
4.	Volg de installatie procedure en laat PHP installeren naar c:\Webserver\PHP
5.	Open het bestand x:\Software\MySQL\Setup.exe
6.	Volg de installatie procedure en laat MySQL installeren naar c:\Webserver\MySQL

CONFIGURATIE VAN EEN WEBSERVER MET APACHE, MYSQL & PHP5
-------------------------------------------------------
1.	Open het bestand c:\Webserver\Apache\conf\httpd.conf
2.	Zoek de regel met DocumentRoot en maak er van DocumentRoot "c:/Webserver/Pages"
3.	Zoek de regel met #LoadModule rewrite_module modules/mod_rewrite.so en verwijder het hekje (#).
4.	Voeg na de regel bij 3 de volgende regel toe:
		# Load PHP5 module:
		LoadModule php5_module "/Server/php/php5apache2.dll"
		AddType application/x-httpd-php .php .html .htm
5.	Sla wijzigingen op en sluit het document op
6.	Open het bestand c:\windows\php.ini en haal de punt comma (;) weg voor de regel:
		;extension=php_mysql.dll

INSTALLATIE VAN DE ARTIFEX DEMO
-------------------------------
Kopieer de bestanden uit x:\Source\Artifex naar c:\Webserver\Pages\Artifex.
Na het aanmaken van de database met voorbeeld 1 uit hoofdstuk 8 is het Artifex project klaar voor gebruik.
