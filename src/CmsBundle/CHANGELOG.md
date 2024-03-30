# Versie 2.1.2

<span style="color:#aaa">**Release:** 30 Maart 2020</span>

## Technisch

- Composer logging wordt niet meer gemaild.

## Website configuratie

- Lange titels afbreken in linker menu

## Visueel

- Diverse visuele wijzigingen waaronder popup z-index prioriteit.

## Pagina beheer

- Pagina's kunnen nu gemarkeerd worden als 'geen login' waardoor een login instelling op eerdere pagina's deze pagina niet blokkeren.
- Bij het downloaden van media wordt er niet geforceerd naar 'image' maar wordt de ingestelde bestandstype meegenomen.
- Vanuit de instellingen kunnen Trinity-blokken worden genegeerd waardoor een website enkel custom blokken gebruikt.
- Wanneer een pagina wordt ingesteld op 'onderliggende pagina', zoekt het systeem enkel naar onderliggende `actieve` pagina's.

## Pagina composer

- Blauwe markering die de inhoud van blokken toont, enkel voor lege blokken.
- Blauwe markering toont nu óók of er media gekoppeld is in een blok, en of deze links of rechts naast een tekst staat.

## Betaalmethodes

- Toegevoegd: OmniKassa (Rabobank).
- Enkel de banken ophalen indien iDEAL gebruikt wordt.

## Meertaligheid

- Wanneer multi-site wordt gebruikt i.c.m. talen, kijken de sites alsog de talen naar beschikbaarheid binnen de site + taal combinatie.

## Command & Control

- Bundels worden gedownload en uitgepakt in de cache map, zodat deze na het updaten automatisch wordt opgeruimd.

# Versie 2.1.1

<span style="color:#aaa">**Release:** 9 Maart 2020</span>

# Voorkant pagina's

- Er is nu een Page->isHome variable om de detecteren of het een home pagina is of niet.
- Zorg ervoor dat homepagina's ook all normale variable beschikbaar hebben.

# Pagina editor

- video blok kan youtube, vimeo en uit bibiotheek keuze. Met uitleg tekst.

# Search

- Indexeer ook ontzichtbare pagina's

# Systeem

- Maak Swiper slider beschikbaar

# Versie 2.1.0

<span style="color:#aaa">**Release:** 13 Feb 2020</span>

# Admin

- Meer style updates voor admin/

# Meertaligheid

- Admin strings vertaalbaar
- Vertalingen update commando kan nu ook alleen app/ scannen.
- Optimalizaties voor het cache opruim script.

# Multi site

- Verschillende kleine verbeteringen en aanpassingen.

# Systeem

- Parse [page:99] tages in linker en rechter header teksten.
- pdf generatie geupdate
- b2b verbeteringen
- Meer bedrijfs informatie (iban, bic, kvk lokatie, invoice periode)

# Vertalingen

- Toon vertaling groepen die bij elkaar onder 1 groep.
- Als het veld niet is vertaald, toon een leeg veld.

# Webshop

- Voeg currency toe aan bestaande webshop orders die dit nog niet hebben.

# Versie 2.0.1

<span style="color:#aaa">**Release:** 19 December 2019</span>

### Command & Control

- Automatisch updaten in bulk (volledig functioneel).

### Pagina's

- Maak de tekst die getoond wordt als er geen pagina's zijn vertaalbaar.
- Verberg de "tags" veld, dit wordt op moment niet gebruikt.
- Verschillende ckeditor verbeteringen.
- Metadata verbeteringen voor pagina edit en metadata uit bundles.
- Verschillende verbeteringen wanneer pagina blokken worden gekopieerd.
- Gebruik https:// links voor de youtube en vimeo blokken.
- fixes voor youtube en vimeo video blokken (frontend en backend).

### Meertaligheid

- Ondersteuning toegevoegd voor een aparte taal puur voor het CMS
- Vertalingen globaal op CMS niveau
- Base URL in settings heeft nu een correct placeholder.
- De errorhandler kan omgaan met 404 melding op talen waar een baseURL gebruikt wordt.
- Bij het aanpassen van de pagina toon de huidige geselecteerde taal in de pagina headerbar. Dit omdat het normale linker menu wordt geminimalizeerd voor de blokken selectie balk.
- Status mail als er een pagina wordt aanmaken of kopieeren uit andere taal naar de opgegeven taal.

### Multisite

- Fix bundel selectie voor bundles die al een fontawesome icon gebruiken.

### Media

- Fix het handmatig aanmaken van media directories.
- Manueel media compressie support via TinyPNG.

### Users

- Verberg het Geboortedatum veld
- Maak het wachtwoord verplicht bij het invoeren van een nieuwe gebruiker
- Geef feedback flash bericht als wachtwoorden niet overeen komen.

### Upload

- Beveiligde upload directory

### Misc

- Voer PhpOffice toe, dit laat ons docx bestanden exporteren.
- Indexer behandeld nu pagina's per stuk. In plaats van alles ophalen en daarna verwerken.
- Sta toe dat doorgeven voorraad (hexon) de occasion update url kan gebruiken (v2 only)
- Fontawesome heeft geen versie in bestand. Raad de versie en voeg deze toe, zodat als een nieuwe fontawesome wordt geselecteerd deze ook daadwerkelijk wordt gebruikt.
- 

### Twig

- Nieuwe twig helper functie om entities van uit twig op te halen

### Symfony

- Updates versies and het vastzetten van een paar onderdelen omdat de nieuwe versies stuk gaan.

# Versie 2.0

<span style="color:#aaa">**Release:** 30 oktober 2019</span>

### Command & Control

- Automatisch updaten in bulk (pre-check).

### Composer

- Composer wordt geserveerd vanuit Trinity i.p.v. per-project.

### Systeem / UI

- Volledig nieuwe UI voor de back-end

