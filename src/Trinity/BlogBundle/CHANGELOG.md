## Version 2.1.3

<span style="color:#aaa">**Release:** 30 Maart 2020</span>

# Admin

- Toon blog edit knop

## Version 2.1.2

<span style="color:#aaa">**Release:** 6 Maart 2020</span>

# Algemeen

- Multisite fixes

## Version 2.1.0

<span style="color:#aaa">**Release:** 13 Feb 2020</span>

# Admin

- Maak strings vertaalbaar
- Verplaats category en configuratie selectie boven de blog entries lijst.


# Frontend

- Toon geen gerelateerde entries die nog in concept staan.


## Version 2.0.1

<span style="color:#aaa">**Release:** 19 Dec 2019</span>

- Backend UI kompleet over de kop gegaan, en Trinity V2 aanpassingen.
- Voeg bericht cloning.
- Gebruik nieuwe pagination_bootstrap voor de voorkant.

## Version 1.6.0

<span style="color:#aaa">**Release:** 22 Aug 2019</span>

- Filter Entries op taal.
- Maak het mogelijk op meerdere categorieen te laten zien. Bij een Blog configuratie of zonder een specifieke Blog configuratie.
- Nieuw link optie om alleen datum te verbergen.
- Vergroot de editor van intro tekst een beetje en de editor van de body twee keer zo groot. En update de labels.
- Verwijder configuratie verplaatst naar links, zodat ie niet meer naast de "nieuw bericht" knop staat.
- Bij nieuwe blog entries: update de SEO onderdelen.
- Fix filtering op MacOs

### Frontend

- Nieuw twig function om entries by categorie op te halen.

## Versie 1.5.0

- Reactie systeem (DGV).
- Nieuw SEO UI systeem.
- Bugs opgelost.

## Versie 1.2.4

- Vertaal "vreemde" karakters naar "normal" versie (voor slugs en titels)
- Laat blog entries in de toekomst niet zien op de website.

## Versie 1.2.3

### Admin gedeelte

- Escape entry titels op het overzicht
- Fix "Annuleren" knop op de blog entry edit scherm
- Zorg er voor dat ckeditor wordt geladen
- Als er meerdere entries zelfde sort order hebben, sort op id.

## Versie 1.2.2

- Edit blog entries direct met tijdelijke afbeeldingen.

## Versie 1.2.1

- Fix verwijderen van een blog die reacties heeft in de entries.

## Versie 1.2.0

- Make categories language depended.
- Move entry_media to blog_entry_media.
- Allow blogs to be selected on category when linking into a page.

### Migrations needed

- Migrate content of entry_media table to blog_entry_media table
- If there are any blog_category entries, for these the language field will need to be set.

## Versie 1.1.2

- Multi media support, en maak ze sorteerbaar.
- SearchBundle support.
- Zoek blogposts gekoppelt aan gekoppelde blog.
- Fix "baseUrl does not exist" error wanneer overrides worden gebruikt.
- Geef meeste gelezen, meeste recente en meeste liked blogs ook door aan blog posts.

## Versie 1.0.2

- Automatisch terugkeren naar overzicht wanneer een ongeldig ID wordt gebruikt.
- Probleem opgelost wanneer de pagina nummering niet goed is geconfigureerd.
- Ondersteuning van de 'timeago' extensie aangepast.

## Versie 1.0.1

- Initiële versie
