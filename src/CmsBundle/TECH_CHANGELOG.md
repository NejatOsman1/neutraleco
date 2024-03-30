# Changelog voor techniek veranderingen

[TOC]

# Update naar 1.2.0

## Nieuwe manier om error pagina's te doen

Vanaf Trinity 1.2.0 en hoger zijn er custom error paginas beschikbaar. De oude manier moet worden vervangen.

1. Verwijder of hernoem de `app/Resources/TwigBundle` map.
2. Doe een geforceerde cache opruiming `rm -rf var/cache/prod/* var/cache/dev/*`

### /admin/settings foutmeldingen invullen

Voor Configuratie -> Foutpagina's de volgende teksten invullen:
`Pagina niet gevonden`
```html
<p>De huidige pagina kon niet worden gevonden.</p>

<p><a href="/">Klik hier</a> om terug te gaan naar de homepagina.</p>
```

`Geen toegang`
```html
<p>U heeft geen toegang tot deze pagina.</p>

<p><a href="/">Klik hier</a> om terug te gaan naar de homepagina.</p>
```

`Systeem fout`
```html
<p>Er is een fout opgetreden.</p>

<p><a href="/">Klik hier</a> om terug te gaan naar de homepagina.</p>
```

## Nieuwe support voor trinity support telefoon nummer

In het bestand **app/config/config.yml** moet de volgende regel worden toegevoegd onder:
```
twig:
    globals:
        trinity_support_phone: "%trinity_support_phone%"
```

In de bestanden **app/config/parameters.yml** en **app/config/parameters.yml.dist** moet de volgende regel worden toegevoegd:
```
parameters:
    trinity_support_phone: "058 289 68 27"
```

Dit moet ook in de het .dist bestand gedaan worden anders gaat de instelling met de eerst volgende composer install/upgrade verloren.

# Update naar 1.0.18 (Verwijderen van dbRoutingBundle)

Trinity heeft sinds 1.0.18 een eigen routing mechanisme die pakketten van derden niet meer vereisen waardoor andere bundles hier flexibel op in kunnen haken.

## **Stappenplan:**

### Vóór de update

In de file `app/config/services.yml` moeten de volgende regels worden gewijzigd:

Binnen de functie `app.locale_listener`:

`arguments: ['%kernel.default_locale%']`

naar:

`arguments: ['%kernel.default_locale%', '@doctrine.orm.entity_manager']`

en binnen de functie `app.user_locale_listener`:

`arguments: ['@session']`

naar:

`arguments: ['@session', '@doctrine.orm.entity_manager']`

### Nà de update

Verwijderen uit **.gitmodules**

```
[submodule "src/Bundle/DbRoutingBundle"]
	path = src/Bundle/DbRoutingBundle
	url = git@gitlab.com:trinity-bundles/DbRoutingBundle.git
```

Verwijderen uit **app/AppKernel.php**

```
            new Bundle\DbRoutingBundle\DbRoutingBundle(),
```

Verwijderen uit **app/config/config.yml**
```
    - { resource: '@DbRoutingBundle/Resources/config/routing.xml' }
```

# Update naar 1.0.14 of hoger

1. ApiBundle updaten naar laaste versie (master).

2. Zorg ervoor dat het volgende bovenaan staat in `routing.yml`:

   ```yaml
   trinity_routing:
       resource: '@CmsBundle/Resources/config/routing.yml'
   ```

3. Zorg ervoor dat in de `config.yml` de volgende configuratie wordt toegevoegd onder `fos_rest`:

   ```yaml
       service:
           inflector: TrinityApiBundle_inflector
   ```