- Automatisch inloggen op basis van IP-adres in een optioneel `.ip` bestand.
- Nieuwe systeem brede loaders.
- Consistent aangepaste iconen voor bewerk acties (FontAwesome 5).

### Pagina beheer

- Blokken worden nu in een overzichtelijke sidebar getoond met afbeeldingen.
- Nieuwe soort blokken.
- Blokken kunnen nu gesleept worden vanuit de sidebar naar een willekeurige positie i.p.v. onderaan beginnen.
- Blokken hebben nu een inline editor met zwevende toolbar i.p.v. prominent in zicht.

### Media

- De media bibliotheek heeft een overhaul gekregen.
- Afbeeldingen kunnen nu verkleind worden vanuit de admin, en dit kan verder aangepast worden.

### Bundels

- Zoeken wordt automatisch verborgen in het overzicht.

### API

- Binnen V2 gebruiken we de nieuwe `swagger-ui` van de APIDoc bundle.

### Documentatie

- Inline documentatie `/docs` (Work in progress)
- Er is een offline handleiding beschikbaar voor Trinity V2 en E-Commerce V2.

# Versie 1.7

<span style="color:#aaa">**Release:** 30 oktober 2019</span>

### Composer

- De bestanden voor composer zijn verplaatst naar `src/CmsBundle` en dienen met symlinks gekoppeld te worden.

### Apple Maps

- Er is technische ondersteuning toegevoegd voor Apple Maps.

### Systeem

- Pagina loader globaal toegevoegd.
- Diverse punten gemigreerd vanuit `2.0`.
- Ondersteuning voor Google reCAPTCHA `V2` (onzichtbaar) en `V3`.

### Mult-site

- Introductie multi-site support.
- Pagina's kopiëren tussen sites.
- Stabiliteit oplossingen.
- Bundels kunnen verbergen per multi-site omgeving.

### Mailer

- Reply-to opgelost.

### Cache management

- Cache probleem opgelost, bij het kopiëren of importeren van een pagina, wordt men eerst doorgestuurd naar de externe `cache.php` pagina om de cache te wissen, om vervolgens terug gestuurd te worden. Dit voorkomt een fout bij het wissen van de cache in een bestaande sessie.

### Betaal mogelijkheden

- Aanpassingen binnen Sisow ondersteuning.
- Aanpassingen binnen Buckaroo ondersteuning.
- Verbeteringen binnen bank opties.
- Upgrade naar Mollie 2.0

### Command & Control

- Diverse verbeteringen.

### Gebruiker beheer

- Geef een melding wanneer een gebruikersnaam al bestaat. Dit resulteerde eerder in een foutmelding.
- Twee extra rollen toegevoegd: `reporter` en `editor`

### Pagina beheer

- Verbeteringen in de 'bekijk op website' functie/knop.
- Bij het verwijderen van een pagina, fout opgelost bij verwijderen onderliggende pagina's.
- Bij het kopiëren van een pagina wordt er nu een overlay getoond dat het systeem bezig is.
- Ondersteuning voor `OG-tags` en de variant van Twitter.

### Custom navigatie

- Ontbrekende global variablen toegevoegd.
- Opties raken niet meer in de war als een zelfde pagina in meerdere navigaties wordt gebruik.

### Meertaligheid

- Bij een blanco sessie in een andere taal, werd éénmalig de pagina in NL getoond.

### Editor

- Uitgebreid kleuren palette.

### Sitemap

- Fix een bug die sitemaps niet liet zien op website zonder webshop

# Versie 1.6.0

<span style="color:#aaa">**Release:** 3 juli 2019</span>

### Gebruiker beheer

- Diverse problemen opgelost in het gebruiker beheer.
- Zoeken binnen gebruikers in Safari is opgelost.

### Extensies

- Extensies zijn nu gesorteerd op alfabet in Trinity.
- Ongeldige (lege) entries niet meer tonen (en markeren in Trinity).
- Taal ondersteuning voor navigatie.

### Navigatie

- `active` status op navigatie items.

### CKEditor / Pagina beheer

- Trinity icoon en een gestructureerde Trinity JS class voor speciale functies in CKEditor.
- `<i>` tags toestaan.
- Knop `Nieuwe pagina` wanneer er nog geen pagina is.

### Overig

- Backups zijn doorgetest en goed werkend vanaf deze versie.
- Admin e-mail voor test mails ondersteund nu meerdere e-mailadressen met `;`.
- Log files worden verwijderd na 3 dagen zodra de backup draait.
- `force_https` wordt niet doorgevoerd zodra het domein `.dev` of `.local` is.
- E-mails als `wachtwoord vergeten` worden nu vanuit de `mailer` class gestuurd i.p.v. de oude `Swift` manier.

- Datepicker fix in Google Chrome.
- Google reCaptcha is uitgeschakeld binnen Trinity login, hier zijn al veiligheidsmaatregelen genomen.
- Twig filter `preg_replace` toegevoegd.

# Versie 1.5.1

<span style="color:#aaa">**Release:** 13 Juni 2019</span>

### Gebruiker beheer

- Diverse problemen opgelost in het gebruiker beheer.

### Extensies

- Extensies zijn nu gesorteerd op alfabet in Trinity.

### Overig

- E-mails als `wachtwoord vergeten` worden nu vanuit de `mailer` class gestuurd i.p.v. de oude `Swift` manier.

# Versie 1.5.0

<span style="color:#aaa">**Release:** 13 juni 2019</span>

### Performace

- Materialize wordt nu lokaal geladen. (Geen remote dependencies meer)

### Gebruiker / profiel

- IBAN veld voor profiel.
- Gebruiker beheer controleert nu op niet-unieke gebruikersnamen en e-mailadressen.
- Een admin kan ingesteld worden dat deze geen andere admin's kan verwijderen.
- Een admin kan nooit zijn/haar eigen gebruiker veranderen om meer rechten te verkrijgen, dit moet altijd twee-ledig door een andere admin erbij te betrekken.
- Spacing issue opgelost bij de popup na het opslaan van een gebruiker.
- Het is nu mogelijk om een gebruiker te 'inpersonaten' (tijdelijk inloggen als die gebruiker vanuit Trinity).

#### SEO

- Robots (follow etc.) per pagina instelbaar.
- Elke bundle kan nu het Trinity `metadata`-injection systeem gebruiken, om zelf metadata te overriden. Een praktisch voorbeeld is de blog, waarbij de metadata gebasseerd is op de getoonde blog post.

### Pagina's

- Ondersteuning voor bundle tags in templates (zelfde structuur als bij gebruik in teksten).
- Oplossing voor het niet kunnen uploaden van pagina dumps binnen Windows.
- Bij het bewerken van SEO informatie per pagina, wordt nu een SEO editor getoond in de stijl van een Google resultaat. Om direct een idee te geven hoe Google dit zal gaan tonen.

### Composer

- Wanneer alle blokken worden verwijderd, `Blok toevoegen`-knop herstellen.
- Oplossing voor wanneer na het klonen van een blok, een knop bij het originele blok werd geplaatst.

### TriniPay

- Extra controles.

### Command & Control

- Symfony versie publiceren.
- Symfony versie tonen in kolom.

### Uptime monitor

- HTML fix.

### Overig

- Code opschonen, oude CKEditor data die niet gebruikt wordt (bijv. examples)
- Extra lettertypes en CSS voor CKEditor
- Agenda functionaliteit is terug, en optioneel

# Versie 1.4.1
<span style="color:#aaa">**Release:** 22 april 2019</span>

### Pagina beheer

- Verduidelijking welke blokken er op de pagina worden gebruikt.
- CSS classes die op blokken worden gezet, niet in de backend toepassen (conflicten).
- Verbeteringen binnen het blokken beheer systeem.
- Blokken hebben nu toegang tot het 'Page' object waarmee pagina specifieke informatie binnen een blok gebruikt kan worden.

### Media

- Bij een Media object is er nu ook een source optie toegevoegd die de media bron RAW terug geeft.

### Betaalmogelijkheden

- Kleine aanpassing voor MultiSafePay.
- Kleine aanpassing voor Sisow.

### Admin

- Changelogs zijn weer inzichtelijk van andere bundles vanuit Trinity.

### Overig

- Sitemap update.

# Versie 1.4.0
<span style="color:#aaa">**Release:** 12 april 2019</span>

### Pagina beheer

- Het is nu mogelijk om een overzicht te generen met welke extensie op welke pagina gekoppeld is, en in welk blok deze gekoppeld staat.
- Bij inline-editors is de toolbar nu omhoog geplaatst omdat dit kon overlappen over de tekst.
- Bij een pagina kan de media op dezelfde manier worden behandeld als bij de instellingen, incl. de verwijderen-knop.
- Onderliggende pagina's zijn nu zichtbaar binnen de `Navigatie`-functionaliteit.
- Enkele problemen opgelost waarbij de editor leeg werd gemaakt bij horizontale- en verticale verplaatsingen.
- Oplossing doorgevoerd waarbij een blanco template niet perse naar `default` verwijst indien er in de configuratie een alternatieve default is ingesteld.
- Probleem opgelost waarbij het downloaden van pagina's in enkele gevallen een fout kon geven.
- Het importeren van een pagina verwijst altijd naar een blanco default template indien de gekozen template niet bestaat.
- Bij het exporteren van pagina's worden geen meta data meegegeven. (SEO)
- Bij het koppelen van een URL aan een blok, nu ook de optie `_blank` toegevoegd.
- Bij het wijzigen van een `externe` of `eerste onderliggende` pagina kan nu alsnog de URI aangepast worden.

### AVG

- De cookiebar is uitgebreid met 3 pagina definities voor:
  - Privacy statement.
  - Cookie informatie.
  - Disclaimer / algemene voorwaarden.
- Binnen de instellingen van Trinity zijn de AVG instellingen nu aan te passen via een losse `AVG`-tab.

### Gebruiker beheer

- Gebruikers zijn gesplitst op soort (website gebruiker / beheerder).
- Additionele functies toegevoegd:
  - Wachtwoord verlopen.
  - Voorkomen dat men hun gebruikersnaam kan wijzigen.
  - Voorkomen dat de gebruiker verwijderd kan worden.

### Installatie

- Verbeteringen doorgevoerd in het installatie bestand.
- Standaard FontAwesome 5.x.
- Standaard installaties hebben geen voorbeeld pagina structuur meer. Dit werd dan achteraf altijd weggehaald, waardoor de pre-filled paginas geen toegevoegde waarde hebben.
- Het vorige punt geldt ook voor media.
- 3rd-party plugins voor o.a. Javascript zijn nu niet meer toegevoegd als `submodules` maar als statische code.

### Meertaligheid

- Base-URI voor meertaligheid; zoals OrangeGas dit gebruikt: `/de`.
- Wanneer er een nieuwe taal wordt toegevoegd, worden de instellingen van de huidige taal gedupliceerd.
- Taal kan verwijderd worden.

### Media

- Het vervangen van afbeeldingen is funtioneel. Hierbij bijft de fysieke locatie van de afbeelding intact waardoor afbeeldingen niet opnieuw gekoppeld hoeven te worden.

### Cache management

- Bij cache ook de `dev` cache legen i.v.m. URI caching.

### Authenticatie / veiligheid

- Symfony firewall wordt nu geserveerd vanuit Trinity, dit omdat dit nooit per project veranderd. Dit zorgt ervoor dat we bij een aanpassing dit gewoon direct via Trinity uit kunnen rollen, zonder dat hier handmatig een bestand moet worden aangepast.
- Inloggen binnen Trinity wordt beperkt tot 5 foutieve inlogpogingen, waarna 30 minuten moet worden gewacht alvorens er weer een poging kan worden gedaan, direct gevolgt tot wederom 30 minuten.
- Recaptcha ondersteuning in systeem formulieren zoals login en registratie op de website.
- Recpatcha ondersteuning voor inloggen binnen Trinity.
- Fout opgelost die een 500-fout veroorzaakte wanneer er geen eind datum gekozen werd bij een account die wel kan verlopen.

### Betaalmogelijkheden

- Ondersteuning voor Sisow.
- Het is nu vanuit de admin mogelijk om een betaalmethode daadwerkelijk vanuit de backend te testen.

### Command & Control

- Het Command & Control (C&C) systeem ondersteund nu dedicated servers. Hierbij kan per project aangegeven worden via welke server deze moet functioneren.
- Updates vragen nu om update data vanuit de server, i.p.v. hard-coded. Dit zorgt ervoor dat bij een wijziging in het update systeem, dit enkel op de server hoeft te worden aangepast.
- Veel visuele verbeteringen en toevoeging in de gehele beleving van het C&C-systeem.
- Er kunnen tags gekoppeld worden aan installaties, om bijvoorbeeld alle installaties te updaten die voorzien zijn van een bepaalde tag. (bijv. onderhoudscontract etc.)

### Overig

- Nieuwste versie van CKEditor 4 geïmplementeerd.
- Alle verwijzingen naar CodeMirror zijn verwijderd.
- Vertikale hoogte aanpassing voor de toast melding.
- E-mail preview foutmelding opgelost.
- Metadata worden meegenomen in de foutmelding handler.
- Update naar FontAwesome 5.7.2.

# Versie 1.3.0
<span style="color:#aaa">**Release:** 14 januari 2019</span>


### Pagina beheer
- Blokken ondersteuning voor de nieuwsbrief bundel. Hiermee kunnen nieuwsbrieven op eenzelfde manier opgebouwd worden als een pagina binnen de back-end. Dit kan per blok worden aangegeven of deze binnen de nieuwsbrief kan/mag gebruikt worden.
- Afbeeldingen kunnen nu op blokken 'gedropt' worden indien deze afbeeldingen ondersteunen. Hierdoor is het niet nodig eerst op het knopje te drukken, en dan in de popup te uploaden, maar gewoon direct op het blok, en klaar.
- Binnen blokken kan nu worden opgegeven dat blokken standaard een bepaalde breedte hebben. (Zoals bijv. 25% voor 4 blokken naast elkaar)
- Probleem opgelost waarbij de editor niet functioneerde na het kopieren van een blok.
- Toon altijd de titel van een blok met een keyword met wat er in het blok gekoppeld is.
- Pagina layouts als `Follow system` en `default` worden getoond als `Standaard layout`.
- Probleem opgelost met het linken naar pagina's.
- De pagina autorisatie (geintroduceerd in versie `1.1.0`) werkte niet op de home pagina. Dit is opgelost.
- Blokken zijn geupdate.
- Dealer-specifieke blokken zijn verwijderd. Nieuwe projecten kregen ineens dealer blokken.
- Blokken kunnen nu worden voorzien van een vaste breedte en eventuele afstand op vorige blok.
- Wanneer er een pagina is gekopieerd, waarvan de template niet op de doel installatie bestaat, wordt automatisch terug gevallen op `default`, die in elke installatie aanwezig is. Dit zorgt ervoor dat het blokken systeem dan blijft werken.
- Voorheen werd een pagina pas in de sitemap.xml opgenomen als deze zichtbaar was én geactiveerd. Nu kan een pagina onzichtbaar zijn, maar wel handmatig aan de sitemap.xml gekoppeld worden. (Voor o.a. registratie of voorwaarden pagina's etc.)
- Oplossing for pagina sortering bij navigatie editor.
- Subcategorieën tonen van webshop.
- Navigatie items kunnen worden gelocked, waardoor je enkel het submenu kan gebruiken om door te klikken.
- Navigatie menu's kunnen verwijderd worden.
- Oplossing doorgevoerd voor pagina's downloaden. (o.a. voor IWEM)

### Gebruiker / profiel beheer
- Optionele moderatie op registratie via de voorkant. (Oorspronkelijk ontwikkeld voor E-Commerce B2B)
- Optioneel zakelijke velden toevoegen bij account registratie aan de voorkant.
- Bij het wijzigen van het profiel binnen de back-end, is het wachtwoord invullen nu optioneel.

### Systeem instellingen
- Backups worden automatisch verwijderd na 14 dagen.
- Binnen de back-end kunnen redirects worden beheerd. Dit zorgt ervoor dat deze automatisch naar de `.htaccess` worden geschreven, zodat we geen overhead hebben waarbij voor elke link eerst Trinity moet worden geladen.
- Er zijn verbeteringen gedaan aan het backup systeem.

### Betaalmogelijkheden
- Ondersteuning voor Pay.nl. (Nieuwe Trinity partner)

### Media

- GIF upload ondersteuning

### Overig
- Verbeterde integratie tussen de E-Commerce bundel en Trinity.
- Standaard mail templates voor nieuwe installaties.
- Oude installatie documenten opgeschoond.
- Veel code opgeschoond.

# Versie 1.2.8
<span style="color:#aaa">**Release:** 23 november 2018</span>

- Nieuwe live statistieken dashboard met Matomo integratie.
- Verbeteringen in zoek indexer.
- Wachtwoord kunnen wijzigen bij bewerken gebruiker.
- Wachtwoord vergeten ondersteuning voorkant.
- Verbeteringen in account e-mails back-end.
- Trinity popup-systeem forceren naar het hoogste visueel niveau.
- Bundel parameters meesturen naar de voorkant.

# Versie 1.2.4, 1.2.5 en 1.2.6
<span style="color:#aaa">**Release:** 16 november 2018</span>

- URL matching voor blog bundel versoepelt.
- Visuele wijzigingen back-end.

# Versie 1.2.3
<span style="color:#aaa">**Release:** 16 november 2018</span>

- Trinity versie script update.
- Visuele wijzigingen back-end.
- Probleem met Internet Explorer 11 in pagination.
- Probleem opgelost met Trinity CDN.

# Versie 1.2.2
<span style="color:#aaa">**Release:** 15 november 2018</span>

### Piwik / Matomo

- Support om een Matomo url op te geven om een eigen Matomo installatie de beheren.

# Versie 1.2.1
<span style="color:#aaa">**Release:** 14 november 2018</span>

### Pagina Beheer

- Verberg geimporteerde pagina en clear de cache.

### Misc

- Fix fontawesome (assets) caching

# Versie 1.2.0

<span style="color:#aaa">**Release:** 14 november 2018</span>

### Composer / CKEditor

- In source mode slaat de formatter html over als deze tussen ```<protector></protector>``` staan.
- De CKEditor-dialog is middels CSS omgebouwd om dit overeen te laten komen met het Materialize-framework die we in de back-end gebruiken. (Meer intergratie)
- Wederom gekeken naar de labels die door CKEditor werden verkloot.
- CKEditor rotzooit niet meer met TWIG variables.
- Blokken waarbij de breedte werden gedefinieerd, begonnen met een breedte van 50% terwijl deze standaard op 100% stond.
- Bij het verwijderen van een afbeelding was er geen mogelijkheid om een nieuwe afbeelding te plaatsen. De knop wordt nu weer hersteld na het verwijderen.
- Tooltips bij knoppen die enkel een icoon bevatten.
- De link doelen (anchors) voor one-page websites is uitgewerkt en afgerond.
- Blokken hebben een extra (blauw-accent) titel die gelijk weerspiegeld wat er in dat blok is gekoppeld.

### Gebruikersbeheer

- Gebruikersbeheer is aangepast met de volgende opties:
  - Ajax ondersteuning.
  - Pagination.
  - Zoeken en filteren.
  - Filter op 'actief' ja/nee
  - Filter op rol
- Bitwise rechten systeem ontwikkeld om gebruikers specifiek bepaalde toegang te ontzeggen.
- Profiel pagina opnieuw opgemaakt om deze consistent binnen de huidige layout te laten werken.
- Wachtwoord versturen functionaliteit is vernieuwd.
- Gebruikers kunnen verlopen na een bepaalde datum.
- Bij gebruikers wordt nu de registratie datum goed meegenomen.

### Betaalmethodes

- Betaal functionaliteit was redelijk gelocked op 'Mollie', dit is nu een dynamische class geworden `Pay`. (Bijv. `Settings->getPay()`)
- `Buckaroo` toegevoegd.
- `MultiSafePay` toegevoegd.

### Pagina beheer

- Pagina assets zorgden voor duplicates qua `Pagina's` mappen in de media bibliotheek.
- Media binnen een pagina worden nu automatisch geplaatst in een media map genoemd zoals de pagina naam (in de map `Paginas`.
- Navigatie systeem voor het opbouwen van custom menu's (o.a. voor het combineren van Trinity pagina's en webshop categorieën door elkaar heen).
- Wanneer bij een pagina de 'type'-pagina werd aangepast, gingen de tabs helemaal in de soep. Dit is gecorrigeerd.
- Linken naar `pagina's`, `media`, `webshop (categorieën en producten)` en `blog posts` (direct vanuit een composer blok als in CKEditor). 
- Ondersteuning voor 'standaard template' hanteren.
- Pagina's kunnen nu gedownload worden als een ZIP-bestand, met hierin de volledige pagina en bijbehorende afbeeldingen, welke op een compleet losstaande installatie geimporteert kan worden waarna de afbeeldingen en pagina structuur identiek is.

### Systeem

- Backups zijn afgerond, en werken naar behoren.
- Terugzetten van een backup kan direct binnen Trinity (en via een command).
- Caching herschreven, wordt nu uitgevoerd na elke pagina mutatie, en kan nog steeds handmatig worden gedaan.
- Custom fout pagina's (i.p.v. de standaard Trinity fout pagina's)
- Custom onderhoud pagina met vrije tekst, aangepast logo en achtergrond.

### Meertaligheid

- Back-end en front-end hebben afzonderlijke sessies. (Geen conflicten meer met wisselende talen)
- Talen bewerken is nu sneller, de taal bewerken pagina doet geen indexeren meer, dit wordt via de `trinity:index` command afgehandeld.
- Voor o.a. OrangeGas de mogelijkheid toegevoegd om meertaligheid te laten verlopen via een URI-prefix. (Bijv. `/de`)

### Cronjobs

- Presets toegevoegd om snel een bepaalde actie uit te voeren.
- Standaard wordt de 'backup'-cronjob toegevoegd.

### Diversen

- Command om lege Mediadir's op te ruimen.

- Command om thumbnails opnieuw te genereren.

- Ondersteuning voor Google Analytics.

- Binnen een TWIG-template kunnen geïnstalleerde bundels opgehaald worden met de variable `installed`.

- Binnen pagina teksten kan nu de variable `[get.param]` worden gebruikt om een `_GET` parameter op te halen.

- Er kan nu een visuele sitemap worden gekoppeld op de website.

- Test-modus gebruikt nu niet meer de vaste `devs` e-mail maar de ingestelde `admin` e-mail in de Trinity instellingen.

- Binnen de back-end wordt het logo niet meer via CSS geprepareerd, maar wordt óf de alternatieve logo óf het reguliere logo getoond zonder filter. (Om een zwart/wit logo te tonen kan dus de alternatieve worden gebruikt, deze wordt ook gebruikt voor de maintenance pagina.)

- Pagination TWIG template. (Eenvoudig pagination toevoegen door de `pagination.html.twig` te includen met een aantal parameters.)

  ```twig
  {% include ‘@Cms/pagination.html.twig’ with {
     currentPage: page, {# Huidige pagina #}
     paginationPath: uri,  {# URL van de pagina (optioneel) #}
     lastPage: pages,  {# Totaal aantal paginas #}
     showAlwaysFirstAndLast: true  {# Toon eerste en laatste pagina #}
  } only %}
  ```

- Logo kon niet worden verwijderd (foutmelding).

- De mogelijkheid om een `login formulier` te koppelen op een pagina.

- De mogelijkheid om een `registratie formulier` te koppelen op een pagina.

- Er is standaard een sessie (`last-route`) beschikbaar die altijd de vorige route bevat.

- De cache popup wordt nu niet meer als een 'harde popup' getoond maar als een blauwe overlay zoals we die consistent gebruiken.

# Versie 1.1.0

### Nieuw pagina blokken systeem

- De beschikbare blokken worden nu in een linker menu getoond in een meer gestructureerde weergave.

### Beveiliging

- Volledig login systeem ontwikkeld waarmee een pagina verscholen kan worden achter een login formulier. In de back-end is hier in te stellen welke gebruikersgroepen hier toegang toe kunnen krijgen, subpagina's luisteren hier ook naar.

### Media bibliotheek

- Media cards tonen nu een ge-ruit achtergrond om lichte afbeeldingen met transparantie beter te tonen.
- Afbeeldingen die worden geupload hebben vanaf deze versie niet meer een willekeurige hash als bestandsnaam, maar een versimpelde versie van de originele bestandsnaam.
- Bestanden worden nu geuplaod in een map met een datumcode waardoor er voor elke dag een submap wordt aangemaakt indien er een bestand wordt geupload. Dit omdat we hebben gezien dat er in de praktijk een behoorlijke map ontstaat die zeer onoverzichtelijk wordt bij het zoeken van een source bestand.
- Media kan worden voorzien van een sorteer code vanuit een bundel, waardoor bundels het centrale media object kunnen modificeren om deze te sorteren.

### Zoeken

- Trinity CMS heeft vanaf deze versie ondersteuning voor de nieuwe zoek bundel, en wordt geleverd met de volgende features i.c.m. Trinity CMS:
  - Zoeken op alle pagina's binnen het CMS.
  - Zoeken afsplitsen op taal, dit gaat vol-automatisch.
  - Verborgen pagina's worden genegeerd in de resultaten.
  - Niet-toegankelijke pagina's worden genegeerd in de resultaten.

### Nieuwe betaalmethodes sectie (voorheen 'Mollie')

De 'Betaalmethodes' (voorheen 'Mollie') tab binnen de Trinity configuratie kan nu meerdere betaalmethoden bevatten. Er is een dynamische manier toegevoegd voor het toevoegen, wijzigen en onderhouden van betaalmethodes waar `Mollie` en `Buckaroo` de eerste methodes zijn die intussen zijn toegevoegd.

Binnen de betaalmethodes zijn de volgende mogelijkheden beschikbaar:

- Een betaalmethode in- of uitschakelen.
- Additionele instellingen configureren specifiek voor die betaalmethode.
- Een betaalmethode live zetten.

Het wisselen van een betaalmethode gaat naadloos. Zodra er 2 zijn ingesteld, en er moet worden gewisseld naar de andere, zet je deze aan (de vorige gaat automatisch uit), en alle betaal systemen binnen alle bundels (incl. e-commerce) gebruiken naadloos deze nieuw geactiveerde methode zonder verdere configuratie.

### Extensie beheer

- Extensies kunnen worden geïnstalleerd vanuit Trinity.
- Extensies kunnen opnieuw worden geïnstalleerd vanuit Trinity (bestanden worden hersteld).
- Extensies kunnen worden geupdated vanuit Trinity.

  Let op: Na het installeren van een extensie dient de rode knop `CACHE LEGEN` te worden gebruikt om de database bij te werken. Dit kan niet in één actie tegelijk met het installeren van een extensie.

### Agenda / kalender

- In het verleden was er een agenda functie binnen Trinity, deze functie is opnieuw geactiveerd, en functioneel. Hiermee kan visueel punten worden toegevoegd en gekoppeld worden op de website zoals elke andere bundel.

### Caching

- Pagina caching is verder uitgebreid.
- De `Cache legen` optie is werkend.
- Er is een oplossing doorgevoerd waarbij het submenu apart wordt gecached.

### Routing

- Bundels hebben nu een hogere prioriteit in het opbouwen van zogeheten 'routes' binnen het framework. Routes zijn de gegenereerde URL's, als een bundel een vergelijkbare URL gebruikt, overruled deze het framework tot op zekere hoogte.

### Tags

- Het bestaande tag systeem is verder uitgebreid.

### Tekstbewerker

- Update doorgevoerd naar de laatste versie van CKEditor 4.
- `Markdown` ondersteuning toegevoegd.

### Mailer

- Er is een public method toegevoegd aan de Util/Mailer waarmee binnen de code de gegenereerde HTML kan worden opgehaald voor preview doeleinden.
- Er is een nieuwe e-mail template beschikbaar in `src/CmsBundle/Resources/views/Emails/notify.html.twig`.
- De header afbeelding van de e-mail template kan worden gewijzigd in het configuratie scherm, waar ook de logo's e.d. aangepast kunnen worden.

### Taal beheer

- Het beheren van de talen (qua vertalingen) is versimpeld. Voorheen duurde het laden van de vertalingen zeer lang, nu kan men direct een keuze maken voor welke sectie de vertalingen moeten worden gewijzigd, waardoor dit de productiviteit bevorderd.
- Er kunnen nu custom regels worden toegevoegd aan een taal sectie, waardoor men minder afhankelijk is van de geautomatiseerde catalogus.

### Pagina's en navigatie
- Sub-navigatie is ook hersteld na `1.0.18`.
- Fout oplossing waar het sorteren van pagina's een fout kon tonen.
- Fout oplossing waar de homepage in zeldzame gevallen een fout kan tonen bij het renderen van de blokken.

### Overig

- Lorum ipsum generator toegevoegd die door andere bundles kunnen gebruikt. De BlogBundle gebruikt deze in de laatste versie om een blog post aan te maken met random data.
- De `reCAPTCHA` hulp link om sleutels aan te vragen opent nu in een nieuw venster/tab.
- Voor `reCaPTCHA` is het nu mogelijk om globaal een tekst regel toe te voegen. Bijv.: "reCAPTCHA is verplicht om het formulier te versturen". De globale tekst wordt vervange als er tekst mee wordt gegeven aan getGoogleRecaptchaWidget().
- `Sluggify` twig filter toegevoegd waarmee strings kunnen worden veranderd in een web-safe string, direct vanuit Twig.
- Trinity kan als bundel gekoppeld worden op de website, net als elke andere bundel, in deze versie:
  - Kalender koppelen op de website.
- Tabs kunnen nu worden geblokkeerd met de `disabled`-class.
- Wanneer men uitlogt, wordt de volledige sessie gewist, dit is nodig voor het verbergen van pagina's waar de gebruiker dan geen toegang meer tot heeft.
- Ondersteuning voor `/logout`, waarmee men via de `redirect` sessie de route kunnen bepalen waar men naartoe worden geredirect.
- Diverse technische foutoplossingen die geen tekstuele toelichting behoeven.
- Trinity `cpop` popups kunnen nu zonder padding getoond worden (o.a. nuttig voor het laden van iframes in de popup).

# Versie 1.0.18

<span style="color:#aaa">**Release:** 12 juli 2018</span>

### Trinity core

- Pagina scores zijn werkend. `trinity:analyze domeinnaam.nl`

- Pagina specifieke template wijzigingen worden nu juist getoond.

- 'CDN Cache' ondersteunt nu Font-Awesome. Dit zorgt ervoor dat de door 'FA' gebruikte fonts automatisch worden gedownload en lokaal gebruikt.

- Cronjobs kunnen automatisch worden verwijderd (o.a. voor C&C).

- Cronjobs activeren een tweede cronjob voor het updaten van de database en het wissen van de cache. Dit levert problemen op met de huidige sessie als dit binnen één sessie gebeurt. (Hierom; de auto-verwijder actie.).

- Ondersteuning voor de AVG / GDPR complient cookiebar.

- Oplossing waarbij de parameters van een `routing` url niet goed werden meegenomen bij een HTTPS-redirect.

- Oplossing bij het koppelen van een bundle waarbij de URL te lang kan worden. (GET > POST)

- Wanneer een pagina ID niet meer bestaat, gaat de pagina niet meer kapot, maar wordt deze geredirect naar de homepage.

- Bug opgelost die voorkwam dat media niet hernoemd kon worden.

- Wanneer een afbeelding wordt vervangen in de bibliotheek, wordt het pad en bestandsnaam niet aangepast, waardoor bestaande paden blijven functioneren.

- Inzicht in waar welke media wordt gebruikt. Hiermee kan worden opgezocht welke media **waarschijnlijk** niet wordt gebruikt.

- Inzicht welke media op een pagina wordt gebruikt.

- Specificeren en controleren van de groote van afbeeldingen die via media-popup worden geupload.
  *Standaard ingesteld op **2M (MB)**.*

- Changelog van alle bundles zichtbaar binnen Trinity > Over Trinity (indien **CHANGELOG.md** bestaat).

- dbRoutingBundle wordt niet meer gebruikt in deze versie en **dient dus verwijderd te worden** (zie '*Update to 1.0.18 or higher.md*' documentatie).

- Systeem brede uitrol van 'Google reCAPTCHA' (instellen in Configuratie > Extra). De initialisatie van reCAPTCHA wordt op elke pagina on-demand ingeladen indien benodigd waardoor dit snel in elke bundel ingebouwd kan worden.

  Het systeme kan worden geïntegreerd met de volgende TWIG functie:

  ```twig
  {{settings.getGoogleRecaptchaWidget()}}
  ```

  En gevalideerd worden met de volgende PHP functie:

  ```php
  if($this->Settings->validateGoogleRecaptcha()){ echo 'VALID'; }else{ echo 'INVALID'; }
  ```

- Pagina structuur en systeem instellingen worden nu gecached, waardoor dit de aantal database verzoeken met 50% ~ 70% moet verbinderen.

- Door de 'loader'-extensie vanuit bundles is het nu mogelijk om titels te cachen naar URI's toe. Dit kan door een file `titles_blog` (voor de Blog bundle) te genereren vanuit de ExtraLoader functie, met de volgende format:
  `LOCALE   URI TITEL`
  Dit zorgt ervoor dat de titel getoond wordt in de browser titel vóór de pagina titel. Zo kan dit ook gebruikt worden voor bijvoorbeeld de webshop om de product naam te tonen in de browser titel.

- Systeem brede ondersteuning voor `[page:<id>]` tags.

# Versie 1.0.17

<span style="color:#aaa">**Release:** 11 mei 2018</span>

### Trinity core

- E-mail test command voor command-line e-mail testen.
- E-mail notificatie bij updaten/installeren van een bundle.
- Toestaan om bundles te her-installeren middels C&C.

# Versie 1.0.16

<span style="color:#aaa">**Release:** 9 mei 2018</span>

### Trinity core

- Ondersteuning voor meerdere commando's in één cronjob actie voor o.a. het C&C update script.
- Bundles kunnen nu een icon plaatsen in de blauwe bovenbalk. O.a. voor de webshop is dit nuttig om snel naar het order portaal te gaan, maar dit zou ook kunnen voor snelle statistieken etc.
- Met de optie `hidden: true` kunnen bundles verborgen worden uit het linker menu, dit kan samen werken met het punt hierboven.

# Versie 1.0.15

<span style="color:#aaa">**Release:** 1 mei 2018</span>

### Pagina beheer

- Ondersteuning voor 3rd-party tags onderin de body per pagina.
- CKEditor heeft geen top-padding meer.

### Media

- Probleem met vervangen afbeelding opgelost.

### Meertaligheid

- Probleem met onjuiste meta URL's opgelost.

### Mailer

- Optie om testmode te omzeilen per script.

# Versie 1.0.14

<span style="color:#aaa">**Release:** 30 april 2018</span>

### Systeem

- Aanpassing in de routing. Algemene routing wordt nu vanuit Trinity ingeladen voor sterk verminderde maatwerk aanpassingen in toekomstige updates.

### Meertaligheid

- Taal aanpassingen voor o.a. Blue Water APP.

### Apps

- Ondersteuning voor mobiele app promotie d.m.v. app ID's. (App icon uploaden binnen de instellingen)

# Versie 1.0.13

<span style="color:#aaa">**Release:** 25 april 2018</span>

### Command and Control

- Voorbereidingen getroffen qua API's en encryptie.
- Aanpassingen in de server kant.

# Versie 1.0.12

<span style="color:#aaa">**Release:** 24 april 2018</span>

### Command and Control

- Voorbereidingen getroffen qua API's en encryptie.

### Interne koppelingen / OnePage support

- Voorbereidingen voor interne koppelingen a.k.a. OnePage ondersteuning.

### Trinity CLI

- Ondersteuning voor updaten via CLI.

### Meertaligheid

- Diverse oplossingen doorgevoerd.

# Versie 1.0.10

<span style="color:#aaa">**Release:** 19 april 2018</span>

### Configuratie:

- App ID's in kunnen vullen voor iOS en Android om automatisch op de mobiele websites een referentie naar de App- en Play Store te tonen.

### Blokken collectie:

- Standaard video blok heeft nu ondersteuning voor de opties:
  - Automatisch afspelen
  - Video herhalen

# Versie 1.0.9

<span style="color:#aaa">**Release:** 19 april 2018</span>

### Blokken / pagina editor:

- Ondersteuning voor 'checkboxes' bij blokken.

# Versie 1.0.8

<span style="color:#aaa">**Release:** 18 april 2018</span>

### Blokken / pagina editor:

- Kleine oplossing waarbij men soms niet meerdere afbeeldingen konden koppelen aan een blok.

### Media

- Oplossing voor automatisch verdwijnende afbeeldingen binnen o.a. de occasions.

# Versie 1.0.6

<span style="color:#aaa">**Release:** 18 april 2018</span>

### Pagina beheer:

- Klonen naar andere taal (indien er meerdere talen aanwezig zijn).
- Onderliggende pagina's kunnen meenemen.
- Plaatsen waar wordt gelinked naar de voorkant, wordt de taal nu in meegenomen om direct naar de juiste URL te verwijzen voor een pagina preview.
- Basis implementatie om pagina's af te kunnen schemen missen een specifieke rol.
- Pagina's optioneel **alleen** tonen wanneer men **niet** is ingelogd (voor bijv. aanmeld-pagina's).
- Bundels zonder configuratie mogelijkheden kunnen nu gekoppeld worden.

### Meertaligheid:

- Oplossingen voor het benaderen van de juiste pagina i.c.m. de bijbehorende taal.
- Bij het bewerken van een pagina met dezelfde URI (slug) wordt bij het switchen de taal-variant getoond.
- De actieve taal binnen Trinity wordt nu getoond met een vlaggetje in de menu balk.
- Verberg taalkeuze in menu balk wanneer er slechts één taal beschikbaar is.

### Layout:

- Achtergrond afbeelding werd niet goed getoond bij inloggen in Trinity.
- Trinity logo is aangepast.

### Media

- Handmatig uploaden in popup is nu werkend.

### Blokken / pagina editor:

- HTML ondersteuning in CTA knoppen en pagina editor knoppen.
- '3 cards' layout heeft een fallback naar 33% breedte indien niet anders ingesteld.
- Probleem opgelost met het sorteren van meerdere afbeeldingen in één blok.
- Probleem opgelost waarbij er na het selecteren van één afbeelding de pagina eerst moest worden opgeslagen om meerdere afbeeldingen te kunnen koppelen.
- Bij het kopieren van een blok uit de ene tab van de browser, komt er binnen 2 seconden automatisch een plakken knop in elke andere tab van de browser. Hierdoor kan men pagina's kopieren en plakken tussen meerdere tabs i.p.v. continu tussen pagina's wisselen.
- Plakken knop is toegevoegd aan de 'nieuwe pagina', hier kon je voorheen enkel een nieuw blok koppelen.
- Snelheid verbeterd binnen de blokken composer doordat 'editors' on-demand worden ingeladen.

### Mailer

- 'Settings' is nu beschikbaar in de mailer template om dynamisch de site logo op te halen.

### Configuratie

- Host werd soms leeggegooid bij een andere taal.
- 'Google Analytics' sectie heet nu 'Google Utilities'
- Toon PHP en Apache versie in instellingen.

### Nieuwe features:

- Integratie van Google Insights (Pagespeed).
- Google Tag Manager (GTM) ondersteuning.
- Search console (site verification code) ondersteuning.

# Versie 1.0.4

<span style="color:#aaa">**Release:** 6 april 2018</span>

- Initiele version release!

